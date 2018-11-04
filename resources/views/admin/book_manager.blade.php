@extends('admin/layouts/master')
@section('content')
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">All Books</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Manager</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">All Books</li>
                </ol>
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Books</header>
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
                                    <a href="new_booking.html" id="addRow" class="btn btn-info">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
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
                            </div>
                        </div>
                        <div class="table-scrollable">
                        <table class="table table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                	<th class="center"> ID </th>
                                	<th class="center"> Cover </th>
                                    <th class="center"> Title </th>
                                    <th class="center"> Author </th>
                                    <th class="center"> Category </th>
                                    <th class="center"> Description </th>
                                    <th class="center"> Sale </th>
                                    <th class="center"> Purchase </th>
                                    <th class="center"> State </th>
                                    <th class="center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Available </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								<tr class="odd gradeX">
									<td class="center">B_01</td>
									<td class="user-circle-img">
											<img src="assets/img/user/user1.jpg" alt="">
									</td>
									<td class="center">Rajesh</td>
									<td class="center"> Tien Thien </td>
									<td class="center"> Van hoc </td>
									<td class="center">dfakldf</td>
									<td class="center">100</td>
									<td class="center">200</td>
									<td class="center">
										<span class="label label-sm label-success">Paid </span>
									</td>
									<td class="center">
										<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<button class="btn btn-tbl-delete btn-xs">
											<i class="fa fa-trash-o "></i>
										</button>
									</td>
								</tr>
								
							</tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->
@endsection