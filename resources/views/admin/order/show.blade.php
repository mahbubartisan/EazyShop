@extends('admin.layouts.app')

@section('content')
<div class="main-content">
	<div class="breadcrumb">
		<h1>All Orders</h1>
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
									<th>Order Date</th>
									<th>Payment Method</th>
									<th>Invoice NO.</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@forelse ($orders as $order)
								<tr>

									<td>{{ $order->order_date }}</td>
									<td>{{ $order->payment_method }}</td>
									<td>{{ $order->invoice_no }}</td>
									<td>${{ $order->amount }}</td>
									<td>
										{{-- id="status_{{$order->id}}" --}}
										<select class="status form-control" name="status"
											onchange="status({{ $order->id }}, this)" id="status_{{ $order->id }}">
											<option value="Pending" {{ $order->status === 'Pending' ? 'selected' : ''
												}}>
												Pending</option>
											<option value="Confirmed" {{ $order->status === 'Confirmed' ? 'selected' :
												'' }}>
												Confirmed</option>
											<option value="Shipped" {{ $order->status === 'Shipped' ? 'selected' : ''
												}}>
												Shipped</option>
											<option value="Picked" {{ $order->status === 'Picked' ? 'selected' : '' }}>
												Picked</option>
											<option value="Delivered" {{ $order->status === 'Delivered' ? 'selected' :
												'' }}>
												Delivered</option>
										</select>

									</td>
									<td>
										<a href="{{ route('order.detail', $order->id) }}"
											class="btn btn-primary mb-2 ml-3" title="Edit"><i
												class="nav-icon i-Eye-Visible"></i></a>
										<a href="{{ url('order/delete/' . $order->id) }}"
											class="btn btn-danger mb-2 ml-3" title="Delete"><i
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	function status(order_id, that) {

			// let OrderId = $(that).val();
			let status = $(that).children('option:selected').val();

			

			$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "POST",
			url: "{{ url('/orders/status/update') }}/" + order_id,
			data: {

				status: status

			},
			dataType: "json",
			success: function(data) {

				
			}
		});

		}

		
</script>
@endsection