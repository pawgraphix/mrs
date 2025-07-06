<?php

namespace Modules\Setup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public static function isExist($name): Customer|null
    {
        return Customer::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): Customer|null
    {
        return Customer::where([['name', $name], ['id', '!=', $id]])->first();
    }

}
