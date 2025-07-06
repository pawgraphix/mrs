<?php

namespace Modules\Setup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\OrderMgnt\Entities\Order;

class OrderCompletionStatus extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'order_completion_status';

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function completionStage(): BelongsTo
    {
        return $this->belongsTo(CompletionStage::class);
    }

    public static function getCompletionPercent($orderId)
    {
        $status_array = OrderCompletionStatus::where('order_id', $orderId)->pluck('completion_stage_id')->toArray();
        return CompletionStage::whereIn('id', $status_array)->sum('percentage_weight');
    }
}
