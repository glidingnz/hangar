@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Switch Organisation</div>

				<div class="panel-body" id="test">

					<orgs-component></orgs-component>

				</div>
			</div>
		</div>
	</div>
</div>


@endsection


@section('scripts')
	<script type="text/javascript" src="/js/home.js"></script>
@stop