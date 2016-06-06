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
</style>


<div class="container" id="aircraft">
	<div class="row">
		<h1 class="col-xs-6 col-md-8">Aircraft</h1>

		<div class="btn-group   col-md-4 col-xs-6 pull-right" role="group">

			<div class="input-group">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit" v-on:click="state.search=''"><i class="fa fa-times"></i></button>
			</div>
				<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" v-model="state.search" debounce="300">
			</div>

		</div>
	</div>

	<div class="row">

		<div class="btn-group col-md-6" role="group">
			<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='glider' }" v-on:click="filterTo('glider')">All Gliders</button>
			<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='engine' }" v-on:click="filterTo('engine')">Engine</button>
			<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='self-launch' }" v-on:click="filterTo('self-launch')">Launchers</button>
			<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='sustainer' }" v-on:click="filterTo('sustainer')">Sustainer</button>
			<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='tug' }" v-on:click="filterTo('tug')">Tugs</button>
		</div>

		<div class="col-md-6">
			<div class="btn-group pull-right" role="group">
				<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='gyrocopter' }" v-on:click="filterTo('gyrocopter')">Gyros</button>
				<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='helicopter' }" v-on:click="filterTo('helicopter')">Heli</button>
				<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='balloon' }" v-on:click="filterTo('balloon')">Balloons</button>
				<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='plane' }" v-on:click="filterTo('plane')">Planes</button>
				<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='microlight' }" v-on:click="filterTo('microlight')">Microlights</button>
				<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': state.type=='all' }" v-on:click="filterTo('all')">All</button>
			</div>
		</div>


	</div>

	<div class="row">
		<div class="col-xs-4">

			<h4 class="results-title">@{{ total }} Results</h4>

		</div>

		<div class="col-xs-8">

			<div class="btn-group pull-right" role="group">
				<button type="button" class="btn btn-default disabled">Page @{{ state.page }} of @{{ last_page }}</button>
				<button type="button" class="btn btn-default" v-on:click="previous()">Previous</button>
				<button type="button" class="btn btn-default" v-on:click="next()">Next</button>
			</div>

		</div>
	</div>

	

	<table class="table table-striped results-table ">
		<tr>
			<th>Rego</th>
			<th>Contest ID</th>
			<th>Manufacturer</th>
			<th>Model</th>
			<th>Class</th>
			<th>Owner</th>
			<th></th>
			<th></th>
		</tr>
		<tr v-for="result in results">
			<td>@{{ result.rego }}</td>
			<td>@{{ result.contest_id }}</td>
			<td>@{{ result.manufacturer }}</td>
			<td>@{{ result.model }}</td>
			<td>@{{ result.class }}</td>
			<td>@{{ result.owner }}</td>
			<td>
				<a href="https://www.caa.govt.nz/Script/AirReg3.asp?Mark=@{{ result.rego.substring(3,6) }}">CAA</a>
			</td>
			<td>
				<a href="/aircraft/@{{result.rego}}" class="btn btn-primary btn-xs">View</a>
			</td>
		</tr>
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
		results: []
	},
	created: function() {
		// check for URL params
		var State = History.getState();

		// load existing GET params
		this.state.page = get_url_param('search') ? get_url_param('search') : '';
		this.state.page = get_url_param('page') ? get_url_param('page') : 1;
		this.state.type = get_url_param('type') ? get_url_param('type') : 'glider';

		this.loadSelected();

		var that = this;

		History.Adapter.bind(window, 'statechange', function() {
			var state = History.getState();
			that.state = state.data;
		});

	},
	watch: {
		'state': {
			handler: 'loadSelected',
			deep: true
		}
	},
	methods: {
		filterTo: function(type) {
			this.state.type = type;
			this.state.page=1;
		},
		loadSelected: function() {
			History.pushState(this.state, "Search", "?search=" + this.state.search + "&type=" + this.state.type + "&page=" + this.state.page);

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
