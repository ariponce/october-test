/*
 * List Widget
 *
 * Dependences:
 * - Row Link Plugin (october.rowlink.js)
 */
+function ($) { "use strict";

	var postStats = function() {

		this.onView = function(postId) {
			var newPopup = $('<a />')

			newPopup.popup({
				handler: 'postStats::onView',
				size: 'giant',
				extraData: {
					'postId': postId
				}
			})
		}

	}

	$.oc.postStats = new postStats

}(window.jQuery);