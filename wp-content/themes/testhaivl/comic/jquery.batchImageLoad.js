/**
 *  Plugin which is applied on a list of img objects and calls
 *  the specified callback function, only when all of them are loaded (or errored).
 *  @author:  H. Yankov (hristo.yankov at gmail dot com)
 *  @version: 1.0.0 (Feb/22/2010)
 *	http://yankov.us
 */

(function($) {
$.fn.batchImageLoad = function(options) {
	var images = $(this);
	var totalImagesCount = images.size();
	var elementsLoaded = 0;

	// Init
	$.fn.batchImageLoad.defaults = {
		loadingCompleteCallback: null
	}
    var opts = $.extend({}, $.fn.batchImageLoad.defaults, options);
		
	// Start
	images.each(function() {
		// The image has already been loaded (cached)
		if ($(this)[0].complete) {
			totalImagesCount--;
		// The image is loading, so attach the listener
		} else {
			$(this).load(function() {
				elementsLoaded++;
					
				// An image has been loaded
				if (elementsLoaded >= totalImagesCount)
					if (opts.loadingCompleteCallback) opts.loadingCompleteCallback();
			});
			$(this).error(function() {
				elementsLoaded++;
					
				// The image has errored
				if (elementsLoaded >= totalImagesCount)
					if (opts.loadingCompleteCallback) opts.loadingCompleteCallback();
			});
		}
	});

	// There are no unloaded images
	if (totalImagesCount <= 0)
		if (opts.loadingCompleteCallback) opts.loadingCompleteCallback();
};
})(jQuery);