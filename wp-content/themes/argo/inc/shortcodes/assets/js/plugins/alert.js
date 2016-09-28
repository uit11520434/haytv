// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_alerts', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_alerts':
                var c = cm.createSplitButton('dnp_alerts', {
                    title : 'Notifications shortcodes',
                    image : sc_url+'/assets/img/alert.png',
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
                        <strong>Type:</strong><br/>\
                        <input type="radio" name="type" value="Info" checked> Info\
                        <input type="radio" name="type" value="Success"> Success\
                        <input type="radio" name="type" value="Error"> Error\
                        <input type="radio" name="type" value="Warning"> Warning\
                        <br/><br/><strong>Announcement text:</strong><br/><textarea style="width: 300px" id="alert-content" rows="4" cols="15">Change content here</textarea><br><br>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var text = $menu.find('textarea[id=alert-content]').val();
                                    var type = $menu.find('input:radio[name=type]:checked').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[notification type="'+type.toLowerCase()+'"]'+text+'[/notification]');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });
                   // XSmall
                    m.add({title : 'Configure notification:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_alerts', tinymce.plugins.dnp_alerts);
})();