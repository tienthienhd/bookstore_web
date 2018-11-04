<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOrder(Request $request)
    {
        //
    }

    public function getOrderMemberList(){

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function getOrderMemberDetail(Order $order)
    {
        //
    }

    public function getOrderStateHistory(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder(Order $order)
    {
        //
    }

    public function getOrderList(){

    }

    public function searchOrder(){

    }

    public function getOrderDetail(){

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function updateOrderState(Request $request, Order $order)
    {
        //
    }

    public function getListBuyed(){

    }

}
