<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Defining Gates

        //Admin Gate
        Gate::define('Admin',function ($user){
            return $user->hasRole('Admin');
        });

        //Zonal Manager Role Gate
        Gate::define('Hod',function ($user){
            return $user->hasRole('HoD');
        });

        //DFC Role Gate
        Gate::define('Student',function ($user){
            return $user->hasRole('Student');
        });
    }
}
