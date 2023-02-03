@extends('admin.layouts.app')

@section('content')
	<div class="main-content">
		<div class="breadcrumb">
			<h1>Order Detail</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>

		<!-- end of row-->
		<div class="row mb-4">
			<div class="col-lg-6 col-xl-6 mt-3">
				<div class="card">
					<div class="card-body">
						<div class="card-title">Shipping Detail</div>
						<table class="table">
							<tr>
								<th class="col-span-2">Full Name: </th>
								<th class="col-span-2">{{ $order->first_name }} {{ $order->last_name }}</th>
							</tr>
							<tr>
								<th>Email: </th>
								<th>{{ $order->email }}</th>
							</tr>
							<tr>
								<th>Phone: </th>
								<th>{{ $order->phone }}</th>
							</tr>
							<tr>
								<th>District: </th>
								<th>{{ $order->district->name }}</th>
							</tr>
							<tr>
								<th>Town/City: </th>
								<th>{{ $order->city->name }}</th>
							</tr>
							<tr>
								<th>Address: </th>
								<th>{{ $order->address }}</th>
							</tr>
							<tr>
								@if ($order->post_code == null)
									<th>Postcode: </th>
									<th>-----</th>
								@else
									<th>Postcode: </th>
									<th>{{ $order->post_code }}</th>
								@endif
							</tr>
							<tr>
								<th>Order Date: </th>
								<th>{{ $order->order_date }}</th>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 mt-3">
				<div class="card">
					<div class="card-body">
						<div class="card-title">Order Detail <h5 class="mt-2">Invoice NO. <strong><span class="text-danger">
										#{{ $order->invoice_no }}</span></strong></h5>
						</div>
						<table class="table">
							<tr>
								<th>Full Name: </th>
								<th>{{ $order->first_name }} {{ $order->last_name }}</th>
							</tr>

							<tr>
								<th>Payment Method: </th>
								<th>{{ $order->payment_method }}</th>
							</tr>
							<tr>
								<th>Tranx ID: </th>
								<th>{{ $order->transaction_id }}</th>
							</tr>
							<tr>
								<th>Total Amount: </th>
								<th>${{ $order->amount }}</th>
							</tr>
							<tr>
								<th>Order Status: </th>
								<th class="text-danger">{{ $order->status }}</th>
							</tr>

						</table>
						{{-- @if ($order->status === 'Pending')
							<a href="{{ route('order.confirm', $order->id) }}" class="btn btn-primary float-right">Confirm Order</a>
						@endif --}}
					</div>
				</div>
			</div>
		</div> <!-- end of row-->

		<div class="row">
			<div class="col-lg-12 col-xl-12 mt-3">
				<div class="card">
					<div class="card-body">
						<div class="card-title">Order Product Detail</div>
						<table class="table">
							<thead>
								<tr>
									<th>Serial NO.</th>
									<th>Product Image</th>
									<th>Product Name</th>
									<th>Product Code</th>
									<th>Product Color</th>
									<th>Product Size</th>
									<th>Product Qty</th>
									<th>Product Price</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($order_items as $order_item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td><img src="{{ asset($order_item->product->thumb_image) }}" style="width:50px; height:50px" alt="">
										</td>
										<td>{{ $order_item->product->product_name_eng }}</td>
										<td>#{{ $order_item->product->product_code }}</td>
										<td>{{ $order_item->color }}</td>
										<td>{{ $order_item->size }}</td>
										<td>{{ $order_item->quantity }}</td>
										<td>${{ $order_item->price }} (${{ $order_item->price * $order_item->quantity }})</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> <!-- end of row -->

		<!-- end of main-content -->
	</div>
@endsection
