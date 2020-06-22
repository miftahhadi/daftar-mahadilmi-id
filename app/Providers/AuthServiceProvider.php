<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('peserta-ikhwan', function($user){
           return $user->isAdminIkhwan() ? Response::allow() : $user->isSuperAdmin ? Response::allow() : Response::deny('Anda tidak diizinkan');
        });
        
        Gate::define('peserta-akhawat', function($user){
           return $user->isAdminAkhawat() ? Response::allow() : $user->isSuperAdmin ? Response::allow() : Response::deny('Anda tidak diizinkan');
        });

        //
    }
}
