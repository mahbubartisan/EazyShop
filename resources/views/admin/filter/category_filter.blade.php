@php

$filters = App\Models\Filter::with('filterValue')
    ->where('status', 1)
    ->get();

	if(isset($product['category_id'])){

		$category_id = $product['category_id'];
	}
@endphp
@foreach ($filters as $filter)

	@if (isset($category_id))
		@php
			$filterAvailable = App\Models\Filter::filterAvailable($filter->id, $category_id);
			
		@endphp
		@if ($filterAvailable == 'Yes')
			<div class="form-group">
				<label for="{{ $filter->filter_name }}">Select {{ $filter->filter_name }}</label>
				<select class="form-control" id="{{ $filter->filter_column }}" name="{{ $filter->filter_column }}">
					<option>Select...</option>
					@foreach ($filter['filterValue'] as $filter_value)
					
						<option value="{{ $filter_value->filter_value }}" 
							@if (!empty($product[$filter['filter_column']]) && $filter_value['filter_value']
							== $product[$filter['filter_column']]) selected =""
								
							@endif>{{ ucwords($filter_value->filter_value) }}</option>
					@endforeach
				</select>
			</div>
		@endif
	@endif
@endforeach
