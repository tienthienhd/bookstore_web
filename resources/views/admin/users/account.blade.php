<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{route('admin.user.account.add')}}" method="post">
		@csrf
		Username:<input type="text" name="username">
		Fullname:<input type="text" name="fullname">
		Email:<input type="email" name="email">
		Phone:<input type="text" name="phone">
		Address:<input type="text" name="address">
		Password:<input type="password" name="password">
		Password-confirmation:<input type="password" name="password_confirmation">
		<input type="submit" name="addAccount" value="Add Staff Account">
		
	</form>
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
	@if(isset($accounts) && count($accounts)>0)
		<table>
			<thead>
				<tr>
					<th>Username</th>
					<th>Fullname</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Role</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($accounts as $account)
					<tr>
						<td>{{$account->username}}</td>
						<td>{{$account->fullname}}</td>
						<td>{{$account->email}}</td>
						<td>{{$account->phone}}</td>
						<td>{{$account->role->title}}</td>
						<td>
							@if($account->role_id != config('auth.roles.locked'))
								<a href="{{route('admin.user.account.lock', ['user' => $account])}}"><button>Lock user</button></a>
							@else
								<a href="{{route('admin.user.account.unlock-customer', ['user' => $account])}}"><button>Unlock user as customer</button></a>
								<a href="{{route('admin.user.account.unlock-manager', ['user' => $account])}}"><button>Unlock user as sale manager</button></a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		{{__('messages.no-account-found')}}
	@endif
</body>
</html>