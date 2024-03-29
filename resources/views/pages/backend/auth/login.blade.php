<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<title>Login Page | BPOM</title>

	<!-- Favicons-->
	<link rel="icon" href="../images/favicon/favicon-32x32.png" sizes="32x32">
	<!-- Favicons-->
	<link rel="apple-touch-icon-precomposed" href="../images/favicon/apple-touch-icon-152x152.png">
	<!-- For iPhone -->
	<meta name="msapplication-TileColor" content="#00bcd4">
	<meta name="msapplication-TileImage" content="../images/favicon/mstile-144x144.png">
	<!-- For Windows Phone -->

	<!-- CORE CSS-->
	<link href="{{ asset('assets/backend/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- Custome CSS-->    
	<link href="{{ asset('assets/backend/css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/css/layouts/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="{{ asset('assets/backend/js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('assets/backend/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	
</head>

<body class="blue">
	<div id="login-page" class="row">
		<div class="col s12 z-depth-4 card-panel">
			{!! Form::open(['url' => route('admin.login'), 'class' => 'login-form']) !!}
				<div class="row">
					<div class="input-field col s12 center">
						<img src="{{ asset('assets/backend/images/login-logo.png') }}" alt="" class="circle responsive-img valign profile-image-login">
						<p class="center login-form-text">Badan Pengawas<br>Obat dan Makanan</p>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="mdi-social-person-outline prefix"></i>
						{!! Form::email('email', null, ['id' => 'email']) !!}
						<label for="email" class="center-align">Username</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="mdi-action-lock-outline prefix"></i>
						<input id="password" name="password" type="password">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="row">          
					<div class="input-field col s12 m12 l12  login-text">
						<input type="checkbox" id="remember-me" />
						<label for="remember-me">Remember me</label>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="input-field col s12">
						<button class="btn btn-primary col s12 blue" type="submit">Login</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

	<!-- jQuery Library -->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins/jquery-1.11.2.min.js') }}"></script>
	<!--materialize js-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/materialize.min.js') }}"></script>
	<!--plugins.js - Some Specific JS codes for Plugin Settings-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/plugins.min.js') }}"></script>
	<!--custom-script.js - Add your own theme custom JS-->
	<script type="text/javascript" src="{{ asset('assets/backend/js/custom-script.js') }}"></script>

</body>
</html>