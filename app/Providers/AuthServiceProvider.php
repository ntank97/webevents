<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use User;

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
        Gate::define('full_action', function ($user, $role) {
            return $user->id == $role;
        });
        Gate::define('editor', function ($user, $role) {
            return $user->id == $role;
        });
        Gate::define('admin', function ($user, $role) {
            // dd($user->id);
            return $user->level == $role;
        });
        Gate::define('role-user', function ($user, $level) {
            // dd($user->level);
            return $user->level == $level;
        });
    }
}
