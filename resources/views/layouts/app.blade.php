<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/find-book-select.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('cssFile')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-laravel navbar-customer">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                        <form action="{{route('welcome')}}" method="get">
                    @else
                        <form action="{{route('home')}}" method="get">
                    @endguest
                        <select name='refineCategory' onchange="refineCategoryFunction()" class="refine-category">
                            <option value="">{{__('messages.select-a-category')}}</option>
                            @foreach ( config('book-category') as $category)
                                <option class="dropdown-item" value="{{$category}}" {{ old('refineCategory') == $category || (isset($refineCategory) && $refineCategory == $category) ? 'selected' : ''}}>
                                    {{__('book-category.'.$category)}}
                                </option>
                            @endforeach
                        </select>
                        
                        <input type="submit" name="refine" id="refineBtn" value="{{__('btn.refine')}}" style="display: none">
                    </form>
                </ul>
                @guest
                    <form action="{{route('welcome')}}" method="get">
                @else
                    <form action="{{route('home')}}" method="get">
                @endguest
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" >
                            <input style="width: 18rem" class="search" type="text" placeholder="{{__('validation.attributes.book.title')}} {{__('word-and-statement.or')}} {{__('validation.attributes.book.author')}}"  name="searchString" id="searchString" value="{{ old('searchString') ?? $searchString ??''}}">
                        </li>
                        <li class="nav-item">
                            <button class="material-icons search" type="submit" id="searchBtn">search</button>
                        </li>
                    </ul>
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a>
                            <i class="material-icons">track_changes</i>
                            <span>Theo dõi đơn hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cart.index')}}">
                            <i class="material-icons">shopping_cart</i>
                            <div class="number-noti">{{$countCart}}</div>
                            <span style="left: -10px">Giỏ hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="mini-nav">
        <div class="container">
            <ul>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('order.index')}}" title="">
                                {{__('btn.order-history')}}
                            </a>
                            <a class="dropdown-item" href="{{route('customer.waitcommentlist')}}"
                               title=""> {{__('word-and-statement.wait-comment')}} </a>
                            <a class="dropdown-item" href="{{route('customer.comment.index')}}"
                               title=""> {{__('word-and-statement.list-comment')}} </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>
    <footer>

    </footer>
</div>
<script type="text/javascript" src="{{asset('js/submit-search-on-enter.js')}}"></script>
<script type="text/javascript" src="{{asset('js/submit-refine.js')}}"></script>
@yield('jsFile')
</body>
</html>
