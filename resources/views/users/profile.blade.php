<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
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
    <a href="{{route('user.show.password-change')}}">{{__('btn.change-password')}}</a>
    <form method="POST" action="{{ route('user.update-profile') }}" enctype="multipart/form-data">
    @csrf

	    <div class="form-group row">
	        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.username') }}</label>

	        <div class="col-md-6">
	            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') ?? $user->username}}" required autofocus>

	            @if ($errors->has('username'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('username') }}</strong>
	                </span>
	            @endif
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.fullname') }}</label>

	        <div class="col-md-6">
	            <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') ?? $user->fullname}}" required>

	            @if ($errors->has('fullname'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('fullname') }}</strong>
	                </span>
	            @endif
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.email') }}</label>

	        <div class="col-md-6">
	            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ?? $user->email}}" required>

	            @if ($errors->has('email'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	        </div>
	    </div>
	    
	    <div class="form-group row">
	        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.phone') }}</label>

	        <div class="col-md-6">
	            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') ?? $user->phone}}" required>

	            @if ($errors->has('phone'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('phone') }}</strong>
	                </span>
	            @endif
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('validation.attributes.user.address') }}</label>

	        <div class="col-md-6">
	            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') ?? $user->address}}" required>

	            @if ($errors->has('address'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('address') }}</strong>
	                </span>
	            @endif
	        </div>
	    </div>
		{{__('validation.attributes.user.avatar')}}:
		<div id="imgCover" style="background-image: url('{{asset('/img/avatars/'.$user->avatar)}}');" class="img-thumbnail custom_cover" alt="Avatar">
            <div  class="custom_cover_imgae_space" ></div>
            <div class=" row justify-content-center custom_link_upload_cover" >
                <a style="color: white" href="#" onclick="$('#avatar').click();">{{__('btn.upload-avatar')}}</a></div>
            <input id="avatar" type="file" style="display: none" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" accept="image/*" >

            @if ($errors->has('avatar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
            @endif
            
        </div>   

	    <div class="form-group row mb-0">
	        <div class="col-md-6 offset-md-4">
	            <button type="submit" class="btn btn-primary">
	                {{ __('btn.update-profile') }}
	            </button>
	        </div>
	    </div>
	</form>
		
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/preview_img.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">
</body>
</html>