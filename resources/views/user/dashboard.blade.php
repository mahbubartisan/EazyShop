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

				<h3 class="text-center">Profile</h3>
				<p class="text-center">Update information about yourself.</p>

				<form class="register-form outer-top-xs" role="form" method="POST"
					action="{{ route('profile.update') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="info-title">Name</label>
						<input type="text" class="form-control unicase-form-control text-input" name="name"
							value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label class="info-title">Email</label>
						<input type="text" class="form-control unicase-form-control text-input" name="email"
							value="{{ $user->email }}">
					</div>
					<div class="form-group">
						<label class="info-title">Phone</label>
						<input type="text" class="form-control unicase-form-control text-input" name="phone"
							value="{{ $user->phone }}">
					</div>
					<div class="form-group">
						<label class="info-title">Profile Image</label>
						<input type="file" class="form-control unicase-form-control text-input"
							name="profile_photo_path">
					</div>

					<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
				</form>

			</div>
		</div> <!-- row end -->
	</div>
</div>

@endsection