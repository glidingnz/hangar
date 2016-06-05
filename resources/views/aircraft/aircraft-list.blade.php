@extends('layouts.app')

@section('content')
<div class="container" id="aircraft">
	<h1>Aircraft</h1>


	<div class="btn-group" role="group" style="margin-bottom: 20px;">
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='glider' }" v-on:click="filterTo('glider')">All Gliders</button>
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='self-launch' }" v-on:click="filterTo('self-launch')">Self Launch</button>
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='sustainer' }" v-on:click="filterTo('sustainer')">Sustainer</button>
	</div>

	<div class="btn-group" role="group" style="margin-bottom: 20px;">
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='tow' }" v-on:click="filterTo('tow')">Tow Planes</button>
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='gyrocopter' }" v-on:click="filterTo('gyrocopter')">Gyrocopter</button>
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='helicopter' }" v-on:click="filterTo('helicopter')">Helicopter</button>
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='balloon' }" v-on:click="filterTo('balloon')">Balloons</button>
		<button type="button" class="btn btn-default" v-bind:class="{ 'btn-primary': type=='all' }" v-on:click="filterTo('all')">All NZ Aircraft</button>
	</div>

	<div class="input-group col-xs-3">
		<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" v-model="search">
		<div class="input-group-btn">
			<button class="btn btn-default" type="submit" v-on:click="search=''"><i class="fa fa-times"></i></button>
		</div>
	</div>
	

	<div class="row">
		<div class="col-xs-6">
			<h2 style="margin-bottom: 20px;">@{{ total }} Results</h2>
		</div>
		<div class="col-xs-6">

			<div class="btn-group pull-right" role="group">
				<button type="button" class="btn btn-default disabled">Page @{{ page }} of @{{ last_page }}</button>
				<button type="button" class="btn btn-default" v-on:click="previous()">Previous</button>
				<button type="button" class="btn btn-default" v-on:click="next()">Next</button>
			</div>

		</div>
	</div>

	

	<table class="table table-striped">
		<tr>
			<th>Rego</th>
			<th>Contest ID</th>
			<th>Manufacturer</th>
			<th>Model</th>
			<th>Class</th>
		</tr>
		<tr v-for="result in results">
			<td>@{{ result.rego }}</td>
			<td>@{{ result.contest_id }}</td>
			<td>@{{ result.manufacturer }}</td>
			<td>@{{ result.model }}</td>
			<td>@{{ result.class }}</td>
		</tr>
	</table>

	<div class="btn-group pull-right" role="group">
		<button type="button" class="btn btn-default disabled">Page @{{ page }} of @{{ last_page }}</button>
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
		type: 'glider',
		page: 1,
		last_page: 1,
		search: '',
		total: 0,
		results: []
	},
	created: function() {
		this.loadSelected();
	},
	watch: {
		'type': 'loadSelected',
		'page': 'loadSelected',
		'search': 'loadSelected'
	},
	methods: {
		filterTo: function(type) {
			this.type = type;
			this.page=1;
		},
		loadSelected: function() {
			var data = {type: this.type, page: this.page, search: this.search};
			this.$http.get('/api/v1/aircraft', data).then(function (response) {
				console.log(response.data);
				this.results = response.data.data;
				this.last_page = response.data.last_page;
				this.total = response.data.total;
			});
		},
		next: function() {
			if (this.page<this.last_page) this.page = this.page+1;
		},
		previous: function() {
			if (this.page>1) this.page = this.page-1;
		}
	}
});
</script>

@endsection
