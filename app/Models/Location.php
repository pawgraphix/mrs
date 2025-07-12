<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public static function isExist($name): Location|null
    {
        return Location::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): Location|null
    {
        return Location::where([['name', $name], ['id', '!=', $id]])->first();
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
