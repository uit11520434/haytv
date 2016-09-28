// JavaScript Document
(function() {
    // Creates a new plugin class and a custom code
    tinymce.create('tinymce.plugins.dnp_blockquote', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_blockquote':
                var c = cm.createSplitButton('dnp_blockquote', {
                    title : 'Blockquote shortcodes',
                    image : sc_url+'/assets/img/blockquote.png',
                    onclick : function() {
                    }
                });

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width(150);
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;
                       
                        $menu.append('<div style="padding:0 10px"><br/>\
                        <strong>Blockquote content:</strong><br/><textarea style="width: 300px" id="blockquote-content" rows="4" cols="15">Change content here</textarea><br><br>\
                        <strong>Blockquote author:</strong><br/><input type="text" value="Change author here" name="blockquote-author"><br><br>\
                        <strong>Additional CSS Style:</strong><br/><input type="text" value="" name="blockquote-class"><br>\
                        </div>');

                        jQuery('<input type="button" class="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var bqclass = $menu.find('input:text[name=blockquote-class]').val();
									var bqcontent = $menu.find('#blockquote-content').val();
									var bqauthor = $menu.find('input:text[name=blockquote-author]').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[blockquote class="'+bqclass+'"]'+ bqcontent +'[bqauthor]'+ bqauthor +'[/bqauthor][/blockquote]');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });

                   // XSmall
                    m.add({title : 'Configure your blockquote:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_blockquote', tinymce.plugins.dnp_blockquote);
})();