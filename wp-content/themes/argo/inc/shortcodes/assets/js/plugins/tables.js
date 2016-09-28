// JavaScript Document
(function() {
    // Creates a new plugin for tables shortcodes
    tinymce.create('tinymce.plugins.dnp_tables', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_tables':
                var c = cm.createSplitButton('dnp_tables', {
                    title : 'Tables shortcodes',
                    image : sc_url+'/assets/img/tables.png',
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
                        $menu.append('');
                        $menu.append('<div style="padding:0 10px">\
                        <br/><strong>Number of Rows: </strong>\
                        <input type="text" name="numrows" value="5" onclick="this.select()"  /><br/>\
                        <br/><strong>Number of Columns: </strong>\
                        <input type="text" name="numcols" value="3" onclick="this.select()"  /><br/>\
                        <br/><strong>CSS Style Class: </strong>\
                        <input type="text" name="style" value="" onclick="this.select()"  /><br/>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){

                                var numrows = $menu.find('input[name=numrows]').val();
                                var numcols = $menu.find('input[name=numcols]').val();
                                var style= $menu.find('input[name=style]').val();
                                style= (style!='') ? style : '';
                                var shortcode = '[table class="table '+style+'"]<br class="nc"/>';
                                    for(i=0;i<numrows;i++){
                                       //shortcode += (i==0)?'[trow type="head"]':'[trow]';
                                       if (i==0){
                                         shortcode += '[tbhead][trow]'
                                          for (j=0;j<numcols;j++){
                                            shortcode += '[tcol type="head"]Content goes here[/tcol]'
                                            }
                                         shortcode+='[/trow][/tbhead]<br class="nc"/>'; 
                                         continue;
                                       }
                                       else if(i==1)
                                       shortcode+='[tbody]<br class="nc"/>';
                                        shortcode += '[trow]'
                                        for (j=0;j<numcols;j++){
                                            shortcode += '[tcol]Content goes here[/tcol]'
                                        }

                                        shortcode+='[/trow]<br class="nc"/>';
                                    }

                                shortcode+= '[/tbody]<br class="nc"/>[/table]';

                                    tinymce.activeEditor.execCommand('mceInsertContent',false,shortcode);
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });

                   // XSmall
					m.add({title : 'Create new table:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_tables', tinymce.plugins.dnp_tables);
})();