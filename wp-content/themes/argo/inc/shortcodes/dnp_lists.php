<?php 
/**
Lists Shorcodes
*/


function dnp_ul($params, $content = null){
	extract(shortcode_atts(array(
		'class'=>''
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<ul class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</ul>'; 
	return force_balance_tags( $result );
}
add_shortcode('ul', 'dnp_ul')

;function dnp_ol($params, $content = null){
	extract(shortcode_atts(array(
		'class'=>''
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<ol class="'.$class.'">';
	$result .= do_shortcode($content );
	$result .= '</ol>'; 
	return force_balance_tags( $result );
}
add_shortcode('ol', 'dnp_ol');


function dnp_li($params, $content = null){
	extract(shortcode_atts(array('icon' => '' ), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	if ($icon == '') {
		$result = '<li>';
		$result .= do_shortcode($content );
		$result .= '</li>'; 
	} else {
		$result = '<li>';
		$result .= '<i class="'.$icon.'"></i> ';
		$result .= do_shortcode($content );
		$result .= '</li>'; 

	}
	return force_balance_tags( $result );
}
add_shortcode('li', 'dnp_li');


