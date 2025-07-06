<?php

namespace Modules\Setup\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class TradePoint extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public static function isExist($name): TradePoint|null
    {
        return TradePoint::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): TradePoint|null
    {
        return TradePoint::where([['name', $name], ['id', '!=', $id]])->first();
    }
}
