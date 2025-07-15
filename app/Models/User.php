<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
    public function getFullNameAttribute(): string
    {
        return $this->first_name." ".$this->last_name;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function hasRole($roleName): bool
    {
        return $this->role && $this->role->name === $roleName;
    }
    public static function isExist($email): User|null
    {
        return User::where('email', $email)->first();
    }

    public static function isExistOnEdit($email, $id): User|null
    {
        return User::where([['email', $email], ['id', '!=', $id]])->first();
    }
}
