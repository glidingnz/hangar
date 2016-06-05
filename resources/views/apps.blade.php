@extends('layouts.app')

@section('content')
<style>
.app-panel {
	padding: 20px 40px;
}
.app-panel-inner .fa {
	font-size: 400%;
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

	<h1>Apps</h1>

	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn hover-btn-active">
			<a class="col-xs-2 col-sm-12" href="/aircraft"><i class="fa fa-plane"></i></a>
			<h3 class="col-xs-10 col-sm-12"><a href="/aircraft">Aircraft</a></h3>
		</div>
	</div>
	
	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn disabled">
			
			<i class="col-xs-2 col-sm-12 fa fa-calendar"></i>
			
			<h3 class="col-xs-10 col-sm-12">Roster</h3>
			
		</div>
	</div>

	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn disabled">
			<i class="col-xs-2 col-sm-12 fa fa-map-marker"></i>
			<h3 class="col-xs-10 col-sm-12">Turnpoints</h3>
		</div>
	</div>

	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn disabled">
			<i class="col-xs-2 col-sm-12 fa fa-envelope"></i>
			<h3 class="col-xs-10 col-sm-12">Messaging</h3>
		</div>
	</div>

	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn disabled">
			<i class="col-xs-2 col-sm-12 fa fa-crosshairs"></i>
			<h3 class="col-xs-10 col-sm-12">Tracking</h3>
		</div>
	</div>

	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn disabled">
			<i class="col-xs-2 col-sm-12 fa fa-users"></i>
			<h3 class="col-xs-10 col-sm-12">Membership</h3>
		</div>
	</div>

	<div class="app-panel col-xs-12 col-sm-4 col-md-3">
		<div class="row app-panel-inner hover-btn disabled">
			<i class="col-xs-2 col-sm-12 fa fa-book"></i>
			<h3 class="col-xs-10 col-sm-12">Bookings</h3>
		</div>
	</div>

</div>

@endsection
