<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Role;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Move your 'manage-users' Gate definition here
        Gate::define('manage-users', function (User $user) {
            // return $user->is_admin; // If using is_admin flag
            return $user->hasRole(Role::ROLE_ADMIN) || $user->hasRole(Role::ROLE_MASTER);
        });

        Gate::define('be-a-master', function (User $user) {
            // This gate just checks if the user's role is master.
            // It uses the same internal logic but is called via the auth system.
            return $user->hasRole(Role::ROLE_MASTER);
        });
    }
}
