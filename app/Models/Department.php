<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public static function isExist($name): Department|null
    {
        return Department::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): Department|null
    {
        return Department::where([['name', $name], ['id', '!=', $id]])->first();
    }
}
