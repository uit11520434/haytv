<?php 
/**
Grid Shorcodes

*/

/**
 * Row
 */
function dnp_row($params, $content = null){
	extract(shortcode_atts(array(
		'class' => 'row-fluid'
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('row', 'dnp_row');

/**
 * Col span
 */
function dnp_span($params,$content=null){
	extract(shortcode_atts(array(
		'class' => 'span1'
		), $params));

	$result = '<div class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('col', 'dnp_span');