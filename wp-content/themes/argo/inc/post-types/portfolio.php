<?php
/**
 * Projects functions and definitions
 *
 */

/*-----------------------------------------------------------------------------------*/
/*	Register Project post format.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'portfolio_posttype_init' );
if ( !function_exists( 'portfolio_posttype_init' ) ) :
function portfolio_posttype_init() {

	$portfolio_labels = array(
		'name' => _x('Portfolio', 'post type general name','dnt_protoss'),
		'singular_name' => _x('Portfolio', 'post type singular name','dnt_protoss'),
		'add_new' => _x('Add New', 'Portfolio','dnt_protoss'),
		'add_new_item' => __('Add New Portfolio','dnt_protoss'),
		'edit_item' => __('Edit Portfolio','dnt_protoss'),
		'new_item' => __('New Portfolio','dnt_protoss'),
		'all_items' => __('All Portfolio','dnt_protoss'),
		'view_item' => __('View Portfolio','dnt_protoss'),
		'search_items' => __('Search Portfolio','dnt_protoss'),
		'not_found' =>  __('No Portfolio found','dnt_protoss'),
		'not_found_in_trash' => __('No Portfolios found in Trash','dnt_protoss'), 
		'parent_item_colon' => '',
		'menu_name' => __('Portfolio','dnt_protoss')

	);
	$portfolio_args = array(
		'labels' => $portfolio_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 5,
		'menu_icon' => get_template_directory_uri().'/assets/img/ico_portfolio.png',
		'supports' => array( 'title', 'editor','thumbnail' )
	); 
	register_post_type( 'portfolio', $portfolio_args );

 }
	

endif;

/*-----------------------------------------------------------------------------------*/
/*	Portfolio custom taxonomies.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'portfolio_taxonomies_innit', 0 );
if ( !function_exists( 'portfolio_taxonomies_innit' ) ) :
function portfolio_taxonomies_innit() {
	// portfolio Category
	$labels = array(
		'name' => _x( 'Categories', 'taxonomy general name' ,'dnt_protoss'),
		'singular_name' => _x( 'Category', 'taxonomy singular name','dnt_protoss' ),
		'search_items' =>  __( 'Search Categories','dnt_protoss' ),
		'all_items' => __( 'All Categories' ,'dnt_protoss'),
		'parent_item' => __( 'Parent Category' ,'dnt_protoss'),
		'parent_item_colon' => __( 'Parent Category:' ,'dnt_protoss'),
		'edit_item' => __( 'Edit Category' ,'dnt_protoss'), 
		'update_item' => __( 'Update Category' ,'dnt_protoss'),
		'add_new_item' => __( 'Add New Category' ,'dnt_protoss'),
		'new_item_name' => __( 'New Category Name' ,'dnt_protoss'),
		'menu_name' => __( 'Category','dnt_protoss' ),
	); 	
	
	register_taxonomy('portfolio-category',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));

	// portfolio Tags
	$labels = array(
		'name' => _x( 'Tags', 'taxonomy general name','dnt_protoss' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name' ,'dnt_protoss'),
		'search_items' =>  __( 'Search Tags','dnt_protoss' ),
		'popular_items' => __( 'Popular Tags' ,'dnt_protoss'),
		'all_items' => __( 'All Tags','dnt_protoss' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Tag' ,'dnt_protoss'), 
		'update_item' => __( 'Update Tag' ,'dnt_protoss'),
		'add_new_item' => __( 'Add New Tag','dnt_protoss' ),
		'new_item_name' => __( 'New Tag Name' ,'dnt_protoss'),
		'separate_items_with_commas' => __( 'Separate tags with commas' ,'dnt_protoss'),
		'add_or_remove_items' => __( 'Add or remove tags','dnt_protoss' ),
		'choose_from_most_used' => __( 'Choose from the most used tags' ,'dnt_protoss'),
		'menu_name' => __( 'Tags','dnt_protoss' ),
	); 

	register_taxonomy('portfolio-tag','portfolio',array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-tag' ),
	));
}


endif;

/**
 * Overwrite gallery shortcodes
 * ------------------------------------------
 */

remove_shortcode( 'gallery' );

add_shortcode('gallery', 'argo_gallery_shortcode');

/**
 * The Gallery shortcode.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @param array $attr Attributes of the shortcode.
 * @return string HTML content to display gallery.
 */
function argo_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'portfolio_gallery',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='carousel slide'> \n <div class='carousel-inner'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link =  wp_get_attachment_link($id, $size);
		$active = ($i==0)?'active':'';
		$output .= "<{$itemtag} class='item {$active}'>";
		
		$output .= $link;
		$output .= "</{$itemtag}>";
		$i++;
	}

	$output .= "
		</div>\n
		<a class='left carousel-control' href='#$selector' data-slide='prev'>&lsaquo;</a>\n
	    <a class='right carousel-control' href='#$selector' data-slide='next'>&rsaquo;</a>
		</div>\n";

	return $output;
}

