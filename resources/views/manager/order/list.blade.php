{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	 <form action="{{route('manager.order.list')}}" method="get">
		<input type="text" name="searchId" value=""><br><br>
		<input type="text" name="searchName" value=""><br><br>
		<input type="text" name="searchPhone" value=""><br><br>
		<input type="submit" name="search" value="{{__('btn.search')}}">
	</form><br><br>
	@if(isset($orders) && count($orders)>0)
			
		@foreach($orders as $order)
			<div style="background-color: #eee">
				Mã đơn hàng {{$order->id}}<br>
				Tên khách hàng {{$order->user->fullname}}<br>
				Ngày đặt {{$order->created_at}}<br>
				Bao gồm:
				@foreach($order->orderDetails as $orderDetail)
					{{$orderDetail->book->title}}
					<img src="{{asset('img/covers/'.$orderDetail->book->cover)}}" style="width: 5%">
				@endforeach
				<a href="{{route('manager.order.detail',['order' => $order])}}">{{__('btn.detail')}}</a>
			</div><br>
		@endforeach
		
	@else
		{{__('messages.no-order-found')}}
	@endif
</body>
</html> --}}


@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Orders</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.order.list')}}">Order</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Orders</li>
                </ol>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Orders</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row p-b-20">
                        	<div class="col-md-6 col-sm-6 col-6">
                        		
                        	</div>
                            {{-- <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group pull-right">
                                    <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        @if (isset($errorMessage))
					        <div class="alert alert-danger">
					            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
					                <span aria-hidden="true">&times;</span>
					            </button>
					            <ul>
					                <li>{{ $errorMessage }}</li>
					            </ul>
					        </div>
					    @endif
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
                        <form class="row" action="{{route('manager.order.list')}}" method="get">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <input type="text" class="form-control" name="searchId" value="{{ old('searchId') ?? $searchId ?? ''}}" placeholder="ID">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <input type="text" class="form-control" name="searchName" value="{{ old('searchName') ?? $searchName ??''}}" placeholder="Name">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <input type="text" class="form-control" name="searchPhone" value="{{ old('searchPhone') ?? $searchPhone ?? ''}}" placeholder="Phone">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                <input type="submit" class="form-control label primary-label" name="search" value="{{__('btn.search')}}">
                            </div>
                        </form>
					    @if(isset($orders) && count($orders)>0)
                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                	<th class="center">Mã đơn hàng</th>
				    				<th class="center">Tên khách hàng</th>
				    				<th class="center">Ngày đặt</th>
				    				<th class="center">Bao gồm</th>
				    				<th class="center"> <a href="#"> Action </a></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($orders as $order)
									<tr>
										<td class="center">{{$order->id}}</td>
										<td class="center">{{$order->user->fullname}}</td>
										<td class="center">{{$order->created_at}}</td>
										<td class="center">
											@foreach($order->orderDetails as $orderDetail)
											{{ $orderDetail->book->title}}
											@endforeach
										</td>
										<td class="center">
											<a href="{{ route('manager.order.detail', ['order' => $order]) }}">
												<span class="label label-sm lable-info"><i class="fa fa-info-circle"> Detail</i></span>
											</a>
										</td>
									</tr>
						    	@endforeach				
							</tbody>
                        </table>
                        </div>
                        @else
							{{__('messages.no-order-found')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-12 col-md-5"></div>
        	<div class="col-sm-12 col-md-7">{{ $orders->links() }}</div>
        </div>
    </div>
</div>
@endsection