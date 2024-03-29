<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="description" content="Pusat Informasi Pasar Aman dan Bahan Berbahaya">
	<meta name="author" content="Badan Pengawas Obat dan Makanan">
	<title>@yield('title') | Badan Pengawas Obat dan Makanan</title>

	<!-- Favicons-->
	<link rel="icon" href="{{ asset('assets/backend/images/favicon/favicon-32x32.png') }}" sizes="32x32">
	<!-- Favicons-->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/backend/images/favicon/apple-touch-icon-152x152.png') }}">
	<!-- For iPhone -->
	<meta name="msapplication-TileColor" content="#00bcd4">
	<meta name="msapplication-TileImage" content="{{ asset('assets/backend/images/favicon/mstile-144x144.png') }}">
	<!-- For Windows Phone -->
	<!-- CORE CSS-->
	<link href="{{ asset('assets/backend/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<!-- Custome CSS-->    
	<link href="{{ asset('assets/backend/css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="{{ asset('assets/backend/js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/js/plugins/data-tables/css/jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/js/plugins/sweetalert/sweetalert.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	@yield('css')

</head>

<body>

	<!-- START HEADER -->
	@include('layouts/backend/includes/header')
	<!-- END HEADER -->

	<!-- START MAIN -->
	<div id="main">
		<!-- START WRAPPER -->
		<div class="wrapper">

			<!-- START LEFT SIDEBAR NAV-->
			@include('layouts/backend/includes/left-sidebar')
			<!-- END LEFT SIDEBAR NAV-->

			<!-- START CONTENT -->
			<section id="content">
				@yield('content')
			</section>
			<!-- END CONTENT -->

			<!-- START RIGHT SIDEBAR NAV-->
			@include('layouts/backend/includes/right-sidebar')
			<!-- RIGHT RIGHT SIDEBAR NAV-->

		</div>
		<!-- END WRAPPER -->
	</div>
	<!-- END MAIN -->

	<!-- START FOOTER -->
	@include('layouts/backend/includes/footer')
	<!-- END FOOTER -->
		
	<!-- jQuery Library -->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins/jquery-1.11.2.min.js') }}"></script>    
	<!--materialize js-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/materialize.min.js') }}"></script>
	<!-- prism -->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins/prism/prism.js') }}"></script>
	<!--scrollbar-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<!-- chartist -->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins/chartist-js/chartist.min.js') }}"></script>
	<!-- data-tables -->
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/data-tables/data-tables-script.js')}}"></script>
    <!--sweetalert -->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
	@yield('js')
	
	<!--plugins.js - Some Specific JS codes for Plugin Settings-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins.min.js') }}"></script>
	<!--custom-script.js - Add your own theme custom JS-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/custom-script.js') }}"></script>
</body>

</html>