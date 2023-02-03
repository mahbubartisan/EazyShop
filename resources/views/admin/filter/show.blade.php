@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Filters</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<a href="{{ route('create.filter') }}" class="btn btn-outline-success btn-md ripple m-3" style="float:right"><i
								class="fa fa-plus"> Add Filter</i></a>
						<div class="table-responsive">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Filter Name</th>
										<th>Categories </th>
										<th>Filter Column </th>
										<th>Filter Value</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@forelse ($filters as $filter)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $filter->filter_name }} </td>
											<td>
												@php
													$cat_ids = explode(',', $filter->cat_ids);
													
													foreach ($cat_ids as $cat_id) {
													    $category_name = App\Models\Category::getCategoryName($cat_id);
														echo $category_name, ', ' ;
													}
													@endphp
											</td>
											<td>{{ ucwords($filter->filter_column) }}</td>
											<td>{{ ucwords($filter->filterValue->pluck('filter_value')->implode(', ')) }} </td>
											<td>
												<a href="{{ url('filters/edit/' . $filter->id) }}" class="btn btn-primary mb-2 ml-3" title="Edit"><i
														class="nav-icon i-Pen-4"></i></a>
												<a href="{{ url('filters/delete/' . $filter->id) }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i
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
