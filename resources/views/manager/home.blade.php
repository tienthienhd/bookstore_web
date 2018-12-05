@extends('manager.layouts.master')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in as sale manager!
                    <a href="{{route('manager.book.index')}}">{{__('btn.book-manage')}}</a>
                    <a href="{{ route('manager.order.list')}}">{{__('btn.order-manage')}}</a>
                    <a href="">{{__('btn.report-manage')}}</a>
                    <!-- start widget -->
                    <div class="state-overview">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                              <div class="info-box bg-blue">
                                <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Orders</span>
                                  <span class="info-box-number">450</span>
                                  <div class="progress">
                                    <div class="progress-bar width-60"></div>
                                  </div>
                                  <span class="progress-description">
                                        60% Increase in 28 Days
                                      </span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-3 col-md-6 col-12">
                              <div class="info-box bg-orange">
                                <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">New Booking</span>
                                  <span class="info-box-number">155</span>
                                  <div class="progress">
                                    <div class="progress-bar width-40"></div>
                                  </div>
                                  <span class="progress-description">
                                        40% Increase in 28 Days
                                      </span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-3 col-md-6 col-12">
                              <div class="info-box bg-purple">
                                <span class="info-box-icon push-bottom"><i class="material-icons">phone_in_talk</i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Inquiry</span>
                                  <span class="info-box-number">52</span>
                                  <div class="progress">
                                    <div class="progress-bar width-80"></div>
                                  </div>
                                  <span class="progress-description">
                                        80% Increase in 28 Days
                                      </span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-3 col-md-6 col-12">
                              <div class="info-box bg-success">
                                <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
                                <div class="info-box-content">
                                  <span class="info-box-text">Total Earning</span>
                                  <span class="info-box-number">13,921</span><span>$</span>
                                  <div class="progress">
                                    <div class="progress-bar width-60"></div>
                                  </div>
                                  <span class="progress-description">
                                        60% Increase in 28 Days
                                      </span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                          </div>
                        </div>
                    <!-- end widget -->
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>

        <!-- start widget -->
        <div class="state-overview">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Khách hàng</span>
                            <span class="info-box-number">{{$countCustomer}}</span>
                        </div>
                    <!-- /.info-box-content -->
                    </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-orange">
                        <span class="info-box-icon push-bottom"><i class="material-icons">library_books</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sách</span>
                            <span class="info-box-number">{{$countBook}}</span>
                        <!-- /.info-box-content -->
                        </div>
                  <!-- /.info-box -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-purple">
                        <span class="info-box-icon push-bottom"><i class="material-icons">view_list</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Thể loại</span>
                            <span class="info-box-number">{{$countCategory}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Đơn hàng</span>
                            <span class="info-box-number">{{$countOrder}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- end widget -->

        <div class="row">
            <!-- pie chart start -->
            <div class="col-md-4 col-sm-12 col-12">
                <div class="card  card-box">
                    <div class="card-head">
                        <header>Thể loại</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    
                    <div class="card-body no-padding height-9">
                        <div id="category_chart" class="width-100 height-250"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            // Draw the chart and set the chart values
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Thể loại', 'Số lượng'],
                                @foreach($countBookByCategory as $cat => $bkcount)
                                    ['{{$cat}}',{{ $bkcount}}],
                                @endforeach
                            ]);
                              // Optional; add a title and set the width and height of the chart
                              var options = {};
                              // Display the chart inside the <div> element with id="piechart"
                              var chart = new google.visualization.PieChart(document.getElementById('category_chart'));
                              chart.draw(data, options);
                            }
                            </script>
                    </div>
                </div>
            </div>
            <!-- end echart -->
        </div>


        <section id="cd-timeline" class="cd-container">
            @foreach($ordersStateHistories as $orderStateHistory)
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.svg" alt="Location">
                </div> <!-- cd-timeline-img -->
                <div class="cd-timeline-content">
                    <h2>Đơn hàng {{$orderStateHistory->order_id}}</h2>
                    <p>Đơn hàng mã số <b>{{$orderStateHistory->order_id}}</b> của khách hàng <b>{{$orderStateHistory->order->user->username}}</b> vừa được cập nhật trạng thái <b>{{$orderStateHistory->title}}</b></p>
                    {{-- <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button> --}}
                    <span class="cd-date">{{$orderStateHistory->created_at}}</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->
            @endforeach
        </section> <!-- cd-timeline -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Comments</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-scrollable">
                            <table class="table table-hover table-checkable order-column full-width" id="example4">
                                <thead>
                                    <tr>
                                        <th class="center">Avatar</th>
                                        <th class="center">username</th>
                                        <th class="center">Title</th>
                                        <th class="center">Star</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td class="center user-circle-img sorting_1"><img src="{{ asset('img/avatars').'/'.$comment->user->avatar }}" alt=""></td>
                                            <td class="center">{{$comment->user->username}}</td>
                                            <td class="center">{{$comment->title}}</td>
                                            <td class="center">
                                                @for($i=0; $i<round($comment->star); $i++)
                                                <i class="material-icons checked">grade</i>
                                                @endfor
                                                @for($j=5; $j>round($comment->star); $j--)
                                                <i class="material-icons">grade</i>
                                                @endfor
                                            </td>
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

@section('cssFile')
<link href="{{ asset('css/book.css') }}" rel="stylesheet">
@endsection



{{-- số lượng khách hàng: {{$countCustomer}}
số lượng sách: {{$countBook}}
số lượng thể loại: {{$countCategory}}
sô lượng đơn hàng: {{$countOrder}} 
số lượng sách theo từng thể loại:
    @foreach($countBookByCategory as $cat => $bkcount)
        {{$cat}} : {{ $bkcount}}
    @endforeach
doanh thu theo thời gian (chưa có) 
time line các sự kiện:
    @foreach($ordersStateHistories as $orderStateHistory)
        {{$orderStateHistory->created_at}} : đơn hàng mã {{$orderStateHistory->order_id}} của khách hàng {{$orderStateHistory->order->user->username}} vừa được cập nhật trạng thái {{$orderStateHistory->title}}
    @endforeach
danh sách các đánh giá:
--}}
    
