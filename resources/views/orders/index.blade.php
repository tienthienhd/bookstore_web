<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if(isset($orders) && count($orders)>0)
		@foreach($orders as $order)
			<div style="background-color: #eee">
				{{$order->id}}<br>
				{{$order->created_at}}<br>
				@foreach($order->orderDetails as $orderDetail)
					{{$orderDetail->book->title}}
					<img src="{{asset('img/covers/'.$orderDetail->book->cover)}}" style="width: 5%">
					<a href="{{route('order.show',['order' => $order])}}">{{__('btn.detail')}}</a>
				@endforeach
			</div><br>
		@endforeach
		{{$orders->links()}}
	@else
		{{__('messages.no-order-found')}}
	@endif
</body>
</html>