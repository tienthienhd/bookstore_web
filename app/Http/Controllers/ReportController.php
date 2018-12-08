<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class ReportController extends Controller
{
	public function showReportForm(){
		return view ('manager.reports.index');
	}
    public function getRevenueReport(Request $request){
    	$getDay = $request->day;
    	if($getDay == ''){
    		$revenues =Order::groupBy('date')->selectRaw('sum(total) as sum, date(created_at) as date')->get();
    	}
    	else{
    		$revenues =Order::groupBy('date')->selectRaw('sum(total) as sum, date(created_at) as date')->whereDate('created_at',$getDay)->get();
    	}

    	
    	return view('manager.reports.RevenueReport',['revenues'=>$revenues]);

    }

    public function getProfitReport(Request $request){
    	$getDay = $request->day;
    	if($getDay == ''){

    		$profits = OrderDetail::join('books','book_id','=','books.id')->join('orders','order_id','=','orders.id')->groupBy('order_id')->groupBy('date')->selectRaw('date(orders.created_at) as date,sum(quantity*purchase_price) as profit')->orderBy('orders.created_at')->get();
    		$revenues =Order::groupBy('date')->selectRaw('sum(total) as sum, date(created_at) as date')->orderBy('orders.created_at')->get();
    	}
    	else{
    		$profits = OrderDetail::join('books','book_id','=','books.id')->join('orders','order_id','=','orders.id')->groupBy('order_id')->groupBy('date')->selectRaw('date(orders.created_at) as date,sum(quantity*purchase_price) as profit')->whereDate('orders.created_at',$getDay)->orderBy('orders.created_at')->get();
    		$revenues =Order::groupBy('date')->selectRaw('sum(total) as sum, date(created_at) as date')->whereDate('created_at',$getDay)->get();
    	}
    	
    	
    	return view('manager.reports.ProfitReport',['profits'=>$profits,'revenues'=>$revenues ]);
    }

    public function getInventoryReport(){

    	$sellings = OrderDetail::join('books','book_id','=','books.id')->groupBy('books.id')->groupBy('books.title')->selectRaw('books.title as name, sum(quantity) as quantity')->orderBy('quantity','desc')->take(10)->get();
    	$inventorys = OrderDetail::join('books','book_id','=','books.id')->groupBy('books.id')->groupBy('books.title')->selectRaw('books.title as name, sum(quantity) as quantity')->orderBy('quantity','esc')->limit(10)->get();

    	return view('manager.reports.InventoryReport',['sellings'=>$sellings, 'inventorys'=>$inventorys ]);
    }
}
