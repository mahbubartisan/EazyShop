@php
$setting = App\Models\Setting::first();
@endphp

<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
	<div class="top-bar animate-dropdown">
		<div class="container">
			<div class="header-top-inner">
				<div class="cnt-account">
					<ul class="list-unstyled">
						<li><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>
								@if (session()->get('language') == 'hindi')
								मेरा खाता
								@else
								My Account
								@endif
							</a></li>
						<li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
								@if (session()->get('language') == 'hindi')
								इच्छा-सूची
								@else
								Wishlist
								@endif
							</a></li>
						<li><a href="{{ route('my-cart') }}"><i class="icon fa fa-shopping-cart"></i>
								@if (session()->get('language') == 'hindi')
								मेरी गाड़ी
								@else
								My Cart
								@endif
							</a></li>
						<li><a href="#"><i class="icon fa fa-check"></i>
								@if (session()->get('language') == 'hindi')
								चेक आउट
								@else
								Checkout
								@endif
							</a></li>
						<li>
							@if (session()->get('language') == 'hindi')
							लॉग इन
							@else
							@auth
							<a href="{{ route('login') }}"><i class="icon fa fa-user"></i>
								{{ auth()->user()->name }}
							</a>
							@else
							<a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
								Login
							</a>
							@endauth
							@endif
						</li>
					</ul>
				</div>
				<!-- /.cnt-account -->

				<div class="cnt-block">
					<ul class="list-unstyled list-inline">
						<li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
								data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">USD</a></li>
								<li><a href="#">INR</a></li>
							</ul>
						</li>
						<li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
								data-toggle="dropdown"><span class="value">
									@if (session()->get('language') == 'hindi')
									हिन्दी
									@else
									English
									@endif
								</span><b class="caret"></b></a>
							<ul class="dropdown-menu">
								@if (session()->get('language') == 'hindi')
								<li><a href="{{ route('english.language') }}">English</a></li>
								@else
								<li><a href="{{ route('hindi.language') }}">हिन्दी</a></li>
								@endif
							</ul>
						</li>
					</ul>
					<!-- /.list-unstyled -->
				</div>
				<!-- /.cnt-cart -->
				<div class="clearfix"></div>
			</div>
			<!-- /.header-top-inner -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.header-top -->
	<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo"> <a href="{{ url('/') }}"> <img
								src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
					<!-- /.logo -->
					<!-- ============================================================= LOGO : END ============================================================= -->
				</div>
				<!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
					<!-- ============================================================= SEARCH AREA ============================================================= -->
					<div class="search-area">
						<form action="{{ route('search.product') }}" method="POST">
							@csrf
							<div class="control-group">
								<ul class="categories-filter animate-dropdown">
									<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
											href="category.html">Categories <b class="caret"></b></a>
										<ul class="dropdown-menu" role="menu">
											<li class="menu-header">Computer</li>
											<li role="presentation"><a role="menuitem" tabindex="-1"
													href="category.html">- Clothing</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1"
													href="category.html">- Electronics</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1"
													href="category.html">- Shoes</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1"
													href="category.html">- Watches</a></li>
										</ul>
									</li>
								</ul>
								<input name="search" id="search" onfocus="searchResultShow()"
									onblur="searchResultHide()" class="search-field" autocomplete="off"
									placeholder="Search here..." />
								<button type="submit" class="search-button"></button>
							</div>
						</form>
						<div id="searchResult"></div>
					</div>
					<!-- /.search-area -->
					<!-- ============================================================= SEARCH AREA : END ============================================================= -->
				</div>
				<!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">

					<!-- ============= SHOPPING CART DROPDOWN ================ -->

					<div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
							data-toggle="dropdown">
							<div class="items-cart-inner">
								<div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
								<div class="basket-item-count"><span class="count" id="cartQty"></span></div>
								<div class="total-price-basket"> <span class="lbl">cart -</span> <span
										class="total-price">
										<span class="sign">$</span><span class="value" id="subTotal"></span></span>
								</div>
							</div>
						</a>
						<ul class="dropdown-menu">
							<li>

								<div id="miniCart"></div>

								<div class="clearfix cart-total">
									<div class="pull-right"> <span class="text">Sub Total :</span>
										<span class='price' id="subTotal">$</span>
									</div>
									<div class="clearfix"></div>
									<a href="checkout.html"
										class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
								</div>
								<!-- /.cart-total-->

							</li>
						</ul>
						<!-- /.dropdown-menu-->
					</div>
					<!-- /.dropdown-cart -->

					<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
				</div>
				<!-- /.top-cart-row -->
			</div>
			<!-- /.row -->

		</div>
		<!-- /.container -->

	</div>
	<!-- /.main-header -->

	<!-- ============================================== NAVBAR ============================================== -->
	<div class="header-nav animate-dropdown">
		<div class="container">
			<div class="yamm navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
						class="navbar-toggle collapsed" type="button">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
						<span class="icon-bar"></span> </button>
				</div>
				<div class="nav-bg-class">
					<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
						<div class="nav-outer">
							<ul class="nav navbar-nav">
								<li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown"
										class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
								@php
								$types = App\Models\Type::latest()->get();
								@endphp

								@foreach ($types as $type)

								@if ($type->categories()->count() > 0)
								<li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
										class="dropdown-toggle" data-toggle="dropdown">{{ $type->type_eng }}</a>
									<ul class="container dropdown-menu">
										<li>
											<div class="yamm-content ">
												<div class="row">

													@php
													$parent_categories = App\Models\Category::whereNull('parent_id')
													->where('type_id', $type->id)
													->get();
													@endphp

													@foreach ($parent_categories as $parent_category)
													<div class="col-xs-12 col-sm-6 col-md-2 col-menu">

														<a
															href="{{ url('/' . $parent_category->types->type_slug . '/' . $parent_category->category_slug_eng) }}">

															<h2 class="title">{{ $parent_category->category_name_eng }}
															</h2>
														</a>

														@php
														$child_categories = App\Models\Category::where('parent_id',
														$parent_category->id)->get();
														@endphp

														@foreach ($child_categories as $child_category)
														<ul class="links">
															<li><a
																	href="{{ url('/' . $parent_category->types->type_slug . '/' . $parent_category->category_slug_eng . '/' . $child_category->category_slug_eng) }}">
																	{{ $child_category->category_name_eng }}</a></li>

														</ul>
														@endforeach
													</div>
													<!-- /.col -->
													@endforeach
												</div>
											</div>
										</li>
									</ul>
								</li>
								@else

								<li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
										class="dropdown-toggle" data-toggle="dropdown">{{ $type->type_eng }}</a>
								</li>

								@endif
								@endforeach
							</ul>
							<!-- /.navbar-nav -->
							<div class="clearfix"></div>
						</div>
						<!-- /.nav-outer -->
					</div>
					<!-- /.navbar-collapse -->

				</div>
				<!-- /.nav-bg-class -->
			</div>
			<!-- /.navbar-default -->
		</div>
		<!-- /.container-class -->

	</div>
	<!-- /.header-nav -->
	<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<style>
	.search-area {
		position: relative;
	}

	#searchResult {
		position: absolute;
		top: 100%;
		left: 0;
		width: 100%;
		background: #ffffff;
		z-index: 999;
	}
</style>
<script>
	function searchResultHide() {
		$('#searchResult').slideUp();
	}

	function searchResultShow() {
		$('#searchResult').slideDown();
	}
</script>