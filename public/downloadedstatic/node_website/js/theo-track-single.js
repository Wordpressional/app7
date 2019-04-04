/* global theo_track */
/* global theo */
/* global jQuery */
jQuery(document).ready(function () {
	theo_track(2, theo.post_id);
	jQuery('[data-theo-event]').on('click', function () {
		var link = jQuery(this);
		var event_type = link.attr('data-theo-event');
		event_type = parseInt(event_type);
		if (event_type > 2) {
			theo_track(event_type, theo.post_id);
		}
	});
});