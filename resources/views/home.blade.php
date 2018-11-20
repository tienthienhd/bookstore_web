@extends('layouts.app')

@section('cssFile')
<link href="{{ asset('css/book-element.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide carousel-home" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset("img/banner/Harry-Potter-books-main.png")}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset("img/banner/Harry-Potter-books-main.png")}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset("img/banner/HPcover.jpg")}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container-fluid">
        <div class="col-md-8 offset-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-8 offset-1">
                <div class="row">
                    <div class="tittle">
                        <h5>Danh sách sách</h5>
                    </div>
                    <div class="row book-group">
                        @if(isset($books) && count($books)>0)
                            @foreach($books as $book)
                                <div class="col-4">
                                    <a class="customer-link" href="{{ route('book.show', ['book' => $book]) }}">
                                        <table>
                                            <tr>
                                                <td><img src="{{asset("img/covers/" . $book->cover)}}"></td>
                                                <td>
                                                    <h6>{{$book->title}}</h6>
                                                    <span>{{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-12">
                                <div class="row justify-content-center" style="margin-top: 50px;">
                                    {{$books->links()}}
                                </div>
                            </div>
                        @else
                            {{__('messages.no-book-found')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-2" style="margin-left: 20px;">
                <div class="row">
                    <div class="tittle">
                        <h5>Sách bán chạy</h5>
                    </div>
                    <div class="row book-group">
                        @if(isset($hotBooks) && count($hotBooks)>0)
                            @foreach($hotBooks as $hotBook)
                                <div class="col-12">
                                    <a class="customer-link" href="{{ route('book.show', ['book' => $hotBook->book]) }}">
                                        <table>
                                            <tr>
                                                <td><img src="{{asset("img/covers/" . $hotBook->book->cover)}}"></td>
                                                <td>
                                                    <h6>{{$hotBook->book->title}}</h6>
                                                    <span>{{__('word-and-statement.price', ['price' => number_format($hotBook->book->saleprice, 0, '.', '.')])}}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            {{__('messages.no-book-found')}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
