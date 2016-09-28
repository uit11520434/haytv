<?php
include_once('ot_custom_type.php');
include_once('page-options.php');
include_once('post-options.php');
function filter_radio_images( $array, $field_id ) {
  
  /* only run the filter where the field ID is my_radio_images */
  if ( $field_id == 'theme_color' ) {
    $array = array(
      array(
        'value'   => 'default',
        'label'   => __( 'Default', 'argo' ),
        'src'     =>get_template_directory_uri().'/assets/img/theme.png'
      ),  array(
        'value'   => 'style-orange',
        'label'   => __( 'Orange', 'argo' ),
        'src'     =>get_template_directory_uri().'/assets/img/theme_orange.png'
      ),  array(
        'value'   => 'style-violet',
        'label'   => __( 'Violet', 'argo' ),
        'src'     =>get_template_directory_uri().'/assets/img/theme_violet.png'
      ),
    );
  }
  
  return $array;
  
}
add_filter( 'ot_radio_images', 'filter_radio_images', 10, 2 );

/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );

  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    
    'contextual_help' => array(
      'content'       => array(
    ),
      'sidebar'       => ''
    ),
    'sections'        => array(
      array(
        'id'          => 'header_settings',
        'title'       => 'General - Theme shared on WPLOCKER.COM'
      ),
      array(
        'id'          => 'nav_settings',
        'title'       => 'Navigation',
      ),
      array(
        'id'          => 'contact_settings',
        'title'       => 'Contact',
      )
    ),
    'settings'        => array(
      
      array(
        'label'       => 'Color Scheme',
        'id'          => 'theme_color',
        'type'        => 'radio-image',
        'desc'        => '',
        'std'         => 'default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'header_settings'
      ), 
        array(
          'label'       => 'Logo type',
          'id'          => 'logo_type',
          'type'        => 'select',
          'desc'        => '',
          'choices'     => array(
            array(
              'label'       => 'Text',
              'value'       => 'text'
            ),
            array(
              'label'       => 'Image',
              'value'       => 'image'
            )
          ),
          'std'         => 'text',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => 'logo_type',
          'section'     => 'header_settings'
        ), 
        array(
          'label'       => 'Text for logo',
          'id'          => 'logo_text',
          'type'        => 'text',
          'desc'        => '',
          'std'         => 'Argo',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => 'logo_text',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => 'Logo big image',
          'id'          => 'logo_image_big',
          'type'        => 'upload',
          'desc'        => '',
          'std'         => get_template_directory_uri().'/assets/img/195x195.gif',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => 'logo_image_big',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => 'Logo small image',
          'id'          => 'logo_image_small',
          'type'        => 'upload',
          'desc'        => '',
          'std'         => get_template_directory_uri().'/assets/img/100x45.gif',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => 'logo_image_small',
          'section'     => 'header_settings'
        ),

      array(
        'label'       => 'Nav items',
        'id'          => 'nav_items',
        'type'        => 'list-item',
        'desc'        => 'Add/edit/remove bricks for live titled menu',
        'settings'    => array(
          
            array(
              'label'       => 'Brick type',
              'id'          => 'brick_type',
              'type'        => 'select',
              'desc'        => '',
              'choices'     => array(
                array(
                  'label'       => 'Menu item',
                  'value'       => 'nav_item'
                ),
                array(
                  'label'       => 'Flip images',
                  'value'       => 'flip_images'
                ),
                array(
                  'label'       => 'Slogan',
                  'value'       => 'slogan'
                ),
              ),
              'std'         => 'nav_item',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => 'brick_type',
              'section'     => ''
            ),
            array(
              'label'       => 'Link type:',
              'id'          => 'link_type',
              'type'        => 'select',
              'class'       => 'sbrick_open_in',
              'desc'        => '',
              'choices'     => array(
                array('label'=>'One page','value' => 'page'),
                array('label'=>'Link to page','value' => 'page_external'),
                array('label'=>'Custom url','value' => 'external'),
                ),
              'std'         => 'page'
              ),

            array(
              'label'       => 'Custom url:',
              'id'          => 'custom_link',
              'type'        => 'text',
              'class'       => 'sbrick_custom_link',
              'desc'        => 'Type link here if you selected Custom url',
              'std'         => 'http://'
              ),

            array(
              'label'       => 'Custom title:',
              'id'          => 'custom_title',
              'type'        => 'text',
              'class'       => 'sbrick_custom_title',
              'desc'        => 'Custom title for menu item. Leave blank if you dont want to overwrite page title',
              'std'         => ''
              ),
             array(
              'label'       => 'Page Select',
              'id'          => 'page_select',
              'type'        => 'page-select',
              'desc'        => 'Select a page for menu item',
              'std'         => '',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => 'sbrick_page_select',
            ),
          array(
              'label'       => 'Brick style',
              'id'          => 'brick_color',
              'type'        => 'select',
              'desc'        => '',
              'choices'     => array(
                array(
                  'label'       => 'Style 1',
                  'value'       => 'default'
                ),
                array(
                  'label'       => 'Style 2',
                  'value'       => 'odd'
                )
              ),
              'std'         => 'default',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => 'brick_brick_color',
              'section'     => ''
            ),

             array(
              'label'       => 'Brick width',
              'id'          => 'brick',
              'type'        => 'select',
              'desc'        => '',
              'choices'     => array(
                array(
                  'label'       => '1 brick',
                  'value'       => 'brick1'
                ),
                array(
                  'label'       => '2 bricks',
                  'value'       => 'brick2'
                ),
                array(
                  'label'       => '3 bricks',
                  'value'       => 'brick3'
                )
              ),
              'std'         => 'brick1',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => 'brick_brick_width',
              'section'     => ''
            ),
             array(
              'label'       => 'Brick margin left',
              'id'          => 'brick_offset',
              'type'        => 'select',
              'desc'        => '',
              'choices'     => array(
                array(
                  'label'       => '0 brick',
                  'value'       => ''
                ),
                array(
                  'label'       => '1 brick',
                  'value'       => 'boffset1'
                ),
                array(
                  'label'       => '2 bricks',
                  'value'       => 'boffset2'
                ),
                array(
                  'label'       => '3 brick',
                  'value'       => 'boffset3'
                )

              ),
              'std'         => '',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => 'brick_brick_offset',
              'section'     => ''
            ),
             array(
              'label'       => 'Icon',
              'id'          => 'nav_icon',
              'type'        => 'radio',
              'class'       => 'sbrick_nav_icon',
              'desc'        => '',
              'choices'     => array(
                array('label'=>'<i class="li_heart"></i>','value' => 'li_heart'),
                array('label'=>'<i class="li_cloud"></i>','value' => 'li_cloud'),
                array('label'=>'<i class="li_star"></i>','value' => 'li_star'),
                array('label'=>'<i class="li_tv"></i>','value' => 'li_tv'),
                array('label'=>'<i class="li_sound"></i>','value' => 'li_sound'),
                array('label'=>'<i class="li_video"></i>','value' => 'li_video'),
                array('label'=>'<i class="li_trash"></i>','value' => 'li_trash'),
                array('label'=>'<i class="li_user"></i>','value' => 'li_user'),
                array('label'=>'<i class="li_key"></i>','value' => 'li_key'),
                array('label'=>'<i class="li_search"></i>','value' => 'li_search'),
                array('label'=>'<i class="li_settings"></i>','value' => 'li_settings'),
                array('label'=>'<i class="li_camera"></i>','value' => 'li_camera'),
                array('label'=>'<i class="li_tag"></i>','value' => 'li_tag'),
                array('label'=>'<i class="li_lock"></i>','value' => 'li_lock'),
                array('label'=>'<i class="li_bulb"></i>','value' => 'li_bulb'),
                array('label'=>'<i class="li_pen"></i>','value' => 'li_pen'),
                array('label'=>'<i class="li_diamond"></i>','value' => 'li_diamond'),
                array('label'=>'<i class="li_display"></i>','value' => 'li_display'),
                array('label'=>'<i class="li_location"></i>','value' => 'li_location'),
                array('label'=>'<i class="li_eye"></i>','value' => 'li_eye'),
                array('label'=>'<i class="li_bubble"></i>','value' => 'li_bubble'),
                array('label'=>'<i class="li_stack"></i>','value' => 'li_stack'),
                array('label'=>'<i class="li_cup"></i>','value' => 'li_cup'),
                array('label'=>'<i class="li_phone"></i>','value' => 'li_phone'),
                array('label'=>'<i class="li_news"></i>','value' => 'li_news'),
                array('label'=>'<i class="li_mail"></i>','value' => 'li_mail'),
                array('label'=>'<i class="li_like"></i>','value' => 'li_like'),
                array('label'=>'<i class="li_photo"></i>','value' => 'li_photo'),
                array('label'=>'<i class="li_note"></i>','value' => 'li_note'),
                array('label'=>'<i class="li_clock"></i>','value' => 'li_clock'),
                array('label'=>'<i class="li_paperplane"></i>','value' => 'li_paperplane'),
                array('label'=>'<i class="li_params"></i>','value' => 'li_params'),
                array('label'=>'<i class="li_banknote"></i>','value' => 'li_banknote'),
                array('label'=>'<i class="li_data"></i>','value' => 'li_data'),
                array('label'=>'<i class="li_music"></i>','value' => 'li_music'),
                array('label'=>'<i class="li_megaphone"></i>','value' => 'li_megaphone'),
                array('label'=>'<i class="li_study"></i>','value' => 'li_study'),
                array('label'=>'<i class="li_lab"></i>','value' => 'li_lab'),
                array('label'=>'<i class="li_food"></i>','value' => 'li_food'),
                array('label'=>'<i class="li_t-shirt"></i>','value' => 'li_t-shirt'),
                array('label'=>'<i class="li_fire"></i>','value' => 'li_fire'),
                array('label'=>'<i class="li_clip"></i>','value' => 'li_clip'),
                array('label'=>'<i class="li_shop"></i>','value' => 'li_shop'),
                array('label'=>'<i class="li_calendar"></i>','value' => 'li_calendar'),
                array('label'=>'<i class="li_vallet"></i>','value' => 'li_vallet'),
                array('label'=>'<i class="li_vynil"></i>','value' => 'li_vynil'),
                array('label'=>'<i class="li_truck"></i>','value' => 'li_truck'),
                array('label'=>'<i class="li_world"></i>','value' => 'li_world'),

                )
            ),
           array(
            'label'       => 'Flip direction',
            'id'          => 'img_direction',
            'type'        => 'select',
            'desc'        => '',
            'std'         => 'flipY',
            'rows'        => '',
             'choices'     => array(
                array('label'=>'Horizontal','value' => 'flipY'),
                array('label'=>'Vertical','value' => 'flipX'),
              ),
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'img_direction',
            'section'     => ''
          ),      
          array(
            'label'       => 'First image',
            'id'          => 'img_1',
            'type'        => 'upload',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'img_1',
            'section'     => ''
          ),
          array(
            'label'       => 'Second image',
            'id'          => 'img_2',
            'type'        => 'upload',
            'desc'        => '',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'img_2',
            'section'     => ''
          ),

          array(
            'label'       => 'Slogan content',
            'id'          => 'slogan_text',
            'type'        => 'textarea',
            'desc'        => '',
            'std'         => '<h1>Theme shared on W P L O C K E R .C O M</h1>
                              <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt <br> ut
                    dolore magna aliqua. <br>
                    Ut enim ad minim veniam, quis nostrud ARGO.</p>',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => 'slogan_text',
            'section'     => ''
          ),

        ),
        'std'         => 'li_heart',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'nav_settings'
      ),
      array( 
          'id' => 'contact_email',
          'label' => 'Contact email',
          'desc' => 'Email address that contact form will send message to',
          'type' => 'text',
          'std' => get_option('admin_email'),
          'section' => 'contact_settings'
        ),

    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }

}


