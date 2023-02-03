<div class="container mt-5">

	<div class="row d-flex justify-content-center ">

		<div class="col-md-6">

			<div class="card">

				@forelse ($products as $product)
				<a href="{{ url('product/detail/' . $product->id)}}">
					<div class="list border-bottom">

						<img src="{{ asset($product->thumb_image) }}" alt="" style="width:50px; height:50px;">
						<div class="d-flex flex-column ml-3">
							<h5 style="margin-left: 5px">{{ $product->product_name_eng }}</h5>
							<h6 style="margin-left: 5px" class="text-danger">${{ $product->selling_price }}</h6>
						</div>
					</div>
					</a>
				@empty
					<h5 class="text-danger">No result found...</h5>
				@endforelse

			</div>

		</div>

	</div>

	<style>
		body {
			background-color: #eee;
		}

		.card {
			background-color: #fff;
			padding: 15px;
			border: none;
		}

		.input-box {
			position: relative;
		}

		.input-box i {
			position: absolute;
			right: 13px;
			top: 15px;
			color: #ced4da;
		}

		.form-control {
			height: 50px;
			background-color: #eeeeee69;
		}

		.form-control:focus {
			background-color: #eeeeee69;
			box-shadow: none;
			border-color: #eee;
		}

		.list {
			padding-top: 20px;
			padding-bottom: 10px;
			display: flex;
			align-items: center;
		}

		.border-bottom {
			border-bottom: 2px solid #eee;
		}

		.list i {
			font-size: 19px;
			color: red;
		}

		.list small {
			color: #dedddd;
		}
	</style>
