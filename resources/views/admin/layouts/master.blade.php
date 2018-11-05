<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Book Store') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}" defer></script>
	<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" defer></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}" defer></script>
	<script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}" defer></script>
    <!-- Common js-->
	<script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/layout.js') }}" defer></script>
    <script src="{{ asset('assets/js/theme-color.js') }}" defer></script>
    <!-- material -->
    <script src="{{ asset('assets/plugins/material/material.min.js') }}" defer></script>
    <!-- animation -->
    <script src="{{ asset('assets/js/pages/ui/animations.js') }}" defer></script>
    <!-- morris chart -->
{{--     <script src="{{ asset('assets/plugins/morris/morris.min.js') }}" defer></script>
    <script src="{{ asset('assets/plugins/morris/raphael-min.js') }}" defer></script>
    <script src="{{ asset('assets/js/pages/chart/morris/morris_home_data.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />

    <!-- icons -->
    <link href="{{ asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	
	<!--bootstrap -->
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet" type="text/css">

	<!-- morris chart -->
    <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />

    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/material/material.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/material_style.css') }}">

	<!-- animation -->
	<link href="{{ asset('assets/css/pages/animate_page.css') }}" rel="stylesheet">

	<!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" /> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
		@include('admin.components.header')
		<!-- end header -->

		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			@include('admin.components.sidebar')
			<!-- end sidebar menu -->

			<!-- start page content -->
			@yield('content')
			<!-- end page content -->

			<!-- start chat sidebar -->
			@include('admin.components.chat_sidebar')
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->

        <!-- start footer -->
        @include('admin.components.footer')
		<!-- end footer -->
	</div>
</body>
</html>
