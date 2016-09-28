<?php 
/**
Images Shorcodes
*/

function dnp_images($params, $content = null){
	extract(shortcode_atts(array(
		'alt' => '',
		'class' => '',
		'src' => ""
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<img class="image '.$class.'" src="'.$src.'" alt="'.$alt.'" />';
	return force_balance_tags( $result );
}
add_shortcode('image', 'dnp_images');
