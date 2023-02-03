@extends('frontend.layouts.app')

@section('content')
@section('title')
	Product Search Result
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Handbags</li>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
			<div class='col-md-3 sidebar'>
				<!-- ================================== TOP NAVIGATION ================================== -->
				<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
					<nav class="yamm megamenu-horizontal">
						<ul class="nav">
							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-shopping-bag" aria-hidden="true"></i>Clothing</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Dresses</a></li>
													<li><a href="#">Shoes </a></li>
													<li><a href="#">Jackets</a></li>
													<li><a href="#">Sunglasses</a></li>
													<li><a href="#">Sport Wear</a></li>
													<li><a href="#">Blazers</a></li>
													<li><a href="#">Shirts</a></li>
													<li><a href="#">Shorts</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Handbags</a></li>
													<li><a href="#">Jwellery</a></li>
													<li><a href="#">Swimwear </a></li>
													<li><a href="#">Tops</a></li>
													<li><a href="#">Flats</a></li>
													<li><a href="#">Shoes</a></li>
													<li><a href="#">Winter Wear</a></li>
													<li><a href="#">Night Suits</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Toys &amp; Games</a></li>
													<li><a href="#">Jeans</a></li>
													<li><a href="#">Shirts</a></li>
													<li><a href="#">Shoes</a></li>
													<li><a href="#">School Bags</a></li>
													<li><a href="#">Lunch Box</a></li>
													<li><a href="#">Footwear</a></li>
													<li><a href="#">Wipes</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Sandals </a></li>
													<li><a href="#">Shorts</a></li>
													<li><a href="#">Dresses</a></li>
													<li><a href="#">Jwellery</a></li>
													<li><a href="#">Bags</a></li>
													<li><a href="#">Night Dress</a></li>
													<li><a href="#">Swim Wear</a></li>
													<li><a href="#">Toys</a></li>
												</ul>
											</div>
											<!-- /.col -->
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->
								</ul>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a>
								<!-- ================================== MEGAMENU VERTICAL ================================== -->
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-4">
												<ul>
													<li><a href="#">Gaming</a></li>
													<li><a href="#">Laptop Skins</a></li>
													<li><a href="#">Apple</a></li>
													<li><a href="#">Dell</a></li>
													<li><a href="#">Lenovo</a></li>
													<li><a href="#">Microsoft</a></li>
													<li><a href="#">Asus</a></li>
													<li><a href="#">Adapters</a></li>
													<li><a href="#">Batteries</a></li>
													<li><a href="#">Cooling Pads</a></li>
												</ul>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-4">
												<ul>
													<li><a href="#">Routers &amp; Modems</a></li>
													<li><a href="#">CPUs, Processors</a></li>
													<li><a href="#">PC Gaming Store</a></li>
													<li><a href="#">Graphics Cards</a></li>
													<li><a href="#">Components</a></li>
													<li><a href="#">Webcam</a></li>
													<li><a href="#">Memory (RAM)</a></li>
													<li><a href="#">Motherboards</a></li>
													<li><a href="#">Keyboards</a></li>
													<li><a href="#">Headphones</a></li>
												</ul>
											</div>
											<div class="dropdown-banner-holder"> <a href="#"><img alt=""
														src="assets/images/banners/banner-side.png" /></a> </div>
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->
								</ul>
								<!-- /.dropdown-menu -->
								<!-- ================================== MEGAMENU VERTICAL ================================== -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-paw" aria-hidden="true"></i>Shoes</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Dresses</a></li>
													<li><a href="#">Shoes </a></li>
													<li><a href="#">Jackets</a></li>
													<li><a href="#">Sunglasses</a></li>
													<li><a href="#">Sport Wear</a></li>
													<li><a href="#">Blazers</a></li>
													<li><a href="#">Shirts</a></li>
													<li><a href="#">Shorts</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Handbags</a></li>
													<li><a href="#">Jwellery</a></li>
													<li><a href="#">Swimwear </a></li>
													<li><a href="#">Tops</a></li>
													<li><a href="#">Flats</a></li>
													<li><a href="#">Shoes</a></li>
													<li><a href="#">Winter Wear</a></li>
													<li><a href="#">Night Suits</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Toys &amp; Games</a></li>
													<li><a href="#">Jeans</a></li>
													<li><a href="#">Shirts</a></li>
													<li><a href="#">Shoes</a></li>
													<li><a href="#">School Bags</a></li>
													<li><a href="#">Lunch Box</a></li>
													<li><a href="#">Footwear</a></li>
													<li><a href="#">Wipes</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Sandals </a></li>
													<li><a href="#">Shorts</a></li>
													<li><a href="#">Dresses</a></li>
													<li><a href="#">Jwellery</a></li>
													<li><a href="#">Bags</a></li>
													<li><a href="#">Night Dress</a></li>
													<li><a href="#">Swim Wear</a></li>
													<li><a href="#">Toys</a></li>
												</ul>
											</div>
											<!-- /.col -->
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->
								</ul>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-clock-o"></i>Watches</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-4">
												<ul>
													<li><a href="#">Gaming</a></li>
													<li><a href="#">Laptop Skins</a></li>
													<li><a href="#">Apple</a></li>
													<li><a href="#">Dell</a></li>
													<li><a href="#">Lenovo</a></li>
													<li><a href="#">Microsoft</a></li>
													<li><a href="#">Asus</a></li>
													<li><a href="#">Adapters</a></li>
													<li><a href="#">Batteries</a></li>
													<li><a href="#">Cooling Pads</a></li>
												</ul>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-4">
												<ul>
													<li><a href="#">Routers &amp; Modems</a></li>
													<li><a href="#">CPUs, Processors</a></li>
													<li><a href="#">PC Gaming Store</a></li>
													<li><a href="#">Graphics Cards</a></li>
													<li><a href="#">Components</a></li>
													<li><a href="#">Webcam</a></li>
													<li><a href="#">Memory (RAM)</a></li>
													<li><a href="#">Motherboards</a></li>
													<li><a href="#">Keyboards</a></li>
													<li><a href="#">Headphones</a></li>
												</ul>
											</div>
											<div class="dropdown-banner-holder"> <a href="#"><img alt=""
														src="assets/images/banners/banner-side.png" /></a> </div>
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->
								</ul>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-diamond"></i>Jewellery</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Dresses</a></li>
													<li><a href="#">Shoes </a></li>
													<li><a href="#">Jackets</a></li>
													<li><a href="#">Sunglasses</a></li>
													<li><a href="#">Sport Wear</a></li>
													<li><a href="#">Blazers</a></li>
													<li><a href="#">Shirts</a></li>
													<li><a href="#">Shorts</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Handbags</a></li>
													<li><a href="#">Jwellery</a></li>
													<li><a href="#">Swimwear </a></li>
													<li><a href="#">Tops</a></li>
													<li><a href="#">Flats</a></li>
													<li><a href="#">Shoes</a></li>
													<li><a href="#">Winter Wear</a></li>
													<li><a href="#">Night Suits</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Toys &amp; Games</a></li>
													<li><a href="#">Jeans</a></li>
													<li><a href="#">Shirts</a></li>
													<li><a href="#">Shoes</a></li>
													<li><a href="#">School Bags</a></li>
													<li><a href="#">Lunch Box</a></li>
													<li><a href="#">Footwear</a></li>
													<li><a href="#">Wipes</a></li>
												</ul>
											</div>
											<!-- /.col -->
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="#">Sandals </a></li>
													<li><a href="#">Shorts</a></li>
													<li><a href="#">Dresses</a></li>
													<li><a href="#">Jwellery</a></li>
													<li><a href="#">Bags</a></li>
													<li><a href="#">Night Dress</a></li>
													<li><a href="#">Swim Wear</a></li>
													<li><a href="#">Toys</a></li>
												</ul>
											</div>
											<!-- /.col -->
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->
								</ul>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-heartbeat"></i>Health and Beauty</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-4">
												<ul>
													<li><a href="#">Gaming</a></li>
													<li><a href="#">Laptop Skins</a></li>
													<li><a href="#">Apple</a></li>
													<li><a href="#">Dell</a></li>
													<li><a href="#">Lenovo</a></li>
													<li><a href="#">Microsoft</a></li>
													<li><a href="#">Asus</a></li>
													<li><a href="#">Adapters</a></li>
													<li><a href="#">Batteries</a></li>
													<li><a href="#">Cooling Pads</a></li>
												</ul>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-4">
												<ul>
													<li><a href="#">Routers &amp; Modems</a></li>
													<li><a href="#">CPUs, Processors</a></li>
													<li><a href="#">PC Gaming Store</a></li>
													<li><a href="#">Graphics Cards</a></li>
													<li><a href="#">Components</a></li>
													<li><a href="#">Webcam</a></li>
													<li><a href="#">Memory (RAM)</a></li>
													<li><a href="#">Motherboards</a></li>
													<li><a href="#">Keyboards</a></li>
													<li><a href="#">Headphones</a></li>
												</ul>
											</div>
											<div class="dropdown-banner-holder"> <a href="#"><img alt=""
														src="assets/images/banners/banner-side.png" /></a> </div>
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->
								</ul>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-paper-plane"></i>Kids and Babies</a>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-futbol-o"></i>Sports</a>
								<!-- ================================== MEGAMENU VERTICAL ================================== -->
								<!-- /.dropdown-menu -->
								<!-- ================================== MEGAMENU VERTICAL ================================== -->
							</li>
							<!-- /.menu-item -->

							<li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
										class="icon fa fa-envira"></i>Home and Garden</a>
								<!-- /.dropdown-menu -->
							</li>
							<!-- /.menu-item -->

						</ul>
						<!-- /.nav -->
					</nav>
					<!-- /.megamenu-horizontal -->
				</div>
				<!-- /.side-menu -->
				<!-- ================================== TOP NAVIGATION : END ================================== -->
				<div class="sidebar-module-container">
					<div class="sidebar-filter">
						<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
						<div class="sidebar-widget wow fadeInUp">
							<h3 class="section-title">shop by</h3>
							<div class="widget-header">
								<h4 class="widget-title">Category</h4>
							</div>
							<div class="sidebar-widget-body">
								<div class="accordion">
									@php
										$parent_categories = App\Models\Category::whereNull('parent_id')->get();
									@endphp
									@foreach ($parent_categories as $parent_category)
										<div class="accordion-group">
											<div class="accordion-heading"> <a href="#collapseOne{{ $parent_category->id }}" data-toggle="collapse"
													class="accordion-toggle collapsed">
													{{ $parent_category->category_name_eng }} </a> </div>
											<!-- /.accordion-heading -->
											<div class="accordion-body collapse" id="collapseOne{{ $parent_category->id }}" style="height: 0px;">
												<div class="accordion-inner">

													@php
														$child_categories = App\Models\Category::where('parent_id', $parent_category->id)->get();
													@endphp

													@foreach ($child_categories as $child_category)
														<ul>
															<li><a href="#">{{ $child_category->category_name_eng }}</a></li>
														</ul>
													@endforeach
												</div>
												<!-- /.accordion-inner -->
											</div>
											<!-- /.accordion-body -->
										</div>
									@endforeach
									<!-- /.accordion-group -->

								</div>
								<!-- /.accordion -->
							</div>
							<!-- /.sidebar-widget-body -->
						</div>
						<!-- /.sidebar-widget -->
						<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

						<!-- ============================================== PRICE SILDER============================================== -->
						<div class="sidebar-widget wow fadeInUp">
							<div class="widget-header">
								<h4 class="widget-title">Price Slider</h4>
							</div>
							<div class="sidebar-widget-body m-t-10">
								{{-- <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span
											class="pull-right">$800.00</span> </span>
									<input type="text" id="min_price" name="min_price" style="border:0; color:#666666; font-weight:bold;text-align:center;">
									<input type="text" id="max_price" class="price-slider" name="max_price" value="">
								</div> --}}
								<!-- /.price-range-holder -->
								<a href="#" class="lnk btn btn-primary">Show Now</a>
							</div>
							<!-- /.sidebar-widget-body -->
						</div>
						<!-- /.sidebar-widget -->
						<!-- ============================================== PRICE SILDER : END ============================================== -->
						<!-- ============================================== MANUFACTURES============================================== -->
						<div class="sidebar-widget wow fadeInUp">
							<div class="widget-header">
								<h4 class="widget-title">Manufactures</h4>
							</div>
							<div class="sidebar-widget-body">
								<ul class="list">
									<li><a href="#">Forever 18</a></li>
									<li><a href="#">Nike</a></li>
									<li><a href="#">Dolce & Gabbana</a></li>
									<li><a href="#">Alluare</a></li>
									<li><a href="#">Chanel</a></li>
									<li><a href="#">Other Brand</a></li>
								</ul>
								<!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
							</div>
							<!-- /.sidebar-widget-body -->
						</div>
						<!-- /.sidebar-widget -->
						<!-- ============================================== MANUFACTURES: END ============================================== -->
						<!-- ============================================== COLOR============================================== -->
						{{-- <div class="sidebar-widget wow fadeInUp">
							<div class="widget-header">
								<h4 class="widget-title">Colors</h4>
							</div>
							@php
                                $category = App\Models\Category::get('id');
								$products = App\Models\Product::with('attributevalue')
								    ->where('status', 1)
								    ->where('category_id', $category->id)
								    ->get();
							@endphp
							<div class="sidebar-widget-body">

								@foreach ($products as $products_attribute)
									<input type="checkbox"><a href="#">{{ $products_attribute->attributevalue->first()->attr_value_eng }}
									</a>
								@endforeach

							</div>
							<!-- /.sidebar-widget-body -->
						</div> --}}
						<!-- /.sidebar-widget -->
						<!-- ============================================== COLOR: END ============================================== -->
						<!-- ============================================== COMPARE============================================== -->
						<div class="sidebar-widget wow fadeInUp outer-top-vs">
							<h3 class="section-title">Brands</h3>
							<div class="sidebar-widget-body">
								<div class="compare-report">
									<ul>
										{{-- @foreach ($product_brands as $brand)
											<li style="display: flex "><input type="checkbox" value={{ $brand->id }}name="brand[]" id="brand">
												<h6>{{ $brand->brand_name_eng }}</h6>
											</li>
										@endforeach --}}
									</ul>
								</div>
								<!-- /.compare-report -->
							</div>
							<!-- /.sidebar-widget-body -->
						</div>
						<div class="sidebar-widget wow fadeInUp outer-top-vs">
							<h3 class="section-title">Compare products</h3>
							<div class="sidebar-widget-body">
								<div class="compare-report">
									<p>You have no <span>item(s)</span> to compare</p>
								</div>
								<!-- /.compare-report -->
							</div>
							<!-- /.sidebar-widget-body -->
						</div>
						<!-- /.sidebar-widget -->
						<!-- ============================================== COMPARE: END ============================================== -->
						<!-- ============================================== PRODUCT TAGS ============================================== -->
						<div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
							<h3 class="section-title">Product tags</h3>
							<div class="sidebar-widget-body outer-top-xs">
								<div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a
										class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone"
										href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a>
									<a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants"
										href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a
										class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose"
										href="category.html">Rose</a>
								</div>
								<!-- /.tag-list -->
							</div>
							<!-- /.sidebar-widget-body -->
						</div>
						<!-- /.sidebar-widget -->

					</div>
					<!-- /.sidebar-filter -->
				</div>
				<!-- /.sidebar-module-container -->
			</div>
			<!-- /.sidebar -->
			<div class='col-md-9'>
				<!-- ========================================== SECTION – HERO ========================================= -->

				<div id="category" class="category-carousel hidden-xs">
					<div class="item">
						<div class="image"> <img src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
								class="img-responsive"> </div>
						<div class="container-fluid">
							<div class="caption vertical-top text-left">
								<div class="big-text"> Big Sale </div>
								<div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
								<div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
							</div>
							<!-- /.caption -->
						</div>
						<!-- /.container-fluid -->
					</div>
				</div>

				<h5>Showing <strong>{{ count($products) }}</strong> results for <strong>{{ $SearchProduct }}</strong> all categories
				</h5>
				<div class="clearfix filters-container m-t-10">
					<div class="row">
						<div class="col col-sm-6 col-md-2">
							<div class="filter-tabs">
								<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
									<li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
									</li>
									<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
								</ul>
							</div>
							<!-- /.filter-tabs -->
						</div>
						<!-- /.col -->

						{{-- @php
							
							if (Request::get('sort') == 'price_asc') {
							    $products = App\Models\Product::where('status', 1)
							        ->where('category_id', $category->id)
							        ->orderBy('discount_price', 'ASC')
							        ->get();
							} elseif (Request::get('sort') == 'price_desc') {
							    $products = App\Models\Product::where('status', 1)
							        ->where('category_id', $category->id)
							        ->orderBy('discount_price', 'DESC')
							        ->get();
							} elseif (Request::get('sort') == 'newest') {
							    $products = App\Models\Product::where('status', 1)
							        ->where('category_id', $category->id)
							        ->orderBy('created_at', 'DESC')
							        ->get();
							} else {
							    $products = App\Models\Product::where('status', 1)
							        ->where('category_id', $category->id)
							        ->get();
							}
							
						@endphp --}}
						<div class="col col-sm-12 col-md-6">
							<div class="col col-sm-3 col-md-6 no-padding">
								<div class="lbl-cnt"> <span class="lbl">Sort by</span>
									<div class="fld inline">
										<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
											<button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Relevance <span
													class="caret"></span> </button>
											<ul role="menu" class="dropdown-menu">
												<li role="presentation"><a href="{{ URL::current() . '?sort=price_asc' }}">Price: Low to High</a></li>
												<li role="presentation"><a href="{{ URL::current() . '?sort=price_desc' }}">Price: High to Low</a></li>
												<li role="presentation"><a href="{{ URL::current() . '?sort=newest' }}">Newest</a></li>
											</ul>
										</div>
									</div>
									<!-- /.fld -->
								</div>
								<!-- /.lbl-cnt -->
							</div>
							<!-- /.col -->
							<div class="col col-sm-3 col-md-6 no-padding">
								<div class="lbl-cnt"> <span class="lbl">Show</span>
									<div class="fld inline">
										<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
											<button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span>
											</button>
											<ul role="menu" class="dropdown-menu">
												<li role="presentation"><a href="#">1</a></li>
												<li role="presentation"><a href="#">2</a></li>
												<li role="presentation"><a href="#">3</a></li>
												<li role="presentation"><a href="#">4</a></li>
												<li role="presentation"><a href="#">5</a></li>
												<li role="presentation"><a href="#">6</a></li>
												<li role="presentation"><a href="#">7</a></li>
												<li role="presentation"><a href="#">8</a></li>
												<li role="presentation"><a href="#">9</a></li>
												<li role="presentation"><a href="#">10</a></li>
											</ul>
										</div>
									</div>
									<!-- /.fld -->
								</div>
								<!-- /.lbl-cnt -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.col -->
						<div class="col col-sm-6 col-md-4 text-right">
							<div class="pagination-container">
								<ul class="list-inline list-unstyled">
									<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul>
								<!-- /.list-inline -->
							</div>
							<!-- /.pagination-container -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<div class="search-result-container ">
					<div id="myTabContent" class="tab-content category-list">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product">
								<div class="row">

									@forelse ($products as $product)
										<div class="col-sm-6 col-md-4 wow fadeInUp">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image"> <a href="{{ url('product/detail/' . $product->id) }}"><img
																	src="{{ asset($product->thumb_image) }}" alt=""></a> </div>
														<!-- /.image -->

														<div class="tag new"><span>new</span></div>
													</div>
													<!-- /.product-image -->

													<div class="product-info text-left">
														<h3 class="name"><a href="detail.html">
																@if (session()->get('language') == 'hindi')
																	{{ $product->product_name_hindi }}
																@else
																	{{ $product->product_name_eng }}
																@endif
															</a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>
														<div class="product-price"> <span class="price"> ${{ $product->discount_price }}
															</span>
															<span class="price-before-discount">$ 800</span>
														</div>
														<!-- /.product-price -->

													</div>
													<!-- /.product-info -->
													<div class="cart clearfix animate-effect">
														<div class="action">
															<ul class="list-unstyled">
																<li class="add-cart-button btn-group">
																	<button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
																			class="fa fa-shopping-cart"></i> </button>
																	<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
																</li>
																<li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
																			class="icon fa fa-heart"></i> </a> </li>
																<li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
																			class="fa fa-signal"></i> </a> </li>
															</ul>
														</div>
														<!-- /.action -->
													</div>
													<!-- /.cart -->
												</div>
												<!-- /.product -->

											</div>
											<!-- /.products -->
										</div>

									@empty
										<h4 class="text-center text-danger">No product found...</h4>
									@endforelse
									<!-- /.item -->

								</div>
								<!-- /.row -->
							</div>
							<!-- /.category-product -->

						</div>
						<!-- /.tab-pane -->
						<!-- /.PRODUCT GRID VIEW START -->

						<!-- /.PRODUCT LIST VIEW START -->

						<div class="tab-pane" id="list-container">
							<div class="category-product">

								@forelse ($products as $product)
									<div class="category-product-inner wow fadeInUp">
										<div class="products">
											<div class="product-list product">
												<div class="row product-list-row">
													<div class="col col-sm-4 col-lg-4">
														<div class="product-image">
															<div class="image"><a href="{{ url('product/detail/' . $product->id) }}"><img
																		src="{{ asset($product->thumb_image) }}" alt="image"></a></div>
														</div>
														<!-- /.product-image -->
													</div>
													<!-- /.col -->
													<div class="col col-sm-8 col-lg-8">
														<div class="product-info">
															<h3 class="name"><a href="{{ url('product/detail/' . $product->id) }}">

																	@if (session()->get('language') == 'hindi')
																		{{ $product->product_name_hindi }}
																	@else
																		{{ $product->product_name_eng }}
																	@endif

																</a></h3>
															<div class="rating rateit-small"></div>
															<div class="product-price"> <span class="price"> $450.99 </span> <span
																	class="price-before-discount">$ 800</span> </div>
															<!-- /.product-price -->
															<div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim
																risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan
																eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
															<div class="cart clearfix animate-effect">
																<div class="action">
																	<ul class="list-unstyled">
																		<li class="add-cart-button btn-group">
																			<button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i
																					class="fa fa-shopping-cart"></i> </button>
																			<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
																		</li>
																		<li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i
																					class="icon fa fa-heart"></i> </a> </li>
																		<li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i
																					class="fa fa-signal"></i> </a> </li>
																	</ul>
																</div>
																<!-- /.action -->
															</div>
															<!-- /.cart -->

														</div>
														<!-- /.product-info -->
													</div>
													<!-- /.col -->
												</div>
												<!-- /.product-list-row -->
												<div class="tag new"><span>new</span></div>
											</div>
											<!-- /.product-list -->
										</div>
										<!-- /.products -->
									</div>
									<!-- /.category-product-inner -->
								@empty
									<h4 class="text-danger">No product found...</h4>
								@endforelse
							</div>
							<!-- /.category-product -->
						</div>
						<!-- /.tab-pane #list-container -->
					</div>
					<!-- /.tab-content -->
					<div class="clearfix filters-container">
						<div class="text-right">
							<div class="pagination-container">
								<ul class="list-inline list-unstyled">
									<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul>
								<!-- /.list-inline -->
							</div>
							<!-- /.pagination-container -->
						</div>
						<!-- /.text-right -->

					</div>
					<!-- /.filters-container -->

				</div>
				<!-- /.search-result-container -->

			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<!-- /.logo-slider -->

	</div>
	<!-- /.container -->

</div>
<!-- /.body-content -->
@endsection
