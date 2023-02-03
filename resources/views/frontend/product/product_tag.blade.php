@php

// $product = App\Models\Product::with('tags')->get();

$tags = App\Models\Tag::all();

// dd($product_tags);

@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">
			@if (session()->get('language') == 'hindi')

				@foreach ($tags as $tag)
					<a class="item" title="{{ $tag->tag_hindi }}" href="{{ url('product/' . $tag->id) }}">{{ $tag->tag_eng }}</a>
				@endforeach
			@else
				@foreach ($tags as $tag)
					<a class="item" title="{{ $tag->tag_eng }}" href="{{ url('product/' . $tag->id) }}">{{ $tag->tag_eng }}</a>
				@endforeach
			@endif

			<!-- /.tag-list -->
		</div>
		<!-- /.sidebar-widget-body -->
	</div>

</div>
