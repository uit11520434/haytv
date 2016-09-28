// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_typo', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_typo':
                var c = cm.createSplitButton('dnp_typo', {
                    title : 'Basic Typo Shortcodes',
                    image : sc_url+'/assets/img/typo.png',
                    onclick : function() {

                    }
                    //'class':'mceListBoxMenu'
                });
                

                c.onRenderMenu.add(function(c, m) {
                    m.onShowMenu.add(function(c,m){
                        jQuery('#menu_'+c.id).height('auto').width('auto');
                        jQuery('#menu_'+c.id+'_co').height('auto').addClass('mceListBoxMenu'); 
                        var $menu = jQuery('#menu_'+c.id+'_co').find('tbody:first');
                        if($menu.data('added')) return;

                      
                        $menu.append('<div style="padding:0 10px"><br/>\
                        <strong>Type:</strong>\
                        <input type="radio" name="type" value="paragraph" checked> Paragraph\
                        <input type="radio" name="type" value="heading"> Heading\
						<br><br>\
                        <div id="heading_type"><strong>Heading Type:</strong><br/>\
                        <input type="radio" name="htype" value="h1" checked> H1 \
                        <input type="radio" name="htype" value="h2"> H2 \
                        <input type="radio" name="htype" value="h3"> H3 \
                        <input type="radio" name="htype" value="h4"> H4 \
                        <input type="radio" name="htype" value="h5"> H5 <br /> <br /></div> \
						<strong>Text:</strong><br><textarea style=" height:70px; width: 319px;" name="typo-text"> </textarea><br><br>\
						Class <input type="text" id="class" value="" /><br/><br/>\
                        </div>');

						$menu.find('#heading_type').css({display: 'none'});
						
                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var tt = $menu.find('input:radio[name=type]:checked').val();
                                    var ht = $menu.find('input:radio[name=type]:checked').val();
                                    var txt = $menu.find('textarea[name=typo-text]').val();
									var tclass = $menu.find('input:text[id=class]').val();
									
									if ( tt == "paragraph" ) {
										var tag = 'p';
									} else if ( tt != "paragraph" ) {
										var tag = ht;
									}
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'['+tag+' class="'+tclass+'"]'+txt+'[/'+tag+']');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true);
						
						jQuery('input:radio[name=type]').click(function () {
							if ($menu.find('input:radio[name=type]:checked').val() == "paragraph") {
								$menu.find('#heading_type').css({display: 'none'});
							} else if ($menu.find('input:radio[name=type]:checked').val() != "paragraph" ) {
								$menu.find('#heading_type').css({display: 'block'});
							}
						});

                    });

                   // XSmall
                    m.add({title : 'Configure Basic Typographic Elements:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_typo', tinymce.plugins.dnp_typo);
})();


var ste_backup = window.send_to_editor;
    

