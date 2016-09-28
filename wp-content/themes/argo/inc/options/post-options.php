<?php
/* 
* Post and Page Metadata
* */


/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_post_settings', 1 );

/**
 * Custom metadata function.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
 
function _custom_post_settings() {

	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'option_tree_settings', array() );
	
	$metadata_settings = array(
		'id'          => 'post_settings',
		'title'       => 'Post settings',
		'desc'        => '',
		'pages'       => array('post'),
		'context'     => 'side',
		'priority'    => 'default',
		'fields'      => array(
		  array(
	        'label'       => 'Size',
	        'id'          => 'size',
	        'type'        => 'radio',
	        'desc'        => '',
	        'choices'     => array(
	          array(
	            'label'       => 'Single',
	            'value'       => 'false'
	          ),
	          array(
	            'label'       => 'Double',
	            'value'       => 'true'
	          ),
	        ),
	        'std'         => 'false',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => ''
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


