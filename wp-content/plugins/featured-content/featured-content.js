(function ($) {
	var saveButton, groups;

	function reIndexFeatured(event, ui) {
		var parent = ui.item.closest('ul'), changes = 0;

		parent.find('li').each(function (i) {
			var elem = $(this), mo, omo, i = parseInt(i, 10);
			
			mo = parseInt(elem.data('menu-order'), 10);
			omo = parseInt(elem.data('orig-menu-order'), 10);
			
			elem.data('menu-order', i).find('.item-type').text(i);
			
			if (i !== omo) {
				elem.addClass('order-changed');
				changes += 1;				
			} else {
				elem.removeClass('order-changed');
			}
		}).end().data('changed', changes > 0);

		saveButton[(changes > 0 ? 'remove' : 'add') + 'Class']('button-disabled');
	}

	function saveOrder(e) {
		e && e.preventDefault();

		var changes = {}, items, group = $(this).closest('.featured-area-list').find('ul'), area;

		if (!group.data('changed')) {
			return;
		}

		area = group.data('featured-area');
		items = group.find('li');

		items.each(function () {
			var elem = $(this);
			if (elem.hasClass('order-changed')) {
				changes[elem.data('id')] = elem.data('menu-order');
			}
		});

		$.ajax({
			url: ajaxurl,
			type: 'post',
			data: {
				featured_area: area,
				action: 'save-order',
				changes: changes
			}
		}).done(function (response) {
			if (-1 === parseInt(response, 10)) {
				//console.log('failed');
			} else {
				$('#featured-area-list-' + area).replaceWith(response);
				bindEvents();
			}
		});
	}

	function bindEvents() {
		saveButton = $('.save-featured-order');
		groups = $('.feature-group');

		groups.sortable({stop: reIndexFeatured});
		groups.disableSelection();

		saveButton.click(saveOrder);	
	}

	// this can probably use event delegation, so won't need re-bind - will hook it up later
	$(function ($) {
		bindEvents();
	});
}(jQuery));