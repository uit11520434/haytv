<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Argo
 */
?>


<div class="hero">
	<h1><?php echo get_post_meta( get_the_ID(),'page_custom_title',true ); ?></h1>
	<p><?php echo get_post_meta( get_the_ID(),'page_custom_description',true ); ?></p>
</div>
<div class="entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->

