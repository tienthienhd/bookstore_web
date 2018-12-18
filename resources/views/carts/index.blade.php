@extends('layouts.app')
<link href="{{ asset('css/customer-cart.css') }}" rel="stylesheet">
@section('content')
    <div class="container customer-cart">
        <div class="row">
            <div class="col-md-8 list-item">
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
                    <h4>Giỏ hàng của bạn</h4>
                    <hr>
                    @foreach($carts as $cart)
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="{{asset('storage/img/covers/'.$cart->book->cover)}}">
                                </div>
                                <div class="col-sm-9">
                                    <span>{{__('validation.attributes.cart.tittle')}}:{{$cart->book->title}}</span><br>
                                    <span class="price">{{__('word-and-statement.price', ['price' => number_format($cart->book->saleprice, 0, '.', '.')])}}</span><br><br>
                                    <div class="row" style="float: right; margin-right: 25px;">
                                        <form id='updateQuantity{{$cart->id}}'
                                            action="{{route('cart.update-quantity', ['cart' => $cart])}}"
                                            method='post'>
                                            @csrf
                                            @method('put')
                                            <input type="button" name="minusOne" value="-" onclick="myMinusFunction({{$cart->id}})">
                                            <input type="number" style="max-width: 40px" name="quantity" id='quantity{{$cart->id}}' value="{{$cart->quantity}}"
                                               onfocusout="myFunction({{$cart->id}})">
                                            <input type="button" name="addOne" value="+" onclick="myAddFunction({{$cart->id}})">
                                        </form>
                                    
                                        <form action="{{route('cart.destroy', ['cart' => $cart])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" style="margin-left: 5px" class="material-icons" name="delete" value="delete">
                                        </form>  
                                    </div>
                                </div>
                            </div>

                            <script>
                                function myFunction(i) {
                                    document.getElementById("updateQuantity" + i).submit();
                                }

                                function myMinusFunction(i) {
                                    var x = document.getElementById("quantity" + i).value;
                                    if (x > 1) {
                                        document.getElementById("quantity" + i).value = parseInt(x) - 1;
                                        document.getElementById("updateQuantity" + i).submit();
                                    }
                                }

                                function myAddFunction(i) {
                                    var x = document.getElementById("quantity" + i).value;
                                    document.getElementById("quantity" + i).value = parseInt(x) + 1;
                                    document.getElementById("updateQuantity" + i).submit();
                                }
                            </script>
                            <hr>
                        </div>

                    @endforeach
            </div>
            <div class="col-md-4 order">
                <h5>{{__('word-and-statement.provisional-order')}}</h5>
                <hr>
                <form action="{{route('order.add')}}" method="post" id="orderForm">
                    @csrf
                    <input type="hidden" name="total" id='postTotal'>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{__('word-and-statement.order.item')}}</th>
                            <th>{{__('word-and-statement.order.quantity')}}</th>
                            <th>{{__('word-and-statement.order.multiplication')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{$cart->book->title}}</td>
                                <td>{{$cart->quantity}}</td>
                                <td>{{__('word-and-statement.price', ['price' => number_format($multiplications[$cart->id], 0, '.', '.')])}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                <select name="delivery" id="delivery" onchange="reTotal({{array_sum($multiplications)}});" style="width: 9em">
                                    <option value="">Giao hàng</option>
                                    @foreach(config('delivery.types') as $delivery => $value)
                                        <option value="{{$value}}" {{ old('delivery') == $value ? 'selected' : '' }}>
                                            {{__('delivery.'.$delivery)}}
                                            - {{__('word-and-statement.price', ['price' => number_format(config('delivery.fees.'.$delivery), 0, '.', '.')])}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td id="deliveryFees">
                                --
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                {{__('word-and-statement.order.total')}}
                            </td>
                            <td id="total">
                                {{__('word-and-statement.price', ['price' => number_format(array_sum($multiplications), 0, '.', '.')])}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <script>
                        function reTotal(total) {
                            var x = total;
                            var y = document.getElementById('delivery');
                            var z = y.options[y.selectedIndex].innerHTML;
                            z = z.match(/\d/g);
                            if (z === null) {
                                document.getElementById('deliveryFees').innerHTML = "--";
                                z = 0;
                            } else {
                                z = z.join("");
                                u = z.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                v = document.getElementById('total').innerHTML.split("");
                                if (v.indexOf('đ') != -1) {
                                    document.getElementById('deliveryFees').innerHTML = u + ' đ';
                                } else {
                                    document.getElementById('deliveryFees').innerHTML = 'VND ' + u;
                                }
                            }
                            var t = parseInt(x) + parseInt(z);
                            t = t.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            x = document.getElementById('total').innerHTML.split("");
                            if (x.indexOf('đ') != -1) {
                                document.getElementById('total').innerHTML = t + ' đ';
                            } else {
                                document.getElementById('total').innerHTML = 'VND ' + t;
                            }

                        }
                    </script>
                    <br>
                    <input class="btn btn-danger submit-order" type="button" name="addOrder" value="{{__('btn.add-order')}}" onclick="mySubmitFunction()">
                </form>
                <script>
                    function mySubmitFunction() {
                        var x = document.getElementById('total').innerHTML;
                        x = x.match(/\d/g);
                        x = x.join("");
                        document.getElementById('postTotal').value = parseInt(x);
                        console.log(x);
                        document.getElementById('orderForm').submit();
                    }
                </script>
                @else
                    {{__('messages.blank-cart')}}
                @endif
            </div>
        </div>


    </div>

@endsection
