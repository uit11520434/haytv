<?php 
/**
 * Progess shortcode
 */
function dnp_progress($params, $content = null){
	extract(shortcode_atts(array(
		'value' => '50',
		'text' => ''
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="progress">';
	$result .= '<div class="bar" style="width:'.$value.'%" data-width="'.$value.'"><span>'.$text.'</span></div>';
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('progress', 'dnp_progress');
