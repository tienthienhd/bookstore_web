<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	Tên: {{$order->user->fullname}}<br>
	SĐT: {{$order->user->phone}}<br>
	Địa chỉ: {{$order->user->address}}<br>
	Mã đơn hàng:{{$order->id}}<br>
	Ngày đặt:{{$order->created_at}}<br>
	Trạng thái: {{__('order-state.descripton.'.$orderState)}}<br>
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