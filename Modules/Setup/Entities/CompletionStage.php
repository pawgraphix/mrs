<?php

namespace Modules\Setup\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */

class CompletionStage extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function clothType(): BelongsTo
    {
        return $this->belongsTo(ClothType::class);
    }

}
