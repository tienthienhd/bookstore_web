<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Book Store</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- morris chart -->
    <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	<link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" /> 
 </head>
 <!-- END HEAD -->
<body>
<div class="page-wrapper">
    <!-- start header -->
    <div class="page-header navbar navbar-fixed-top">
        @yield('header')
    </div>
    <!-- end header -->
    <div class="clearfix"> </div>
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu-->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                @yield('sidebar')
                
            </div>
        </div>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
             <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- end page content -->
        <!-- start chat sidebar -->
        <div class="chat-sidebar-container" data-close-on-body-click="false">
            <div class="chat-sidebar">
               @yield('chat')
            </div>
        </div>
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <div class="page-footer">
        @yield('footer')
    </div>
    <!-- end footer -->
</div>
</body>
</html>