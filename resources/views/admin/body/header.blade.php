<div class="header-part-right">
	<!-- Full screen toggle -->
	<i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

	<!-- User avatar dropdown -->
	<div class="dropdown">
		<div class="user col align-self-end">
			<img src="{{ asset('backend/assets/images/faces/1.jpg') }}" id="userDropdown" alt="" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<div class="dropdown-header">
					<i class="i-Lock-User mr-1"></i>
					{{-- {{ auth()->user()->name }} --}}
				</div>
				<a class="dropdown-item">Account settings</a>
				<a class="dropdown-item" href="{{ route('admin.logout') }}">Log out</a>
			</div>
		</div>
	</div>
</div>
