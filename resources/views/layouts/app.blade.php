<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gliding.nz</title>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/all.css">
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> --}}
	{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}


</head>
<body id="app-layout">
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ url('/') }}">
					Gliding.nz
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/clubs') }}">Clubs</a></li>
					<li><a href="{{ url('/apps') }}">Apps</a></li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@else
						<li class="dropdown"><a href="/account"> {{ Auth::user()->email }} </a></li>
						<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div id="messages">
		<messages></messages>
	</div>
	
	

	@yield('content')

	<?php
	// get messages defined by flash data
	if (Session::has('error')) Messages::error(Session::get('error'));
	if (Session::has('success')) Messages::success(Session::get('success'));
	if (Session::has('warning')) Messages::warning(Session::get('warning'));
	if (Session::has('note')) Messages::note(Session::get('note'));

	// get all validation errors
	foreach ($errors->all() as $error)
	{
		Messages::error($error);
	}

	// fetch all messages stored in the messages system to hand over to javascript
	$messages = Messages::fetch();
	echo '<script>var messages='. json_encode($messages) . ';</script>';
	echo '<script>var app={ domain: "' . env('APP_DOMAIN') . '" }</script>';
	?>


	<script type="text/javascript" src="/js/app.js"></script>
	<script type="text/javascript" src="/js/vue-resource.js"></script>
	<script type="text/javascript" src="/js/native.history.js"></script>
	<script type="text/javascript" src="/js/base.js"></script>

	<!-- load page specific scripts -->
	@yield('scripts')

</body>
</html>
