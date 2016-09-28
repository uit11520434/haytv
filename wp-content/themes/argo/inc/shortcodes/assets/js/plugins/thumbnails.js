// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_thumbnails', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_thumbnails':
                var c = cm.createSplitButton('dnp_thumbnails', {
                    title : 'Images shortcodes',
                    image : sc_url+'/assets/img/thumbs.png',
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

                        var show_img_upload = function(){
                            post_id = jQuery('#post_ID').val();
                            tb_show('', 'media-upload.php?post_id='+post_id+'&field_id=sc_image_input&type=image&TB_iframe=true');
                            jQuery('#menu_content_content_dnp_thumbnails_menu').hide();
                            var atv_upload = setInterval(function(){

                                if(jQuery("#TB_iframeContent").length==0){
                                     window.send_to_editor = ste_backup;  
                                     clearInterval(atv_upload);
                                }
                                else{
                                    if ( jQuery('#TB_iframeContent').attr('src').indexOf( "&field_id=" ) !== -1 ) {
                                        jQuery('#TB_iframeContent').contents().find('#tab-type_url').hide();
                                        } 
                                }
                            },100);

                            window.send_to_editor = function(html) {
                                imgurl = jQuery('img',html).attr('src');
                                jQuery('#sc_image_input').val(imgurl);
                                jQuery('#menu_content_content_dnp_thumbnails_menu').show();
                                tb_remove();
                                window.send_to_editor = ste_backup;
                            };
                        }
						
                        $menu.append('<div style="padding:0 10px"><br/>\
						<strong>Type:</strong>\
                        <input type="radio" name="type" value="link" checked="checked"> Link\
                        <input type="radio" name="type" value="container"> Container\<br /><br />\
						<strong>Thumbnail URL:</strong><input type="text" id="sc_image_input" value="" name="src"> or <input type="button" id="sc_image_upload" value="Browse / Upload" /> <br><br>\
                        <strong>Alt:</strong><input type="text" value="" name="image-alt"><br><br>\
                        <div id="thumb-link"><strong>Link:</strong><input type="text" value="#" name="image-link"></div>\
						<div id="thumb-container" style="display:none"><strong>Caption content:</strong><br/><textarea id="caption-content" style="width: 300px" rows="4" cols="15"></textarea></div>\
                        </div>');
						
                        jQuery('#sc_image_upload').click(show_img_upload);

						$menu.find('input:radio[name=type]').click(function () {
							if ($menu.find('input:radio[name=type]:checked').val() == "link") {
								$menu.find('#thumb-link').css({display: 'inline-block'});
								$menu.find('#thumb-container').css({display: 'none'});
							} else if ($menu.find('input:radio[name=type]:checked').val() == "container" ) {
								$menu.find('#thumb-link').css({display: 'none'});
								$menu.find('#thumb-container').css({display: 'inline-block'});
							}
						});
						
                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var alt = $menu.find('input:text[name=image-alt]').val();
                                    var src = $menu.find('input:text[name=src]').val();
									var type = $menu.find('input:radio[name=type]:checked').val();
									var content = $menu.find('textarea[id=caption-content]').val();
									var link = $menu.find('input:text[name=image-link]').val();
									
									if ( type == "link" ) {
										tinymce.activeEditor.execCommand('mceInsertContent',false,'[thumbnail-link alt="'+alt+'" src="'+src+'" link="'+link+'"]');
									} else if ( type == 'container' ) {
										tinymce.activeEditor.execCommand('mceInsertContent',false,'[thumbnail-container alt="'+alt+'" src="'+src+'"] '+content+' [/thumbnail-container]');
									}
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true);
						


                    });

                   // XSmall
                    m.add({title : 'Configure thumbnail:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_thumbnails', tinymce.plugins.dnp_thumbnails);
})();


    var ste_backup = window.send_to_editor;
    

