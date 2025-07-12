<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use softDeletes;
    protected $guarded=[];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function assetCategory()
    {
        return $this->belongsTo(AssetCategory::class);
    }
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public static function isExist($name): Asset|null
    {
        return Asset::where('name', $name)->first();
    }

    public static function isExistOnEdit($name, $id): Asset|null
    {
        return Asset::where([['name', $name], ['id', '!=', $id]])->first();
    }
}
