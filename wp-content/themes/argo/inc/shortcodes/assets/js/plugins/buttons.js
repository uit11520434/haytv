// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_buttons', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_buttons':
                var c = cm.createButton('dnp_buttons', {
                    title : 'Buttons shortcodes',
                    image : sc_url+'/assets/img/buttons.png',
                    onclick : function() {
                        tb_show('Button builder', sc_url+'/assets/js/plugins/buttons.html?TB_iframe=1');
                    }
                });
				
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_buttons', tinymce.plugins.dnp_buttons);
})();