<?php
/**
 * Argo functions and definitions
 *
 * @package Argo
 */

/**
 * Custom post types
 */
include_once( 'inc/post-types/portfolio.php' );
include_once( 'inc/post-types/team.php' );
include_once( 'inc/post-types/testimonial.php' );
include_once( 'form/form.php' );

/**
 * Argo Menu
 */
include_once( 'inc/menu.php' );

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'inc/options/ot-loader.php' );

/**
 * Options init
 */
include_once( 'inc/options/theme-options.php' );


/**
 * Shortcodes
 */
include_once( 'inc/shortcodes/shortcodes.php' );

function init_cookie(){
 
	
	if(isset($_GET['color'])){
		// Demo query
	$color = (isset($_GET['color'])) ? $_GET['color'] : 'default'; 
	setcookie("argo_color", $color, time()+1800);
		wp_redirect( site_url('/') ); exit();
	}
}

add_filter( 'init', 'init_cookie');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */
/**
 * Disable admin bar
 */
add_filter('show_admin_bar', '__return_false');  
/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'argo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function argo_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Argo, use a find and replace
	 * to change 'argo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'argo', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('brick_thumb', 195,195,true);
	add_image_size('brick_thumb_double', 195*2,195,true);
	add_image_size('portfolio_gallery', 1110,544,true);

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'video') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'argo' ) );
}
endif; // argo_setup
add_action( 'after_setup_theme', 'argo_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function argo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'argo' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'argo_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function argo_scripts() {
	global $wp_styles;
	$theme_style = ot_get_option('theme_color','default');
	$theme_style = ($theme_style=='default')?'style':$theme_style;
	if(isset($_COOKIE["argo_color"])){
		$theme_style = ($_COOKIE["argo_color"]=='default')?'style':('style-'.$_COOKIE["argo_color"]);
	}

	wp_enqueue_style( 'argo-main-style', get_template_directory_uri().'/assets/css/'.$theme_style.'.css' );
	wp_enqueue_style( 'argo-style', get_stylesheet_uri());
	wp_enqueue_style( 'argo-responsive', get_template_directory_uri().'/assets/css/responsive.css' );
	wp_enqueue_style( 'style-ie9', get_template_directory_uri() . '/assets/css/ie.css');
	$wp_styles->add_data( 'style-ie9', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js',array('jquery'), '10', true);
	wp_enqueue_script( 'customScrollbar', get_template_directory_uri().'/assets/js/jquery.mCustomScrollbar.concat.min.js',array('jquery'), '10', true);
	wp_enqueue_script( 'hoverdir', get_template_directory_uri().'/assets/js/jquery.hoverdir.js',array('jquery'), '10', true);
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/jquery.isotope.min.js',array('jquery'), '10', true);
	wp_enqueue_script( 'gmap_api', '//maps.google.com/maps/api/js?sensor=false', array('jquery'),'10', true);
	wp_enqueue_script( 'gmap', get_template_directory_uri().'/assets/js/gmap-min.js', array('jquery'),'10', true);
	wp_enqueue_script( 'main', get_template_directory_uri().'/assets/js/main.js',array('jquery'), '10', true);

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'Argo-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'argo_scripts' );


function main_query_homepage($query){
	$title_menu = ot_get_option('nav_items',false);
	
	$include = array();
	if($title_menu && !(is_string($title_menu))){
	    foreach ($title_menu as $menu_item) {
	        if($menu_item['link_type'] == 'page' && $menu_item['brick_type']=='nav_item')
	            $include[] = $menu_item['page_select'];
	    }
	 if ( $query->is_home() && $query->is_main_query() ) {
	 	$query->set( 'post_type' ,'page');
	 	$query->set( 'post__in' ,$include);
	 	$query->set( 'orderby' , 'post__in');
        //$query = new WP_Query(array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ));

    }	    	
  }
}
add_action( 'pre_get_posts', 'main_query_homepage' );

//Short text

function short_text($content='',$after = '', $length=30) {
	$mytitle = $content;
	if ( strlen($mytitle) > $length ) {
	$mytitle = substr($mytitle,0,$length);
	return $mytitle . $after;
	} else {
	return $mytitle;
	}
}