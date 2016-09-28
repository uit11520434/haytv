<?php 
/**
Tabs Shorcodes

*/

/**
 * Tabs
 */
//-------------- 
//	[tabs]
//		[thead]
//			[tab href="#link" title="title"]
//			[dropdown title="title"]
//				[tab href="#link" title="title"]
//			[/dropdown]
//		[/thead]
//		[tcontents]
//			[tcontent id="link"]
//			[/tcontent]
//		[/tcontents]
//	[/tabs]
//	---------------
//	

function dnp_tabs($params, $content = null){
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="tab_wrap">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('tabs', 'dnp_tabs');

function dnp_thead($params, $content = null){
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<ul class="nav nav-tabs">';
	$result .= do_shortcode($content );
	$result .= '</ul>'; 
	return force_balance_tags( $result );
}
add_shortcode('thead', 'dnp_thead');

function dnp_tab($params, $content = null){
	extract(shortcode_atts(array(
		'href' => '#',
		'title' => '',
		'class' => ''
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);

	$result = '<li class="'.$class.'">';
	$result .= '<a data-toggle="tab" href="'.$href.'">'.$title.'</a>';
	$result .= '</li>'; 
	return force_balance_tags( $result );
}
add_shortcode('tab', 'dnp_tab');

function dnp_dropdown($params, $content = null){
	global $dnp_timestamp;
	extract(shortcode_atts(array(
		'title' => '',
		'id' => '',
		'class' => '',
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<li class="dropdown">';
	$result .= '<a class="'.$class.'" id="'.$id.'" class="dropdown-toggle" data-toggle="dropdown">'.$title.'<b class="caret"></b></a>';
	$result .='<ul class="dropdown-menu">';
	$result .= do_shortcode($content);
	$result .= '</ul></li>'; 
	return force_balance_tags( $result );
}
add_shortcode('dropdown', 'dnp_dropdown');

function dnp_tcontents($params, $content = null){
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="tab-content">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('tcontents', 'dnp_tcontents');

function dnp_tcontent($params, $content = null){
	extract(shortcode_atts(array(
		'id' => '',
		'class'=>'',
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$class= ($class=='active')?'active in':'';
	$result = '<div class="tab-pane fade '.$class.'" id='.$id.'>';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('tcontent', 'dnp_tcontent');
