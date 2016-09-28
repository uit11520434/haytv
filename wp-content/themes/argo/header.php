<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Argo
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html style="margin-top: 0 !important" class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html style="margin-top: 0 !important" class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html style="margin-top: 0 !important" class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <!--<![endif]-->
<html style="margin-top: 0 !important" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/html5shiv.js"></script>
  
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar">
<?php 
	if(is_home()|| is_front_page()):
		 argo_title_menu(); 
	  endif; 
	argo_navbar();
	
?>