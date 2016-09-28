<?php 
/**
* Social Shorcodes
*/

function dnp_social($params, $content = null){
	extract(shortcode_atts(array(
		'type' => 'facebook',
		'link' => '#'
	), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<a class="social '.$type.'" href="'.$link.'"><i class="icon-'.(($type!=='gplus')?$type:'google-plus').'"></i></a>';
	return force_balance_tags( $result );
}
add_shortcode('social', 'dnp_social');
