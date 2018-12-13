<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class GetCountCartViewComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        if($user){
            if($user->role_id == config('auth.roles.customer')){
                $count = Cart::where('user_id', $user->id)->sum('quantity');
                $view->with('countCart', $count);
            }
        }
        else{
            $view->with('countCart', 0);
        }
    }
}