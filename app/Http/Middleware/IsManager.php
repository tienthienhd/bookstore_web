<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user &&  $user->role_id != config('auth.roles.admin') 
            &&  $user->role_id != config('auth.roles.customer') &&  $user->role_id != config('auth.roles.locked') ) {
            return $next($request);
        }
        abort(403);
    }
}
