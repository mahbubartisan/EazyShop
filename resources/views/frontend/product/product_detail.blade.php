@extends('frontend.layouts.app')

@section('content')
@section('title')
@if (session()->get('language') == 'hindi')
{{ $product->product_name_hindi }}
@else
{{ $product->product_name_eng }}
@endif
@endsection

<style>
	.checked {
		color: orange;
	}
</style>

@php
$reviews = App\Models\Review::where('product_id', $product->id)
->latest()
->get();

$avg_ratings = $reviews->avg('rating');

@endphp

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li>Home</li>
				@foreach ($category as $item)
				<li>{{ $item->category_name_eng }}</li>
				<li>{{ $product->product_name_eng }}</li>
				@endforeach

			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
					</div>

					<!-- ============================================== HOT DEALS ============================================== -->
					<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
						<h3 class="section-title">hot deals</h3>
						<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

							@forelse ($hot_deal_products as $hot_deal_product)
							<div class="item">
								<div class="products">
									<div class="hot-deal-wrapper">
										<div class="image">
											<img src="{{ asset($hot_deal_product->thumb_image) }}" alt="">
										</div>
										@php
										$amount = $hot_deal_product->selling_price - $hot_deal_product->discount_price;
										$discount = ($amount / $hot_deal_product->selling_price) * 100;
										@endphp
										<div class="sale-offer-tag"><span>{{ round($discount) }}%<br>off</span></div>
										<div class="timing-wrapper">
											<div class="box-wrapper">
												<div class="date box">
													<span class="key">120</span>
													<span class="value">Days</span>
												</div>
											</div>

											<div class="box-wrapper">
												<div class="hour box">
													<span class="key">20</span>
													<span class="value">HRS</span>
												</div>
											</div>

											<div class="box-wrapper">
												<div class="minutes box">
													<span class="key">36</span>
													<span class="value">MINS</span>
												</div>
											</div>

											<div class="box-wrapper hidden-md">
												<div class="seconds box">
													<span class="key">60</span>
													<span class="value">SEC</span>
												</div>
											</div>
										</div>
									</div><!-- /.hot-deal-wrapper -->

									<div class="product-info text-left m-t-20">
										<h3 class="name" title="{{ $hot_deal_product->product_name_eng }}"><a
												href="{{ url('product/detail/' . $hot_deal_product->id) }}">{{ $hot_deal_product->product_name_eng }}</a>
										</h3>
										<div class="rating rateit-small"></div>

										<div class="product-price">
											@if ($hot_deal_product->discount_price == null)
											<span class="price">${{ $hot_deal_product->selling_price }}</span>
											@else
											<span class="price">
												${{ $hot_deal_product->discount_price }}
											</span>
											<span class="price-before-discount">${{ $hot_deal_product->selling_price
												}}</span>
											@endif

										</div><!-- /.product-price -->

									</div><!-- /.product-info -->

									<div class="cart clearfix animate-effect">
										<div class="action">

											<div class="add-cart-button btn-group">
												<button class="btn btn-primary icon" data-toggle="dropdown"
													type="button">
													<i class="fa fa-shopping-cart"></i>
												</button>
												<button class="btn btn-primary cart-btn" type="button">Add to
													cart</button>

											</div>

										</div><!-- /.action -->
									</div><!-- /.cart -->
								</div>
							</div> <!-- /.item -->

							@empty
							<h4 class="text-center text-danger">No product found...</h4>
							@endforelse

						</div><!-- /.sidebar-widget -->
					</div>
					<!-- ============================================== HOT DEALS: END ============================================== -->

					<!-- ============================================== NEWSLETTER ============================================== -->
					<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
						<h3 class="section-title">Newsletters</h3>

					</div><!-- /.sidebar-widget -->
					<!-- ============================================== NEWSLETTER: END ============================================== -->

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
				<div class="detail-block">
					<div class="row  wow fadeInUp">

						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">
									@foreach ($product->multiImages as $product_image)
									<div class="single-product-gallery-item" id="slide{{ $product_image->id }}">
										<a data-lightbox="image-1" data-title="Gallery"
											href="{{ asset($product_image->image) }}">
											<img class="img-responsive" alt="" src="{{ asset($product_image->image) }}"
												data-echo="{{ asset($product_image->image) }}" />
										</a>
									</div><!-- /.single-product-gallery-item -->
									@endforeach
								</div><!-- /.single-product-slider -->

								<div class="single-product-gallery-thumbs gallery-thumbs">

									<div id="owl-single-product-thumbnails">
										@foreach ($product->multiImages as $product_image)
										<div class="item">
											<a class="horizontal-thumb active" data-target="#owl-single-product"
												data-slide="1" href="#slide{{ $product_image->id }}">
												<img class="img-responsive" width="85" alt=""
													src="{{ asset($product_image->image) }}"
													data-echo="{{ asset($product_image->image) }}" />
											</a>
										</div>
										@endforeach
									</div><!-- /#owl-single-product-thumbnails -->

								</div><!-- /.gallery-thumbs -->

							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name" id="product_name">
									@if (session()->get('language') == 'hindi')
									{{ $product->product_name_hindi }}
									@else
									{{ $product->product_name_eng }}
									@endif
								</h1>

								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											@if ($avg_ratings == 0)
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											@elseif ($avg_ratings == 1 || $avg_ratings < 2) <span
												class="fa fa-star checked"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												@elseif ($avg_ratings == 2 || $avg_ratings < 3) <span
													class="fa fa-star checked"></span>
													<span class="fa fa-star checked"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													@elseif ($avg_ratings == 3 || $avg_ratings < 4) <span
														class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														@elseif ($avg_ratings == 4 || $avg_ratings < 5) <span
															class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star"></span>
															@elseif ($avg_ratings == 5 || $avg_ratings < 5) <span
																class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																@endif
										</div>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk">{{ count($reviews) }} Reviews</a>
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.rating-reviews -->

								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-2">
											<div class="stock-box">
												<span class="label">Availability :</span>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="stock-box">

												@if ($product->product_qty > 0)
												<span class="value"> In Stock</span>
												@else
												<span class="value"> Out Stock</span>
												@endif

											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.stock-container -->

								<div class="description-container m-t-20">
									@if (session()->get('language') == 'hindi')
									{{ $product->short_dsc_hindi }}
									@else
									{{ $product->short_dsc_eng }}
									@endif
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">

										<div class="col-sm-6">
											<div class="price-box">
												@if ($product->discount_price == null)
												<span class="price">${{ $product->selling_price }}</span>
												@else
												<span class="price">${{ $product->discount_price }}</span>
												<span class="price-strike">${{ $product->selling_price }}</span>
												@endif
											</div>
										</div>

										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
													title="Wishlist" href="#">
													<i class="fa fa-heart"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
													title="Add to Compare" href="#">
													<i class="fa fa-signal"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
													title="E-mail" href="#">
													<i class="fa fa-envelope"></i>
												</a>
											</div>
										</div>

									</div><!-- /.row -->
								</div><!-- /.price-container -->

								<!-- /.attribute-container -->

								<div class="price-container info-container ">
									<div class="row">
										{{-- @dd($product_attributes) --}}
										@foreach ($product_attributes as $key => $product_attribute)
										{{-- @php
												dd($product_attribute->first()->attributes->attr_name_eng);
											@endphp --}}
										<div class="col-md-6">

											<div class="price-box">
												<h5 class="font-bold">
													{{ optional($product_attribute->first()->attributes)->attr_name_eng }}:
												</h5>
												<select class="form-control unicase-form-control">
													<option selected disabled>Please select one</option>
													@foreach ($product_attribute as $attr_value)
													<option value="{{ $attr_value->id }}">
														{{ $attr_value->attr_value_eng }}
													</option>
													@endforeach

												</select>

											</div>
										</div>
										@endforeach

										{{-- <div class="col-sm-4">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div> --}}

									</div><!-- /.row -->
								</div><!-- /.attribute-container -->

								<div class="quantity-container info-container">
									<div class="row">

										<div class="col-sm-2">
											<span class="label">Qty :</span>
										</div>

										<div class="col-sm-2">
											<div class="cart-quantity">
												<div class="quant-input">
													<div class="arrows">
														<div class="arrow plus gradient"><span class="ir"><i
																	class="icon fa fa-sort-asc"></i></span></div>
														<div class="arrow minus gradient"><span class="ir"><i
																	class="icon fa fa-sort-desc"></i></span>
														</div>
													</div>
													<input type="text" value="1" id="product_qty" min="1">
												</div>
											</div>
										</div>

										<input type="hidden" value="{{ $product->id }}" id="product_id" min="1">

										<div class="col-sm-7">
											<button type="submit" onclick='addToCart()' class="btn btn-primary">
												<i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
											</button>
										</div>

									</div><!-- /.row -->
								</div><!-- /.quantity-container -->

							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->
				</div>

				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								{{-- <li><a data-toggle="tab" href="#tags">TAGS</a></li> --}}
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">

								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
											@if (session()->get('language') == 'hindi')
											{!! $product->long_dsc_hindi !!}
											@else
											{!! $product->long_dsc_eng !!}
											@endif
										</p>
									</div>
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">

										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">

												@forelse ($reviews as $review)
												@if ($review->status == 'Pending')
												@else
												<div class="review">
													<div class="row">
														<div class="col-md-3">
															<img style="border-radius: 50%"
																src="{{ !empty($review->user->profile_photo_path) ? url('upload/users/' . $review->user->profile_photo_path) : url('upload/users/no-image.jpg') }}"
																width="40px" ; height="40px" alt="">
															{{ $review->user->name }}

															@if ($review->rating == null)
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															@elseif($review->rating == 1)
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															@elseif($review->rating == 2)
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															@elseif($review->rating == 3)
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star"></span>
															<span class="fa fa-star"></span>
															@elseif($review->rating == 4)
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star"></span>
															@elseif($review->rating == 5)
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															<span class="fa fa-star checked"></span>
															@endif
														</div>
														<div class="col-md-3">

														</div>
													</div> <!-- row end -->
													<div class="review-title"><span
															class="summary">{{ $review->summary }}</span><span
															class="date"><i
																class="fa fa-calendar"></i><span>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span></span>
													</div>
													<div class="text">{{ $review->comment }}</div>
												</div>
												@endif

												@empty
												<h5>No review has found...</h5>
												@endforelse

											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->

										<div class="product-add-review">

											@auth
											<div class="review-form">
												<div class="form-container">
													<form action="{{ route('store.review') }}" method="POST" role="form"
														class="cnt-form">
														@csrf
														<input type="hidden" name="product_id"
															value="{{ $product->id }}">
														<div class="table-responsive">
															<table class="table">
																<thead>
																	<tr>

																		<th>1 star</th>
																		<th>2 stars</th>
																		<th>3 stars</th>
																		<th>4 stars</th>
																		<th>5 stars</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td><input type="radio" name="rating"
																				class="radio" value="1"></td>
																		<td><input type="radio" name="rating"
																				class="radio" value="2"></td>
																		<td><input type="radio" name="rating"
																				class="radio" value="3"></td>
																		<td><input type="radio" name="rating"
																				class="radio" value="4"></td>
																		<td><input type="radio" name="rating"
																				class="radio" value="5"></td>
																	</tr>
																</tbody>
															</table><!-- /.table .table-bordered -->
														</div><!-- /.table-responsive -->
														<div class="row">
															<div class="col-sm-6">

																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span
																			class="astk">*</span></label>
																	<input type="text" name="summary"
																		class="form-control txt"
																		id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span
																			class="astk">*</span></label>
																	<textarea name="comment"
																		class="form-control txt txt-review"
																		rows="4"></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->

														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT
																REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->
											@endauth

											@guest
											<p><b>To wirte a Review. You Need to Login First <a
														href="{{ route('login') }}">Login Here</a></b></p>
											@endguest

										</div><!-- /.product-add-review -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								{{-- <div id="tags" class="tab-pane">
									<div class="product-tag">

										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">

												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane --> --}}

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title">related products</h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

						@forelse ($related_products as $product)
						<div class="item item-carousel">
							<div class="products">

								<div class="product">
									<div class="product-image">
										<div class="image">
											<a href="detail.html"><img src="{{ asset($product->thumb_image) }}"
													alt=""></a>
										</div><!-- /.image -->

										<div class="tag sale"><span>sale</span></div>
									</div><!-- /.product-image -->

									<div class="product-info text-left">
										<h3 class="name" title="{{ $product->product_name_eng }}"><a
												href="{{ url('product/detail/' . $product->id) }}">
												@if (session()->get('language') == 'hindi')
												{{ $product->product_name_hindi }}
												@else
												{{ $product->product_name_eng }}
												@endif
											</a></h3>
										@include('frontend.product.ratings')
										<div class="description"></div>

										<div class="product-price">
											@if ($product->discount_price == null)
											<span class="price">${{ $product->selling_price }}</span>
											@else
											<span class="price">${{ $product->discount_price }}</span>
											<span class="price-before-discount">${{ $product->selling_price }}</span>
											@endif

										</div><!-- /.product-price -->

									</div><!-- /.product-info -->
									<div class="cart clearfix animate-effect">
										<div class="action">
											<ul class="list-unstyled">
												<li class="add-cart-button btn-group">
													<button class="btn btn-primary icon" data-toggle="dropdown"
														type="button">
														<i class="fa fa-shopping-cart"></i>
													</button>
													<button class="btn btn-primary cart-btn" type="button">Add to
														cart</button>

												</li>

												<li class="lnk wishlist">
													<a class="add-to-cart" href="detail.html" title="Wishlist">
														<i class="icon fa fa-heart"></i>
													</a>
												</li>

												<li class="lnk">
													<a class="add-to-cart" href="detail.html" title="Compare">
														<i class="fa fa-signal"></i>
													</a>
												</li>
											</ul>
										</div><!-- /.action -->
									</div><!-- /.cart -->
								</div><!-- /.product -->

							</div><!-- /.products -->

						</div><!-- /.item -->

						@empty
						<h4 class="text-danger">No product found...</h4>
						@endforelse

					</div><!-- /.home-owl-carousel -->
				</section><!-- /.section -->
				<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

		<!-- == = BRANDS CAROUSEL : END = -->
	</div><!-- /.container -->
</div><!-- /.body-content -->

</body>

</html>
@endsection