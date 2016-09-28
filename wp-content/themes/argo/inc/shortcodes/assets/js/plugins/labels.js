// JavaScript Document
(function() {
    // Creates a new plugin class and a custom label
    tinymce.create('tinymce.plugins.dnp_labels', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_labels':
                var c = cm.createSplitButton('dnp_labels', {
                    title : 'Labels shortcodes',
                    image : sc_url+'/assets/img/labels.png',
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
                        <input type="radio" name="type" value="Default" checked> Default\
                        <input type="radio" name="type" value="Info"> Info\
                        <input type="radio" name="type" value="Success"> Success<br />\
                        <input type="radio" name="type" value="Error"> Error\
                        <input type="radio" name="type" value="Important"> Important\
                        <input type="radio" name="type" value="Inverse"> Inverse\
                        <br/><br/><strong>Label text:</strong><br/><input type="text" name="label-text" value=""><br>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var text = $menu.find('input:text[name=label-text]').val();
                                    var type = $menu.find('input:radio[name=type]:checked').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[label type="'+type.toLowerCase()+'"]'+text+'[/label]');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });
					
                   // XSmall
                    m.add({title : 'Configure label:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);				
                
                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_labels', tinymce.plugins.dnp_labels);
})();