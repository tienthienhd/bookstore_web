<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    
    public function addOrderDetail($orderDetails)
    {
        OrderDetail::insert($orderDetails);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function getOrderDetail(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * getHotBooks description
     * @return collection $hotBooks
     */
    public function getHotBooks(){
        $hotBooks = OrderDetail::groupBy('book_id')
            ->selectRaw('sum(quantity) as sum, book_id')->get();
        $hotBooks = $hotBooks->sortByDesc('sum');
        $hotBooks = $hotBooks->slice(0, 10);
        $hotBooks->all();
        return $hotBooks;
    }
}
