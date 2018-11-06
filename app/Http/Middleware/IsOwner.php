<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $requestParameters = $request->route()->parameters();

        foreach ($requestParameters as $requestParameter) {
            // Loop through route parameters
            if (gettype($requestParameter) === "object") {
                //print_r($requestParameter);exit();
                // Route Model Binding is active for this parameter
                if (isset($requestParameter->user_id)) { //for OrderController
                    // Model has an owner (column user_id is set)
                    $owner = $requestParameter->user_id;
                    if ($owner !== Auth::id()) {
                        // Authenticated user is the not owner
                        abort(403);
                    }
                }elseif(isset($requestParameter->id)){ //for usercontroller, not the order of id and user_id
                    $owner = $requestParameter->id;
                    if ($owner !== Auth::id()) {
                        // Authenticated user is the not owner
                        abort(403);
                    }
                }
            }
        }

        return $next($request);
    }
}
