<?php

namespace App\Http\Controllers;

use App\Models\OrderStateHistory;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderStateHistoryController extends Controller
{
    
    public function addOrderStateHistory($orderStateHistory)
    {
        OrderStateHistory::create($orderStateHistory);
    }

    
    public function getOrderStateHistory(Order $order)
    {
        $orderStateHistories = OrderStateHistory::where('order_id', $order->id)->get();
        return $orderStateHistories;
    }
}
