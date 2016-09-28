// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_progress', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_progress':
                var c = cm.createSplitButton('dnp_progress', {
                    title : 'Notifications shortcodes',
                    image : sc_url+'/assets/img/progress.png',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width('auto');
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;
                       
                        $menu.append('<div style="padding:0 10px"><br/>\
                        <strong>Value:</strong><br/><input type="text" value="50" name="progress-value"><br><br>\
                        <strong>Text:</strong><br/><input type="text" value="My skill" name="progress-text"><br><br>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var value = $menu.find('input[name=progress-value]').val();
                                    var text = $menu.find('input[name=progress-text]').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[progress value="'+value.toLowerCase()+'" text="'+text.toLowerCase()+'" ]');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });
                   // XSmall
                    m.add({title : 'Configure progress:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_progress', tinymce.plugins.dnp_progress);
})();