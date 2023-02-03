@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<div class="side-content-wrap">
	<div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
		<ul class="navigation-left">

			<li class="nav-item {{ $route == 'dashboard' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ url('/dashboard') }}">
					<i class="nav-icon i-Bar-Chart"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/types' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.type') }}">
					<i class="nav-icon i-Structure"></i>
					<span class="nav-text">Group</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/brands' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.brand') }}">
					<i class="nav-icon i-Book"></i>
					<span class="nav-text"> Brands</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/categories' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.category') }}">
					<i class="nav-icon i-Network-Window"></i>
					<span class="nav-text">Categories</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/products' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.product') }}">
					<i class="nav-icon i-Sport-Mode"></i>
					<span class="nav-text">Products</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/attributes' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.attribute') }}">
					<i class="nav-icon i-Check"></i>
					<span class="nav-text">Attributes</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/filters' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.filter') }}">
					<i class="nav-icon i-Filter"></i>
					<span class="nav-text">Filters</span>
				</a>
			</li>
			<li class="nav-item {{ $prefix == '/tags' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.tag') }}">
					<i class="nav-icon i-Tag"></i>
					<span class="nav-text">Tags</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/sliders' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.slider') }}">
					<i class="nav-icon i-Arrow-Right"></i>
					<span class="nav-text">Sliders</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/coupons' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.coupon') }}">
					<i class="nav-icon i-Gift-Box"></i>
					<span class="nav-text">Coupons</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/shippings' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.shipping') }}">
					<i class="nav-icon i-Jeep"></i>
					<span class="nav-text">Shippings</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/orders' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.order') }}">
					<i class="nav-icon i-Checkout-Basket"></i>
					<span class="nav-text">Orders</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/reports' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.report') }}">
					<i class="nav-icon i-Receipt-4"></i>
					<span class="nav-text">Report</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/reviews' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.review') }}">
					<i class="nav-icon i-Teacher"></i>
					<span class="nav-text">Review</span>
				</a>
			</li>

			<li class="nav-item {{ $prefix == '/settings' ? 'active' : '' }}">
				<a class="nav-item-hold" href="{{ route('show.setting') }}">
					<i class="nav-icon i-Gear"></i>
					<span class="nav-text">Settings</span>
				</a>
			</li>

		</ul>
	</div>

	<div class="sidebar-left-secondary" data-perfect-scrollbar data-suppress-scroll-x="true">
		<!-- Submenu Dashboards -->
		<ul class="childNav" data-parent="sessions">
			<li class="nav-item">
				<a href="signin.html">
					<i class="nav-icon i-Checked-User"></i>
					<span class="item-name">Sign in</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="signup.html">
					<i class="nav-icon i-Add-User"></i>
					<span class="item-name">Sign up</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="forgot.html">
					<i class="nav-icon i-Find-User"></i>
					<span class="item-name">Forgot</span>
				</a>
			</li>
		</ul>
		<ul class="childNav" data-parent="others">
			<li class="nav-item">
				<a href="not.found.html">
					<i class="nav-icon i-Error-404-Window"></i>
					<span class="item-name">Not Found</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="user.profile.html">
					<i class="nav-icon i-Male"></i>
					<span class="item-name">User Profile</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="blank.html">
					<i class="nav-icon i-File-Horizontal"></i>
					<span class="item-name">Blank Page</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="sidebar-overlay"></div>
</div>
