<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	@if(isset($order))
		Trạng thái cũ: <br>
		{{__('order-state.description.'.$orderState)}}<br>
		Chọn trạng thái mới:<br>
		<form action="{{route('manager.order.editstate',[ 'order' => $order])}}" method="get" accept-charset="utf-8">
		<select name="orderState">
		  <option value="1">{{__('order-state.description.'.'canceled')}}</option>
		  <option value="2">{{__('order-state.description.'.'new-created')}}</option>
		  <option value="3">{{__('order-state.description.'.'confirmed')}}</option>
		  <option value="4">{{__('order-state.description.'.'packed')}}</option>
		  <option value="5">{{__('order-state.description.'.'ship-assigned')}}</option>
		  <option value="6">{{__('order-state.description.'.'delivered')}}</option>
		</select>
		<br>
		<input type="submit" name="updateState" value="Cập nhật trạng thái đơn hàng">
		</form>
		

	
	@endif
</body>
</html>