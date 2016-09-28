<?php if( _core::method( 'post_settings' , 'useSource' , $post -> ID ) ) : $meta = _core::method( '_meta' , 'get' , $post -> ID , 'posts-settings' ); ?>

    <?php if( !empty( $meta[ 'source' ] ) ) : ?>
        <aside class="widget">
            <div class="share">
                <div class="source no_source">
                    <h4 class="widget-title"><?php _e( 'Source' , _DEV_ ); ?></h4>
                    <span class="delimiter">&nbsp;</span>
                    <p>
                        <span>
                            <?php
                            if( strpos( $meta[ 'source' ], 'http') === false ) {
                                $source_url = 'http://' . $meta[ 'source' ];
                            } else {
                                $source_url = $meta[ 'source' ];
                            }?>
                            <a href="<?php echo $source_url; ?>" target="_blank"><?php echo $source_url; ?></a>
                        </span>
                    </p>
                </div>
            </div>
        </aside>

    <?php endif; ?>

<?php endif; ?>
                            