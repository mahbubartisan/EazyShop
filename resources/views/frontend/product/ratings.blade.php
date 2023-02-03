{{-- @php

$reviews = App\Models\Review::with('product')->where('product_id', $product->id)
    ->latest()
    ->get();

$avg_ratings = $reviews->avg('rating');

@endphp

<style>
	.checked {
		color: orange;
	}
</style>

@if ($avg_ratings == 0)
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
@elseif ($avg_ratings == 1 || $avg_ratings < 2)
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
@elseif ($avg_ratings == 2 || $avg_ratings < 3)
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
@elseif ($avg_ratings == 3 || $avg_ratings < 4)
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
@elseif ($avg_ratings == 4 || $avg_ratings < 5)
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star"></span>
@elseif ($avg_ratings == 5 || $avg_ratings < 5)
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
	<span class="fa fa-star checked"></span>
@endif --}}
