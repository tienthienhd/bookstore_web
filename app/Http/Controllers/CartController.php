<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $userId = Auth::user()->id;
        $bookId = $request->bookId;
        $quantity = $request->quantity;

        $cart = Cart::where('user_id', $userId)->where('book_id', $bookId)->first();
        if(!$cart){
            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->book_id = $bookId;
            $cart->quantity = $quantity;
        }else{
            $cart->quantity = $cart->quantity + $quantity;
        }

        $book = Book::find($bookId);
        if($book->state < $cart->quantity){
            return redirect()->back()->withErrors([
                'over-quantity'=> __('messages.over-quantity', ['quantity' => $book->state])
            ]);
        }

        $cart->save();
        return redirect()->back()->with('status', __('messages.add-to-cart-successfully'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        $userId = Auth::user()->id;
        $carts = Cart::where('user_id', $userId)->get();
        $multiplications = [];
        foreach ($carts as $cart) {
            $multiplications[$cart->id] = $cart->quantity * $cart->book->saleprice;
        }
        return view('carts.index', ['carts' => $carts, 'multiplications' => $multiplications]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity(Request $request, Cart $cart)
    {
        $cart->quantity = $request->quantity;
        if($cart->book->state < $cart->quantity){
            return redirect()->back()->withErrors([
                'over-quantity'=> __('messages.over-quantity', ['quantity' => $cart->book->state])
            ]);
        }
        $cart->save();
        return redirect()->back()
        ->with('status', __('messages.update-cart-quantity-successfully', ['title' => $cart->book->title]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function delete(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('status', __('messages.delete-cart-successfully', ['title' => $cart->book->title]));
    }

    public function clearCart(){
        $userId = Auth::user()->id;
        Cart::where('user_id', $userId)->delete();
    }

    public function getCart(){
        $userId = Auth::user()->id;
        return Cart::where('user_id', $userId)->get();
    }

}
