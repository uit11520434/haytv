<?php
/**
 * Projects functions and definitions
 *
 */

/*-----------------------------------------------------------------------------------*/
/*	Register Project post format.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'testimonial_osttype_init' );
if ( !function_exists( 'testimonial_osttype_init' ) ) :
function testimonial_osttype_init() {

	$testimonial_labels = array(
		'name' => _x('Testimonial', 'post type general name','argo'),
		'singular_name' => _x('Testimonial', 'post type singular name','argo'),
		'add_new' => _x('Add New', 'Portfolio','argo'),
		'add_new_item' => __('Add New Testimonial','argo'),
		'edit_item' => __('Edit Testimonial','argo'),
		'new_item' => __('New Testimonial','argo'),
		'all_items' => __('All Testimonials','argo'),
		'view_item' => __('View Testimonial','argo'),
		'search_items' => __('Search Testimonial','argo'),
		'not_found' =>  __('No Testimonial found','argo'),
		'not_found_in_trash' => __('No Testimonials found in Trash','argo'), 
		'parent_item_colon' => '',
		'menu_name' => __('Testimonials','argo')

	);
	$testimonial_args = array(
		'labels' => $testimonial_labels,
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
		'menu_icon' => get_template_directory_uri().'/assets/img/quote.png',
		'supports' => array( 'title' )
	); 
	register_post_type( 'testimonial', $testimonial_args );

 }
	

endif;


/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_testimonial_settings', 1 );

/**
 * Custom metadata function.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
 
function _custom_testimonial_settings() {

	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'option_tree_settings', array() );
	
	$metadata_settings = array(
		'id'          => 'quotes',
		'title'       => 'Testimonial info',
		'desc'        => '',
		'pages'       => array('testimonial'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
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
					'id' => 'quote',
					'label' => 'Testimonial',
					'desc' => '',
					'type' => 'textarea',
					'std' => '',
					'rows' => '5'
				)
	   
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


