<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">
	<title>@yield('title')</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

	<!-- Customizable CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
		rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="https://js.stripe.com/v3/"></script>
</head>

<body class="cnt-home">
	<!-- ============================================== HEADER ============================================== -->

	@include('frontend.body.header')

	<!-- ============================================== HEADER : END ============================================== -->
	@yield('content')
	<!-- /#top-banner-and-menu -->

	<!-- ============================================== BRANDS CAROUSEL ============================================== -->

	@include('frontend.body.brands')

	<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	<!-- ============================================================= FOOTER ============================================================= -->
	@include('frontend.body.footer')
	<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	{{-- <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> --}}
	<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/assets/js/custom.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@include('frontend.product.filter-scripts')
	<script>
		function addToCart() {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			let id = $('#product_id').val();
			let product_name = $('#product_name').text();
			let color = $('#color option:selected').text();
			let product_qty = $('#product_qty').val();

			$.ajax({
				type: "POST",
				url: "/cart/data/store/" + id,
				dataType: 'json',
				data: {
					product_name: product_name,
					color: color,
					product_qty: product_qty
				},
				success: function(data) {
					miniCart()
					// $('#closeModel').click();

					//SweetAlter Message Start

					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						icon: 'success',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(data.error)) {

						Toast.fire({
							type: 'success',
							title: data.success
						})


					} else {

						Toast.fire({
							type: 'error',
							title: data.error
						})
					}
					//SweetAlter Message End
				}
			});
		}
	</script>

	<script type="text/javascript">
		function miniCart() {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: "GET",
				url: "/basket-item",
				dataType: "json",
				success: function(response) {

					$('#cartQty').text(response.cart_qty);
					$('span[id ="subTotal"]').text(response.cart_total);

					let miniCart = "";

					$.each(response.cart_content, function(key, value) {

						miniCart += `<div class="cart-item product-summary">
                        <div class="row"> 
                        <div class="col-xs-4">
                            <div class="image"> <a href="detail.html"><img src="/${value.options.thumb_image}" alt=""></a> </div>
                        </div>
                        <div class="col-xs-7">
                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                            <div class="price">${value.price} * ${value.qty}</div>
                        </div>
                        <div class="col-xs-1 action">
                            <button type="sunmit" id="${value.rowId}" onclick="removeItem(this.id)">
                                <i class="fa fa-trash"></i></button> </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>`
					});

					$('#miniCart').html(miniCart);
				}
			});
		}

		miniCart();

		function removeItem(rowId) {

			$.ajax({
				type: "GET",
				url: "/cart/item/remove/" + rowId,
				dataType: "json",
				success: function(response) {
					miniCart()


					//SweetAlter Message Start
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						icon: 'success',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(response.error)) {

						Toast.fire({
							type: 'success',
							title: response.success
						})


					} else {

						Toast.fire({
							type: 'error',
							title: response.error
						})
					}
					//SweetAlter Message End

				}
			});

		}
	</script>

	<script type="text/javascript">
		function addWishList(product_id) {
			$.ajax({
				type: "POST",
				url: "wishlist/product/" + product_id,
				dataType: "json",
				success: function(response) {

					//SweetAlter Message Start
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(response.error)) {

						Toast.fire({
							type: 'success',
							icon: 'success',
							title: response.success
						})


					} else {

						Toast.fire({
							type: 'error',
							icon: 'error',
							title: response.error
						})
					}
					//SweetAlter Message End
				}
			});
		}
	</script>

	{{-- Wishlist Ajax Function --}}
	<script type="text/javascript">
		function wishlist() {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: "GET",
				url: "/wishlist-products",
				dataType: "json",
				success: function(response) {

					let wishlist = "";

					$.each(response, function(key, value) {

						wishlist += `<tr>
					<td class="col-md-2"><img src="/${value.products.thumb_image}" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="{{ url('product/detail/') }}/${value.products.id} ">
                            ${value.products.product_name_eng}</a></div>
						
						<div class="price">
                            ${value.products.discount_price == null
                            ?
                           `$${value.products.selling_price}`
                            :
                            `$${value.products.discount_price} <span>$${value.products.selling_price}
				                                </span>`
                            }
						</div>
					</td>
					<td class="col-md-2">
                        	<div class="col-sm-7">
								<button type="submit" value="${value.id}" onclick="addToCart()"
										 class="btn btn-primary">
										<i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
										</button>
									</div>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit" id=${value.id} onclick="removeWishlist(this.id)" class="">
                            <i class="fa fa-times"></i>
                            </button>
					</td>
				</tr>`
					});

					$('#wishlist').html(wishlist);
				}
			});
		}

		wishlist();



		function removeWishlist(id) {


			$.ajax({
				type: "GET",
				url: "/wishlist/item/remove/" + id,
				dataType: "json",
				success: function(response) {

					wishlist();


					//SweetAlter Message Start
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(response.error)) {

						Toast.fire({
							type: 'success',
							icon: 'success',
							title: response.success
						})


					} else {

						Toast.fire({
							type: 'error',
							icon: 'error',
							title: response.error
						})
					}
					//SweetAlter Message End

				}
			});


		}
	</script>

	{{-- My Cart Ajax Function --}}

	<script type="text/javascript">
		function myCart() {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: "GET",
				url: "/my-cart-products",
				dataType: "json",
				success: function(response) {

					let myCart = "";

					$.each(response.cart_content, function(key, value) {

						myCart += `<tr>
                <td class="col-md-2"><img src="/${value.options.thumb_image}" alt="imga" style="width:70px; height:90px">
                    </td>
                <td class="col-md-2">
                    <div class="product-name"><a href="{{ url('product/detail/') }}/${value.id} ">
                        ${value.name}</a></div>
                    <div class="price">
                       <strong> $${value.price} </strong>
                    </div>
                </td>
                <td class="col-md-2">
                    ${value.qty > 1

                    ?`<button type="submit" class="btn btn-danger btn-sm" id=${value.rowId} onclick="cartQtyDecrement(this.id)"
				                     >-</button>`
                    :` <button type="submit" class="btn btn-danger btn-sm" disabled
				                     >-</button>`
                    
                    }
                   
                    <input type="text" value="${value.qty}" disabled min="1" max="100" style="width:20px">

                    <button type="submit" class="btn btn-primary btn-sm"
                    id=${value.rowId} onclick="cartQtyIncrement(this.id)" >+</button>
			
                </td>
                <td class="col-md-2">
                  <strong> $${value.subtotal } </strong>
                </td>
                <td class="col-md-1 close-btn">
                    <button type="submit" id=${value.rowId} onclick="removeMyCart(this.id)" class="">
                        <i class="fa fa-trash-o"></i>
                        </button>
                </td>
            </tr>`
					});

					$('#myCart').html(myCart);
				}
			});
		}

		myCart();



		function removeMyCart(id) {

			$.ajax({
				type: "GET",
				url: "/mycart/item/remove/" + id,
				dataType: "json",
				success: function(response) {
					myCart();
					miniCart();
					couponAmountCalc();
					$('#couponForm').show();
					$('#coupon_name').val('');

					//SweetAlter Message Start
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(response.error)) {

						Toast.fire({
							type: 'success',
							icon: 'success',
							title: response.success
						})


					} else {

						Toast.fire({
							type: 'error',
							icon: 'error',
							title: response.error
						})
					}
					//SweetAlter Message End

				}
			});


		}

		// Cart Qty Increment Function

		function cartQtyIncrement(rowId) {
			$.ajax({
				type: "GET",
				url: "/cart/qty/increment/" + rowId,
				dataType: "json",
				success: function(response) {
					couponAmountCalc();
					myCart();
					miniCart();
				}
			});
		}
		// Cart Qty Increment Function End


		// Cart Qty Decrement Function

		function cartQtyDecrement(rowId) {
			$.ajax({
				type: "GET",
				url: "/cart/qty/decrement/" + rowId,
				dataType: "json",
				success: function(response) {
					couponAmountCalc();
					myCart();
					miniCart();
				}
			});
		}
		// Cart Qty Decrement Function End
	</script>

	<script>
		// Coupon Function Start
		function applyCoupon() {

			var coupon_name = $('#coupon_name').val();

			$.ajax({
				type: "POST",
				url: "{{ url('/coupon-apply') }}",
				data: {
					coupon_name: coupon_name
				},
				dataType: "json",
				success: function(data) {
					couponAmountCalc();

					if (data.validity === true) {

						$('#couponForm').hide('');

					}


					//SweetAlter Message Start
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(data.error)) {

						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success
						})


					} else {

						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error
						})
					}
					//SweetAlter Message End
				}
			});
		}


		function couponAmountCalc() {

			$.ajax({
				type: "GET",
				url: "{{ url('/coupon-amount-calculation') }}",
				dataType: "json",
				success: function(data) {
					if (data.total) {
						$('#couponAmountCalc').html(
							`<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$${data.total}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$${data.total}</span>
					</div>
				</th>
			</tr>`
						)
					} else {
						$('#couponAmountCalc').html(
							`<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$${data.sub_total}</span>
					</div>
					<div class="cart-sub-total">
						Coupon Name<span class="inner-left-md">${data.name}</span>
                        <button type='submit' onclick='couponRemove()'><i class='fa fa-times'></i></button>
					</div>
					<div class="cart-sub-total">
						Discount Amount<span class="inner-left-md">$${data.discount_amount}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$${data.total_amount}</span>
					</div>
				</th>
			</tr>`
						)
					}
				}
			});
		}

		couponAmountCalc();
	</script>
	<script>
		function couponRemove() {

			$.ajax({
				type: "GET",
				url: "{{ url('/coupon-remove') }}",
				dataType: "json",
				success: function(data) {

					couponAmountCalc();
					$('#couponForm').show();
					$('#coupon_name').val('');
					//SweetAlter Message Start
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000
					})
					if ($.isEmptyObject(data.error)) {

						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success
						})


					} else {

						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error
						})
					}
					//SweetAlter Message End
				}
			});
		}
	</script>
</body>

</html>
