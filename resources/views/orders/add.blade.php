<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	    @if (isset($errorMessage))
	        <div class="alert alert-danger">
	            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            <ul>
	                <li>{{ $errorMessage }}</li>
	            </ul>
	        </div>
	    @endif
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
	    @if(isset($carts) && count($carts)>0)
	    	@foreach($carts as $cart)
		    	<form id='updateQuantity{{$cart->id}}' action="{{route('cart.update-quantity', ['cart' => $cart])}}" method='post'>
		    		@csrf
		    		@method('put')
		    		<img src="{{asset('img/covers/'.$cart->book->cover)}}" style="width: 10%">
		    		{{__('validation.attributes.cart.tittle')}}:{{$cart->book->title}}
		    		{{__('validation.attributes.cart.price')}}:{{__('word-and-statement.price', ['price' => number_format($cart->book->saleprice, 0, '.', '.')])}}
		    		{{__('validation.attributes.cart.quantity')}}:
		    		<input type="number" name="quantity" id='quantity{{$cart->id}}' value="{{$cart->quantity}}" onfocusout="myFunction({{$cart->id}})">
		    		<input type="button" name="minusOne" value="-" onclick="myMinusFunction({{$cart->id}})">
		    		<input type="button" name="addOne" value="+" onclick="myAddFunction({{$cart->id}})">
		    	</form>
		    	<script>
					function myFunction(i) {
					    document.getElementById("updateQuantity"+i).submit();
					}
					function myMinusFunction(i){
						var x = document.getElementById("quantity"+i).value;
						if (x>1){
							document.getElementById("quantity"+i).value = parseInt(x) - 1;
							document.getElementById("updateQuantity"+i).submit();
						}
					}
					function myAddFunction(i){
						var x = document.getElementById("quantity"+i).value;
						document.getElementById("quantity"+i).value = parseInt(x) + 1;
						document.getElementById("updateQuantity"+i).submit();
					}
				</script>
		    	<form action="{{route('cart.destroy', ['cart' => $cart])}}" method="post">
		    		@csrf
		    		@method('delete')
		    		<input type="submit" name="delete" value="{{__('btn.delete')}}">
		    	</form>
	    	@endforeach
	    	{{__('word-and-statement.provisional-order')}}
	    	<form action="{{route('order.add')}}" method="post">
	    		@csrf
	    		<input type="hidden" name="total">
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
		    			@foreach($carts as $cart)
		    			<tr>
		    				<td>{{$cart->book->title}}</td>
		    				<td>{{__('word-and-statement.price', ['price' => number_format($cart->book->saleprice, 0, '.', '.')])}}</td>
		    				<td>{{$cart->quantity}}</td>
		    				<td>{{__('word-and-statement.price', ['price' => number_format(($cart->quantity*$cart->book->saleprice), 0, '.', '.')])}}</td>
		    			</tr>
		    			@endforeach
		    			<tr>
		    				<td colspan="3">
		    					<select name="delivery" id="delivery">
		    						<option value="">{{__('messages.select-a-delivery')}}</option>
					    			@foreach(config('delivery') as $delivery => $fees)
					    				<option value="{{$delivery}}"  {{ old('delivery') == $delivery ? 'selected' : '' }}>
											{{__('delivery.'.$delivery)}} - {{__('word-and-statement.price', ['price' => number_format($fees, 0, '.', '.')])}}
										</option>
							    	@endforeach
					    		</select>
		    				</td>
		    				<td id="deliveryFees">
		    					--
		    				</td>
		    			</tr>
		    			<tr>
		    				<td colspan="3">
		    					{{__('word-and-statement.order.total')}}
		    				</td>
		    				<td id="total">
		    					
		    				</td>
		    			</tr>
		    		</tbody>
		    	</table>
	    	<input type="button" name="addOrder" value="{{__('btn.add-order')}}">
	    	</form>
	    @else
	    	{{__('messages.blank-cart')}}
	    @endif	
</body>
</html>