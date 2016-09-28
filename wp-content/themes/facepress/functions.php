<?php
    /* FOR DEBUGING ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    /*
        include get_template_directory() . '/lib/core/deb.php';
        _deb::inc();
    */

    /* DEFINES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    /*
        _DEV_   - developer name used in translation                            ex : __( 'Title for translate' , _DEV_ ); or _e( 'Title for translate' , _DEV_ );
        _DEVL_  - developer logo url used in admin panel
    */
    if( !defined( '_DEV_' ) ){
        define( '_DEV_' , 'cosmotheme' );
    }
	define( '_CT_' , 'CosmoThemes' );
    define( '_DEVL_' , get_template_directory_uri() . '/lib/core/images/freetotryme.png' );
    define( '_RES_' , 'cosmo_custom_posts' );
    define( '_SBAR_' , 'cosmo_custom_sidebars' );
	define( '_TLTP_' , 'cosmo_tooltip' );
    define( '_WG_' , 'widgets_relations' );
	define('ZIP_NAME'   , 'FacePress' );
	define('DEFAULT_AVATAR_100'   , get_template_directory_uri()."/images/default_avatar_100.jpg" );
	define('DEFAULT_AVATAR'   , get_template_directory_uri() . "/images/default_avatar.jpg" );
	define('BLOCK_TITLE_LEN' , 50 );
	define( 'POSTS_PER_AUTHOR_PAGE' , 9 );
	define( 'AUTHORS_PER_FOLLOWING_AND_FOLLOWERS' , 50 );
	
    /* ADMIN SIDE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
    include get_template_directory() . '/lib/main.php';	
	
	if(is_admin() && ini_get('allow_url_fopen') == '1'){
		/*New version check*/	
		
		if( _core::method( '_settings' , 'logic' , "extra" , "settings" , "notifications" , "version" ) ) {
			function versionNotify(){
				echo _core::method( '_api_call' , 'compareVersions' ); 
			}
		
			/* Add hook for admin <head></head> */
			add_action( 'admin_head' , 'versionNotify' );
		}

		 	
	}
	
	if( function_exists( 'add_theme_support' ) ){
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
    }

    _core::method( '_image' , 'add_size' );
    
	if (version_compare($wp_version, '3.4', '>=')) { 
		add_theme_support( 'custom-background' );
	}else{ 
		if( function_exists( 'add_custom_background' ) ){
			add_custom_background();
		}else{
			add_theme_support( 'custom-background' );
		}
	}	
    
	/* add_theme_support( 'post-formats' , array( 'image' , 'video' , 'audio' ) ); */
	add_editor_style('editor-style.css');
	
	/* Localization */
    load_theme_textdomain( _DEV_ );
    load_theme_textdomain( _DEV_ , get_template_directory() . '/languages' );
    
    if ( function_exists( 'load_child_theme_textdomain' ) ){
        load_child_theme_textdomain( _DEV_ );
    }

	if( !_core::method( "_settings" , "logic" , "settings" , 'general' , 'theme' , 'show-admin-bar' ) ){
		add_filter( 'show_admin_bar' , '__return_false' );
	}

	/* Uncomment line below once if want to recopy voted posts from posts meta to users meta*/
	// delete_option( 'user_meta_votes_copied' );

	/*
	** Copy votes from posts meta to users meta
	*/
	function copy_votes_to_user_meta() {

		/**/
		$args = array(
			'posts_per_page'   => -1,
			'meta_key'         => 'like',
			'post_type'        => 'post'
		);
		
		$liked_posts = get_posts( $args );

		foreach ( $liked_posts as $liked_post ) {
			$l = get_post_meta( $liked_post -> ID, 'like' );
			$post_likes = $l[0];
			foreach ( $post_likes as $post_like ) {

				// if user is registered one
				if ( 0 != $post_like['user_id'] ) {
					$u = get_user_meta( $post_like['user_id'], 'like' );
					$user_likes = $u[0];
					if ( is_null( $user_likes ) ) $user_likes = array();

					if ( !in_array( $liked_post -> ID, $user_likes ) ) array_push( $user_likes, $liked_post -> ID );

					update_user_meta( $post_like['user_id'], 'like', $user_likes);

					// delete_user_meta( $post_like['user_id'], 'like' );

				}
			}
		}
		/**/
	}

	/*
	** Check if voted posts were copied from posts meta to users meta
	** If false then add a hook to 'init' action to copy them
	*/
	if ( false == get_option( 'user_meta_votes_copied' ) ) {
		update_option( 'user_meta_votes_copied', true );
		add_action( 'init', 'copy_votes_to_user_meta' );
	}

	
	/**
	 * As WP 4.0 added wp_texturize, we'll need the next function to disable texturizing the shortcodes.
	 */
	
	function disable_texturize_for_shortcodes( $shortcodes ) {
		global $shortcode_tags;

		foreach ($shortcode_tags as $key => $value) {
			$shortcodes[] = $key;
		}
	    

	    return $shortcodes;
	}
	add_filter( 'no_texturize_shortcodes', 'disable_texturize_for_shortcodes' );
?>