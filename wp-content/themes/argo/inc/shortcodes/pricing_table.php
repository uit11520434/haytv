<?php
/**
 * Pricing Table functions and definitions
 */


add_action( 'admin_enqueue_scripts', 'dnp_pricing_admin_script_method' );
function dnp_pricing_admin_script_method() {
	//wp_enqueue_style("dws_bootstrap", get_template_directory_uri().'/inc/shortcodes/assets/css/bootstrap.css');
	wp_enqueue_style("dnp_shortcodes", get_template_directory_uri().'/inc/shortcodes/assets/css/shortcodes.css');
	wp_enqueue_style('dnp_pricing_admin_style', get_template_directory_uri().'/assets/css/admin.css');
	wp_enqueue_script( 'dnp_pricing_admin_script', get_template_directory_uri() . '/assets/js/admin.js',array('jquery') );
}

/*-----------------------------------------------------------------------------------*/
/*	Register Pricing Table post format.
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'pt_posttype_init' );
if ( !function_exists( 'pt_posttype_init' ) ) :
function pt_posttype_init() {

	$pt_labels = array(
		'name' => _x('Pricing Tables', 'post type general name','dnt_protoss'),
		'singular_name' => _x('Table', 'post type singular name','dnt_protoss'),
		'add_new' => _x('Add New', 'table','dnt_protoss'),
		'add_new_item' => __('Add New Table','dnt_protoss'),
		'edit_item' => __('Edit Table','dnt_protoss'),
		'new_item' => __('New Table','dnt_protoss'),
		'all_items' => __('All Tables','dnt_protoss'),
		'view_item' => __('View Table','dnt_protoss'),
		'search_items' => __('Search Tables','dnt_protoss'),
		'not_found' =>  __('No tables found','dnt_protoss'),
		'not_found_in_trash' => __('No tables found in Trash','dnt_protoss'), 
		'parent_item_colon' => '',
		'menu_name' => __('Pricing Tables','dnt_protoss')

	);
	$pt_args = array(
		'labels' => $pt_labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'menu_icon' => get_template_directory_uri().'/assets/img/ico_price.png',
		'menu_position' => 5,
		'supports' => array( 'title' )
	); 
	register_post_type( 'pricing-table', $pt_args );
}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Add Pricing Table Metaboxes
/*-----------------------------------------------------------------------------------*/
// Add metabox
add_action('admin_init', 'pt_metabox');
function pt_metabox(){
	add_meta_box('pt-metabox', 'Pricing Table Data', 'pt_metabox_callback', 'pricing-table', 'normal');
	add_meta_box('pt-metabox-display-info', 'Pricing Table Display Info', 'pt_metabox_display_callback', 'pricing-table', 'side');
}

function pt_metabox_display_callback($post) {
	echo '<p><strong>Shortcode</strong>:<br />';
	echo '<code>[pricingtable slug="'.$post->post_name.'"]</code></p>';
}

// Metabox callback
function pt_metabox_callback() {
if( get_post_meta(get_the_ID(), '_pt_textarea', true) ) :
	echo get_post_meta(get_the_ID(), '_pt_textarea', true);
else : ?>
<div class="pricing-table grid4 style-1" data-style="style-1">
	<div class="pt-column">
		<div class="pt-header">
			<strong data-editable="true">Header</strong>
			<span data-editable="true">Great for Personal</span>
			<i class="icon-remove rm_col" title="Remove this column"></i>
			<i class="icon-star set_featured" title="Set as featured"></i>
		</div>
		<div class="pt-price">
			<strong data-editable="true">$199</strong>
			<span data-editable="true">/ month</span>
		</div>
		<ul>
			<li class="btn_add_more"><i class="icon-plus" title="Add new feature"></i></li>
		</ul>
		<div class="pt-footer" data-editable="true"><a class="btn" href="#">Button</a></div>
	</div>
	<div class="pt-column">
		<div class="pt-header">
			<strong data-editable="true">Header</strong>
			<span data-editable="true">Great for Organization</span>
			<i class="icon-remove rm_col" title="Remove this column"></i>
			<i class="icon-star set_featured" title="Set as featured"></i>
		</div>
		<div class="pt-price">
			<strong data-editable="true">$199</strong>
			<span data-editable="true">/ month</span>
		</div>
		<ul>
			<li class="btn_add_more"><i class="icon-plus" title="Add new feature"></i></li>
		</ul>
		<div class="pt-footer" data-editable="true"><a class="btn" href="#">Button</a></div>
	</div>
	<div class="pt-column">
		<div class="pt-header">
			<strong data-editable="true">Header</strong>
			<span data-editable="true">Great for Business</span>
			<i class="icon-remove rm_col" title="Remove this column"></i>
			<i class="icon-star set_featured" title="Set as featured"></i>
		</div>
		<div class="pt-price">
			<strong data-editable="true">$199</strong>
			<span data-editable="true">/ month</span>
		</div>
		<ul>
			<li class="btn_add_more"><i class="icon-plus" title="Add new feature"></i></li>
		</ul>
		<div class="pt-footer" data-editable="true"><a class="btn" href="#">Button</a></div>
	</div>
	<div class="pt-column">
		<div class="pt-header">
			<strong data-editable="true">Header</strong>
			<span data-editable="true">Great for E-Commerce</span>
			<i class="icon-remove rm_col" title="Remove this column"></i>
			<i class="icon-star set_featured" title="Set as featured"></i>
		</div>
		<div class="pt-price">
			<strong data-editable="true">$199</strong>
			<span data-editable="true">/ month</span>
		</div>
		<ul>
			<li class="btn_add_more"><i class="icon-plus" title="Add new feature"></i></li>
		</ul>
		<div class="pt-footer" data-editable="true"><a class="btn" href="#">Button</a></div>
	</div>
</div>
<?php endif; ?>
<i class="icon-plus btn_add_column"></i>
<select id="pt-table-style">
	<option value="style-1">Style 1</option>
	<option value="style-2">Style 2</option>
</select>
<textarea name="pt_textarea" id="pt_textarea" cols="30" rows="10"><?php echo get_post_meta(get_the_ID(), '_pt_textarea', true); ?></textarea>
<?php }


// Action when save pricing table
add_action('save_post', 'pt_admin_save_pricing_table');
function pt_admin_save_pricing_table($post_id){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	if( isset($_POST['post_type']) && 'pricing-table' == $_POST['post_type'] ){
		if( !empty($_POST['pt_textarea']) ){
			update_post_meta($post_id, '_pt_textarea', $_POST['pt_textarea']);
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Pricing Table Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( "pricingtable", "pt_shortcode" );
function pt_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"slug" => '0'
	), $atts));
	$args=array(
		'name' => $slug,
		'post_type' => 'pricing-table',
		'post_status' => 'publish',
		'numberposts' => 1
	);
	$post = get_posts($args);
	$id = !empty($post) ? $post[0]->ID : 0;
	$pricingtable = get_post_meta( $id, '_pt_textarea', true);
	return pt_shortcode_filter( $pricingtable );
}

function pt_shortcode_filter($pricingtable){
	$class = array( 'rm_col', 'btn_add_more', 'icon-star', 'set_featured' );

	foreach ($class as $c) {
		$pricingtable = preg_replace('/<(i|li)[^>]+class="[^>]*'.$c.'[^>]*"[^>]*>[\s\S]+?<\/(i|li)>/i', '', $pricingtable);
	}

	$pricingtable = preg_replace('/data-editable="[^\"]*"/', '', $pricingtable);
	$pricingtable = preg_replace('/data-removable="[^\"]*"/', '', $pricingtable);
	return $pricingtable;
}

// Edit table of pricing table posttype
add_filter('manage_edit-pricing-table_columns', 'pt_columns');
function pt_columns($columns) {
	$columns['shortcode'] = 'Shortcode';
	return $columns;
}

add_action('manage_posts_custom_column',  'pt_show_columns');
function pt_show_columns($name) {
	global $post;
	switch ($name) {
		case 'shortcode':
			echo '<code>[pricingtable slug="'.$post->post_name.'"]</code>';
	}
}