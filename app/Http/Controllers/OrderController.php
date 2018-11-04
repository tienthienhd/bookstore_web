<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderStateHistoryController;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOrder(OrderRequest $request)
    {
        //  Validate the data
        $valid = $request->validated();

        //  Add order
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total = $request->total;
        $order->delivery = $request->delivery;
        $order->state = config('order-state.new-created') ;
        $order->save();

        //  Add order detail (get cart then insert into order detai)
        $orderDetails = [];
        $cartController = new CartController;
        $carts = $cartController->getCart();
        foreach ($carts as $cart) {
            array_push($orderDetails, [
                'order_id' => $order->id,
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,
                'dead_price' => $cart->book->saleprice
            ]);
        }
        $orderDetailController = new OrderDetailController;
        $orderDetailController->addOrderDetail($orderDetails);

        //  Clear cart 
        $cartController->clearCart();

        //  Add order state history
        $orderStateHistory = [
            'order_id' => $order->id,
            'state' => $order->state,
            'title' => array_search($order->state,config('order-state')),
            'description' => array_search($order->state,config('order-state'))
        ];
        $orderStateHistoryController = new OrderStateHistoryController;
        $orderStateHistoryController->addOrderStateHistory($orderStateHistory);

        return redirect()->route('order.show',['order' => $order])->with('status', __('messages.add-order-successfully'));
    }

    public function getOrderMemberList(){
        $userId = Auth::user()->id;
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function getOrderMemberDetail(Order $order)
    {
        $multiplications = [];
        foreach ($order->orderDetails as $orderDetail) {
            $multiplications[$orderDetail->id] = $orderDetail->quantity * $orderDetail->book->saleprice;
        }
        $total = array_sum($multiplications);
        $deliveryType = array_search($order->delivery,config('delivery.types'));
        $deliveryFees = config('delivery.fees.'.$deliveryType);
        $total += $deliveryFees;
        $orderState = array_search($order->state,config('order-state'));
        return view('orders.show', [
            'order' => $order, 
            'deliveryType' => $deliveryType,
            'deliveryFees' => $deliveryFees,
            'total' => $total,
            'multiplications' => $multiplications,
            'orderState' => $orderState,
        ]);
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
