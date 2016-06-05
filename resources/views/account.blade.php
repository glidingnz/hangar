@extends('layouts.app')

@section('content')
<div class="container">

		<h1>My Account</h1>

		<form action="/update-account" method="post" class="form-horizontal">
			<?php /*
			<div class="form-group">
				<label class="col-sm-2 control-label" for="userUsername">Username</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" id="userUsername" name="userUsername" value="">
				</div>
				<div class="col-sm-5 form-help">By default this is your email address. You can choose something shorter if desired.</div>
			</div>
			*/ ?>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email">Email</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" id="email" name="email" size="40" value="{{ old('email', $email) }}">
					</div>

					<div class="col-sm-offset-2 col-sm-5" style="margin-top: 10px;">
						<?php if ($activated) { ?>
							<span class="success"><i class="fa fa-check-square-o"></i> Email Validated</span>
						<?php } else { ?>
							<span class="error"><i class="fa fa-exclamation-circle"></i> Email Not Validated</span>
							<input value="Re-send Validation Email" name="resend-validation" type="submit" class="btn btn-default btn-sm">
						<?php }  ?>
					</div>
			</div>


			<div class="form-group">
				<label class="col-sm-2 control-label" for="gnz_id">GNZ Number</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" id="gnz_id" name="gnz_id" value="{{ old('gnz_id', $gnz_id) }}">
				</div>

				<div class="col-sm-offset-2 col-sm-5" style="margin-top: 10px;">
					<?php if ($gnz_active) { ?>
						<span class="success"><i class="fa fa-check-square-o"></i> GNZ Number Validated</span>
					<?php } else { ?>
						<span class="warning"><i class="fa fa-exclamation-circle"></i> GNZ Number Not Validated
						<input value="Check Again" name="check-gnz" type="submit" class="btn btn-default btn-sm"></span>
					<?php }  ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="mobile">Mobile</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" id="mobile" name="mobile" size="40" value="{{ old('mobile', $mobile) }}">
				</div>
				<div class="col-sm-5 form-help">Note this is your public phone number, displayed in places like the roster</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label" for="first_name">First Name</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" id="first_name" name="first_name" size="40" value="{{ old('first_name', $first_name) }}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="last_name">Last Name</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" id="last_name" name="last_name" size="40" value="{{ old('last_name', $last_name) }}">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-5">
					<input value="Update Account" name="update-account" type="submit" class="btn btn-primary">
				</div>
			</div>
		</form>

</div>
@endsection

