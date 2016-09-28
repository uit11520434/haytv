<?php 
/**
Popover Shorcodes
*/

function dnp_popover($params, $content = null){
	extract(shortcode_atts(array(
		'button_icon' => '',
		'button_type' => '',
		'button_text' => '',
		'button_size' => '',
		'title' => '',
		'placement' => '',
		'class' => ''
	), $params));
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	if ($button_icon != 'none' || $button_icon != '') {
		$result = '<a data-placement="'.$placement.'" data-content="'.do_shortcode($content ).'" class="btn btn-'.$button_type.' btn-'.$button_size.'" data-title="'.$title.'" href="#" rel="popover"><i class="'.$button_icon.'"></i> '.$button_text.'</a>';
	} else if ($button_icon == 'none' || $button_icon == '') {
		$result = '<a data-placement="'.$placement.'" data-content="'.do_shortcode($content ).'" class="btn btn-'.$button_type.' btn-'.$button_size.'" data-title="'.$title.'" href="#" rel="popover">'.$button_text.'</a>';
	}
	return force_balance_tags( $result );
}
add_shortcode('popover', 'dnp_popover');
