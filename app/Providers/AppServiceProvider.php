<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Import the User model
use app\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-users', function (User $user) {
            // return $user->is_admin; // If using is_admin flag
            return $user->hasRole(Role::ROLE_ADMIN) || $user->hasRole(Role::ROLE_MASTER); // Or using roles
        });
    }
}
