/**
 * Copyleft 2010 Stefan Natchev
 * All Rights Reversed
 * github.com/snatchev
 *
 * A simple plugin to handle dropping image files onto the browser.
 *  
 * Unfortunately, at the moment jQuery Draggable/Droppable
 * do not support dropping files from outside of the browser.
 *
 */

//css hack to make dragging work
jQuery(function() {
  jQuery('head').append('<style type="text/css">[draggable=true] {-webkit-user-drag: element; -webkit-user-select: none; -moz-user-select: none;}</style>');
});

(function( $ ){
  $.fn.imgDrop = function(options){
    return this.each(function(){
      
      var self = $(this);
      var settings = new Object;
	  
      settings.imageHandler = function(file) {
        self.reader = new FileReader();
        var img = $('<img/>');
		
        self.reader.onload = function(event){
          img.attr('src', event.target.result);
		  settings.afterDrop(img, self);
        };
		
		self.reader.onerror = function(event) {
			switch(event.target.error.code) {
				case event.target.error.NOT_FOUND_ERR:
					alert('File Not Found!');
					break;
				
				case event.target.error.NOT_READABLE_ERR:
					alert('File is not readable');
					break;
				
				case event.target.error.ABORT_ERR:
					break; // noop
				
				default:
					alert('An error occurred reading this file.');
			}
		};
		
		self.reader.onabort = function(event) {
			alert('File read cancelled');
		};

        self.reader.readAsDataURL(file);
      },
      settings.afterDrop = function(element, dropTarget){
        $(element).appendTo(dropTarget);
      },
      settings.accepts = {'image': settings.imageHandler};

	  if(typeof options.beforeDrop == 'function') {
        settings.beforeDrop = options.beforeDrop;
      }
      if(typeof options.afterDrop == 'function') {
        settings.afterDrop = options.afterDrop;
      }
	  if(typeof options.afterAllDrop == 'function') {
        settings.afterAllDrop = options.afterAllDrop;
      }

      // Tells the browser that we *can* drop on this target
      self.bind('dragover dragenter', function(event){
        if(event.preventDefault){
          event.preventDefault();
        }
        return false;
      });
      self.bind('drop', function(event){
        //do not allow the browser to handle the default drop behavior.
        if(event.preventDefault){
          event.preventDefault();
        }

        //jQuery normalizes the events to be cross-browser
        //get the dataTransfer from the original Event in modern browsers
        var dataTransfer = event.originalEvent.dataTransfer;
        //and bail if we can't continue
        if(!dataTransfer)
          return false;
        if(!dataTransfer.files || dataTransfer.files.length == 0)
          return false;

		settings.beforeDrop();
		// Give time for the beforeDrop to kick in, otherwise we block the UI
		//setTimeout(function() {
			for(var i=0; i < dataTransfer.files.length; i++){
			  var file = dataTransfer.files[i];

			  var handler = null;
			  //find the handler based matching the accept string
			  for(var type in settings.accepts){
				if(file.type.match(type)){
				  handler = settings.accepts[type];
				  break;
				}
			  }
			  
			  //if no handler was found, go on to the next file.
			  if(!handler) {
				continue;
			  }
			  
			  handler(file);
			}
			
			settings.afterAllDrop();
		//}, 500);
		
        return false;
      });
    });
  };
})(jQuery);
