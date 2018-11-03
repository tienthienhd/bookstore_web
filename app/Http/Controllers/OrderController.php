<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderStateHistoryController;

class OrderController extends Controller
{
    /**
     * 
     * @var CartController
     */
    private $cartController;

    /**
     * 
     * @var OrderDetailController
     */
    private $orderDetailController;

    /**
     * 
     * @var OrderStateHistoryController
     */
    private $orderStateHistoryController;

    /**
     * 
     * @param CartController              $cartController              
     * @param OrderController             $orderController             
     * @param OrderStateHistoryController $orderStateHistoryController 
     */
    public function __construct(
        CartController $cartController,
        OrderController $orderController,
        OrderStateHistoryController $orderStateHistoryController
    ){
        $this->cartController = $cartController;
        $this->orderController = $orderController;
        $this->orderStateHistoryController = $orderStateHistoryController;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOrder(Request $request)
    {
        //  Add order
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total = $request->total;
        $order->delivery = $request->delivery;
        $order->state = __('order-state.new-created') ;
        $order->save();

        //  Add order detail (get cart then insert into order detai)
        $orderDetails = [];
        $carts = $this->cartController->getCart();
        foreach ($carts as $cart) {
            array_push($orderDetails, [
                'order_id' => $order->id,
                'book_id' => $cart->book_id,
                'quantity' => $cart->quantity,
                'dead_price' => $cart->book->saleprice
            ]);
        }
        $this->orderDetailController->addOrderDetail($orderDetails);

        //  Clear cart 
        $this->cartController->clearCart();

        //  Add order state history
        $orderStateHistory = [
            'order_id' => $order->id,
            'state' => $order->state,
            'title' => __('order-sate.title'.$order->state),
            'description' => __('order-sate.description'.$order->state)
        ];
        $this->orderStateHistoryController->addOrderStateHistory($orderStateHistory);

        return redirect()->route('order.show',['order' => $order])->with('status', __('messages.add-order-successfully'));
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
