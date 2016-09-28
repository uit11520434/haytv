<?php 
/*-----------------------------------------------------------------------------------*/
/* Argo Team List Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( "team", "argo_team_shortcode" );
function argo_team_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"row" => '20',
		"col" => '2'
	), $atts));
	$number = $row * $col;
	$the_query = new WP_Query( 'post_type=team&posts_per_page='.$number);

	if($the_query->have_posts()) :
		
		$team = '';
		$span = 12 / $col;
		$span = 'span'.$span;
		$i = 0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			if( $i % $col == 0 ){
				if( $i != 0 ){
					$team .= '</div>';
				}
				$team .= '<div class="our-team row">';
			}
			$id = get_the_ID();
			$data = get_post_meta($id);
			$name 	= get_the_title();
			$avatar 	= !empty($data['mem_avatar'][0]) ? $data['mem_avatar'][0] : '' ;
			$title 	= !empty($data['job_title'][0]) ? $data['job_title'][0] : '' ;
			$info 	= !empty($data['mem_info'][0]) ? $data['mem_info'][0] : '' ;
			$social 	= !empty($data['facebook'][0]) ? '<a class="facebook" href="'.$data['facebook'][0].'"><i class="icon-facebook"></i></a>' : '' ;
			$social 	.= !empty($data['twitter'][0]) ?  '<a class="twitter" href="'.$data['twitter'][0].'"><i class="icon-twitter"></i></a>': '' ;
			$social 	.= !empty($data['gplus'][0]) ? '<a class="gplus" href="'.$data['gplus'][0].'"><i class="icon-google-plus"></i></a>' : ''  ;
			$social 	.= !empty($data['linkedin'][0]) ? '<a class="linkedin" href="'.$data['linkedin'][0].'"><i class="icon-linkedin"></i></a>' : '' ;
			$social 	.= !empty($data['website'][0]) ? '<a class="linkedin" href="'.$data['website'][0].'"><i class="icon-globe"></i></a>' : '' ;
			$social 	.= !empty($data['email'][0]) ? '<a class="linkedin" href="'.$data['email'][0].'"><i class="icon-envelope"></i></a>' : '' ;
			
			$team .= '
		<div class="'.$span.'">
			<div class="team">
				<div class="ava">
					<img alt="team 1" src="'.$avatar.'">
				</div>
				<div class="info">
					<h4 class="name">'.$name.'<small> - '.$title.'</small></h4>
					<div>'.$info.'</div>
				</div>
				<div class="social">
					'.$social.'
				</div>
			</div>
		</div>';
			$i++;
		endwhile;
		if( ($i - 1 ) % $col != 0 ) $team .= '</div>';
		//$team .= '</div>';
	endif;
	wp_reset_query();
return $team;
}
