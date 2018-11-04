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
}
