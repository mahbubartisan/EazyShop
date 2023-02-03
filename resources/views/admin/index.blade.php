@extends('admin.layouts.app')

@section('content')
	@php
		$sales = App\Models\Order::sum('amount');
		$orders = App\Models\Order::count('id');
		$users = App\Models\Order::groupBy('user_id')
		    ->selectRaw('user_id')
		    ->pluck('user_id')
		    ->count();
		$users = App\Models\Order::groupBy('user_id')
		    ->selectRaw('user_id')
		    ->pluck('user_id')
		    ->count();
		$products = App\Models\Product::select('id') ->count();
			
		
		$order_date = date('d F Y');
		$today_sales_amount = App\Models\Order::where('order_date', $order_date)->sum('amount');
		$today_orders = App\Models\Order::where('order_date', $order_date)->count('id');
		
		//$weekly_revenue = App\Models\Order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('amount');
		
		// Customer Charts Stars
		
		$current_month_users = App\Models\User::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->month)
		    ->count();
		$before_1_month_users = App\Models\User::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(1))
		    ->count();
		$before_2_month_users = App\Models\User::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(2))
		    ->count();
		$before_3_month_users = App\Models\User::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(3))
		    ->count();
		$before_4_month_users = App\Models\User::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(4))
		    ->count();
		
		$month_wise_users = [$current_month_users, $before_1_month_users, $before_2_month_users, $before_3_month_users, $before_4_month_users];
		
		$month = [];
		$count = 0;
		
		while ($count <= 4) {
		    $month[] = date('M Y', strtotime('-' . $count . 'month'));
		    $count++;
		}
		
		// Customer Charts End
		
		$current_month_orders = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->month)
		    ->count();
		$before_1_month_orders = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(1))
		    ->count();
		$before_2_month_orders = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(2))
		    ->count();
		$before_3_month_orders = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(3))
		    ->count();
		$before_4_month_orders = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(4))
		    ->count();
		
		$month_wise_orders = [$current_month_orders, $before_1_month_orders, $before_2_month_orders, $before_3_month_orders, $before_4_month_orders];
		
		$months = [];
		$count = 0;
		
		while ($count <= 5) {
		    $months[] = date('M', strtotime('-' . $count . 'month'));
		    $count++;
		}
		
		$date = now();
		$current_monthName = $date->format('F');
		
		$date = now()->subMonth(1);
		$before_1_monthName = $date->format('F');
		$date = now()->subMonth(2);
		$before_2_monthName = $date->format('F');
		$date = now()->subMonth(3);
		$before_3_monthName = $date->format('F');
		$date = now()->subMonth(4);
		$before_4_monthName = $date->format('F');
		
		$current_month_revenue = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->month)
		    ->sum('amount');
		$before_1_month_revenue = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(1))
		    ->sum('amount');
		$before_2_month_revenue = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(2))
		    ->sum('amount');
		$before_3_month_revenue = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(3))
		    ->sum('amount');
		$before_4_month_revenue = App\Models\Order::whereYear('created_at', now()->year)
		    ->whereMonth('created_at', now()->subMonth(4))
		    ->sum('amount');
		
		
		$year = [];
		$count = 0;
		
		while ($count <= 4) {
		    $year[] = date('Y', strtotime('-' . $count . 'year'));
		    $count++;
		}
		
		$current_year_orders = App\Models\Order::whereYear('created_at', now()->year)->count();
		$before_1_year_orders = App\Models\Order::whereYear('created_at', now()->subYear(1))->count();
		$before_2_year_orders = App\Models\Order::whereYear('created_at', now()->subYear(2))->count();
		$before_3_year_orders = App\Models\Order::whereYear('created_at', now()->subYear(3))->count();
		$before_4_year_orders = App\Models\Order::whereYear('created_at', now()->subYear(4))->count();
		
		$yearly_orders = [$current_year_orders, $before_1_year_orders, $before_2_year_orders, $before_3_year_orders, $before_4_year_orders];
		
		$date = now();
		$current_day = $date->format('D');
		$date = now()->subDay(1);
		$before_1_day = $date->format('D');
		$date = now()->subDay(2);
		$before_2_day = $date->format('D');
		$date = now()->subDay(3);
		$before_3_day = $date->format('D');
		$date = now()->subDay(4);
		$before_4_day = $date->format('D');
		$date = now()->subDay(5);
		$before_5_day = $date->format('D');
		$date = now()->subDay(6);
		$before_6_day = $date->format('D');
	
		$current_day_revenue = App\Models\Order::whereDay('created_at', now()->day)->sum('amount');
		$before_1_day_revenue = App\Models\Order::whereDay('created_at', now()->subDay(1))->sum('amount');
		$before_2_day_revenue = App\Models\Order::whereDay('created_at', now()->subDay(2))->sum('amount');
		$before_3_day_revenue = App\Models\Order::whereDay('created_at', now()->subDay(3))->sum('amount');
		$before_4_day_revenue = App\Models\Order::whereDay('created_at', now()->subDay(4))->sum('amount');
		$before_5_day_revenue = App\Models\Order::whereDay('created_at', now()->subDay(5))->sum('amount');
		$before_6_day_revenue = App\Models\Order::whereDay('created_at', now()->subDay(6))->sum('amount');
		// echo '<pre>';
		// print_r($current_revenue);
		// die();
	@endphp

	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Dashboard</h1>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<div class="row">
			<!-- ICON BG-->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Add-User"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">Customers</p>
							<p class="mb-2 text-primary text-24 line-height-1">{{ $users }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Sport-Mode"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">TotalProducts</p>
							<p class="mb-2 text-primary text-24 line-height-1">{{ $products }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Dollar"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">TodayRevenue</p>
							<p class="mb-2 text-primary text-24 line-height-1">${{ $today_sales_amount }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Add-Cart"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">TodayOrder</p>
							<p class="mb-2 text-primary text-24 line-height-1">{{ $today_orders }}</p>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Money-2"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">WeeklyRevenue</p>
							<p class="mb-2 text-primary text-24 line-height-1">${{ $weekly_revenue }}</p>
						</div>
					</div>
				</div>
			</div> --}}

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Car-Items"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">TotalOrders</p>
							<p class="mb-2 text-primary text-24 line-height-1">{{ $orders }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="mb-4 card card-icon-bg card-icon-bg-primary o-hidden">
					<div class="text-center card-body"><i class="i-Coins"></i>
						<div class="content">
							<p class="mt-2 mb-0 text-muted">TotalRevenue</p>
							<p class="mb-2 text-primary text-24 line-height-1">${{ $sales }}</p>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-7 col-sm-12">
				<div class="mb-4 card">
					<div class="card-body">
						<div class="card-title">Last Six Month Orders</div>
						<div id="monthSales" style="height: 300px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-sm-12">
				<div class="mb-4 card">
					<div class="card-body">
						<div class="card-title">Revenue by Month</div>
						<div id="revenueByMonth" style="height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-sm-12">
				<div class="mb-4 card">
					<div class="card-body">
						<div class="card-title">Last Five Years Order</div>
						<div id="yearSales" style="height: 300px;"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12">
				<div class="mb-4 card">
					<div class="card-body">
						<div class="card-title">Last 7 Days Revenue</div>
						<div id="revenueByDay" style="height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">

			{{-- <div class="col-lg-6 col-md-12">
				<div class="mb-4 card">
					<div class="card-body">
						<div class="card-title">Top Selling Products</div>
						<div class="mb-3 d-flex flex-column flex-sm-row align-items-sm-center"><img
								class="mb-3 rounded avatar-lg mb-sm-0 mr-sm-3"
								src="{{ asset('backend/assets/images/products/headphone-4.jpg') }}" alt="" />
							<div class="flex-grow-1">
								<h5><a href="#">Wireless Headphone E23</a></h5>
								<p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<p class="m-0 text-small text-danger">$450
									<del class="text-muted">$500</del>
								</p>
							</div>
							<div>
								<button class="mt-3 mb-3 btn btn-outline-primary m-sm-0 btn-rounded btn-sm">
									View
									details
								</button>
							</div>
						</div>
						<div class="mb-3 d-flex flex-column flex-sm-row align-items-sm-center"><img
								class="mb-3 rounded avatar-lg mb-sm-0 mr-sm-3"
								src="{{ asset('backend/assets/images/products/headphone-2.jpg') }}" alt="" />
							<div class="flex-grow-1">
								<h5><a href="#">Wireless Headphone Y902</a></h5>
								<p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<p class="m-0 text-small text-danger">$550
									<del class="text-muted">$600</del>
								</p>
							</div>
							<div>
								<button class="mt-3 mb-3 btn btn-outline-primary m-sm-0 btn-sm btn-rounded">
									View
									details
								</button>
							</div>
						</div>
						<div class="mb-3 d-flex flex-column flex-sm-row align-items-sm-center"><img
								class="mb-3 rounded avatar-lg mb-sm-0 mr-sm-3"
								src="{{ asset('backend/assets/images/products/headphone-3.jpg') }}" alt="image" />
							<div class="flex-grow-1">
								<h5><a href="#">Wireless Headphone E09</a></h5>
								<p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<p class="m-0 text-small text-danger">$250
									<del class="text-muted">$300</del>
								</p>
							</div>
							<div>
								<button class="mt-3 mb-3 btn btn-outline-primary m-sm-0 btn-sm btn-rounded">
									View
									details
								</button>
							</div>
						</div>
						<div class="mb-3 d-flex flex-column flex-sm-row align-items-sm-center"><img
								class="mb-3 rounded avatar-lg mb-sm-0 mr-sm-3"
								src="{{ asset('backend/assets/images/products/headphone-4.jpg') }}" alt="" />
							<div class="flex-grow-1">
								<h5><a href="#">Wireless Headphone X89</a></h5>
								<p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
								<p class="m-0 text-small text-danger">$450
									<del class="text-muted">$500</del>
								</p>
							</div>
							<div>
								<button class="mt-3 mb-3 btn btn-outline-primary m-sm-0 btn-sm btn-rounded">
									View
									details
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="mb-4 card">
					<div class="p-0 card-body">
						<div class="p-3 m-0 card-title border-bottom d-flex align-items-center"><span>User activity</span><span
								class="flex-grow-1"></span><span class="badge badge-pill badge-warning">Updated daily</span></div>
						<div class="p-3 d-flex border-bottom justify-content-between">
							<div class="flex-grow-1"><span class="text-small text-muted">Pages / Visit</span>
								<h5 class="m-0">2065</h5>
							</div>
							<div class="flex-grow-1"><span class="text-small text-muted">New user</span>
								<h5 class="m-0">465</h5>
							</div>
							<div class="flex-grow-1"><span class="text-small text-muted">Last week</span>
								<h5 class="m-0">23456</h5>
							</div>
						</div>
						<div class="p-3 d-flex border-bottom justify-content-between">
							<div class="flex-grow-1"><span class="text-small text-muted">Pages / Visit</span>
								<h5 class="m-0">1829</h5>
							</div>
							<div class="flex-grow-1"><span class="text-small text-muted">New user</span>
								<h5 class="m-0">735</h5>
							</div>
							<div class="flex-grow-1"><span class="text-small text-muted">Last week</span>
								<h5 class="m-0">92565</h5>
							</div>
						</div>
						<div class="p-3 d-flex justify-content-between">
							<div class="flex-grow-1"><span class="text-small text-muted">Pages / Visit</span>
								<h5 class="m-0">3165</h5>
							</div>
							<div class="flex-grow-1"><span class="text-small text-muted">New user</span>
								<h5 class="m-0">165</h5>
							</div>
							<div class="flex-grow-1"><span class="text-small text-muted">Last week</span>
								<h5 class="m-0">32165</h5>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
			<div class="col-md-12">
				<div class="mb-4 card">
					<div class="p-0 card-body">
						<h5 class="p-3 m-0 card-title">Customers By Month</h5>

						<div id="basicLine-chart" style="height: 370px; width: 100%;"></div>
					</div>
				</div>
			</div>
		</div><!-- end of main-content -->
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script>
		// Line Chart For Last 6 Month Customer
		$(document).ready(function() {
			var options = {
				chart: {
					height: 250,
					type: 'line',
					zoom: {
						enabled: false
					},
					toolbar: {
						show: true
					}
				},
				tooltip: {
					enabled: true,
					shared: true,
					followCursor: false,
					intersect: false,
					inverseOrder: false,
					custom: undefined,
					fillSeriesColor: false,
					theme: false
				},
				dataLabels: {
					enabled: false
				},
				stroke: {
					curve: 'smooth'
				},
				series: [{
					name: "Customers",
					data: @php echo json_encode($month_wise_users)@endphp
				}],
				grid: {
					row: {
						colors: ['#f3f3f3', 'transparent'],
						// takes an array which will be repeated on columns
						opacity: 0.5
					}
				},
				xaxis: {
					categories: @php echo json_encode($month)@endphp
				},
				yaxis: [{
					type: 'value',
					// name: 'Temperature',
					min: 0,
					max: 100,
					position: 'left',

				}],
			};
			var chart = new ApexCharts(document.querySelector("#basicLine-chart"), options);
			chart.render(); // line chart with Data Label


		});
	</script>

	<script>
		// Column Chart For Last 6 Month Orders
		$(document).ready(function() {
			var myChart = echarts.init(document.getElementById('monthSales'));

			// Specify the configuration items and data for the chart
			var option = {
				title: {
					text: ''
				},
				tooltip: {
					//formatter: "{c}",
					backgroundColor: 'rgba(0, 0, 0, .8)'
				},
				legend: {
					data: ['sales']
				},
				xAxis: {
					data: @php echo json_encode($months) @endphp
				},
				yAxis: [{
					type: 'value',
					// name: 'Temperature',
					min: 0,
					max: 100,
					position: 'left',

				}],
				series: [{
					//name: 'sales',
					type: 'bar',
					color: [

						'#6A67CE',

					],
					data: @php echo json_encode($month_wise_orders) @endphp
				}]
			};
			// Display the chart using the configuration items and data just specified.
			myChart.setOption(option);


			// Pie Chart For Monthly Revenue

			var myChart = echarts.init(document.getElementById('revenueByMonth'));
			option = {
				tooltip: {
					//trigger: 'item',
					formatter: "{d}%",
					backgroundColor: 'rgba(0, 0, 0, .8)'
				},
				series: [{
					type: 'pie',
					color: [
						'#3AB0FF',
						'#ED50F1',
						'#00AF91',
						'#3E64FF',
						'#9772FB'
					],

					data: [{
							value: @php echo json_encode($current_month_revenue) @endphp,
							name: @php echo json_encode($current_monthName) @endphp
						},
						{
							value: @php echo json_encode($before_1_month_revenue) @endphp,
							name: @php echo json_encode($before_1_monthName) @endphp
						},
						{
							value: @php echo json_encode($before_2_month_revenue) @endphp,
							name: @php echo json_encode($before_2_monthName) @endphp
						},
						{
							value: @php echo json_encode($before_3_month_revenue) @endphp,
							name: @php echo json_encode($before_3_monthName) @endphp
						},
						{
							value: @php echo json_encode($before_4_month_revenue) @endphp,
							name: @php echo json_encode($before_4_monthName) @endphp
						},

					],

				}]
			};
			// Display the chart using the configuration items and data just specified.
			myChart.setOption(option);


			// Column Chart For Yearly Orders

			var myChart = echarts.init(document.getElementById('yearSales'));

			var option = {
				title: {
					text: ''
				},
				tooltip: {
					//formatter: "{c}",
					backgroundColor: 'rgba(0, 0, 0, .8)'
				},
				legend: {
					data: ['sales']
				},
				xAxis: {
					data: @php echo json_encode($year) @endphp
				},
				yAxis: [{
					type: 'value',
					// name: 'Temperature',
					min: 0,
					max: 200,
					position: 'left',

				}],
				series: [{
					//name: 'sales',
					type: 'bar',
					color: [

						'#B1B2FF',

					],
					data: @php echo json_encode($yearly_orders) @endphp
				}]
			};
			// Display the chart using the configuration items and data just specified.
			myChart.setOption(option);


			var myChart = echarts.init(document.getElementById('revenueByDay'));
			option = {
				tooltip: {
					//trigger: 'item',
					formatter: "{d}%",
					backgroundColor: 'rgba(0, 0, 0, .8)'
				},
				series: [{
					type: 'pie',
					color: [
						'#FFB319',
						'#FA26A0',
						'#FF6701',
						'#7D5A5A',
						'#0078AA',
						'#3AB4F2',
						'#66BFBF'
					],

					data: [{
							value: @php echo json_encode($current_day_revenue) @endphp,
							name: @php echo json_encode($current_day) @endphp
						},
						{
							value: @php echo json_encode($before_1_day_revenue) @endphp,
							name: @php echo json_encode($before_1_day) @endphp
						},
						{
							value: @php echo json_encode($before_2_day_revenue) @endphp,
							name: @php echo json_encode($before_2_day) @endphp
						},
						{
							value: @php echo json_encode($before_3_day_revenue) @endphp,
							name: @php echo json_encode($before_3_day) @endphp
						},
						{
							value: @php echo json_encode($before_4_day_revenue) @endphp,
							name: @php echo json_encode($before_4_day) @endphp
						},
						{
							value: @php echo json_encode($before_5_day_revenue) @endphp,
							name: @php echo json_encode($before_5_day) @endphp
						},
						{
							value: @php echo json_encode($before_6_day_revenue) @endphp,
							name: @php echo json_encode($before_6_day) @endphp
						},

					],

				}]
			};
			// Display the chart using the configuration items and data just specified.
			myChart.setOption(option);
		});
	</script>
@endsection
