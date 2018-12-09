@extends('layouts.app')

@section('cssFile')
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/waitforcomment.css') }}" rel="stylesheet">
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
                @if(isset($comment))
                    @foreach($comment as $cmt1)
                        <h5>{{$cmt1->book->title}}</h5>
                        <p>{{$cmt1->user->username}}</p>
                            <div class="star-rated">
                                @for($i=0; $i<round($cmt1->star); $i++)
                                    <i class="material-icons checked">grade</i>
                                @endfor
                                @for($j=5; $j>round($cmt1->star); $j--)
                                    <i class="material-icons">grade</i>
                                @endfor
                            </div>
                        <p>{{$cmt1->title}}</p>
                        <p>{{$cmt1->description}}</p>
                        <p>{{$cmt1->created_at}}</p>
                    @endforeach
                    <a class="btn btn-outline-warning" href="{{route('customer.comment.edit',['comment' => $cmt1])}}"
                                             title="">{{__('btn.edit')}}</a>
                    <a  class="btn btn-danger" href="{{route('customer.comment.delete',['comment_id' => $cmt1->id])}}"
                                             title="">{{__('btn.delete')}}</a>
                @endif
            </div>


        </div>
    </div>

@endsection
