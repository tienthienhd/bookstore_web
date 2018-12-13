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
                <div class="row write-review">
                    <form style="width: 100%" action="{{route('customer.comment.update',['comment' => $comment])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Đánh giá của bạn</label>
                            <div class="col-sm-9">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="star" value="5" {{$comment->star == 5? 'checked':''}}/><label for="star5" title="Rocks!">5 stars</label>
                                    <input type="radio" id="star4" name="star" value="4" {{$comment->star == 4? 'checked':''}}/><label for="star4" title="Pretty good">4 stars</label>
                                    <input type="radio" id="star3" name="star" value="3" {{$comment->star == 3? 'checked':''}}/><label for="star3" title="Meh">3 stars</label>
                                    <input type="radio" id="star2" name="star" value="2" {{$comment->star == 2? 'checked':''}}/><label for="star2" title="Kinda bad">2 stars</label>
                                    <input type="radio" id="star1" name="star" value="1" {{$comment->star == 1? 'checked':''}}/><label for="star1" title="Sucks big time">1 star</label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">{{__('validation.attributes.comment.title')}}</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="title" value="{{$comment->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">{{__('validation.attributes.comment.description')}}</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="description">{{$comment->description}}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="book_id" value="{{$comment->id}}">
                        <div class="form-group row">
                            <div class="col-sm-9 offset-3">
                                <button type="submit" class="btn btn-outline-info">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



        <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
            <script src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('js/select2.min.js')}}"></script>
            <script type="text/javascript">
                $(function () {
                    $('#bookId').select2();
                });
            </script>
        </div>
    </div>

@endsection
