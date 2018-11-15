@extends('layouts.app')

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
    <div class="container">
        <div class="row">
            <div class="tittle">
                <h5>sách bán chạy</h5>
            </div>
            <div class="row book-group">
                <div class="col-4">
                    <table>
                        <tr>
                            <td><img src="{{asset("img/covers_seeder/1541062955_414589256.jpg")}}"></td>
                            <td>
                                <h6>TITTLE</h6>
                                <span>120.000 đ</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <table>
                        <tr>
                            <td><img src="{{asset("img/covers_seeder/1541062955_414589256.jpg")}}"></td>
                            <td>
                                <h6>TITTLE</h6>
                                <span>120.000 đ</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <table>
                        <tr>
                            <td><img src="{{asset("img/covers_seeder/1541062955_414589256.jpg")}}"></td>
                            <td>
                                <h6>TITTLE</h6>
                                <span>120.000 đ</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <table>
                        <tr>
                            <td><img src="{{asset("img/covers_seeder/1541062955_414589256.jpg")}}"></td>
                            <td>
                                <h6>TITTLE</h6>
                                <span>120.000 đ</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <table>
                        <tr>
                            <td><img src="{{asset("img/covers_seeder/1541062955_414589256.jpg")}}"></td>
                            <td>
                                <h6>TITTLE</h6>
                                <span>120.000 đ</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <table>
                        <tr>
                            <td><img src="{{asset("img/covers_seeder/1541062955_414589256.jpg")}}"></td>
                            <td>
                                <h6>TITTLE</h6>
                                <span>120.000 đ</span>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>



            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <a href="{{route('customer.waitcommentlist')}}"
                       title=""> {{__('word-and-statement.wait-comment')}} </a>
                    <a href="{{route('customer.comment.index')}}"
                       title=""> {{__('word-and-statement.list-comment')}} </a>
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
                            {{__('validation.attributes.book.title')}} {{__('word-and-statement.or')}} {{__('validation.attributes.book.author')}}
                            :
                            <input type="text" name="searchString"
                                   value="{{ old('searchString') ?? $searchString ??''}}"><br>

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
