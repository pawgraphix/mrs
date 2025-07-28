<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * @mixin Builder
 */
class MaintenanceRequest extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewed_by');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public static function isExist($name): MaintenanceRequest|null
    {
        return MaintenanceRequest::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): MaintenanceRequest|null
    {
        return MaintenanceRequest::where([['name', $name], ['id', '!=', $id]])->first();
    }

}
