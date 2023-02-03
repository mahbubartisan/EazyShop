<!DOCTYPE html>
<html lang="en" dir="">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Admin Dashboard</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/themes/lite-purple.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/plugins/datatables.min.css') }}" />

	<!--Font Awesome CSS-->
	<link rel="stylesheet" href="{{ asset('backend/assets/fonts/font-awesome/css/font-awesome.min.css') }}" />

	<!--Select2 CSS-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="text-left">
	<div class="app-admin-wrap layout-sidebar-large">
		<div class="main-header">
			<div class="logo">
				<h1 class="text-success text-center">Eagydel</h1>
			</div>
			<div class="menu-toggle">
				<div></div>
				<div></div>
				<div></div>
			</div>

			<div style="margin: auto"></div>
			<!-- ============ Header Start ============= -->
			@include('admin.body.header')
			<!-- ============ Header End ============= -->
		</div>

		<!-- =============== Left Side Start ================-->
		@include('admin.body.sidenav')
		<!-- =============== Left side End ================-->

		<div class="main-content-wrap sidenav-open d-flex flex-column">
			<!-- ============ Body Content Start ============= -->
			@yield('content')
			<!-- ============ Body Content End ============= -->

			<!-- ============ Footer Start ============= -->
			{{-- @include('admin.body.footer') --}}
			<!-- ============ Footer End ============= -->
		</div>
	</div>

	<script src="{{ asset('backend/assets/js/plugins/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/script.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/sidebar.large.script.min.js') }}"></script>
	{{-- <script src="{{ asset('backend/assets/js/plugins/echarts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/echart.options.min.js') }}"></script> --}}
	<script src="{{ asset('backend/assets/js/scripts/dashboard.v1.script.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/datatables.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/datatables.script.min.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{ asset('backend/assets/js/plugins/apexcharts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/apexcharts.dataseries.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/apexChart.script.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/plugins/echarts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/scripts/echarts.script.min.js') }}"></script>
	<!--Select2 Script-->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!--CK Editor Script-->
	<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
	<script src="{{ asset('backend/assets/js/scripts/editor.js') }}"></script>

	<script type="text/javascript">
		//Single Image Preview Start

		function preview() {

			showImage.src = URL.createObjectURL(event.target.files[0]);
		}

		//Single Image Preview End

		//Multi Images Preview Start

		$(document).ready(function() {
			$('#images').change(function() {
				$("#multiImages").html('');
				for (var i = 0; i < $(this)[0].files.length; i++) {
					$("#multiImages").append('<img src="' + window.URL.createObjectURL(this.files[i]) +
						'" width="100px" height="100px"/>');
				}
			});
		});
		//Multi Images Preview End
	</script>

</body>

</html>