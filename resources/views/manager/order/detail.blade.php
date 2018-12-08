{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif 
	Tên: {{$order->user->fullname}}<br>
	SĐT: {{$order->user->phone}}<br>
	Địa chỉ: {{$order->user->address}}<br>
	Mã đơn hàng:{{$order->id}}<br>
	Ngày đặt:{{$order->created_at}}<br>
	Trạng thái: {{__('order-state.description.'.$orderState)}}<br>
	
		<a href="{{route('manager.order.updatestate',['order' => $order])}}"><button>{{__('btn.update-state-order')}}</button></a><br><br>
	
		<a href="{{route('manager.order.cancel',['order' => $order])}}"><button>{{__('btn.cancel')}}</button></a>
	
	<br>Bao gồm:<br>
	<table>
		<thead>
			<tr>
				<th>{{__('word-and-statement.order.item')}}</th>
				<th>{{__('word-and-statement.order.price')}}</th>
				<th>{{__('word-and-statement.order.quantity')}}</th>
				<th>{{__('word-and-statement.order.multiplication')}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order->orderDetails as $orderDetail)
			<tr>
				<td>{{$orderDetail->book->title}} <img src="{{asset('img/covers/'.$orderDetail->book->cover)}}" style="width: 5%"></td>
				<td>{{__('word-and-statement.price', ['price' => number_format($orderDetail->book->saleprice, 0, '.', '.')])}}</td>
				<td>{{$orderDetail->quantity}}</td>
				<td>{{__('word-and-statement.price', ['price' => number_format($multiplications[$orderDetail->id], 0, '.', '.')])}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="3">
					{{__('delivery.'.$deliveryType)}}
				</td>
				<td>
					{{__('word-and-statement.price', ['price' => number_format($deliveryFees, 0, '.', '.')])}}
				</td>
			</tr>
			<tr>
				<td colspan="2">
					{{__('word-and-statement.order.total')}}
				</td>
				<td>
					{{$order->orderDetails->sum('quantity')}}
				</td>
				<td>
					{{__('word-and-statement.price', ['price' => number_format($total, 0, '.', '.')])}}
				</td>
			</tr>
		</tbody>
	</table>	
</body>
</html> --}}

@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Order Detail</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.order.list')}}">Order</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Order Detail</li>
                </ol>
            </div>
        </div>
        @if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	    @if (session('status'))
	        <div class="alert alert-success" role="alert">
	            {{ session('status') }}
	        </div>
	    @endif 

        @if(isset($order))
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Order Detail: <q> {{ $order->user->fullname }} </q></header>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Tên</label>
                            <input class="mdl-textfield__input" type="text" name="fullname" value="{{ $order->user->fullname }}" id="fullname" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>SĐT</label>
                            <input class="mdl-textfield__input" type="text" name="phone" value="{{ $order->user->phone }}" id="phone" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Địa chỉ</label>
                            <input class="mdl-textfield__input" type="text" name="address" value="{{ $order->user->address }}" id="address" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Mã đơn hàng</label>
                            <input class="mdl-textfield__input" type="text" name="id" value="{{ $order->id }}" id="id" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Ngày đặt</label>
                            <input class="mdl-textfield__input" type="text" name="created_at" value="{{ $order->created_at }}" id="created_at" disabled>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                        	<label>Trạng thái</label>
                        	<form action="{{route('manager.order.editstate',[ 'order' => $order])}}" method="get" accept-charset="utf-8" id="updateState">
	                        	<select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="orderState">
	                        		{{-- {{__('order-state.description.'.$orderState)}} --}}
	                        		<option value="1" {{ $order->state == 1 ? 'selected' : '' }}>
	                        			{{__('order-state.description.'.'canceled')}}
	                        		</option>
									<option value="2" {{ $order->state == 2 ? 'selected' : '' }}>
										{{__('order-state.description.'.'new-created')}}
									</option>
									<option value="3" {{ $order->state == 3 ? 'selected' : '' }}>
										{{__('order-state.description.'.'confirmed')}}
									</option>
									<option value="4" {{ $order->state == 4 ? 'selected' : '' }}>
										{{__('order-state.description.'.'packed')}}
									</option>
									<option value="5" {{ $order->state == 5 ? 'selected' : '' }}>
										{{__('order-state.description.'.'ship-assigned')}}
									</option>
									<option value="6" {{ $order->state == 6 ? 'selected' : '' }}>
										{{__('order-state.description.'.'delivered')}}
									</option>
								</select>
								{{-- <input type="submit" name="updateState" id="submitUpdate" hidden="True"> --}}
							</form>
	                            {{-- 
                            <input class="mdl-textfield__input" type="text" name="state" value="{{__('order-state.description.'.$orderState)}}" id="state" disabled> --}}
                        </div>
                        <div class="col-lg-12 p-t-20 text-center">
                        	<button class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" form="updateState" name="updateState" style="color: #ffffff">{{__('btn.update-state-order')}}</button>
                            <a class="mdl-button m-b-10 m-r-20 btn-pink" href="{{route('manager.order.cancel',['order' => $order])}}">{{__('btn.cancel')}}</a>
                            {{-- <input type="submit" name="submit"> --}}
                        </div>
                        </form>

                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                            	<tr>
                            		<th class="center"></th>
                            		<th class="center">{{__('word-and-statement.order.item')}}</th>
									<th class="center">{{__('word-and-statement.order.price')}}</th>
									<th class="center">{{__('word-and-statement.order.quantity')}}</th>
									<th class="center">{{__('word-and-statement.order.multiplication')}}</th>
								</tr>
							</thead>
							<tbody>
								@foreach($order->orderDetails as $orderDetail)
								<tr>
									<td class="center"><img src="{{asset('img/covers/'.$orderDetail->book->cover)}}" style="width: 100%"></td>
									<td class="center">{{$orderDetail->book->title}} </td>
									<td class="center">{{__('word-and-statement.price', ['price' => number_format($orderDetail->book->saleprice, 0, '.', '.')])}}</td>
									<td class="center">{{$orderDetail->quantity}}</td>
									<td class="center">{{__('word-and-statement.price', ['price' => number_format($multiplications[$orderDetail->id], 0, '.', '.')])}}</td>
								</tr>
								@endforeach
								<tr style="background-color: #a1d0cb">
									<td colspan="4" class="center">
										{{__('delivery.'.$deliveryType)}}
									</td>
									<td class="center">
										{{__('word-and-statement.price', ['price' => number_format($deliveryFees, 0, '.', '.')])}}
									</td>
								</tr>
								<tr style="background-color: #ec9e5e">
									<td colspan="3" class="center">
										{{__('word-and-statement.order.total')}}
									</td>
									<td class="center">
										{{$order->orderDetails->sum('quantity')}}
									</td>
									<td class="center">
										{{__('word-and-statement.price', ['price' => number_format($total, 0, '.', '.')])}}
									</td>
								</tr>
							</tbody>

						</table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection