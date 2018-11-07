@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="{{route('customer.waitcommentlist')}}" title=""> {{__('word-and-statement.wait-comment')}} </a>
                <a href="{{route('customer.comment.index')}}" title=""> {{__('word-and-statement.list-comment')}} </a>
                <a href="{{route('user.profile')}}">{{__('word-and-statement.profile')}}</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @auth
                    <a href="{{route('cart.index')}}">{{__('btn.cart')}}</a>
                    <a href="{{route('order.index')}}">{{__('btn.order-history')}}</a>
                @endauth
                <form action="{{route(\Request::route()->getName())}}" method="get">
                    {{__('validation.attributes.book.title')}} {{__('word-and-statement.or')}} {{__('validation.attributes.book.author')}}:
                    <input type="text" name="searchString" value="{{ old('searchString') ?? $searchString ??''}}"><br>
                    
                    <input type="submit" name="search" value="{{__('btn.search')}}">
                </form>

                <form action="{{route(\Request::route()->getName())}}" method="get">
                    {{__('word-and-statement.refine-by-category')}}:
                    <select name='refineCategory'>
                        <option value="">{{__('messages.select-a-category')}}</option>
                        @foreach ( config('book-category') as $category)
                            <option value="{{$category}}" {{ old('refineCategory') == $category || (isset($refineCategory) && $refineCategory == $category) ? 'selected' : ''}}>
                                {{__('book-category.'.$category)}}
                            </option>
                        @endforeach
                    </select><br>
                    <input type="submit" name="refine" value="{{__('btn.refine')}}">
                </form>
                @if(isset($books))
                    @foreach($books as $book)
                        <a href="{{route('book.show', ['book' => $book])}}">{{$book->title}}</a>
                        {{$book->author}}
                        {{__('book-category.'.$book->category)}}
                        {{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}<br>
                    @endforeach
                    {{$books->links()}}
                @else
                    {{__('messages.no-book-found')}}
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
