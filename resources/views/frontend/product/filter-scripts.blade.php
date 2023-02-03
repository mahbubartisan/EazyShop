@php
$filters = App\Models\Filter::with('filterValue')
->where('status', 1)
->get();
@endphp

<script type="text/javascript">
	$(document).ready(function() {
		$("#sort").on("change", function() {
			let sort = $('#sort').val();
			let url = $('#url').val();
			let brand = get_filter('brand');
			let price = get_filter('price');
			let attr_value = get_filter('attr_value');

			// alert(sort); return false;
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				method: "POST",
				url: url,
				data: {
					sort: sort,
					url: url,
					brand: brand,
					price: price,
					attr_value: attr_value
				},
				success: function(data) {
					$('.filter-product').html(data);
				},
				error: function() {
					alter('error');
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".brand").on("change", function() {
			let sort = $('#sort').val();
			let url = $('#url').val();
			let brand = get_filter('brand');
			let price = get_filter('price');
			let attr_value = get_filter('attr_value');

			// alert(brand); return false;
			$.ajax({
				method: "POST",
				url: url,
				data: {
					sort: sort,
					url: url,
					brand: brand,
					price: price,
					attr_value: attr_value
				},
				success: function(data) {
					$('.filter-product').html(data);
				},
				error: function() {
					alert('error');
				}
			});
		});
	});
</script>

<!-- Price Filter -->

<script type="text/javascript">
	$(document).ready(function() {
		$(".price").on("change", function() {
			let sort = $('#sort').val();
			let url = $('#url').val();
			let brand = get_filter('brand');
			let price = get_filter('price');
			let attr_value = get_filter('attr_value');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				method: "POST",
				url: url,
				data: {
					sort: sort,
					url: url,
					brand: brand,
					price: price,
					attr_value: attr_value
				},
				success: function(data) {
					$('.filter-product').html(data);
				},
				error: function() {
					alert('error');
				}
			});
		});



		// Attribute Filter


		$(".attr_value").on("change", function() {
			let sort = $('#sort').val();
			let url = $('#url').val();
			let brand = get_filter('brand');
			let price = get_filter('price');
			let attr_value = get_filter('attr_value');
			// console.log(attr_value);

			$.ajax({
				method: "POST",
				url: url,
				data: {
					sort: sort,
					url: url,
					brand: brand,
					price: price,
					attr_value: attr_value
				},
				success: function(data) {
					$('.filter-product').html(data);
				},
				error: function() {
					alert('error');
				}
			});
		});
	

	// Dynamic Product Filter

		@foreach ($filters as $filter)

			$(".{{ $filter['filter_column'] }}").on("change", function() {
				let sort = $('#sort').val();
				let url = $('#url').val();
				let brand = get_filter('brand');
				let price = get_filter('price');
				let attr_value = get_filter('attr_value');

				@foreach ($filters as $product_filter)

					let {{ $product_filter['filter_column'] }} = get_filter(
						'{{ $product_filter['filter_column'] }}');
					//alert({{ $product_filter['filter_column'] }});
				@endforeach
				$.ajax({
					method: "POST",
					url: url,
					data: {
						@foreach ($filters as $product_filter)
							{{ $product_filter['filter_column'] }}: {{ $product_filter['filter_column'] }},
						@endforeach

						sort: sort,
						url: url,
						brand: brand,
						price: price,
						attr_value: attr_value
					},
					success: function(data) {
						$('.filter-product').html(data);
					},
					error: function() {
						alert('error');
					}
				});
			});
		@endforeach
	});
</script>