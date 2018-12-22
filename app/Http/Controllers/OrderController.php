<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Book;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderStateHistoryController;

class OrderController extends Controller
{
    /**
     * Add new order record
     * @param OrderRequest $request 
     */
    public function addOrder(OrderRequest $request)
    {
        //  Validate the data
        $valid = $request->validated();

        //	Check book quantity
        $cartController = new CartController;
        $carts = $cartController->getCart();
        $bookIds = [];
        foreach ($carts as $cart) {
        	array_push($bookIds, $cart->book_id);
        }
        $books = Book::whereIn('id', $bookIds)->get();
        foreach ($carts as $cart) {
        	foreach ($books as $book) {
        		if($cart->book_id == $book->id){
        			if($book->state < $cart->quantity){
        				return redirect()->back()->withErrors([
			                'over-quantity'=> __('messages.over-quantity', [
			                	'quantity' => $book->state, 'title' => $book->title])
			            ]);
        			}
        		}
        	}
        }

        //  Add order
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total = $request->total;
        $order->delivery = $request->delivery;
        $order->state = config('order-state.new-created') ;
        $order->save();

        //  Add order detail (get cart then insert into order detai)
        $orderDetails = [];
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

        //	Update book quantity
        foreach ($carts as $cart) {
        	foreach ($books as $book) {
        		if($cart->book_id == $book->id){
        			$book->state = $book->state - $cart->quantity;
        			$book->save();
        		}
        	}
        }
        
        //  Clear cart 
        $cartController->clearCart();

        //  Add order state history
        $this->addOrderStateHistory($order);

        return redirect()->route('order.show',['order' => $order])
        ->with('status', __('messages.add-order-successfully'));
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
            $multiplications[$orderDetail->id] = 
            $orderDetail->quantity * $orderDetail->book->saleprice;
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

    public function getOrderStateHistory(Order $order){
        $orderStateHistoryController = new OrderStateHistoryController;
        $orderStateHistories = $orderStateHistoryController->getOrderStateHistory($order);
        return view('orders.state-history' , ['orderStateHistories' => $orderStateHistories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder(Order $order)
    {
        if($order->state > config('order-state.canceled') 
            && $order->state < config('order-state.ship-assigned')){

            //  Update order state
            $order->state = config('order-state.canceled');
            $order->save();

            //  Add order state history
            $this->addOrderStateHistory($order);

            return redirect()->back()->with('status', __('messages.cancel-order-successfully'));
        }
        $description = 'order-state.description.'.array_search($order->state,config('order-state'));
        return redirect()->back()->withErrors(['cant-cancel'=> 
            __('messages.cant-cancel-order', [
                'description' => __($description)])]);
    }
    public function cancelManager(Order $order)
    {
        
            //  Update order state
            $order->state = config('order-state.canceled');
            $order->save();

            //  Add order state history
            $this->addOrderStateHistory($order);

            return redirect()->back()->with('status', __('messages.cancel-order-successfully'));
        
       
    }




    public function getOrderList(Request $request){
        $orders = Order::orderBy('created_at', 'desc')->paginate();
        $keyId = $request->searchId;
        $keyName = $request->searchName;
        $keyPhone= $request->searchPhone;
        if($keyId != ''){
           
        $orders = Order::where('id',$keyId)->paginate();
        }
      
        if($keyName != ''){
        
        $orders = Order::WhereIn('user_id', function($q) use ($keyName){
            $q->select('id')->from('users')->where('fullname','like', '%' . $keyName . '%');
        })->paginate();;
        }
        if($keyPhone != ''){
        
        $orders = Order::WhereIn('user_id', function($q) use ($keyPhone){
            $q->select('id')->from('users')->where('phone','=',$keyPhone);
        })->paginate();;
        }
       
        
        return view('manager.order.list')->with([
            'orders' => $orders,
            'searchName' => $keyName,
            'searchId' => $keyId,
            'searchPhone' => $keyPhone,
           
        ]);

    }
    
   



    public function searchOrder(Request $request){
        
    }

    public function getOrderDetail(Order $order){
        $multiplications = [];
        foreach ($order->orderDetails as $orderDetail) {
            $multiplications[$orderDetail->id] = 
            $orderDetail->quantity * $orderDetail->book->saleprice;
        }
        $total = array_sum($multiplications);
        $deliveryType = array_search($order->delivery,config('delivery.types'));
        $deliveryFees = config('delivery.fees.'.$deliveryType);
        $total += $deliveryFees;
        $orderState = array_search($order->state,config('order-state'));
        return view('manager.order.detail', [
            'order' => $order, 
            'deliveryType' => $deliveryType,
            'deliveryFees' => $deliveryFees,
            'total' => $total,
            'multiplications' => $multiplications,
            'orderState' => $orderState,
        ]);
        

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function showUpdateStateForm(Order $order){
         $orderState = array_search($order->state,config('order-state'));
        return view('manager.order.UpdateState', [ 'order' => $order, 'orderState' => $orderState]);

    }
    public function updateOrderState(Request $request, Order $order)
    {

            //  Update order state
            $order->state = $request->orderState;
            $order->save();

            //  Add order state history
            $this->addOrderStateHistory($order);

            return redirect()->route('manager.order.detail',[ 'order' => $order])->with('status', __('messages.edit-order-successfully'));
        
        
        
    }

    public function getListBuyed(){

    }

    public function addOrderStateHistory(Order $order){
        $orderStateHistory = [
            'order_id' => $order->id,
            'state' => $order->state,
            'title' => array_search($order->state,config('order-state')),
            'description' => array_search($order->state,config('order-state'))
        ];
        $orderStateHistoryController = new OrderStateHistoryController;
        $orderStateHistoryController->addOrderStateHistory($orderStateHistory);
    }

}
