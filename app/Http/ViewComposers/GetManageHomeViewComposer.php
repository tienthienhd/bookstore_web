<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Order;
use App\Models\Book;
use App\Models\OrderStateHistory;
use App\Models\Comment;
use App\User;

class GetManageHomeViewComposer
{
    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $customers = User::where('role_id', config('auth.roles.customer'))->get();
        $countCustomer = count($customers);

        $books = Book::all();
        $countBook = count($books);

        $categories = config('book-category');
        $countCategory = count($categories);

        $orders = Order::all();
        $countOrder = count($orders);
        
        $countBookByCategory = Book::selectRaw('category, count(*) as countBook')
        ->groupBy('category')
        ->orderBy('category')
        ->pluck('countBook','category');;

        $ordersStateHistories = OrderStateHistory::orderBy('created_at', 'DESC')->get()->take(10);

        $comments = Comment::orderBy('created_at', 'DESC')->get()->take(10);
        
        $viewParams = [
            'countCustomer' => $countCustomer,
            'countBook' => $countBook,
            'countCategory' => $countCategory,
            'countOrder' => $countOrder,
            'countBookByCategory' => $countBookByCategory,
            'ordersStateHistories' => $ordersStateHistories,
            'comments' => $comments
        ];
        $view->with($viewParams);
        
    }
}