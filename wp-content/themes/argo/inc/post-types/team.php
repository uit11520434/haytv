<?php
/**
 * Projects functions and definitions
 *
 */

/*-----------------------------------------------------------------------------------*/
/*	Register Project post format.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'team_posttype_init' );
if ( !function_exists( 'team_posttype_init' ) ) :
function team_posttype_init() {

	$team_labels = array(
		'name' => _x('Member', 'post type general name','argo'),
		'singular_name' => _x('Member', 'post type singular name','argo'),
		'add_new' => _x('Add New', 'Portfolio','argo'),
		'add_new_item' => __('Add New Member','argo'),
		'edit_item' => __('Edit Member','argo'),
		'new_item' => __('New Member','argo'),
		'all_items' => __('All Members','argo'),
		'view_item' => __('View Member','argo'),
		'search_items' => __('Search Member','argo'),
		'not_found' =>  __('No Member found','argo'),
		'not_found_in_trash' => __('No Members found in Trash','argo'), 
		'parent_item_colon' => '',
		'menu_name' => __('Team','argo')

	);
	$team_args = array(
		'labels' => $team_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'exclude_from_search' => true,
		'menu_position' => 4,
		'menu_icon' => get_template_directory_uri().'/assets/img/team.png',
		'supports' => array( 'title' )
	); 
	register_post_type( 'team', $team_args );

 }
	

endif;


/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_team_settings', 1 );

/**
 * Custom metadata function.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
 
function _custom_team_settings() {

	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'option_tree_settings', array() );
	
	$metadata_settings = array(
		'id'          => 'member_info',
		'title'       => 'Member Info',
		'desc'        => '',
		'pages'       => array('team'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array( 
					'id' => 'job_title',
					'label' => 'Job title',
					'desc' => '',
					'type' => 'text',
					'std' => ''
				),
			 array(
	            'label'       => 'Avatar',
	            'id'          => 'mem_avatar',
	            'type'        => 'upload',
	            'desc'        => '',
	            'std'         => '',
	            'rows'        => '',
	            'post_type'   => '',
	            'taxonomy'    => '',
	            'class'       => ''
	          ),
			array( 
					'id' => 'mem_info',
					'label' => 'Brief description',
					'desc' => '',
					'type' => 'textarea',
					'std' => '',
					'rows' => '5'
				),
			array( 
					'id' => 'facebook',
					'label' => 'Facebook link',
					'desc' => 'Leave empty for disable',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'id' => 'twitter',
					'label' => 'Twitter link',
					'desc' => 'Leave empty for disable',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'id' => 'gplus',
					'label' => 'Google+ link',
					'desc' => 'Leave empty for disable',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'id' => 'linkedin',
					'label' => 'Linkedin link',
					'desc' => 'Leave empty for disable',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'id' => 'website',
					'label' => 'Link to home page',
					'desc' => 'Leave empty for disable',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'id' => 'email',
					'label' => 'Link to email',
					'desc' => 'Leave empty for disable',
					'type' => 'text',
					'std' => ''
				),
	   
		)
	);

	/**
	* Register our meta boxes using the 
	* ot_register_meta_box() function.
	*/


    ot_register_meta_box( $metadata_settings );
	/* allow settings to be filtered before saving */
	$metadata_settings = apply_filters( 'option_tree_settings_args', $metadata_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $metadata_settings ) {
		update_option( 'option_tree_settings', $metadata_settings ); 
	}
	
} // end the custom metadata function


