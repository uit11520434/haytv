// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_tabs', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_tabs':
                var c = cm.createButton('dnp_tabs', {
                    title : 'Tabs',
                    image : sc_url+'/assets/img/tabs.png',
                    onclick : function() {
                        tb_show('Tab builder', sc_url+'/assets/js/plugins/tabs.html?TB_iframe=1');
                    }
                });

        
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_tabs', tinymce.plugins.dnp_tabs);
})();