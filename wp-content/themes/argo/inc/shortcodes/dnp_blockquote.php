<?php 
/**
 Blockquote Shorcodes
*/

function dnp_blockquote($params, $content = null){
	extract(shortcode_atts(array(
		'type' => '',
		'class' => ''
	), $params));
	
	$class = ($class!='')?'class="'.$class.'"':''; 
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<blockquote '.$class.'><p>'.do_shortcode($content ).'</p></blockquote>';
	return force_balance_tags( $result );
}
add_shortcode('blockquote', 'dnp_blockquote');

function dnp_blockquote_author($params, $content = null){
	extract(shortcode_atts(array(
		'type' => ''
	), $params));
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<small class="author">'.do_shortcode($content ).'</small>';
	return force_balance_tags( $result );
}
add_shortcode('bqauthor', 'dnp_blockquote_author');
