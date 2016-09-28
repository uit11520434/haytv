<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to argo_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Argo
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

<div class="comment_wrap">
<?php if ( have_comments() ) : ?>
<h3><?php 
	echo get_comments_number() .' '. _nx( 'comment', 'comments', get_comments_number(), 'comments title', 'argo' );
 ?></h3>
<ol class="commentlist">
	<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use argo_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define argo_comment() and that will be used instead.
				 * See argo_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'argo_comment' ) );
			?>
</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	<nav id="comment-nav-below" class="navigation-comment" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'argo' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'argo' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'argo' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // check for comment navigation ?>

<?php endif; // have_comments() ?>
<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'argo' ); ?></p>
<?php endif; ?>
<?php
$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit',
	'title_reply' => __( 'Leave a Reply','argo' ),
	'title_reply_to' => __( 'Leave a Reply to %s','argo' ),
	'cancel_reply_link' => __( 'Cancel Reply','argo' ),
	'label_submit' => __( 'Post Comment','argo' ),
	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ,'argo') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>'  );
 comment_form($args); ?>

</div><!-- #comments -->
