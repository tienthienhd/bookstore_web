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

                <form method="POST" action="{{ route('user.update-profile') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="username"
                               class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                   name="username" value="{{ old('username') ?? $user->username}}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('username') }}</strong>
	                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fullname"
                               class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.fullname') }}</label>

                        <div class="col-md-6">
                            <input id="fullname" type="text"
                                   class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}"
                                   name="fullname" value="{{ old('fullname') ?? $user->fullname}}" required>

                            @if ($errors->has('fullname'))
                                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('fullname') }}</strong>
	                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') ?? $user->email}}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone"
                               class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                   value="{{ old('phone') ?? $user->phone}}" required>

                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('phone') }}</strong>
	                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address"
                               class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                   value="{{ old('address') ?? $user->address}}" required>

                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('address') }}</strong>
	                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avatar"
                               class="col-md-4 col-form-label text-md-right">{{__('validation.attributes.user.avatar')}}
                            :</label>

                        <div id="imgCover" style="background-image: url('{{asset('/img/avatars/'.$user->avatar)}}');"
                             class="img-thumbnail custom_cover col-md-8" alt="Avatar">
                            <div class="custom_cover_imgae_space"></div>
                            <div class=" row justify-content-center custom_link_upload_cover">
                                <a style="color: white" href="#"
                                   onclick="$('#avatar').click();">{{__('btn.upload-avatar')}}</a></div>
                            <input id="avatar" type="file" style="display: none"
                                   class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar"
                                   accept="image/*">

                            @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>


                    </div>

                    <div class="form-group row">
                        <label class="col-md-4"></label>
                        <div class="col-md-8 ">
                            <a href="{{route('user.show.password-change')}}">{{__('btn.change-password')}}</a> <br><br>
                            <button type="submit" class="btn btn-primary">
                                {{ __('btn.update-profile') }}
                            </button>
                        </div>
                    </div>
                </form>

                <script src="{{asset('js/jquery.min.js')}}"></script>
                <script src="{{asset('js/preview_img.js')}}"></script>

            </div>


        </div>
    </div>

@endsection
