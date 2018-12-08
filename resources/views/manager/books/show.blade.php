@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Book Detail</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.book.index')}}">Book</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Book Detail</li>
                </ol>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if(isset($book))
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Book Detail: <q> {{ $book->title }} </q></header>
                    </div>

                    <div class="card-body row">
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>ID</label>
                            <input class="mdl-textfield__input" type="text" name="id" value="{{ $book->id }}" id="id" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Title</label>
                            <input class="mdl-textfield__input" type="text" name="title" value="{{ $book->title }}" id="title" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Author</label>
                            <input class="mdl-textfield__input" type="text" name="author" value="{{ $book->author }}" id="author" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Category</label>
                            <input class="mdl-textfield__input" type="text" name="category" value="{{__('book-category.'.$book->category)}}" id="category" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Sale price</label>
                            <input class="mdl-textfield__input" type="text" name="saleprice" value="{{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}" id="saleprice" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Purchase price</label>
                            <input class="mdl-textfield__input" type="text" name="purchase_price" value="{{__('word-and-statement.price', ['price' => number_format($book->purchase_price, 0, '.', '.')])}}" id="purchase_price" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>State</label>
                            <input class="mdl-textfield__input" type="text" name="state" value="{{($book->state < 0) ? '--' : $book->state}}" id="state" disabled>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20"></div>

                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Cover</label><br>
                            <img src="{{ asset("img/covers/" . $book->cover) }}" width="80%">
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
                            <label>Description</label><br>
                            <textarea class="mdl-textfield__input" rows="12" name="description" disabled>{{$book->description}}</textarea>
                        </div>
                        <div class="col-lg-12 p-t-20 text-center"> 
                            <a class="mdl-button m-b-10 m-r-20 btn-pink" href="{{route('manager.book.edit', ['book' => $book])}}" style="color: #ffffff">{{__('btn.edit')}}</a>
                            <form action="{{route('manager.book.update.off-state', ['book' => $book])}}" method="post">
                                @csrf
                                @method('put')
                                @if($book->state < 0)
                                    <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="stopSaleBook" value="{{__('btn.stop-sale')}}" disabled="disabled">
                                    <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="reRtopSaleBook" value="{{__('btn.sale-again')}}">
                                @else
                                    <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="stopSaleBook" value="{{__('btn.stop-sale')}}">
                                @endif
                            </form>
                           </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection