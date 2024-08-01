<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        Log::info('Role middleware is working'); // Debugging
        Log::info('User Role: ' . (Auth::check() ? Auth::user()->role : 'Not Authenticated')); // Additional debugging
        
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/');
        }

        return $next($request);
    }
}