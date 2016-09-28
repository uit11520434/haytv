// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_collapse', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_collapse':
                var c = cm.createButton('dnp_collapse', {
                    title : 'Collapse builder',
                    image : sc_url+'/assets/img/collapse.png',
                    onclick : function() {
                        tb_show('Collapse builder', sc_url+'/assets/js/plugins/collapse.html?TB_iframe=1');
                    }
                    //'class':'mceListBoxMenu'
                });
                

                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_collapse', tinymce.plugins.dnp_collapse);
})();