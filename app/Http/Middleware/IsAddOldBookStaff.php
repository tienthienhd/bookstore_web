<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAddOldBookStaff
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
        $permissions = $user->role->rolePermissions;
        foreach ($rolePermissions as $rolePermission) {
            if ($rolePermission->permission_id == config('permission.add-old-book') ) {
                return $next($request);
            }
        }
        abort(403);
    }
}
