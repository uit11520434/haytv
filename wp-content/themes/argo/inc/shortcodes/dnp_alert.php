<?php 
/**
Notifications/Alers Shorcodes
*/

/**
 * Notification
 */
function dnp_notice($params, $content = null){
	extract(shortcode_atts(array(
		'type' => '',
		'value' => ''
	), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="alert alert-'.$type.'">';
	$result .= '<button class="close" type="button" data-dismiss="alert">x</button>';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('notification', 'dnp_notice');
