<?php

namespace Modules\Setup\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class ClothType extends Model
{
    use softDeletes;
    protected $guarded = [];

    public static function isExist($name): ClothType|null
    {
        return ClothType::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): ClothType|null
    {
        return ClothType::where([['name', $name], ['id', '!=', $id]])->first();
    }

}
