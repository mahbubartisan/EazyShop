@extends('admin.layouts.app')

@section('content')
	<style>
		.checked {
			color: orange;
		}
	</style>

	<div class="main-content">
		<div class="breadcrumb">
			<h1>Reviews</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<div class="table-responsive">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Product</th>
										<th>Customer Name</th>
										<th>Summary</sub></th>
										<th>Comment</th>
										<th>Ratings</th>
										<th>Status</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>

									@forelse ($reviews as $review)
										{{-- @dd($attr_value) --}}
										<tr>
											<td>{{ $loop->iteration }}</td>

											<td>{{ $review->product->product_name_eng }}</td>
											<td>{{ $review->user->name }} </td>

											<td> {{ $review->summary }}</td>
											<td>{{ $review->comment }}</td>
											<td title="{{$review->rating}}">

												{!! str_repeat('<span><i class="fa fa-star checked"></i></span>', $review->rating) !!}

											</td>
											<td>

												<select class="form-control" name="status" onchange="statusUpdate({{ $review->id }}, this)">
													<option value="Pending" {{ $review->status == 'Pending' ? 'selected' : '' }}>Pending</option>
													<option value="Approved" {{ $review->status == 'Approved' ? 'selected' : '' }}>Approved</option>
												</select>

											</td>

											<td>

												<a href="{{ url('reviews/delete/' . $review->id) }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i
														class="nav-icon i-Close-Window"></i></a>
											</td>

										@empty
											<td>
												No records found...
											</td>
										</tr>
									@endforelse

								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- end of col-->

		</div>
		<!-- end of row-->
		<!-- end of main-content -->
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function statusUpdate(review_id, that) {

			let status = $(that).children("option:selected").val();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "POST",
				url: "{{ url('/reviews/status/update') }}/" + review_id,
				data: {

					status: status

				},
				dataType: "json",
				success: function(data) {

					console.log(data);
				}
			});
		}
	</script>
@endsection
