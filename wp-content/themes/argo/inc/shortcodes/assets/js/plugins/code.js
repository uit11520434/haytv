// JavaScript Document
(function() {
    // Creates a new plugin class and a custom code
    tinymce.create('tinymce.plugins.dnp_code', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_code':
                var c = cm.createSplitButton('dnp_code', {
                    title : 'Code shortcodes',
                    image : sc_url+'/assets/img/code.png',
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
                        <input type="radio" name="type" value="code" checked> Inline code\
                        <input type="radio" name="type" value="pre"> Code Block\
                        <br/><br/><strong>Code goes here:</strong><br/><textarea style="width: 300px" id="code-content" rows="4" cols="15"></textarea><br><br>\
                        </div>');

                        jQuery('<input type="button" class="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var text = $menu.find('textarea[id=code-content]').val();
                                    var type = $menu.find('input:radio[name=type]:checked').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'['+type+']'+text+'[/'+type+']');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>');
                 
                        $menu.data('added',true); 

					});
					// XSmall
                    m.add({title : 'Configure code:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
				
				});
				
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_code', tinymce.plugins.dnp_code);
})();