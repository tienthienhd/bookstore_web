@extends('layouts.app')

@section('cssFile')
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/waiforcomment.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container" style="margin-top: 2em">
        <div class="row">
            <div class="col-md-4">
                <nav class="sidebar">
                    <ul>
                        <li>
                            <a>Thông tin cá nhân</a>
                        </li>
                        <li>
                            <a>Theo dõi đơn hàng</a>
                        </li>
                        <li>
                            <a>Lịch sử mua hàng</a>
                        </li>
                        <li class="active">
                            <a>Danh sách chờ đánh giá</a>
                        </li>
                        <li style="border: none">
                            <a>Danh sách đã đánh giá</a>
                        </li>
                    </ul>

                </nav>

            </div>
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if(isset($bookwaitcmt))
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('title', __('validation.attributes.book.title'))</th><th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookwaitcmt as $cmt1)

                            <tr>
                                <td>{{$cmt1->id}}</td>
                                <td>{{$cmt1->book->title}}</td>
                                <td>
                                    <a href="{{route('customer.comment.create',['book_id' => $cmt1->book_id, 'user_id'=> $cmt1->order->user_id])}}"
                                       title="">Thêm đánh giá</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
