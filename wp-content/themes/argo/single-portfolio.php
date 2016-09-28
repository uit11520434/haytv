<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Argo
 */

 ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content( ); ?>
		<?php endwhile; // end of the loop. ?>
