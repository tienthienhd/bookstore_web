<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	 <form action="{{route('manager.order.list')}}" method="get">
		<input type="text" name="searchId" value=""><br><br>
		<input type="text" name="searchName" value=""><br><br>
		<input type="text" name="searchPhone" value=""><br><br>
		<input type="submit" name="search" value="{{__('btn.search')}}">
	</form><br><br>
	@if(isset($orders) && count($orders)>0)
			
		@foreach($orders as $order)
			<div style="background-color: #eee">
				Mã đơn hàng {{$order->id}}<br>
				Tên khách hàng {{$order->user->fullname}}<br>
				Ngày đặt {{$order->created_at}}<br>
				Bao gồm:
				@foreach($order->orderDetails as $orderDetail)
					{{$orderDetail->book->title}}
					<img src="{{asset('img/covers/'.$orderDetail->book->cover)}}" style="width: 5%">
				@endforeach
				<a href="{{route('manager.order.detail',['order' => $order])}}">{{__('btn.detail')}}</a>
			</div><br>
		@endforeach
		
	@else
		{{__('messages.no-order-found')}}
	@endif
</body>
</html>