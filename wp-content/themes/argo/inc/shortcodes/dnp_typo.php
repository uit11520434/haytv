<?php 
/**
Images Shorcodes
*/

function dnp_typo_p($params, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<p class="'.$class.' ">'. do_shortcode( $content ) .'</p>';
	return force_balance_tags( $result );
}
add_shortcode('p', 'dnp_typo_p');

function dnp_typo_h1($params, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h1 class="'.$class.' ">'. do_shortcode( $content ) .'</h1>';
	return force_balance_tags( $result );
}
add_shortcode('h1', 'dnp_typo_h1');

function dnp_typo_h2($params, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h2 class="'.$class.' ">'. do_shortcode( $content ) .'</h2>';
	return force_balance_tags( $result );
}
add_shortcode('h2', 'dnp_typo_h2');

function dnp_typo_h3($params, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h3 class="'.$class.' ">'. do_shortcode( $content ) .'</h3>';
	return force_balance_tags( $result );
}
add_shortcode('h3', 'dnp_typo_h3');

function dnp_typo_h4($params, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h4 class="'.$class.' ">'. do_shortcode( $content ) .'</h4>';
	return force_balance_tags( $result );
}
add_shortcode('h4', 'dnp_typo_h4');

function dnp_typo_h5($params, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<h5 class="'.$class.' ">'. do_shortcode( $content ) .'</h5>';
	return force_balance_tags( $result );
}
add_shortcode('h5', 'dnp_typo_h5');
