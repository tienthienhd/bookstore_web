@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thống kê lợi nhuận</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{ route('manager.report.index')}}">Report</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Profit Report</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Thống kê lợi nhuận</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            {{-- <a class="t-close btn-color fa fa-times" href="javascript:;"></a> --}}
                        </div>
                    </div>
                    <div class="card-body ">
                    	<form class='row' action="{{route('manager.report.profit')}}">
                            <div class="col-4">
                                Nhập ngày tháng năm muốn xem lợi nhuận
                            </div>
                            <div class="col-4 center">
                                <input type="date" name="day">
                            </div>
                            <div class="col-4 center">
                                <input class="mdl-button m-b-10 m-r-20 btn-pink" type="submit" value="Xem lợi nhuận">
                            </div>
						</form>
						
                        <div class="table-scrollable">
                        	@if(isset($profits) && count($profits) > 0)
                        	<table class="table table-hover table-checkable order-column full-width" id="example4">
	                            <thead>
	                                <tr>
	                                	<th class="center">Ngày</th>
					    				<th class="center">Lợi nhuận</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            @foreach($profits as $profit)
								   <tr>
									   <td class="center">{{$profit->date}} </td>
									
							 			@foreach($revenues as $revenue)
								 			@if($profit->date == $revenue->date)
								 				<td class="center">{{$revenue->sum - $profit->profit}}</td>
								 			@endif
										@endforeach
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