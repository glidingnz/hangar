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


<div class="container" id="fleet">
	
	<div class="row">
		<h1 class="col-xs-6">Fleet</h1>

		<div class="col-xs-6 row">
			<div class="pull-right">
				<input class="form-control col-xs-8" type="text" style="width: auto; margin-right: 10px;">
				<button class="form-control col-xs-4" style="width: auto;">Add</button>
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
			<th>Seats</th>
			<th></th>
			<th></th>
		</tr>
		<tr v-for="result in results">
			<td>@{{ result.rego }}</td>
			<td>@{{ result.contest_id }}</td>
			<td>@{{ result.manufacturer }}</td>
			<td>@{{ result.model }}</td>
			<td>@{{ result.class }}</td>
			<td>@{{ result.seats }}</td>
			<td>
				<a href="https://www.caa.govt.nz/Script/AirReg3.asp?Mark=@{{ result.rego.substring(3,6) }}">CAA</a>
			</td>
			<td>
				<a href="/aircraft/@{{result.rego}}" class="btn btn-primary btn-xs">View</a>
			</td>
		</tr>
	</table>


</div>

@endsection



@section('scripts')

<script>
new Vue({
	el: '#fleet',
	data: {
		results: []
	},
	created: function() {
		this.load();
	},
	methods: {
		load: function() {
			this.$http.get('/api/v1/fleet/<?php echo $org->id; ?>').then(function (response) {
				this.results = response.data.data;
			});
		}
	}
});
</script>

@endsection
