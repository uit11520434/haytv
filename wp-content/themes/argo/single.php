<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Argo
 */

get_header(); ?>

<div class="section">
	<div id="blog-content" class="container">
	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'single' ); ?>
		<?php endwhile; // end of the loop. ?>
		<?php get_sidebar( ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>