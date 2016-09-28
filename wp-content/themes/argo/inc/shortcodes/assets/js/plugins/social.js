// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_social', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_social':
                var c = cm.createSplitButton('dnp_social', {
                    title : 'Social button shortcodes',
                    image : sc_url+'/assets/img/facebook.png',
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
                        <input type="radio" name="stype" value="facebook" checked> Facebook\
                        <input type="radio" name="stype" value="twitter"> Twitter\
                        <input type="radio" name="stype" value="gplus"> Google+\
                        <input type="radio" name="stype" value="linkedin"> LinkedIn\
                        <br/><br/><strong>Link:</strong><br/><input type="text" value="#" name="social-link"><br><br>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var link = $menu.find('input[name=social-link]').val();
                                    var type = $menu.find('input:radio[name=stype]:checked').val();
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[social type="'+type.toLowerCase()+'" link="'+link+'"]');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });
                   // XSmall
                    m.add({title : 'Configure social button:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_social', tinymce.plugins.dnp_social);
})();