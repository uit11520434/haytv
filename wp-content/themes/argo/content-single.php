<?php
/**
 * @package Argo
 */
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('span8');?>>
		<?php if(has_post_thumbnail()): ?>
			<?php the_post_thumbnail( 'full') ?>	
		<?php elseif(get_post_format()!='video'): ?>
			<img src="http://placehold.it/770x350" alt="place holder">
		<?php endif; ?>
		<div class="meta">
			<h1><i class="icon-file-alt"></i> <?php the_title( ); ?></h1>
		</div>
		<p class="author"><?php argo_posted_on(); ?></p>
		<div class="content">
			<?php the_content( ); ?>
		</div>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'argo' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'argo' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

