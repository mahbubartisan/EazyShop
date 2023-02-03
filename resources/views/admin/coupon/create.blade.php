@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Create a new coupon</h1>
		</div>
		
		<div class="separator-breadcrumb border-top"></div>
		<section class="widget-card">
			<form action="{{ route('store.coupon') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-lg-4 col-xl-4 mt-3">

						<h5 class="ul-widget-card__title"><span class="t-font-boldest">Coupon Name</span></h5>
						<p class="card-text"><span class="t-font-bold">Write your coupon information from here.</span></p>

					</div>
					<div class="col-lg-8 col-xl-8 mt-3">
						<div class="card">
							<div class="card-body">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Name</label>
											<input type="text" class="form-control" name="name">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Amount(%)</label>
											<input type="text" class="form-control" name="amount">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Validity</label>
											<input type="date" class="form-control date-filter" name="validity" min="{{ now()->format('Y-m-d') }}">
										</div>
									</div>
									<div class="col-md-6 mt-3">
										<div class="form-group">
											<label class="radio radio-success">
												<input type="radio" id="active" value="1" name="status"><span>Valid</span><span
													class="checkmark"></span>
											</label>
										</div>
										<div class="form-group">
											<label class="radio radio-success">
												<input type="radio" id="expried" value="0" name="status"><span>Expried</span><span
													class="checkmark"></span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- Card End -->
					</div>

					<div class="col-lg-4 col-xl-4 mt-3">

					</div>

					<div class="col-lg-8 col-xl-8 mt-3">
						<div class="mt-3 mb-5">
							<input type="submit" style="float:right" class="btn btn-md btn-primary" value="Create Coupon">
						</div>
					</div>
			</form>
		</section>
	</div><!-- end of main-content -->
	</div>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script>
		flatpickr(".date-filter", {
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
			minDate: "today"

		})
	</script>
@endsection
