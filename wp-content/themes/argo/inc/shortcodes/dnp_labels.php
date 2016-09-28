<?php 
/**
* Labels Shorcodes
*/

/**
 * Labels
 */
function dnp_labels($params, $content = null){
	extract(shortcode_atts(array(
		'type' => ''
	), $params));
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<span class="label label-'.$type.'">'.do_shortcode($content ).'</span>';
	return force_balance_tags( $result );
}
add_shortcode('label', 'dnp_labels');
