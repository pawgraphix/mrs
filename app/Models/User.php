<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

/*    public static function where(string $string, mixed $email): object
    {
        return new class {
            public function exists(): bool
            {
                // simulate DB check (example only - this won't work without DB access)
                return false;
            }
        };
    }*/


    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
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

    public static function getCurrentUserDepartmentId()
    {
        return Auth::user()->department_id;
    }
}
