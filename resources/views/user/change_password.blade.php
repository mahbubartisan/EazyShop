@extends('frontend.layouts.app')

@section('content')
@section('title')
	User Profile Page
@endsection

<div class="body-content">
	<div class="container">
		<div class="row">
			<!--  row start -->
			@include('user.user_sidebar')
			<div class="col-md-2">

			</div>
			<div class="col-md-6">

				<h3 class="text-center">Update Password</h3>
				<p class="text-center">Change your password from here.</p>

				<form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('update.password') }}">
					@csrf
					<div class="form-group">
						<label class="info-title">Current Password</label>
						<input type="password" id="current_password" name="old_password"
							class="form-control unicase-form-control text-input">
					</div>
					<div class="form-group">
						<label class="info-title">New Password</label>
						<input type="password" id="password" name="password" class="form-control unicase-form-control text-input"
							>
					</div>
					<div class="form-group">
						<label class="info-title">Confirm Password</label>
						<input type="password" id="password_confirmation" name="password_confirmation"
							class="form-control unicase-form-control text-input">
					</div>

					<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
				</form>

			</div>
		</div> <!-- row end -->
	</div>
</div>

@endsection
