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
                @if(isset($orderStateHistories) && count($orderStateHistories)>0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        @foreach($orderStateHistories as $orderStateHistory)


                            <tr>
                                <td></td>
                                <td>{{__('order-state.description.'.$orderStateHistory->description)}}</td>
                                <td>{{$orderStateHistory->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>

                @else
                    {{__('messages.no-data')}}
                @endif
            </div>

        </div>

    </div>
@endsection
