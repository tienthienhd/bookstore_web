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
	<form action="{{route('user.password-change')}}" method="post">
		@csrf
		{{__('validation.attributes.user.password')}}<input type="password" name="password">
		{{__('validation.attributes.change-password.new-password')}}<input type="password" name="newPassword">
		{{__('validation.attributes.change-password.confirm-new-password')}}<input type="password" name="newPassword_confirmation">
		<input type="submit" name="updatePassword" value="{{ __('btn.update-password') }}">
	</form>
</body>
</html>