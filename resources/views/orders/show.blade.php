<!DOCTYPE html>
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
	<a href="{{route('order.state-history', ['order' => $order])}}"> {{__('btn.order-state-history')}}</a>
	@if($order->state > config('order-state.canceled') && $order->state < config('order-state.ship-assigned'))
		<a href="{{route('order.cancel', ['order' => $order])}}"><button>{{__('btn.cancel')}}</button></a>
	@else
		<a href="{{route('order.cancel', ['order' => $order])}}"><button disabled="disabled">{{__('btn.cancel')}}</button></a>
	@endif
	Bao gồm:<br>
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
</html>