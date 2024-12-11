<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * 
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if (auth()->check() && auth()->user) {
            # code...
        }
        return $next($request);
    }
}
