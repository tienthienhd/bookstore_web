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
	@if(isset($staffs) && count($staffs)>0)
		<table>
			<thead>
				<tr>
					<th>Username</th>
					<th>Fullname</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Permission</th>
				</tr>
			</thead>
			<tbody>
				@foreach($staffs as $staff)
					<tr>
						<td>{{$staff->username}}</td>
						<td>{{$staff->fullname}}</td>
						<td>{{$staff->email}}</td>
						<td>{{$staff->phone}}</td>
						<td>
							<form action="{{route('update-permission', ['user' => $staff])}}" method="post">
								@csrf
								@method('put')
								<input type="checkbox" name="addNewBook" value="Add new book" 
									@foreach($staff->role->rolePermissions as $rolePermission)
										{{$rolePermission->permission->id == config('permission.add-new-book') ? 'checked' :''}}
									@endforeach
								>Add new book <br>
								<input type="checkbox" name="addOldBook" value="Add old book" 
									@foreach($staff->role->rolePermissions as $rolePermission)
										{{$rolePermission->permission->id == config('permission.add-old-book') ? 'checked' :''}} 
									@endforeach
								>Add old book<br>
								<input type="checkbox" name="orderManage" value="Order manage" 
									@foreach($staff->role->rolePermissions as $rolePermission)
										{{$rolePermission->permission->id == config('permission.order-manage') ? 'checked' :''}}
									@endforeach
								> Order manage<br>
								<input type="submit" name="updatePermission" value="Update Permission">
							</form>
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