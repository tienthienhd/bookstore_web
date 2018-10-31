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
        if ($user &&  $user->role_id != 1 
            &&  $user->role_id != 2 &&  $user->role_id != 3 ) {
            return $next($request);
        }
        abort(403);
    }
}
