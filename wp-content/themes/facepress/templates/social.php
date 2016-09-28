<?php if( _core::method( 'post_settings' , 'useSocial' , $post -> ID ) ) : ?>

    <div class="share">

        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink( $post -> ID ); ?>" data-text="<?php echo $post -> post_title; ?>" data-count="horizontal"><?php _e( 'Tweet' , _DEV_ ); ?></a>
        <g:plusone size="medium"  href="<?php echo get_permalink( $post -> ID ); ?>"></g:plusone>
        <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode( get_permalink( $post -> ID ) ); ?>&amp;layout=button_count&amp;show_faces=false&amp;&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" height="20" width="109"></iframe>

        <?php /* hook for additional social items */ ?>    
        <?php _core::hook( 'social' ); ?>
            
    </div>        

<?php endif; ?>