<?php

namespace Modules\OrderMgnt\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Setup\Entities\ClothType;
use Modules\Setup\Entities\Customer;

/**
 *
 * @mixin Builder
 */
class Order extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function clothType(): BelongsTo
    {
        return $this->belongsTo(ClothType::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public static function isExist($name): Order|null
    {
        return Order::where('cloth_type_id', $name)->first();
    }

    public static function isExistOnEdit($name, $id): Order|null
    {
        return Order::where([['cloth_type_id', $name], ['id', '!=', $id]])->first();
    }
}


