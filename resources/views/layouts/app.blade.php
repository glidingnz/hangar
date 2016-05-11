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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

	<!-- page specific styles -->
	@yield('styles')

	<?php
	/*
	// output PHP loaded messages
	if (isset($_APP->messages))
	{
		$_MESSAGES = $_APP->messages->load_messages();
		if (isset($_MESSAGES)) { 
			foreach ($_MESSAGES AS $message)
			{
				switch ($message['type'])
				{
					case 'error': echo "gnz.messages.error('{$message['text']}');"; break;
					case 'warning': echo "gnz.messages.warning('{$message['text']}');"; break;
					case 'success': echo "gnz.messages.success('{$message['text']}');"; break;
					case 'note': echo "gnz.messages.note('{$message['text']}');"; break;
				}
			}
		}
	}
	*/
	?>
	
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
					<li><a href="{{ url('/home') }}">Home</a></li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
					@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div id="app">
		<messages></messages>
	</div>
	
	

	@yield('content')

		<?php
		if (Session::has('error')) {
			//$messages['error'][] = Session::get('error');
		}
		$messages = Messages::fetch();
		if (isset($messages))
		{
			echo '<script>var messages='. json_encode($messages) . ';</script>';
		}
		?>

	<script type="text/javascript" src="/js/app.js"></script>

	<!-- load page specific scripts -->
	@yield('scripts')
</body>
</html>
