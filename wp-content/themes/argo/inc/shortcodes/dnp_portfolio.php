<?php 
/*-----------------------------------------------------------------------------------*/
/* Argo portfolio List Shortcode
/*-----------------------------------------------------------------------------------*/
add_shortcode( "portfolio", "argo_portfolio_shortcode" );
function argo_portfolio_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
     $portfolio_query = new WP_Query( 'post_type=portfolio&posts_per_page=12' ); ?>
		<?php if( $portfolio_query->have_posts() ) : ?>
		
				<?php $categories = get_terms( 'portfolio-category', 'orderby=count&hide_empty=0' ); ?>
				<?php if ($categories) : ?>
				<div class="portfolio">
				<ul class="filter clearfix">
					<li class="active" ><a data-filter="*" href="#"><?php _e('All','argo'); ?></a></li>
				<?php foreach ($categories as $category ) : ?>
					<li ><a  data-filter=".<?php echo $category->slug; ?>" href="#" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a></li>
				<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				
				<?php $i=0; ?>
				<ul class="isotope clearfix">
				<?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>

				<?php 	
					$categories = wp_get_post_terms(get_the_ID(), 'portfolio-category', array("fields" => "all"));
					$slugs = $titles  = array();
					foreach ($categories as $category) {
						$slugs[] = $category->slug;
						$titles[] = $category->name;
					}
					$post_class = 'item brick1 '. implode(' ', $slugs) ;
					if('video' == get_post_meta(get_the_ID(), '_project_display_option',true)) {
						$post_class.= ' format-video';
					}
				?>
					<li class="<?php echo $post_class; ?>">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'brick_thumb' ); ?>
							<div class="hover">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico_search.png" alt="">
								<h4><?php the_title( ); ?> </h4>
								<p><?php echo implode(', ', $titles) ;  ?></p>
						    </div>
						</a>
					</li>
				<?php $i++; ?>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
		<?php wp_reset_postdata(); ?>
		<!-- Modal -->
		<div id="modalbox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
			</div>
		</div> <?php
}
