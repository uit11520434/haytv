<?php
/* 
* Post and Page Metadata
* */


/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_page_settings', 1 );

/**
 * Custom metadata function.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
 
function _custom_page_settings() {

	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'option_tree_settings', array() );
	
	$metadata_settings = array(
		'id'          => 'metadata_settings',
		'title'       => 'Metadata Settings',
		'desc'        => '',
		'pages'       => array('page'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array( 
					'id' => 'page_custom_title',
					'label' => 'Title',
					'desc' => 'A title for section.',
					'type' => 'text',
					'std' => 'Section title'
				),
			array( 
					'id' => 'page_custom_description',
					'label' => 'Description',
					'desc' => 'A description for section.',
					'type' => 'textarea',
					'std' => 'Description',
					'rows' => '5'
				),

	      array(
	        'label'       => 'Enable divider',
	        'id'          => 'enable_divider',
	        'type'        => 'radio',
	        'desc'        => 'Select Yes if you want to enable a divider section',
	        'choices'     => array(
	          array(
	            'label'       => 'No',
	            'value'       => 'false'
	          ),
	          array(
	            'label'       => 'Yes',
	            'value'       => 'true'
	          ),
	        ),
	        'std'         => 'false',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => ''
	      ),
			 array(
	            'label'       => 'Divider image',
	            'id'          => 'div_image',
	            'type'        => 'upload',
	            'desc'        => 'Background for divider.',
	            'std'         => get_template_directory_uri().'/assets/img/fur.jpg',
	            'rows'        => '',
	            'post_type'   => '',
	            'taxonomy'    => '',
	            'class'       => 'div_image'
	          ),
			array( 
					'id' => 'div_html',
					'label' => 'Divider HTML code',
					'desc' => '',
					'class' => 'div_html',
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


