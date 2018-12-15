@extends('layouts.app')

@section('cssFile')
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
@endsection
@section('content')
    <div class="container" style="margin-top: 2em">
        <div class="row">
            <div class="col-md-4">
                <nav class="sidebar">
                    <ul>
                        <li class="active">
                            <a href="{{route('user.profile')}}">Thông tin cá nhân</a>
                        </li>
                        <li>
                            <a href="{{route('order.index')}}">Lịch sử mua hàng</a>
                        </li>
                        <li>
                            <a href="{{route('customer.waitcommentlist')}}">Danh sách chờ đánh giá</a>
                        </li>
                        <li style="border: none">
                            <a href="{{route('customer.comment.index')}}">Danh sách đã đánh giá</a>
                        </li>
                    </ul>

                </nav>

            </div>
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <h4 style="text-transform: uppercase; text-align: center">Thay đổi mật khẩu</h4>
                    <br>
                <form action="{{route('user.password-change')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="old-password"
                               class="col-md-4 text-md-right">{{__('validation.attributes.user.password')}}</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 text-md-right">{{__('validation.attributes.change-password.new-password')}}</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="newPassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 text-md-right">{{__('validation.attributes.change-password.confirm-new-password')}}</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="newPassword_confirmation">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-4 col-md-4">
                            <button class="btn btn-primary" type="submit"
                                    name="updatePassword"> {{ __('btn.update-password') }}</button>
                        </div>

                    </div>

                </form>
            </div>


        </div>
    </div>

@endsection
