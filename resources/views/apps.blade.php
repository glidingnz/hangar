@extends('layouts.app')

@section('content')
<style>
.app-panel {
	padding: 15px 15px;
}
.app-panel-inner .fa {
	font-size: 300%;
}
.app-panel-inner a {
	text-decoration: none;
	color: #333;
}
.app-panel-inner:hover a {
	color: #000;
}
.app-panel .disabled,
.app-panel .disabled a {
	color: #AAA;
}
.app-panel h3 {
	margin-top: .6em;
	font-size: 160%;
}

@media all and (max-width: 768px) {
	.hover-btn {
		text-align: left;
	}
	.app-panel-inner .fa {
		font-size: 200%;
	}
	.app-panel h3 {
		margin: 0;
	}
	.app-panel {
		padding: 10px 20px;
	}
}
</style>

<div class="container">

	
	<h1>Club Apps</h1>
	
	<div class="row">

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn hover-btn-active">
				<a class="col-xs-2 col-sm-12" href="/fleet"><i class="fa fa-paper-plane"></i></a>
				<h3 class="col-xs-10 col-sm-12"><a href="/fleet">Our Fleet</a></h3>
			</div>
		</div>
		
		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				
				<i class="col-xs-2 col-sm-12 fa fa-calendar"></i>
				
				<h3 class="col-xs-10 col-sm-12">Roster</h3>
				
			</div>
		</div>

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-users"></i>
				<h3 class="col-xs-10 col-sm-12">Members</h3>
			</div>
		</div>

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-book"></i>
				<h3 class="col-xs-10 col-sm-12">Bookings</h3>
			</div>
		</div>

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-home"></i>
				<h3 class="col-xs-10 col-sm-12">Accomodation</h3>
			</div>
		</div>

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-cogs"></i>
				<h3 class="col-xs-10 col-sm-12">Admin</h3>
			</div>
		</div>
	</div>

	<hr class="clearfix">
	
	<h1>Nationwide Apps</h1>

	<div class="row">

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn hover-btn-active">
				<a class="col-xs-2 col-sm-12" href="http://gliding.dev/aircraft"><i class="fa fa-plane"></i></a>
				<h3 class="col-xs-10 col-sm-12"><a href="http://gliding.dev/aircraft">Aircraft</a></h3>
			</div>
		</div>
		
		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-envelope"></i>
				<h3 class="col-xs-10 col-sm-12">Bulk Email</h3>
			</div>
		</div>

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-map-marker"></i>
				<h3 class="col-xs-10 col-sm-12">Turnpoints</h3>
			</div>
		</div>

		<div class="app-panel col-xs-12 col-sm-4 col-md-3">
			<div class="clearfix app-panel-inner hover-btn disabled">
				<i class="col-xs-2 col-sm-12 fa fa-crosshairs"></i>
				<h3 class="col-xs-10 col-sm-12">Tracking</h3>
			</div>
		</div>

	</div>

</div>

@endsection
