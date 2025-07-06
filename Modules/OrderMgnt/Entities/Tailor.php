<?php

namespace Modules\OrderMgnt\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class Tailor extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public static function isExist($phone_number): Tailor|null
    {
        return Tailor::where('phone_number', $phone_number)->first();
    }

    public static function isExistOnEdit($phone_number, $id): Tailor|null
    {
        return Tailor::where([['phone_number', $phone_number], ['id', '!=', $id]])->first();
    }

    public function getFullNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }
}
