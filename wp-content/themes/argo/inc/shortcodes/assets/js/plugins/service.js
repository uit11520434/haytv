// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_service', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_service':
                var c = cm.createButton('dnp_service', {
                    title : 'Service shortcodes',
                    image : sc_url+'/assets/img/service.png',
                    onclick : function() {
                      tinymce.activeEditor.execCommand('mceInsertContent',false,'[service]<br class="nc"/>[icon name="icon-thumbs-up"]<h2>Service title</h2><p>Service content</p>[/service]<br class="nc"/>');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_service', tinymce.plugins.dnp_service);
})();