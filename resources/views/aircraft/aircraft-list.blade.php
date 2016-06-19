@extends('layouts.app')

@section('content')

<style>
.results-title {
	margin-top: 0;
	margin-bottom: 20px;
}
.btn-group {
	margin-bottom: 20px;
}
.filter-buttons {
	margin-bottom: 15px;
}
.filter-buttons .btn {
	margin-bottom: 5px;
}
</style>


<div class="container" id="aircraft">
	<div class="row">
		<h1 class="col-xs-6 col-md-8">Aircraft</h1>

		<div class="btn-group   col-md-4 col-xs-6 pull-right" role="group">

			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" v-model="state.search" debounce="300">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit" v-on:click="state.search=''"><i class="fa fa-times"></i></button>
				</div>
			</div>

		</div>
	</div>

	<div class="filter-buttons nav nav-pills col-md-12" role="group">
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='glider' }" v-on:click="filterTo('glider')">All Gliders</button>
		<?php /* <button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='engine' }" v-on:click="filterTo('engine')">Engine</button> */ ?>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='self-launch' }" v-on:click="filterTo('self-launch')">Self Launch</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='sustainer' }" v-on:click="filterTo('sustainer')">Turbo</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='vintage' }" v-on:click="filterTo('vintage')">Vintage</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='tug' }" v-on:click="filterTo('tug')">Tugs</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='gyrocopter' }" v-on:click="filterTo('gyrocopter')">Gyros</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='helicopter' }" v-on:click="filterTo('helicopter')">Heli</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='balloon' }" v-on:click="filterTo('balloon')">Balloons</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='plane' }" v-on:click="filterTo('plane')">Planes</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='microlight' }" v-on:click="filterTo('microlight')">Microlights</button>
		<button type="button" class="btn btn-default btn-sm" v-bind:class="{ 'btn-primary': state.type=='all' }" v-on:click="filterTo('all')">All</button>
	</div>


	<div class="row">
		<div class="col-xs-12 col-sm-4 hidden-xs">

			<h2 class="results-title">@{{ total }} Results</h2>

		</div>

		<div class="col-xs-12 col-sm-8">

			<div class="btn-group pull-right" role="group">
				<button type="button" class="btn btn-default btn-sm disabled">Page @{{ state.page }} of @{{ last_page }}</button>
				<button type="button" class="btn btn-default btn-sm" v-on:click="previous()">Previous</button>
				<button type="button" class="btn btn-default btn-sm" v-on:click="next()">Next</button>
			</div>

		</div>
	</div>

	

	<table class="table results-table ">
		<tr>
			<th class="hidden-xs hidden-sm">Rego</th>
			<th>ID</th>
			<th>Manufacturer</th>
			<th>Model</th>
			<th class="hidden-xs">Class</th>
			<th class="hidden-xs">Owner</th>
			<th></th>
			<th class="hidden-xs"></th>
		</tr>
		<template v-for="result in results">
			<tr>
				<td class="hidden-xs hidden-sm nowrap">@{{ result.rego }}</td>
				<td>@{{ result.contest_id }}</td>
				<td>@{{ result.manufacturer }}</td>
				<td>@{{ result.model }}</td>
				<td class="hidden-xs">@{{ result.class }}</td>
				<td class="hidden-xs">@{{ result.owner }}</td>
				<td class="hidden-xs">
					<a href="https://www.caa.govt.nz/Script/AirReg3.asp?Mark=@{{ result.rego.substring(3,6) }}">CAA</a>
				</td>
				<td>
					<a href="/aircraft/@{{result.rego}}" class="btn btn-primary btn-xs">View</a>
				</td>
			</tr>
			<tr class="visible-xs" >
				<td colspan="5"style="border-top: none; padding-top: 0;">
					<span style="color: #888;">@{{ result.owner }}</span>
					<a class="visible-xs pull-right" href="https://www.caa.govt.nz/Script/AirReg3.asp?Mark=@{{ result.rego.substring(3,6) }}">CAA</a>
				</td>
			</tr>
		</template>
	</table>

	<div class="btn-group pull-right" role="group">
		<button type="button" class="btn btn-default disabled">Page @{{ state.page }} of @{{ last_page }}</button>
		<button type="button" class="btn btn-default" v-on:click="previous()">Previous</button>
		<button type="button" class="btn btn-default" v-on:click="next()">Next</button>
	</div>

</div>

@endsection



@section('scripts')

<script>
new Vue({
	el: '#aircraft',
	data: {
		state: {
			type: 'glider',
			page: 1,
			search: ''
		},
		last_page: 1,
		total: 0,
		results: [],
		dont_reload: false
	},
	created: function() {
		// check for URL params
		var State = History.getState();

		// load existing GET params
		if (get_url_param('search')) this.state.search = get_url_param('search');
		if (get_url_param('page')) this.state.page = get_url_param('page');
		if (get_url_param('type')) this.state.type = get_url_param('type');

		var that = this;

		
		History.Adapter.bind(window, 'statechange', function() {
			//console.log('statechange triggered');
			var state = History.getState();
			that.state = state.data;
			if (!that.dont_reload) {
				//console.log('reloading after statechange');
				that.loadSelected();
			}
			that.dont_reload=false;
		});

		this.dont_reload=true; // make sure we dont do a double load on page launch
		History.replaceState(this.state, null, "?search=" + this.state.search + "&type=" + this.state.type + "&page=" + this.state.page);
		that.loadSelected();
	},
	watch: {
		'state': {
			handler: 'stateChanged',
			deep: true
		}
	},
	methods: {
		filterTo: function(type) {
			this.state.type = type;
			this.state.page=1;
		},
		stateChanged: function() {
			History.pushState(this.state, null, "?search=" + this.state.search + "&type=" + this.state.type + "&page=" + this.state.page);
		},
		loadSelected: function() {

			this.$http.get('/api/v1/aircraft', this.state).then(function (response) {
				this.results = response.data.data;
				this.last_page = response.data.last_page;
				this.total = response.data.total;

				if (this.state.page > this.last_page && this.last_page>0) {
					this.state.page = 1;
				}
			});
		},
		next: function() {
			if (this.state.page<this.last_page) this.state.page = this.state.page+1;
		},
		previous: function() {
			if (this.state.page>1) this.state.page = this.state.page-1;
		}
	}
});
</script>

@endsection
