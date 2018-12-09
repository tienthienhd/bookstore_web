@extends('layouts.app')

@section('cssFile')
    <link href="{{ asset('css/order.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav class="sidebar">
                    <ul>
                        <li>
                            <a href="{{route('user.profile')}}" >Thông tin cá nhân</a>
                        </li>
                        <li class="active" >
                            <a href="{{route('order.index')}}">Lịch sử mua hàng</a>
                        </li>
                        <li>
                            <a href="{{route('customer.waitcommentlist')}}">Danh sách chờ đánh giá</a>
                        </li>
                        <li style="border: none">
                            <a href="{{route('customer.comment.index')}}">Danh sách đã đánh giá</a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="col-md-8">
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
                    <table>
                        <tr>
                            <td> Tên:</td>
                            <td>{{$order->user->fullname}}</td>
                        </tr>
                        <tr>
                            <td> SĐT:</td>
                            <td>{{$order->user->phone}}</td>
                        </tr>
                        <tr>
                            <td> Địa chỉ:</td>
                            <td>{{$order->user->address}}</td>
                        </tr>
                        <tr>
                            <td> Mã đơn hàng:</td>
                            <td> {{$order->id}}</td>
                        </tr>
                        <tr>
                            <td> Ngày đặt:</td>
                            <td> {{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <td> Trạng thái:</td>
                            <td> {{__('order-state.description.'.$orderState)}}</td>
                        </tr>
                    </table>

                <a href="{{route('order.state-history', ['order' => $order])}}"> {{__('btn.order-state-history')}}</a>
                @if($order->state > config('order-state.canceled') && $order->state < config('order-state.ship-assigned'))
                    <br>
                    <a href="{{route('order.cancel', ['order' => $order])}}">
                        <button class="btn btn-danger " style="display: block; float: right">{{__('btn.cancel')}}</button>
                    </a>
                @else
                    <br>
                    <a href="{{route('order.cancel', ['order' => $order])}}">
                        <button class="btn btn-danger " style="display: block; float: right" disabled="disabled">{{__('btn.cancel')}}</button>
                    </a>
                @endif
                    <br>
                Bao gồm:<br>
                <table class="table table-hover" style="width: 100%">
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
                            <td>{{$orderDetail->book->title}}</td>
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
            </div>
        </div>

    </div>

@endsection
