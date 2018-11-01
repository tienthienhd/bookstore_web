<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <form action="{{route('welcome')}}" method="get">
                    {{__('validation.attributes.book.title')}} {{__('word-and-statement.or')}} {{__('validation.attributes.book.author')}}:
                    <input type="text" name="searchString" value="{{ old('searchString') ?? $searchString ??''}}"><br>
                    
                    <input type="submit" name="search" value="{{__('btn.search')}}">
                </form>

                <form action="{{route('welcome')}}" method="get">
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
                        {{$book->saleprice}}<br>
                    @endforeach
                    {{$books->links()}}
                @else
                    {{__('messages.no-book-found')}}
                @endif
            </div>
        </div>
    </body>
</html>
