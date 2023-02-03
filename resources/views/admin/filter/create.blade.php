@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Create a new filter</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<section class="widget-card">
			<form action="{{ route('store.filter') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-lg-4 col-xl-4 mt-3">

						<h5 class="ul-widget-card__title"><span class="t-font-boldest">Filter</span></h5>
						<p class="card-text"><span class="t-font-bold">Write create a filter from here.</span></p>

					</div>
					<div class="col-lg-8 col-xl-8 mt-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="picker1">Catgories</label>
											<select class="form-control" id="cat_ids[]" name="cat_ids[]" multiple style="height: 175px;">
												<option disabled>Select category...</option>
												@foreach ($categories as $category)
													<option value="{{ $category->id }}">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp; {{ $category->category_name_eng }}</option>
													{{-- @foreach ($sub_categories as $sub_category)
														<option value="{{ $sub_category->id }}" {{ $category->parent_id == $sub_category->id ? 'seleced' : ''}}>

															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp; {{ $sub_category->category_name_eng }}</option>
													@endforeach --}}
												@endforeach
												{{-- @dd($category->parent_id == $sub_category->id) --}}
											</select>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Filter Name </label>
											<input type="text" class="form-control" name="filter_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="picker1">Filter Column </label>
											<input type="text" class="form-control" name="filter_column">
										</div>
									</div>
								</div>
							</div>
						</div> <!-- Card End -->
					</div>

					<div class="col-lg-4 col-xl-4 mt-3">

						<h5 class="ul-widget-card__title"><span class="t-font-boldest">Filter Values</span></h5>
						<p class="card-text"><span class="t-font-bold">Write your product attribute values from here.</span></p>

					</div>
					<div class="col-lg-8 col-xl-8 mt-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="picker1">Filter Value </label>
											<input type="text" class="form-control" name="filter_value[]">
										</div>
									</div>

								</div>

								<div class="new-form"></div>

								<div class="form-group">
									<a href="javascript:void(0)" class="add-more btn btn-success">Add More</a>
								</div>

							</div>
						</div> <!-- Card End -->
						<div class="mt-3 ">
							<input type="submit" style="float:right" class="btn btn-md btn-primary" value="Add Attribute">
						</div>
					</div>
			</form>
		</section>
	</div><!-- end of main-content -->
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready(function() {

			$(document).on('click', '.remove-btn', function() {
				$(this).closest('.row').remove();
			});
		});


		$(document).ready(function() {
			$(document).on('click', '.add-more', function() {
				$('.new-form').append('<div class="row">\
				<div class="col-md-8">\
					<div class="form-group">\
						<label for="picker1">Filter Value</label>\
						<input type="text" class="form-control" name="filter_value[]">\
					</div>\
				</div>\
					<div class="col-md-2">\
						<div class="form-group">\
						<br>\
							<button type="button" class="remove-btn btn btn-danger">Remove</button>\
						</div>\
					</div>\
				</div>');
			});
		});

	</script>
@endsection
