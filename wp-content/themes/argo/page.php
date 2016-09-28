<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Argo
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="primary" class="section">
		<div class="container">
				<?php get_template_part( 'content', 'page' ); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
    <?php 
	if( get_post_meta( get_the_ID(),'enable_divider',true ) == 'true') get_template_part( 'content', 'divider' );
     ?>
 <?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
