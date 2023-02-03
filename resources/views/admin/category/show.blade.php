@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Categories</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<a href="{{ route('create.category') }}" class="btn btn-md btn-outline-success ripple m-3" style="float:right"><i
								class="fa fa-plus"> Add Category</i></a>
						<div class="table-responsive">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Icon</th>
										<th>Name <sub>(English)</sub></th>
										<th>Name <sub>(Hindi)</sub></th>
										<th>Parent</th>
										<th>Type</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@forelse ($categories as $category)
										<tr>
											<td>{{ $loop->iteration }}</td>

											<td><i class="{{ $category->category_icon }}"></i></td>
											<td>{{ $category->category_name_eng }} </td>
											<td>{{ $category->category_name_hindi }} </td>
											<td>
												{{ $category->parent_id ? $category->parents->category_name_eng : 'Parent' }}
											</td>
											<td> {{ $category->types->type_eng }}</td>
											<td>
												<a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-primary mb-2 ml-3" title="Edit"><i
														class="nav-icon i-Pen-4"></i></a>
												<a href="{{ url('categories/delete/' . $category->id) }}" class="btn btn-danger mb-2 ml-3" title="Delete"><i
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
