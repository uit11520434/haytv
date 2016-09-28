<?php 
/**
Tables Shorcodes
*/

/**
 * table
 */

function dnp_table($params, $content = null){
	extract(shortcode_atts(array(
		'id'=>'',
		'class'=>''
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<table class="table '.$class.'" id="'.$id.'">';
	$result .= do_shortcode($content );
	$result .= '</table>'; 
	return force_balance_tags( $result );
}
add_shortcode('table', 'dnp_table');

function dnp_tablehead($params, $content = null){
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<thead>';
	$result .= do_shortcode($content );
	$result .= '</thead>'; 
	return force_balance_tags( $result );
}
add_shortcode('tbhead', 'dnp_tablehead');

function dnp_tbody($params, $content = null){
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<tbody>';
	$result .= do_shortcode($content );
	$result .= '</tbody>'; 
	return force_balance_tags( $result );
}
add_shortcode('tbody', 'dnp_tbody');

function dnp_tablerow($params, $content = null){
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	
	$result = '<tr>';
	$result .= do_shortcode($content );
	$result .= '</tr>'; 
	return force_balance_tags( $result );
}
add_shortcode('trow', 'dnp_tablerow');

function dnp_tablecol($params, $content = null){
	extract(shortcode_atts(array(
		'type' => ''
 		), $params));

	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$tag = ($type==='')?'td':'th';
	$result = '<'.$tag.'>';
	$result .= do_shortcode($content );
	$result .= '</'.$tag.'>'; 
	return force_balance_tags( $result );
}
add_shortcode('tcol', 'dnp_tablecol');


