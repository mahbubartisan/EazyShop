@extends('frontend.layouts.app')

@section('content')
@section('title')
	Checkout Page
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">

							<!-- panel-heading -->

							<div id="collapseOne" class="panel-collapse collapse in">

								<!-- panel-body  -->
								<div class="panel-body">
									<div class="row">

										<form class="register-form" action="{{ route('checkout') }}" method="POST" role="form">

											@csrf

											<div class="col-md-6 col-sm-6 already-registered-login">
												<div class="form-group">
													<h5 class="info-title">First Name<span class="text-danger">*</span>
													</h5>
													<input type="text" name="fname" class="form-control unicase-form-control text-input">
												</div>

												<div class="form-group">
													<h5 class="info-title">Last Name<span class="text-danger">*</span>
													</h5>
													<input type="text" name="lname" class="form-control unicase-form-control text-input">
												</div>

												<div class="form-group">
													<h5 class="info-title">Phone Number<span class="text-danger">*</span></h5>
													<input type="text" name="phone" class="form-control unicase-form-control text-input">
												</div>

												<div class="form-group">
													<h5 class="info-title">Email<span class="text-danger">*</span></h5>
													<input type="email" name="email" class="form-control unicase-form-control text-input">
												</div>
											</div>

											<!-- already-registered-login -->
											<div class="col-md-6 col-sm-6 already-registered-login">

												<div class="form-group">
													<h5 class="info-title">District<span class="text-danger">*</span>
													</h5>
													<select name='district_id' class="form-control unicase-form-control">
														<option selected disabled>Select your district</option>
														@foreach ($districts as $district)
															<option value="{{ $district->id }}">{{ $district->name }}
															</option>
														@endforeach

													</select>
												</div>

												<div class="form-group">
													<h5 class="info-title">Town/City<span class="text-danger">*</span>
													</h5>
													<select name='city_id' class="form-control unicase-form-control">
														<option selected disabled>Select your town/city</option>

													</select>
												</div>

												<div class="form-group">
													<h5 class="info-title">Street Address<span class="text-danger">*</span></h5>
													<input type="text" name="address" class="form-control unicase-form-control text-input">
												</div>

												<div class="form-group">
													<h5 class="info-title">Postcode<span class="text-danger">*</span>
													</h5>
													<input type="text" name="post_code"class="form-control unicase-form-control text-input">
												</div>

												<div class="form-group">
													<h5 class="info-title">Notes <sub>(optional)</sub></h5>
													<textarea type="text" name="note" class="form-control unicase-form-control text-input"></textarea>
												</div>
											</div>
											<!-- already-registered-login -->

									</div>
								</div>
								<!-- panel-body  -->

							</div><!-- row -->
						</div>
						<!-- checkout-step-01  -->

					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">YOUR ORDER</h4>
								</div>
								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">

										@foreach ($cart_contents as $cart_content)
											<li><strong>Product Image:</strong>
												<img src="{{ asset($cart_content->options->thumb_image) }}" style="height:70px; weight:70px" alt="image">
											</li>
											<hr>

											<li><strong>Quantity:</strong>{{ $cart_content->qty }}</li>
											<hr>
										@endforeach

										@if (Session::has('coupon'))
											<li><strong>Subtotal:</strong> ${{ $cart_total }}
												<hr>
												<strong>Coupon Name:</strong> {{ session()->get('coupon')['name'] }}
												({{ session()->get('coupon')['amount'] }})% OFF
												<hr>

												<strong>Discount Amount:
												</strong>${{ session()->get('coupon')['discount_amount'] }}
												<hr>
												<strong>Total: </strong>${{ session()->get('coupon')['total_amount'] }}
											@else
												<strong>Subtotal: </strong> ${{ $cart_total }}
												<hr>
												<strong>Total: </strong>${{ $cart_total }}
												<hr>
										@endif
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- checkout-progress-sidebar -->
				</div>

				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">PAYMENT METHODS</h4>
								</div>
								<div class="row">
									<div class="col-md-4">
										<input type="radio" name="payment_method" value="stripe">
										<label for="">Stripe</label>
									</div>

									<div class="col-md-4">
										<input type="radio" name="payment_method" value="card">
										<label for="">Card</label>
									</div>

									<div class="col-md-4">
										<input type="radio" name="payment_method" value="cash">
										<label for="">On cash</label>
									</div>
								</div>
								<hr>
								<button type="submit" class="btn-upper btn btn-primary">PLACE ORDER</button>
							</div>
						</div>
					</div>
					<!-- checkout-progress-sidebar -->
				</div>
				</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->

	</div><!-- /.body-content -->

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {

			$('select[name="district_id"]').on('change', function() {

				var district_id = $(this).val();

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				if (district_id) {
					$.ajax({
						url: "{{ url('/get-district-cities') }}/" + district_id,
						type: "GET",
						dataType: "json",
						success: function(data) {
							var d = $('select[name="city_id"]').empty();
							$.each(data, function(key, value) {
								$('select[name="city_id"]').append('<option value="' +
									value.id + '">' + value.name + '</option>');
							});
						},
					});
				} else {
					alert('danger');
				}
			});
		});
	</script>
@endsection
