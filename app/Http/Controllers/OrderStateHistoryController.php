<?php

namespace App\Http\Controllers;

use App\Models\OrderStateHistory;
use Illuminate\Http\Request;

class OrderStateHistoryController extends Controller
{
    
    public function addOrderStateHistory($orderStateHistory)
    {
        OrderStateHistory::insert($orderStateHistory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStateHistory  $orderStateHistory
     * @return \Illuminate\Http\Response
     */
    public function getOrderStateHistory(OrderStateHistory $orderStateHistory)
    {
        //
    }
}
