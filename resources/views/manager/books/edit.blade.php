@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Book</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home') }}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.book.index') }}">Book</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Book</li>
                </ol>
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
        <form action="{{route('manager.book.update', ['book' => $book])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Book Detail: <q> {{ $book->title }} </q></header>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.title')}}</label>
                                <input class="mdl-textfield__input" type="text" name="title" value="{{ $book->title }}" id="title">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.author')}}</label>
                                <input class="mdl-textfield__input" type="text" name="author" value="{{ $book->author }}" id="author">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.category')}}</label>
                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="category">
                                    <option value="">{{__('messages.select-a-category')}}</option>
                                    @foreach ( config('book-category') as $category)
                                        <option value="{{$category}}"  {{ $book->category == $category ? 'selected' : '' }}>
                                            {{__('book-category.'.$category)}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.saleprice')}}</label>
                                <input class="mdl-textfield__input" type="number" name="saleprice" value="{{ $book->saleprice }}" id="saleprice">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.purchasePrice')}}</label>
                                <input class="mdl-textfield__input" type="number" name="purchasePrice" value="{{ $book->purchase_price }}" id="purchase_price">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>State</label>
                                <input class="mdl-textfield__input" type="text" name="state" value="{{($book->state < 0) ? '--' : $book->state}}" id="state" disabled>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.cover')}}</label><br>
                                <div id="imgCover" style="background-image: url('{{asset('/img/covers/'.$book->cover)}}'); width: 100%" class="img-thumbnail custom_cover" alt="Cover">
                                    <div  class="custom_cover_imgae_space" ></div>
                                    <div class=" row justify-content-center custom_link_upload_cover" >
                                        <a style="color: white" href="#" onclick="$('#cover').click();">{{__('btn.upload-cover')}}</a></div>
                                    <input id="cover" type="file" style="display: none" class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" name="cover" accept="image/*" >

                                    @if ($errors->has('cover'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cover') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                                <label>{{__('validation.attributes.book.description')}}</label><br>
                                <textarea class="mdl-textfield__input" rows="12" name="description">{{$book->description}}</textarea>
                            </div>
                            
                            <div class="col-lg-12 p-t-20 text-center">
                                <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="editBook" value="{{__('btn.edit')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
</div>
<script src="{{asset('js/preview_img.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
@endsection