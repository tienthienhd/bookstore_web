{{-- <!DOCTYPE html>
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
</html> --}}

@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{__('btn.account-manage')}}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('admin.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li class="active">{{__('btn.account-manage')}} <li>
                    </li>
                </ol>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Danh sách tài khoản</header>
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
						@if(isset($accounts) && count($accounts)>0)
	                        <div class="table-scrollable">
	                        	<table class="table table-hover table-checkable order-column full-width" id="example4">
		                            <thead>
		                                <tr>
		                                	<th class="center">Tên tài khoản</th>
											<th class="center">Họ tên</th>
											<th class="center">Email</th>
											<th class="center">Số điện thoại</th>
											<th class="center">Vai trò</th>
						    				<th class="center"> Hành động</th>
		                                </tr>
		                            </thead>
		                            <tbody>
										@foreach($accounts as $account)
											<tr>
												<td class="center">{{$account->username}}</td>
												<td class="center">{{$account->fullname}}</td>
												<td class="center">{{$account->email}}</td>
												<td class="center">{{$account->phone}}</td>
												<td class="center">{{$account->role->title}}</td>
												<td class="center">
													@if($account->role_id != config('auth.roles.locked'))
														<a class="tooltips btn btn-tbl-delete btn-xs" href="{{route('admin.user.account.lock', ['user' => $account])}}" data-original-title="Lock User"><i class="fa fa-lock"></i></a>
													@else
														<a class="tooltips btn btn-tbl-delete btn-xs" href="{{route('admin.user.account.unlock-customer', ['user' => $account])}}" data-original-title="Unlock user as customer"><i class="fa fa-unlock"></i></a>
														<a class="tooltips btn btn-tbl-edit btn-xs" href="{{route('admin.user.account.unlock-manager', ['user' => $account])}}" data-original-title="Unlock user as sale manager"><i class="fa fa-unlock"></i></a>
													@endif
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

                <div class="card card-box" id="addAccount">
                	 <div class="card-head">
                        <header>Add Account</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body">
                    	<form class="row" action="{{route('admin.user.account.add')}}" method="post">
							@csrf
							
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Tên tài khoản</label>
								<input class="mdl-textfield__input" type="text" name="username">
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Họ tên</label>
								<input class="mdl-textfield__input" type="text" name="fullname">
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Email</label>
								<input class="mdl-textfield__input" type="email" name="email" id="txtemail">
								{{-- <span class = "mdl-textfield__error">Enter Valid Email Address!</span> --}}
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Số điện thoại</label>
								<input class="mdl-textfield__input" type="text" name="phone">
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Địa chỉ</label>
								<input class="mdl-textfield__input" type="text" name="address">
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Mật khẩu</label>
								<input class="mdl-textfield__input" type="password" name="password">
							</div>
							<div class="col-md-6 col-sm-6 col-lg-6 p-t-20">
								<label>Xác nhận mật khẩu</label>
								<input class="mdl-textfield__input" type="password" name="password_confirmation">
							</div>

							<div class="col-lg-12 p-t-20 text-center">
			                    <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" name="addAccount" value="Thêm tài khoản nhân viên">
			                </div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection