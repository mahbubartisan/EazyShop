@extends('admin.layouts.app')

@section('content')
<div class="main-content">
	<div class="breadcrumb">
		<h1>Brands</h1>
	</div>
	<div class="separator-breadcrumb border-top"></div>

	<!-- end of row-->
	<div class="row mb-4">
		<div class="col-md-12 mb-4">
			<div class="card text-left">
				<div class="card-body">
					<a href="{{ route('create.brand') }}" class="btn btn-outline-success btn-md ripple m-3"
						style="float:right"><i class="fa fa-plus"> Add Brand</i></a>
					<div class="table-responsive">
						<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
							id="zero_configuration_table" style="width:100%">
							<thead>
								<tr>
									<th>Serial NO.</th>
									<th>Image</th>
									<th>Name <sub>(English)</sub></th>
									<th>Name <sub>(Hindi)</sub></th>
									<th>Product</th>
									<th>Slug <sub>(English)</sub></th>
									<th>Slug <sub>(Hindi)</sub></th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@forelse ($brands as $brand)
								{{-- @dd($attr_value) --}}
								<tr>
									<td>{{ $loop->iteration }}</td>

									<td><img src="{{ $brand->brand_image }}" alt="image"
											style="height:70px; weight:70px"></td>
									<td>{{ $brand->brand_name_eng }} </td>

									<td> {{ $brand->brand_name_hindi }}</td>
									<td>{{ $brand->product_count }}</td>
									<td> {{ $brand->brand_slug_eng }}</td>
									<td> {{ $brand->brand_slug_hindi }}</td>
									<td>
										<a href="{{ url('brands/edit/' . $brand->id) }}"
											class="btn btn-primary mb-2 ml-3" title="Edit"><i
												class="nav-icon i-Pen-4"></i></a>
										<a href="{{ url('brands/delete/' . $brand->id) }}"
											class="btn btn-danger mb-2 ml-3" title="Delete"><i
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
@endsection