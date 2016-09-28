// JavaScript Document
(function() {
    // Creates a new plugin class and a custom label
    tinymce.create('tinymce.plugins.dnp_gmap', {
        createControl: function(n, cm) {
            switch (n) {                
                case 'dnp_gmap':
                var c = cm.createSplitButton('dnp_gmap', {
                    title : 'Google Maps Shortcodes',
                    image : sc_url+'/assets/img/map.png',
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
                        <input type="radio" name="type" value="TERRAIN" checked> Normal\
                        <input type="radio" name="type" value="SATELLITE"> Satellite\
                        <input type="radio" name="type" value="HYBRID"> Hybrid<br />\
                        <input type="radio" name="type" value="ROADMAP"> Roadmap<br/>\
                        <br/><strong>Height: </strong>\
                        <input type="text" name="txt_height" value="400" onclick="this.select()"  /><br/>\
                        <br/><br/><strong>Map by:</strong><select id="map_by">\
                            <option value="0" selected="selected">Lat-Long</option>\
                            <option value="1">Address</option>\
                        </select><br>\
                        <br/><strong>Latitude: </strong>\
                        <input type="text" name="txt_lat" value="0" onclick="this.select()"  /><br/>\
                        <br/><strong>Longitude: </strong>\
                        <input type="text" name="txt_long" value="0" onclick="this.select()"  /><br/>\
                        <br/><strong>Zoom: </strong>\
                        <input type="text" name="txt_zoom" value="10" onclick="this.select()"  /><br/>\
                        <br/><strong>Address: </strong>\
                        <input type="text" name="txt_addr" value="Big Ben, Westminster Bridge Road, London" onclick="this.select()"  /><br/>\
                      <br/> <strong>Controls:</strong> <select id="sl_controls">\
                            <option value="true" selected="selected">Enabled</option>\
                            <option value="false">Disabled</option><br/>\
                        </div>');

                        jQuery('<input class="button" type="button" value="Insert" />').appendTo($menu)
                                .click(function(){
                                    var type = $menu.find('input:radio[name=type]:checked').val();
                                    var map_by = $menu.find('#map_by').val();
                                    var height = $menu.find('[name=txt_height]').val();
                                    var lat = $menu.find('[name=txt_lat]').val();
                                    var longv = $menu.find('[name=txt_long]').val();
                                    var addr = $menu.find('[name=txt_addr]').val();
                                    var zoom = $menu.find('[name=txt_zoom]').val();
                                    var controls = ($menu.find('#sl_controls').val()=='false')?' controls="false" marker="false" ':'';
                                    var desc ='';
                                    var popup = (desc!='')?' popup="true" ':'';
                                    var address = (map_by=='0')?' latitude="'+lat+'" longitude="'+longv+'" ':' address="'+addr+'" ';
                                    tinymce.activeEditor.execCommand('mceInsertContent',false,'[googlemap zoom="'+zoom+'" type="'+type+'"  height="'+height+'" text="'+desc+'" '+ controls +popup + address+']');
                                    c.hideMenu();
                                }).wrap('<div style="padding:10px"></div>')
                 
                        $menu.data('added',true); 

                    });
                    
                   // XSmall
                    m.add({title : 'Configure Google Map Shortcode:', 'class' : 'mceMenuItemTitle'}).setDisabled(1);               
                
                 });
                // Return the new splitbutton instance
                return c;
                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('dnp_gmap', tinymce.plugins.dnp_gmap);
})();