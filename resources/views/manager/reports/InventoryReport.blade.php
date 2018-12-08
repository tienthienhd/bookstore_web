@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thống kê sách đã bán</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.report.index')}}">Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Inventory Report</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Thống kê sách đã bán</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            {{-- <a class="t-close btn-color fa fa-times" href="javascript:;"></a> --}}
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-scrollable">
                        	<table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                	<th class="center">Title</th>
				    				<th class="center">Số lượng đã bán</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($sellings as $selling)
							  	<tr>
							    	<td class="center">{{$selling->name}}</td>
							    	<td class="center">{{$selling->quantity}}</td> 
						    	</tr>
						    	@endforeach
                            </tbody>
                        	</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection