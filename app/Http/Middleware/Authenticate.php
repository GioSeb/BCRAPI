<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        // If the request is not an AJAX request, redirect to the desired path.
        // Change 'route('login')' or 'null' (which defaults to /login) to '/' for the root URL.
        return $request->expectsJson() ? null : '/';
    }
}
