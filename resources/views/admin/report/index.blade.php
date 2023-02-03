@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>All Reports</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<h4 class="card-title mb-3">
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<span class="float-left mb-1">
													From
												</span>
												<input type="date" name="fromDate" value="" class="form-control date-filter mr-3" id="fromDate">
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<span class="float-left mb-1">
													To
												</span>
												<input type="date" name="toDate" class="form-control date-filter mr-3" id="toDate">
											</div>
										</div>
										<div class="col-md-2 mt-4">
											<a href="JavaScript:void(0)" class="btn btn-outline-info form-control filterBtn"
												data-route="{{ route('dateFilter') }}">Filter</a>
										</div>
									</div>
								</div>
							</div>
						</h4>
						<!-- end of row-->
						<!-- end of main-content -->
						<div class="table-responsive" id="globalTable">
							<table class="display table table-striped table-bordered table-responsive{-sm|-md|-lg|-xl}"
								id="zero_configuration_table datatable" style="width:100%">
								<thead>
									<tr>
										<th>Serial NO.</th>
										<th>Order Date</th>
										<th>Payment Method</th>
										<th>Invoice NO.</th>
										<th>Amount</th>

									</tr>
								</thead>
								<tbody>

									@forelse ($reports as $report)
										<tr>

											<td>{{ $loop->iteration }}</td>
											<td>{{ $report->order_date }}</td>
											<td>{{ $report->payment_method }}</td>
											<td>{{ $report->invoice_no }}</td>
											<td>${{ $report->amount }}</td>

										@empty

											<td>No records found...</td>

										</tr>
									@endforelse

								</tbody>

							</table>
						</div>
					</div> <!-- end card -->
				</div>
			</div>
		</div>
		
			
					<!-- flatpicker -->
					<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
					<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
					<script>
						flatpickr(".date-filter", {
							altInput: true,
							altFormat: "F j, Y",
							dateFormat: "Y-m-d",
							defaultDate: "today",
							maxDate: "today",
						})
					</script>
					<!-- end flatpicker -->
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
					<script>
						// Show Filtered Record
						$('.filterBtn').on('click', function() {
							let route = $(this).data('route');
							let fromDate = $('#fromDate').val();
							let toDate = $('#toDate').val();

							if (fromDate > toDate) {
								alert('FromDate cannot be after ToDate')
							} else {
								$.ajax({
									headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									},
									url: route,
									data: {
										fromDate: fromDate,
										toDate: toDate,
									},
									dataType: "html",
									type: 'POST',
									success: function(data) {

										$('#globalTable').replaceWith($('#globalTable', data));

										$('#datatable').DataTable({
											"paging": true,
											"ordering": false,
											"info": true
										});
									},
									error: function(data) {
										//console.log('Error:', data);
									}
								});
							}
						});
					</script>
				@endsection
