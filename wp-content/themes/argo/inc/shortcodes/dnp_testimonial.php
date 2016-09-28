<?php 
/*-----------------------------------------------------------------------------------*/
/* Argo testimonial List Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( "testimonial", "argo_testimonial_shortcode" );
function argo_testimonial_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"row" => '20',
		"col" => '2'
	), $atts));
	$number = $row * $col;
	$the_query = new WP_Query( 'post_type=testimonial&posts_per_page='.$number);

	if($the_query->have_posts()) :
		
		$testimonial = '<div class="testimonial carousel slide"><div class="carousel-inner">';
		$span = 12 / $col;
		$span = 'span'.$span;
		$i = 0;

		while ( $the_query->have_posts() ) : $the_query->the_post();
			
			$id = get_the_ID();
			$data = get_post_meta($id);
			$name 	= get_the_title();
			$active = ($i==0)?'active':'';	
			
			$testimonial .= '
					<div class="'.$active.' item">
						<img class="thumbnail" src="'.$data['mem_avatar'][0].'" alt="">	
						<div class="msg">
							<strong>'.$name.'</strong>
							<p>'.$data['quote'][0].'</p>
						</div>		
					</div>';
			$i++;
		endwhile;
		if( ($i - 1 ) % $col != 0 ) $testimonial .= '</div>';
		$testimonial .= '</div></div>';
	endif;
	wp_reset_query();
return $testimonial;
}
