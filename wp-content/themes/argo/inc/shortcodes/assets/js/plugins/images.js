// JavaScript Document
(function() {
    // Creates a new plugin class and a custom listbox
    tinymce.create('tinymce.plugins.dnp_images', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_images':
                var c = cm.createSplitButton('dnp_images', {
                    title : 'Images shortcodes',
                    image : sc_url+'/assets/img/images.png',
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
                            jQuery('#menu_content_content_dnp_images_menu').hide();
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
                                jQuery('#menu_content_content_dnp_images_menu').show();
                                tb_remove();
                                window.send_to_editor = ste_backup;
                            };
                        }

                      
                       
                        $menu.append('<div style="padding:0 10px"><br/>\
                        <strong>Add URL:</strong><input type="text" id="sc_image_input" value="" name="image-src"> or <input class="button" type="button" id="sc_image_upload" value="Browse / Upload" /> <br><br>\
                        <strong>Alt:</strong><input type="text" value="" name="image-alt"><br><br>\
                        <strong>Class:</strong><br/>\
                        <input type="radio" name="class" value="img-rounded"> Rounded\
                        <input type="radio" name="class" value="img-circle" checked> Circle\
                        <input type="radio" name="class" value="img-polaroid"> Polaroid<br/>\
                        <input type="radio" name="class" value="custom"> Custom Class <input type="text" id="custom-image-class" value="" style="display:none" /><br/><br/>\
                        </div>');
                        jQuery('#sc_image_upload').click(show_img_upload);
						$menu.find('input:text[id=custom-image-class]').css({display: 'none'});
						
                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var alt = $menu.find('input:text[name=image-alt]').val();
                                    var src = $menu.find('input:text[name=image-src]').val();
									if ($menu.find('input:radio[name=class]:checked').val() != "custom") {
										var iclass = $menu.find('input:radio[name=class]:checked').val();
									} else if ($menu.find('input:radio[name=class]:checked').val() == "custom" && $menu.find('input:text[name=custom-image-class]') != '') {
										var iclass = $menu.find('input:text[id=custom-image-class]').val();
									}
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[image alt="'+alt+'" class="'+iclass+'" src="'+src+'"]');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true);
						
						jQuery('input:radio[name=class]').click(function () {
							if ($menu.find('input:radio[name=class]:checked').val() != "custom") {
								$menu.find('input:text[id=custom-image-class]').css({display: 'none'});
							} else if ($menu.find('input:radio[name=class]:checked').val() == "custom" ) {
								$menu.find('input:text[id=custom-image-class]').css({display: 'inline-block'});
							}
						});

                    });

                   // XSmall
                    m.add({title : 'Configure image:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_images', tinymce.plugins.dnp_images);
})();


    var ste_backup = window.send_to_editor;
    

