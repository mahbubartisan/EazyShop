@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Products</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<a href="{{ route('create.product') }}" class="btn btn-md btn-outline-success ripple m-3" style="float:right"><i
								class="fa fa-plus"> Add Product</i></a>
						<div class="table-responsive">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table" style="width:100%">
								<thead>
									<tr>
										<th>SL NO.</th>
										<th>Image</th>
										<th>Name <sub>(English)</sub></th>
										<th>Name <sub>(Hindi)</sub></th>
										<th>Selling Price</th>
										<th>Discount</th>
										<th>Quantity</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@forelse ($products as $product)
										<tr>
											{{-- @dd($product->tags) --}}

											<td>{{ $loop->iteration }}</td>
											<td><img src="{{ $product->thumb_image }}" alt="image" style="weight:60px; height:70px"></td>
											<td>{{ $product->product_name_eng }}</td>
											<td>{{ $product->product_name_hindi }}</td>
											<td>${{ $product->selling_price }}</td>
											<td>
												@if ($product->discount_price == null)
													No Discount
												@else
													@php
														$amount = $product->selling_price - $product->discount_price;
														$discount = ($amount / $product->selling_price) * 100;
													@endphp

													{{ round($discount) }}%
												@endif

											</td>
											<td>{{ $product->product_qty }} Pics</td>
											<td class="badge badge-pill badge-warning m-2 p-2">{{ $product->status == 1 ? 'PUBLISH' : 'DRAFT' }} </td>
											<td>
												<a href="{{ url('products/edit/' . $product->id) }}" class="btn btn-primary mb-2 ml-3" title="Edit"><i
														class="nav-icon i-Pen-4"></i></a>
												<a href="{{ url('products/delete/' . $product->id) }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i
														class="nav-icon i-Close-Window"></i></a>
											</td>

										@empty

											<td>No records found...</td>

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
