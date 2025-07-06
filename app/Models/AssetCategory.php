<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetCategory extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public static function isExist($name): AssetCategory|null
    {
        return AssetCategory::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): AssetCategory|null
    {
        return AssetCategory::where([['name', $name], ['id', '!=', $id]])->first();
    }
}
