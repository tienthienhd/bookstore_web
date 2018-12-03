@extends('manager.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as sale manager!

                    <a href="{{route('manager.book.index')}}">{{__('btn.book-manage')}}</a>
                    <a href="#">{{__('btn.order-manage')}}</a>
                    <a href="#">{{__('btn.report-manage')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('cssFile')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">
@endsection



số lượng khách hàng: {{$countCustomer}}
số lượng sách: {{$countBook}}
số lượng thể loại: {{$countCategory}}
sô lượng đơn hàng: {{$countOrder}} 
số lượng sách theo từng thể loại:
    @foreach($countBookByCategory as $cat => $bkcount)
        {{$cat}} : {{ $bkcount}}
    @endforeach
doanh thu theo thời gian (chưa có) 
time line các sự kiện:
    @foreach($ordersStateHistories as $orderStateHistory)
        {{$orderStateHistory->created_at}} : đơn hàng mã {{$orderStateHistory->order_id}} của khách hàng {{$orderStateHistory->order->user->username}} vừa được cập nhật trạng thái {{$orderStateHistory->title}}
    @endforeach
danh sách các đánh giá:
    @foreach($comments as $comment)
        <img src="{{ asset('img/avatars').'/'.$comment->user->avatar }}">
        {{$comment->user->username}}
        {{$comment->title}}
        @for($i=0; $i<round($comment->star); $i++)
        <i class="material-icons checked">grade</i>
        @endfor
        @for($j=5; $j>round($comment->star); $j--)
        <i class="material-icons">grade</i>
        @endfor
    @endforeach

