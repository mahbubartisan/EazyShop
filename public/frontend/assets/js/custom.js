
	function get_filter(class_name) {
		let filter = [];
		$('.' + class_name + ':checked').each(function() {
			filter.push($(this).val());
		});

		return filter;
	}

