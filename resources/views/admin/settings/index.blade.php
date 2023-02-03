@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Update Site Settings</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<section class="widget-card">

			<form action="{{ route('update.settings') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<input type="hidden" name="id" value="{{ $setting->id }}">
				<input type="hidden" name="old_image" value="{{ $setting->image }}">
				<div class="row">
					<div class="col-lg-4 col-xl-4 mt-3">

						<h5 class="ul-widget-card__title"><span class="t-font-boldest">Logo</span></h5>
						<p class="card-text"><span class="t-font-bold">Upload your site logo from here.</span></p>

					</div>
					<div class="col-lg-8 col-xl-8 mt-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="picker1">Image</label>
											<input type="file" class="form-control" name="image" onchange="preview()">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<div class="form-group">
											<img src="{{ asset($setting->image) }}" alt="image" id="showImage" style="wight:70px; height:70px">
										</div>
									</div>
								</div>
							</div>
						</div> <!-- Card End -->
					</div>

					<div class="col-lg-4 col-xl-4 mt-3">

						<h5 class="ul-widget-card__title"><span class="t-font-boldest">Description</span></h5>
						<p class="card-text"><span class="t-font-bold">Write your contact and other info from here.</span></p>

					</div>
					<div class="col-lg-8 col-xl-8 mt-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Address</sub></label>
											<input type="text" class="form-control" name="address" value="{{ $setting->address }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Email</sub></label>
											<input type="text" class="form-control" name="email" value="{{ $setting->email }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Phone</sub></label>
											<input type="text" class="form-control" name="phone" value="{{ $setting->phone }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Facebook</sub></label>
											<input type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Instagram</sub></label>
											<input type="text" class="form-control" name="instagram" value="{{ $setting->instagram }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Twitter</sub></label>
											<input type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}">
										</div>
									</div>
								</div>

							</div>
						</div> <!-- Card End -->
						<div class="m-7 mt-2 mb-5">
							<input type="submit" style="float:right" class="btn btn-md btn-primary" value="Update Settings">
						</div>
					</div>
			</form>
		</section>
	</div><!-- end of main-content -->
	</div>
@endsection
