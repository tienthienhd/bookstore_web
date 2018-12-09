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
                            <a href="{{route('user.profile')}}" >Thông tin cá nhân</a>
                        </li>
                        <li >
                            <a href="{{route('order.index')}}">Lịch sử mua hàng</a>
                        </li>
                        <li>
                            <a href="{{route('customer.waitcommentlist')}}">Danh sách chờ đánh giá</a>
                        </li>
                        <li class="active" style="border: none">
                            <a href="{{route('customer.comment.index')}}">Danh sách đã đánh giá</a>
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
                @if(isset($bookcmted))

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('title', __('validation.attributes.book.title'))</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookcmted as $cmt1)

                            <tr>
                                <th>{{$cmt1->id}}</th>
                                <td>{{$cmt1->book->title}}</td>
                                <td>
                                    <a href="{{route('customer.commentdetail',['comment_id' => $cmt1->id])}}">{{__('btn.detail')}}</a>
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
