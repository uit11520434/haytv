// popups abd popover
jQuery(function($){
	// jQuery('a[rel="popover"]').popover()
	// jQuery('a:not([rel="popover"])').tooltip()
});

//modals
jQuery('a[role=button]').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var url = $(this).attr('href');
	if ($(this).attr('href')[0] != '#') {
		$('#'+id+' .modal-body').html('<iframe width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" src="' + url + '"></iframe>');
	}
});
