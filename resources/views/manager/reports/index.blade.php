@extends('manager.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Thống kê</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{ route('manager.home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Thống kê</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Thống kê</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            {{-- <a class="t-close btn-color fa fa-times" href="javascript:;"></a> --}}
                        </div>
                    </div>
                    <div class="card-body ">
                        <a href="{{route('manager.report.revenue')}}" title="">Thống kê doanh thu</a>
						<a href="{{route('manager.report.profit')}}" title="">Thống kê lợi nhuận</a>
						<a href="{{route('manager.report.inventory')}}" title="">Thống kê sách bán chạy/tồn kho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
	
	
	