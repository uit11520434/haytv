<?php 
/**
Code Shortcodes
*/

function dnp_code_block($params, $content = null){
	extract(shortcode_atts(array(
		'type' => '',
		'value' => ''
	), $params));
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<pre>'.do_shortcode($content ).'</pre>';
	return force_balance_tags( $result );
}
add_shortcode('pre', 'dnp_code_block');

function dnp_code_inline($params, $content = null){
	extract(shortcode_atts(array(
		'type' => '',
		'value' => ''
	), $params));
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<code>'.do_shortcode($content ).'</code>';
	return force_balance_tags( $result );
}
add_shortcode('code', 'dnp_code_inline');
