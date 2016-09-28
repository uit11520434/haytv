<?php
/**
 * Twitter Botstrap Shortcodes by WPStrong
 * URL: http://themeforest.net/user/wpstrong
 * Version: 2.0
 */

define( 'SC_DIR', get_template_directory()  .'/inc/'.  basename( dirname( __FILE__ ) ) ) ;
define( 'SC_URL', get_template_directory_uri()  .'/inc/'.   basename( dirname( __FILE__ ) ) );	
require_once('dnp_alert.php');
require_once('dnp_buttons.php');
require_once('dnp_blockquote.php');
require_once('dnp_code.php');
require_once('dnp_collapse.php');
require_once('dnp_grid.php');
require_once('dnp_icons.php');
require_once('dnp_labels.php');

require_once('dnp_tabs.php');

require_once('dnp_progess.php');
require_once('dnp_team.php');
require_once('dnp_gmap.php');
require_once('dnp_blog.php');
require_once('dnp_testimonial.php');
require_once('dnp_social.php');
require_once('dnp_contact.php');
require_once('dnp_portfolio.php');
require_once('dnp_service.php');



class DNP_Shortcodes{
	
	function __construct()
	{
		//require_once('shortcodes.php');
		add_action('init',array(&$this, 'init'));
		add_filter('admin_head', array(&$this,'jsdata') );
	}
	
	function init(){
		
	

		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	    	return;
		}
	 
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array(&$this, 'regplugins') );
			add_filter( 'mce_buttons_3', array(&$this, 'regbtns') );
			wp_enqueue_style("dnp_shortcodes", get_template_directory_uri().'/inc/shortcodes/assets/css/shortcodes.css');

		}
	}
	function jsdata (){
		echo '<script type="text/javascript">var sc_url = "'.SC_URL.'";</script>';
	}

	function regbtns($buttons)
	{
		
		array_push($buttons, 'dnp_alerts');
		array_push($buttons, 'dnp_labels');
		array_push($buttons, 'dnp_code');
		array_push($buttons, 'dnp_blockquote');
		array_push($buttons, 'dnp_icons');
		array_push($buttons, 'dnp_buttons');
		array_push($buttons, 'dnp_collapse');
		array_push($buttons, 'dnp_grid');
		array_push($buttons, 'dnp_tabs');
		array_push($buttons, 'dnp_progress');
		array_push($buttons, 'dnp_gmap');
		array_push($buttons, 'dnp_social');
		array_push($buttons, 'dnp_service');
		return $buttons;
	}

	function regplugins($plgs)
	{
		
		$plgs['dnp_alerts'] = SC_URL.'/assets/js/plugins/alert.js';
		$plgs['dnp_buttons'] = SC_URL.'/assets/js/plugins/buttons.js';
		$plgs['dnp_blockquote'] = SC_URL.'/assets/js/plugins/blockquote.js';
		$plgs['dnp_code'] = SC_URL.'/assets/js/plugins/code.js';
		$plgs['dnp_collapse'] = SC_URL.'/assets/js/plugins/collapse.js';
		$plgs['dnp_grid'] = SC_URL.'/assets/js/plugins/grid.js';
		$plgs['dnp_icons'] = SC_URL.'/assets/js/plugins/icons.js';
		$plgs['dnp_labels'] = SC_URL.'/assets/js/plugins/labels.js';
		$plgs['dnp_modals'] = SC_URL.'/assets/js/plugins/modals.js';
		$plgs['dnp_tabs'] = SC_URL.'/assets/js/plugins/tabs.js';
		$plgs['dnp_gmap'] = SC_URL.'/assets/js/plugins/gmap.js';
		$plgs['dnp_progress'] = SC_URL.'/assets/js/plugins/progress.js';
		$plgs['dnp_social'] = SC_URL.'/assets/js/plugins/social.js';
		$plgs['dnp_service'] = SC_URL.'/assets/js/plugins/service.js';
		return $plgs;
	}


}
$dnpcodes = new DNP_Shortcodes();