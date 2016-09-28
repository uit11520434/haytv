<?php 
/**
Thumbnails Shorcodes
*/

function dnp_thumbnails_link($params, $content = null){
	extract(shortcode_atts(array(
		'alt' => '',
		'link' => '',
		'src' => ""
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<a class="thumbnail" href="'.$link.'"><img src="'.$src.'" alt="'.$alt.'"></a>';
	return force_balance_tags( $result );
}
add_shortcode('thumbnail-link', 'dnp_thumbnails_link');

function dnp_thumbnails_container($params, $content = null){
	extract(shortcode_atts(array(
		'alt' => '',
		'src' => ""
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="thumbnail"> <img src="'.$src.'" alt="'.$alt.'"> <div class="caption">'.do_shortcode($content ).' </div></div>';
	return force_balance_tags( $result );
}
add_shortcode('thumbnail-container', 'dnp_thumbnails_container');
