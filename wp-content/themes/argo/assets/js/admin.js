jQuery(document).ready(function($) {
    // Media Uploader
    window.formfield = '';
    
    $('.upload_btn').live('click', function (e) {
        e.preventDefault();
        formfield = $( $(this).attr('rel') );
        window.formfield = $( $(this).attr('rel') );
        window.tbframe_interval = setInterval(function() {
            jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use this file').end().find('#insert-gallery, .wp-post-thumbnail').hide();
        }, 2000);
        var post_id = $('#post_ID').val();
        if( !post_id ) return;
        tb_show('', 'media-upload.php?post_id='+post_id+'&TB_iframe=true');
    });
    
    window.original_send_to_editor = window.send_to_editor;

    window.send_to_editor = function (html) {            
        if (window.formfield) {
            imgurl = $('img',html).attr('src');
            window.formfield.val(imgurl);
            window.clearInterval(window.tbframe_interval);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
        window.formfield = '';
        window.imagefield = false;
    }
    
    $('.dnp-addnew-slide-image-field').on('click',function(event){
        event.preventDefault();
        var current_number = $('#project-metabox').find('.slide_image_field').length ;
        var next_number = current_number + 1;

        var html = '<p><label class="slide_image_field">'+
        '<input type="text" id="theme_slide_'+next_number+'" name="theme_slide['+next_number+']" value="" class="regular-text">'+
        '<span> <button onclick="return false" class="upload_btn button" rel="#theme_slide_'+next_number+'" >'+
        'Upload images</button></span>'+
        '</label></p>';

        $(this).before(html);

    });


    $('.dnp-remove-slide-image').live('click',function(event){
        event.preventDefault();
        var post_id = $(this).attr('alt');
        var parent = $(this).parent();
        $.ajax({
            url: admin_script.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: { action : 'dnp_remove_slide_image', post_id : post_id, image_url : $(this).attr('href') },
            success: function(data) {
                if( data.status == 'success' ){
                    parent.remove();
                }
            },

        });
        
    });
    
    $('#project-video-option').hide();
    $('#project-display-option').change(function(e) {
        if( 'video' == $(this).val() ){
            $('#project-images-option').hide(300);
            $('#project-video-option').show(300);
        }else{
            $('#project-video-option').hide(300);
            $('#project-images-option').show(300);

        }
    });

    // Slide POST TYPE
    $('#slide-metabox .metabox-tabs li.tab-menu').live('click',function(event){
        var $this = $(this);
        var tab_content = $( $this.attr('rel') );
        $this.parent().find('li').each(function(){ $(this).removeClass('active'); });
        $this.addClass('active');

        $('#slide-metabox .tab-content').each(function(i){ $(this).removeClass('active'); });
        tab_content.addClass('active');
    });

    $('#slide-metabox #tab-create').on('click',function(event){
        var menu = $('#slide-metabox .metabox-tabs'),
            number = menu.find('li.tab-menu').length + 1,
            new_menu_tab = '<li class="tab-menu" rel="#tab-'+number+'">Slide '+number+'</li>';
        //Create tab
        $(this).before( new_menu_tab );
        //clone new tab
        var tab_0 = $('#slide-metabox').find('#tab-0').html(),
            new_tab = $('<div id="tab-'+number+'" class="tab-content tab-'+number+'" />').html( tab_0.replace(/slide\[0\]/g,'slide['+number+']').replace(/slide-0/g,'slide-'+number) );

        new_tab.find('#delete_slide').addClass('new-tab');

        $('#tab-0').before(new_tab);
        menu.find('li[rel=#tab-'+number+']').trigger('click');

    });


    //Remove slide
    $('#slide-metabox #delete_slide').live('click',function(event){
        event.preventDefault();

        var post_id = $('#post_ID').val(),
            menu = $('#slide-metabox .metabox-tabs'),
            tab = $(this).closest('.tab-content'),
            number = tab.attr('id'),
            tab_menu = menu.find('li[rel=#'+number+']');
            number = number.replace('tab-','');

        if( $(this).hasClass('new-tab') ){
            tab.remove();
            tab_menu.remove();
            dnp_rearrange_slide(number);
        }else{
            if( confirm('Hey! Be careful. Do you want to remove this slide?') ){
                $.ajax({
                    url: admin_script.ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: { 
                        action: 'dnp_remove_slide_posttype_slide',
                        slide: post_id,
                        number: number
                    },
                    success: function(data) {
                        if( data.status == 'success' ){
                            tab.remove();
                            tab_menu.remove();
                            dnp_rearrange_slide(number);
                        }
                    }
                });
            }
        }
        
    });

    //Rearrange slide order
    function dnp_rearrange_slide(number){
        var container = $('#slide-metabox'),
            menu = container.find('.metabox-tabs');

        menu.find('li').each(function(i){
            var $this = $(this), number = i + 1;
            if( $this.attr('rel') != '#tab-create' )
                $this.text('Slide '+number).attr('rel','#tab-'+number);
        });
        container.find('div.tab-content').each(function(i){
            var tab = $(this), number = i+1,
                current_tab = tab.attr('id');
            current_number = current_tab.replace('tab-','');
            tab.attr({
                'id' : 'tab-'+number,
                'class' : 'tab-content tab-'+number,
            }).html().replace('slide['+current_number+']','slide['+number+']').replace('slide-0','slide-'+number);
        });
        var active = 1;
        if( menu.find('li[rel=#tab-'+number+']').length > 0 ){
            active = number;
        }else if( menu.find('li[rel=#tab-'+(number-1)+']').length > 0 ){
            active = number - 1;
        }
        console.log(active);
        menu.find('li[rel=#tab-'+active+']').trigger('click');

    }

        /**
         * Set gfont variant value
         */
        
        $('#setting_headings_font_face,#setting_content_font_face').each(function(){
            
            var $this = $(this);
            var selectbox = $this.find('select');
            var variant = $this.next();
            var charsets = variant.next();
            if($this.find('option[selected]').length<1) return;
            var font_variants = $this.find('option[selected]').data('variants').split(',');
            var font_charsets = $this.find('option[selected]').data('charsets').split(',');
            
            //init value
            variant.find('option').each(function(){
                var opt = $(this);
                if($.inArray(opt.val(),font_variants) > 0){
                    opt.show();
                }
                else{
                    opt.hide();
                }
            });
            charsets.find('option').each(function(){
                var opt = $(this);
                if($.inArray(opt.val(),font_charsets) > 0){
                    opt.show();
                }
                else{
                    opt.hide();
                }
            });

            selectbox.on('change',function(){
               var opt = $this.find('option[value="'+$(this).val()+'"]');
               var font_variants = opt.data('variants').split(',');
               var font_charsets = opt.data('charsets').split(',');
               variant.find('option').each(function(){
                    var elem = $(this);
                    if($.inArray(elem.val(),font_variants) > -1){
                        elem.show();
                    }
                    else{
                        elem.hide();
                    }

                });
                charsets.find('option').each(function(){
                    var elem = $(this);
                    if($.inArray(elem.val(),font_charsets) > -1){
                        elem.show();
                    }
                    else{
                        elem.hide();
                    }
                });
               variant.find('select').val('400').trigger('change');
               charsets.find('select').val('latin').trigger('change');

            })

        });

    if($('#slider_meta-hide').length>0){
        $('#publish').click(function(){
            var empty_image = false;
            $('input[id^="slider_items_sl_image"]').each(function(){

                if($(this).val()==''){
                    empty_image = true;
                    $(this).closest('.list-list-item').find('.option-tree-setting-edit').trigger('click');

            
                }
            })

            if(!empty_image){
                return true;
            }
            
               alert('Please upload main image for all slides!!')
            setTimeout(function(){
                $('#publish').removeClass('button-primary-disabled');
                $('.spinner').hide();
            },100);
            return false;
           
        })
    }

    $('.option-tree-sortable').on('protoss_icons_hook',function(){
       $('label[for^="nav_items_nav_icon"]:not(.active)').each(function(){
            $this = $(this);
            $this.html($this.text()).addClass('active');
          })
       $('select[id^="nav_items_link_type"],select[id^="nav_items_brick_type"]').trigger('change');
       
    })
    $('.option-tree-sortable').trigger('protoss_icons_hook');

    $(document).on('change','select[id^="nav_items_brick_type"]',function(){
       var $this = $(this);
       switch($this.val()){
            case 'nav_item':
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_"]').show();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings img_"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings slogan_"]').hide();
            break;
            case 'flip_images':
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings img_"]').show();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings slogan_"]').hide();
            break;
            case 'slogan':
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings sbrick_"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings img_"]').hide();
                $this.closest('.option-tree-setting-body').find('>div[class^="format-settings slogan_"]').show();
            break;
        }
    });

    $(document).on('change','select[id^="nav_items_link_type"]',function(){
       var $this = $(this);
       var clink = $this.closest('.option-tree-setting-body').find('>.sbrick_custom_link,>.sbrick_page_select');
       var nav_type = $this.closest('.option-tree-setting-body').find('select[id^="nav_items_brick_type"]').val();
       if(nav_type=='nav_item'){
              if($(this).val() == 'external'){
                $(clink[0]).fadeIn();
                $(clink[1]).hide();
              }
              else{
               $(clink[0]).hide();
                $(clink[1]).fadeIn();
              }
        }
    });
    $('input[name^="enable_divider"]').on('change',function(){
        var $this = $(this);
        var $thispa = $this.closest('.format-settings');
        if ($this.val()=='true'){
            $thispa.next().show();
            $thispa.next().next().show();
        }
        else{
            $thispa.next().hide();
            $thispa.next().next().hide();
        }
    });
    if(jQuery('input[name^="enable_divider"]:checked').val()=='false'){
         jQuery('input[name^="enable_divider"]').closest('.format-settings').next().hide()
         jQuery('input[name^="enable_divider"]').closest('.format-settings').next().next().hide()
    }else{
         jQuery('input[name^="enable_divider"]').closest('.format-settings').next().show()
         jQuery('input[name^="enable_divider"]').closest('.format-settings').next().next().show()
    }
    $('select[id^="nav_items_link_type"],select[id^="nav_items_brick_type"]').trigger('change');

});

// Script for pricing table builder


    jQuery(function($){
      swich_column();
        $('.btn_add_more').live('click',function(){
            var number = $(this).parent().find('li').length-1;
            $(this).before('<li data-removable="true" data-editable="true">Feature '+number+'</li>');
            swich_column();
        })
        
        $('#pt-table-style').change(function(){
             var stl = $(this).val();
             var cur_st = $('.pricing-table').attr('data-style');
             console.log($('.pricing-table').attr('class').replace(cur_st,stl));
             $('.pricing-table').attr('class',$('.pricing-table').attr('class').replace(cur_st,stl));

             $('.pricing-table').attr('data-style',stl)
            swich_column();
        }).val($('.pricing-table').attr('data-style'));

        $('[data-editable]').live('click',function(){
            if($(this).find('input').length>0) return;
            var val = $.trim($(this).html());
            $(this).html('<input type="text" />').find('input')[0].focus();
            $(this).find('input').val(val);
            $(this).find('input')[0].select();
            var attr = $(this).attr('data-removable');

            if (typeof attr !== 'undefined' && attr !== false){
                $('<i class="icon-remove" style="position:absolute; cursor:pointer; margin:6px 0 0 7px;"></i>').appendTo(this).click(function(){$(this).parent().remove();})
                            .hover(function(){
                                $(this).parent()[0].removeAttribute('data-editable');
                            },function(){
                                $(this).parent()[0].setAttribute('data-editable','true');
                                $(this).parent().find('input')[0].focus();
                            })
            }
        })

        $('[data-editable] input').live('blur',function(){

            $(this).parent().html($(this).val())
            swich_column()
        })

        $('.rm_col').live('click',function(e){
            e.preventDefault();
            $(this).closest('.pt-column').animate({opacity:'toggle'},function(){
                $(this).closest('.pt-column').remove();
               
                swich_column();
            });

        })

        $('.set_featured').live('click',function(e){
            e.preventDefault();
            $(this).closest('.pt-column').toggleClass("featured");
            swich_column()
        })

        $('.btn_add_column').live('click',function(e){
            e.preventDefault();
            if($(this).hasClass('disabled')) { 
                alert('Maximum Number of Columns Exceeded')
                return;}
            var col = '<div class="pt-column width0">\
                            <div class="pt-header">\
                                <strong data-editable="true">Header</strong>\
                                <span data-editable="true">Sub header</span>\
                                <i class="icon-remove rm_col" title="Remove this column"></i>\
                                <i class="icon-star set_featured" title="Set as featured"></i>\
                            </div>\
                            <div class="pt-price">\
                                <strong data-editable="true">$199</strong>\
                                <span data-editable="true">/ month</span>\
                            </div>\
                            <ul>\
                                <li class="btn_add_more"><i class="icon-plus" title="Add new feature"></i></li>\
                            </ul>\
                            <div class="pt-footer" data-editable="true"><a class="btn button" href="#">Button</a></div>\
                        </div>';
             $('.pricing-table').append(col);
             swich_column();
        })


        $('#btn_insert').click(function(){
            //[price_boxes class=""]
            //  [price-boxes-column class=""]
            //  [price-boxes-column]
            //[/price_boxes]
            $('.price-boxes .btn_add_more').remove();
            $('*').removeAttr('data-editable').removeAttr('data-removable');
            var cls = $('.price-boxes').attr('class').replace('price-boxes','');
            var shortcode = '[price_boxes class="'+cls+'"]<br class="nc">';
             $('.price-boxes .price-column').each(function(){
                var clss = $.trim($(this).attr('class').replace('price-column',''));
                shortcode+= '[price-boxes-column class="'+clss+'"]<br class="nc">';
                shortcode += '<div class="header">';
                shortcode += $(this).find('.header').html();;
                shortcode += '</div>';
                shortcode += '<ul>';
                shortcode += $(this).find('>ul').html();
                shortcode += '</ul>';
                shortcode += '<div class="footer">';
                shortcode += $(this).find('.footer').html();
                shortcode += '</div>';
                shortcode += '[/price-boxes-column]';

             });
             shortcode += '[/price_boxes]';

             parent.tinymce.activeEditor.execCommand('mceInsertContent',false,shortcode);
                    parent.tb_remove();

        })


    //Validate input 
    $('input#project_client').attr('required','true');
    $('input#project_field').attr('required','true');
    $('input#siteurl').attr('required','true');

    })


function swich_column(){
    var col = jQuery('.pricing-table .pt-column').length;
    
  if(col==5) jQuery('.btn_add_column').addClass("disabled");
    else jQuery('.btn_add_column').removeClass("disabled");

    jQuery('.pricing-table').attr("class",'pricing-table grid'+col+ ' '+ jQuery('.pricing-table').attr('data-style') );
    setTimeout(function(){jQuery('.pricing-table .width0').fadeIn().removeClass('width0');swich_column()},1000);
    var result = '<div class="'+jQuery('.pricing-table').attr('class')+'"  data-style="'+jQuery('.pricing-table').attr('data-style')+'" >'+jQuery('.pricing-table').html()+'</div>';
    //result = jQuery(result).find('*').removeAttr('data-editable').removeAttr('data-removable')
               // .end().find('.btn_add_more, .rm_col, .set_featured').remove().end().html();
   // result = '<div class="'+jQuery('.pricing-table').attr('class')+'">'+result+'</div>';

   jQuery('#pt_textarea').val(result);
}

