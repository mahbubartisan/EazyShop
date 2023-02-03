@extends('frontend.layouts.app')

@section('content')
@section('title')
User Order Page
@endsection

<div class="body-content">
	<div class="container">
		<div class="row">
			<!--  row start -->
			@include('user.user_sidebar')

			<div class="col-md-2">

			</div>
			<div class="col-md-8">

				<h3 class="text-center">All Orders</h3>

				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Date</th>
							<th>Payment Method</th>
							<th>Total Amount</th>
							<th>Invoice NO.</th>
							<th>Order Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
						<tr>
							<td>{{ $order->order_date }}</td>
							<td>{{ $order->payment_method }}</td>
							<td>${{ $order->amount }}</td>
							<td>{{ $order->invoice_no }}</td>
							<td>
								@if ($order->return_reason != null)
								<span class="badge bagde-pill bagde-danger">Return Requested</span>
								@else
								<span class="badge bagde-pill bagde-danger">{{ $order->status }}</span>
								@endif

							</td>
							<td>
								<a href="{{ url('user/order/detail/' . $order->id) }}"
									class="btn btn-primary btn-sm btn-block">View</a>
								<a target="_blank" href="{{ url('user/invoice/download/' . $order->id) }}"
									class="btn btn-warning btn-sm btn-block">Download</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div> <!-- row end -->
	</div>
</div>

@endsection