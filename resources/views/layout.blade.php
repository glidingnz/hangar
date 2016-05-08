<!DOCTYPE html>
<html>
	<head>
		<title>gliding.nz</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap-3.3.6-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/base.css"/>
		<script type="text/javascript" src="/vue-resource.js"></script>
		<script type="text/javascript" src="/vue.js"></script>
	</head>
	<body>
		<div class="nav">
			<a href="/">gliding.nz</a>
		</div>
		<div class="page">
			@yield('content')

			@yield('footer')
		</div>
	</body>
</html>
