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
    @if(isset($book))
        <div class="container">
            <div class="row book-info">
                <div class="col-md-4">
                    <img src="{{asset("storage/img/covers/" . $book->cover)}}">
                </div>
                <div class="col-md-8">
                    <h4>{{$book->title}}</h4>
                    <div class="star-rated">
                        @for($i=0; $i<round($star); $i++)
                        <i class="material-icons checked">grade</i>
                        @endfor
                        @for($j=5; $j>round($star); $j--)
                        <i class="material-icons">grade</i>
                        @endfor
                        <span>({{$star/1}}/5 - {{$countComment}} đánh giá)</span>
                    </div>
                    <div class="price">
                        {{__('word-and-statement.price', ['price' => number_format($book->saleprice, 0, '.', '.')])}}
                    </div>
                    <table>
                        <tr>
                            <th>Tác giả:</th>
                            <td>{{$book->author}}</td>
                        </tr>
                        <tr>
                            <th>Thể loại:</th>
                            <td>{{__('book-category.'.$book->category)}}</td>
                        </tr>
                    </table>
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="bookId" value="{{$book->id}}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="add-to-cart"><i class="material-icons">shopping_cart</i><span>Thêm vào giỏ</span>
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <h5>GIỚI THIỆU SÁCH</h5>
            <div class="row book-description">
                {{$book->description}}
            </div>
            <br>
            <h5>ĐÁNH GIÁ</h5>
            <div class="row review">
                    @if(isset($comments) && count($comments)>0)
                        @foreach($comments as $comment)
                        <div class="row review-item">
                            <div class="col-md-2">
                                <img src="{{asset("storage/img/avatars/" . $comment->user->avatar)}}">
                            </div>
                            <div class="col-md-7">
                                <h6>{{$comment->user->username}}</h6>
                                <p>{{$comment->created_at}}</p>
                            </div>
                            <div class="col-md-3">
                                @for($i=0; $i<round($comment->star); $i++)
                                <i class="material-icons checked">grade</i>
                                @endfor
                                @for($j=5; $j>round($comment->star); $j--)
                                <i class="material-icons">grade</i>
                                @endfor
                            </div>
                            <p style="margin: 1em 3em 1em 3em"><b>{{$comment->title}}</b></p>
                            <p style="margin: 1em 3em 1em 3em">{{$comment->description}}</p>
                        </div>
                        @endforeach
                    @else
                        {{__('Không có đánh giá nào')}}
                    @endif
            </div>
        </div>
    @endif
@endsection
