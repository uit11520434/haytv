<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Argo
 */

if ( ! function_exists( 'argo_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function argo_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'argo' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'argo' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'argo' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'argo' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'argo' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // argo_content_nav

if ( ! function_exists( 'argo_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function argo_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'argo' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'argo' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<?php echo get_avatar( $comment, 40 ); ?>
				<div class="comment-content">
					<?php printf( __( '<strong class="name">%s</strong>', 'argo' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author( ) ) ); ?>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'argo' ); ?></em>
					<br />
				<?php endif; ?>

				<?php comment_text(); ?>
				<?php comment_reply_link( array_merge( array('reply_text'=>'<i class="icon-reply"></i>'.__('reply','argo')), array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<time datetime="2012-08-13T03:02:22+00:00" pubdate=""> <i class="icon-time"></i>  <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'argo' ), get_comment_date(), get_comment_time() ); ?></time>	
				</div><!-- .comment-meta .commentmetadata -->
			<?php edit_comment_link( __( 'Edit', 'argo' ), '<span class="edit-link">', '<span>' ); ?>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for argo_comment()

if ( ! function_exists( 'argo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function argo_posted_on() {
	printf( __( 'Posted on <time class="entry-date" datetime="%2$s">%4$s</time><span class="byline"> by <span class="author vcard">%7$s</span></span>', 'argo' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'argo' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;
/**
 * Returns true if a blog has more than 1 category
 */
function argo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so argo_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so argo_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in argo_categorized_blog
 */
function argo_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'argo_category_transient_flusher' );
add_action( 'save_post', 'argo_category_transient_flusher' );