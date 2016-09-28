<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Argo
 */

get_header(); 
$title_menu = ot_get_option('nav_items',false);
if($title_menu && !is_string($title_menu)){
 $include = array();
    foreach ($title_menu as $menu_item) {
        if($menu_item['link_type'] == 'page' && $menu_item['brick_type']=='nav_item')
            $include[] = $menu_item['page_select'];
    }
   // query_posts( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
}
?>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'content', get_post_format() );
				?>
				<div class="section" id="<?php echo $post->post_name; ?>">
					<div class="container">
							<?php get_template_part( 'content', 'page' ); ?>
					</div>
				</div>
				<?php 
				if( get_post_meta( get_the_ID(),'enable_divider',true ) == 'true') get_template_part( 'content', 'divider' );
			     ?>
			<?php endwhile; wp_reset_query();?>
			
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
<?php get_footer(); ?>