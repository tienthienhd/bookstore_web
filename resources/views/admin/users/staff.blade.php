{{-- <!DOCTYPE html>
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
</html> --}}

@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title"> {{__('btn.permission-manage')}} </div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li class="active"> {{__('btn.permission-manage')}} <li>
                    </li>
                </ol>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>List Account</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="#addAccount" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                        <div class="table-scrollable">
                        	<table class="table table-hover table-checkable order-column full-width" id="example4">
	                            <thead>
	                                <tr>
	                                	<th class="center">Username</th>
										<th class="center">Fullname</th>
										<th class="center">Email</th>
										<th class="center">Phone</th>
										<th class="center">Permisstion</th>
					    				{{-- <th class="center"> <a href="#"> Action </a></th> --}}
	                                </tr>
	                            </thead>
	                            <tbody>
									@foreach($staffs as $staff)
										<tr>
											<td class="center">{{$staff->username}}</td>
											<td class="center">{{$staff->fullname}}</td>
											<td class="center">{{$staff->email}}</td>
											<td class="center">{{$staff->phone}}</td>
											<td class="center">
												<form action="{{route('update-permission', ['user' => $staff])}}" method="post">
													@csrf
													@method('put')
													<ul style="text-align: left; list-style-type: none;">
														<li>
															<input type="checkbox" name="addNewBook" value="Add new book" 
																@foreach($staff->role->rolePermissions as $rolePermission)
																	{{$rolePermission->permission->id == config('permission.add-new-book') ? 'checked' :''}}
																@endforeach
															>Add new book <br>
														</li>
														<li>
															<input type="checkbox" name="addOldBook" value="Add old book" 
																@foreach($staff->role->rolePermissions as $rolePermission)
																	{{$rolePermission->permission->id == config('permission.add-old-book') ? 'checked' :''}} 
																@endforeach
															>Add old book<br>
														</li>
														<li>
															<input type="checkbox" name="orderManage" value="Order manage" 
																@foreach($staff->role->rolePermissions as $rolePermission)
																	{{$rolePermission->permission->id == config('permission.order-manage') ? 'checked' :''}}
																@endforeach
															> Order manage<br>
														</li>
													</ul>
												    </div>
													<input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="updatePermission" value="Update Permission">
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
                        </div>
	                    @else
							{{__('messages.no-account-found')}}
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection