<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public static function isExist($name): Role|null
    {
        return Role::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): Role|null
    {
        return Role::where([['name', $name], ['id', '!=', $id]])->first();
    }
}
