/* global Fingerprint2 */
/* global $ */
/* global console */
/* global theo */

/* global Fingerprint2 */
function theo_track(param1, param2) {
	theo_callAPI('track', param1, param2);
}

function theo_search(param, page) {
	theo_callAPI('search', param, page);
}

function theo_getURL(type, param1, param2) {
	return theo.rest_url + 'theo/v1/' + type + '/' + param1 + (param2 != null ? '/' + param2 : '');
}

/**
 * Console log messages
 * @param message Message to log.
 * @param type Type of the message
 */
function theo_debug(message, type = 1) {
	var m = '[Theo]';
	if (type === 1) {
		m += '[INFO] ';
	}
	if (type === 2) {
		m += '[ERROR] ';
	}
	m += message;

	console.log(m);
}

var theo_translate = ['Impression', 'Page View', 'Click Download', 'Click Demo'];

function theo_callAPI(type, param1, param2) {
	return new Fingerprint2().get(function (result) {
		var source = ( Cookies.get('theo_source')) ? Cookies.get('theo_source') : '';
		var source_type = ( Cookies.get('theo_source_type')) ? Cookies.get('theo_source_type') : '';
		jQuery.ajax({
			url: theo_getURL(type, param1, param2),
			headers: {
				'X-Theo-User': result,
				'X-Theo-Source-Id': source,
				'X-Theo-Source-Type': source_type
			},
			success: function (data) {
				if (data.success) {
					theo_debug(theo_translate[param1 - 1] + ' event for ' + theo.post_id, 1);
				} else {
					theo_debug(theo_translate[param1 - 1] + ' event for ' + theo.post_id, 2);
				}
			}
		});
	});
}