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
                        <li class="active">
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
                @if(isset($orders) && count($orders)>0)
                    @foreach($orders as $order)
                        <div class="order">
                            <a href="{{route('order.show',['order' => $order])}}">{{__('btn.detail')}}</a>
                            <span>Mã đơn hàng: {{$order->id}}</span><br>
                            <span>Ngày đặt: {{$order->created_at}}</span><br>
                            <span>Bao gồm: </span><br><br>
                            @foreach($order->orderDetails as $orderDetail)
                                <div>
                                    <img src="{{asset('storage/img/covers/'.$orderDetail->book->cover)}}">
                                    <span>{{$orderDetail->book->title}}</span>
                                </div>
                            @endforeach

                        </div>

                        <hr>
                    @endforeach
                    {{$orders->links()}}
                @else
                    {{__('messages.no-order-found')}}
                @endif
            </div>
        </div>

    </div>

@endsection
