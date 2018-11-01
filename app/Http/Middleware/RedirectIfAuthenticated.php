<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user() &&  Auth::user()->role_id == config('auth.roles.admin')) {
                return redirect()->route('admin.home');
            }
            if (Auth::user() &&  Auth::user()->role_id == config('auth.roles.customer')) {
                return redirect()->route('home');
            }
            return redirect()->route('manager.home');
        }

        return $next($request);
    }
}
