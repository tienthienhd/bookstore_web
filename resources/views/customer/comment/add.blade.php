@extends('layouts.app')

@section('cssFile')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
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
	<div class="container">
        <h5 style="padding: 1em 0 1em 0">VIẾT NHẬN XÉT</h5>
        <div class="row write-review">
            <form action="{{route('customer.comment.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Đánh giá của bạn</label>
                    <div class="col-sm-10">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="star" value="5" {{old('star') == 5? 'checked':''}}/><label for="star5" title="Rocks!">5 stars</label>
                            <input type="radio" id="star4" name="star" value="4" {{old('star') == 4? 'checked':''}}/><label for="star4" title="Pretty good">4 stars</label>
                            <input type="radio" id="star3" name="star" value="3" {{old('star') == 3? 'checked':''}}/><label for="star3" title="Meh">3 stars</label>
                            <input type="radio" id="star2" name="star" value="2" {{old('star') == 2? 'checked':''}}/><label for="star2" title="Kinda bad">2 stars</label>
                            <input type="radio" id="star1" name="star" value="1" {{old('star') == 1? 'checked':''}}/><label for="star1" title="Sucks big time">1 star</label>
                        </fieldset>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">{{__('validation.attributes.comment.title')}}</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="title" value="{{old('title')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">{{__('validation.attributes.comment.description')}}</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="description">{{old('description')}}</textarea>
                    </div>
                </div>
                <input type="hidden" name="book_id" value="{{$book_id}}"><br>

                <div class="form-group row">
                    <div class="col-sm-10 offset-2">
                        <button type="submit" class="btn btn-outline-info">{{__('btn.add-comment')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
