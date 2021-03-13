<?php

function comments_callback( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;

    switch ( $comment->comment_type ) :

        case 'pingback' :

        case 'trackback' :

            // Display trackbacks differently than normal comments.

            ?>

            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

            <p>pingback <?php comment_author_link(); ?> <?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>

            <?php

            break;

        default :

            // Proceed with normal comments.

            global $post;

            ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div class="comment">
                    <div class="comment-avatar">
                        <?php echo  get_avatar($comment,65); ?>
                    </div>
                    <div class="comment-content" id="comment-<?php comment_ID(); ?>">
                        <?php edit_comment_link('<span></span>', '<p class="edit-link">', '</p>' ); ?>
                        <?php if ( '0' == $comment->comment_approved ) : ?>

                            <p class="bg-danger comment-awaiting-moderation">Text For awaiting moderation comments</p>
                        <?php endif; ?>
                        <div class="comment-author">
                            <?php printf( '<cite class="fn %2$s">%1$s</cite>',get_comment_author_link(),( $comment->user_id === $post->post_author ) ? 'author' : ''); ?>
                            <div class="commentmeta"><?php echo get_comment_date(); ?></div>
                        </div>
                        <?php comment_text(); ?>
                    </div><!-- #comment-## -->
                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' =>'<span class="reply">پاسخ دادن</span>','depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </div>
            <?php

            break;

    endswitch; // end comment_type check

}