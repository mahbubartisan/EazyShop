@extends('frontend.layouts.app')

@section('content')
@section('title')
User Order Detail Page
@endsection

<div class="body-content">
	<div class="container">
		<div class="row">
			<!--  row start -->
			@include('user.user_sidebar')

			<!-- start col-md-5 -->

			<div class="col-md-5">

				<div class="card">
					<div class="card-header">
						<h2 class="text-center">Shipping Detail</h2>
					</div>
					<div class="card-body bg-primary">

						<table class="table">
							<tr>
								<th>Full Name: </th>
								<th>{{ $order->first_name }} {{ $order->last_name }}</th>
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

			</div> <!-- end col-md-5 -->

			<!-- start col-md-5 -->

			<div class="col-md-5">

				<div class="card">
					<div class="card-header">
						<h2 class="text-center">Order Item</h2>
						<h5 class="text-center text-danger"><span>Invoice Number #{{ $order->invoice_no }}</span></h5>
					</div>
					<div class="card-body bg-primary">

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
								<th>
									@if ($order->return_reason != null)
									<span>Return Requested</span>
									@else
									{{ $order->status }}
									@endif
								</th>
							</tr>

						</table>
					</div>
				</div>

			</div> <!-- end-col-md-5 -->

			<div class="row">

				<div class="col-md-12">

					<h3 class="text-center">Order Product Detail</h3>

					<table class="table table-responsive">
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
								<td><img src="{{ asset($order_item->product->thumb_image) }}"
										style="width:50px; height:50px" alt="">
								</td>
								<td>{{ $order_item->product->product_name_eng }}</td>
								<td>{{ $order_item->product->product_code }}</td>
								<td>{{ $order_item->color }}</td>
								<td>{{ $order_item->size }}</td>
								<td>{{ $order_item->quantity }}</td>
								<td>${{ $order_item->price }} (${{ $order_item->price * $order_item->quantity }})</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>

			</div> <!-- row end -->

			<div>
				@if ($order->status !== 'Delivered')
				@else
				@php
				$order = App\Models\Order::where('id', $order->id)
				->where('return_reason', '=', null)
				->first();
				@endphp
				@if ($order)
				<form action="{{ route('return.product', $order->id) }}" method="POST">
					@csrf
					<label for="">Return Reason</label>
					<textarea class="form-control" name="return_reason" id="return_reason" cols="30"
						rows="5"></textarea> <br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				@endif
				<span class="text-center text-danger">
					<h3>You have a return request for this order.</h3>
				</span>
				@endif
			</div>

		</div> <!-- row end -->
	</div>
</div>

@endsection