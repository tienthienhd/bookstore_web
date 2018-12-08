@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thống kê doanh thu</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.report.index')}}">Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Revenue Report</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Thống kê doanh thu</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            {{-- <a class="t-close btn-color fa fa-times" href="javascript:;"></a> --}}
                        </div>
                    </div>
                    <div class="card-body ">
                    	<form class='row' action="{{route('manager.report.revenue')}}">
                            <div class="col-4">
                                Nhập ngày tháng năm muốn xem doanh thu
                            </div>
                            <div class="col-4 center">
                                <input type="date" name="day">
                            </div>
                            <div class="col-4 center">
                                <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" value="Xem doanh thu">
                            </div>
						</form>
						
                        <div class="table-scrollable">
                        	@if(isset($revenues) && count($revenues) > 0)
                        	<table class="table table-hover table-checkable order-column full-width" id="example4">
	                            <thead>
	                                <tr>
	                                	<th class="center">Ngày</th>
					    				<th class="center">Doanh thu</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            @foreach($revenues as $revenue)
							  	<tr>
							    	<td class="center">{{$revenue->date}}</td>
							    	<td class="center">{{$revenue->sum}}</td> 
							    
							    </tr>
								@endforeach
                        	</table>
                        	@else
								{{__('messages.no-report-found')}}
							@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection