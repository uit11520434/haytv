<?php 
/*-----------------------------------------------------------------------------------*/
/* Argo Blog List Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( "bloglist", "argo_blog_shortcode" );
function argo_blog_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"row" => '2',
		"col" => '2'
	), $atts));
	
	$the_query = new WP_Query( 'post_type=post&posts_per_page=-1');

	if($the_query->have_posts()) :
		$col = ceil($the_query->found_posts/2);
		$blog = '';
		
		$i = 0;
		$blog = '<div class="blog_container">';
		while ( $the_query->have_posts() ) : $the_query->the_post();
			if( $i % $col == 0 ){
				if( $i != 0 ){
					$blog .= '</div>';
				}
				$blog .= '<div class="row-full clearfix">';
			}
			$id = get_the_ID();
			$data = get_post_meta($id);
			$span = (isset($data['size'])&&$data['size'][0]=='true')?'2':'1';
			if(has_post_thumbnail( ))
				$thumb = (isset($data['size'])&&$data['size'][0]=='true')?get_the_post_thumbnail(get_the_ID(),'brick_thumb_double'):get_the_post_thumbnail( get_the_ID(),'brick_thumb' );
			else $thumb = (isset($data['size'])&&$data['size'][0]=='true')?'<img src="http://placehold.it/390x195">':'<img src="http://placehold.it/195x195">'; 
			$ct = get_the_content();
            preg_match('|^\s*(https?://[^\s"]+)\s*$|im', $ct,$match);
			$span = 'brick'.$span;
			$blog .= '<div class="'.$span.'">';
			if(get_post_format()!=='video'){
						$blog .='<a href="'.get_permalink( ).'" class="article">
							'.$thumb.'
							<div class="meta">
								<h5><i class="icon-file-alt"></i>'.short_text(get_the_title(),'...',50).'</h5>
								<p class="desc">
									'.short_text(strip_tags($ct),' ...',250).'
								</p>
							</div>
						</a>';
				}
			else{
			 $blog .= apply_filters( 'the_content', $match[0] );
			}
			$blog.='</div>';
			$i++;
		endwhile;
		if( ($i - 1 ) % $col != 0 ) $blog .= '</div>';
		$blog .= '</div>';

		
	endif;
 wp_reset_query();
 return $blog;
}
