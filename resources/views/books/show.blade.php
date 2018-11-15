@extends('layouts.app')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">
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
                    <img src="{{asset("img/covers/" . $book->cover)}}">
                </div>
                <div class="col-md-8">
                    <h4>{{$book->title}}</h4>
                    <div class="star-rated">
                        <i class="material-icons checked">grade</i>
                        <i class="material-icons checked">grade</i>
                        <i class="material-icons checked">grade</i>
                        <i class="material-icons">grade</i>
                        <i class="material-icons">grade</i>
                        <span>(50 đánh giá)</span>
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
                            <th>Nhà xuất bản:</th>
                            <td>dsfsdf</td>
                        </tr>
                        <tr>
                            <th>Kích thước:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Loại bìa:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Số trang:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>SKU:</th>
                            <td></td>
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
                <div class="row review-item">
                    <div class="col-md-2">
                        <img src="https://cdn3.iconfinder.com/data/icons/emoticons-23/64/_Ninja-512.png">
                    </div>
                    <div class="col-md-7">
                        <h6>Sasuke</h6>
                        <p>Japan</p>
                    </div>
                    <div class="col-md-3">
                        <i class="material-icons checked">grade</i>
                        <i class="material-icons checked">grade</i>
                        <i class="material-icons checked">grade</i>
                        <i class="material-icons">grade</i>
                        <i class="material-icons">grade</i>
                    </div>
                    <p style="margin: 1em 3em 1em 3em">blaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasssssssaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <h5 style="margin: 1em 0 1em 0">VIẾT NHẬN XÉT</h5>
            <div class="row write-review">
                <form>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Đánh giá của bạn</label>
                        <div class="col-sm-10">
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nhận xét</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control"> </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-2">
                            <button type="submit" class="btn btn-outline-info">Nhận xét</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
