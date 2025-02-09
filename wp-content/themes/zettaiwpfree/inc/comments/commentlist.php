<?php
/**
 * WP Bootstrap 4 Comment Walker - zettaiwp adaptation
 * Mod of Aymene Bourafai code
 */
class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment the comments list.
	 * @param int    $depth   Depth of comments.
	 * @param array  $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
?>
<<?php echo esc_attr ($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has-children media' : ' media' ); ?>>

    <div class="position-relative" id="div-comment-<?php comment_ID(); ?>">
        <div>
            <div class="flex">
                <?php if ( $args['avatar_size'] != 0  ): ?>
                <a href="<?php echo get_comment_author_url(); ?>" class="position-absolute left top float-left">
					<?php echo get_avatar( $comment, $args['avatar_size'],'mm','', array('class'=>'rounded-circle') ); ?>
                </a>
                <?php endif; ?>                
            </div>
            <div class="single-comments-content border-class shadow-sm">
				
				<p class="single-comments-author-meta">
				<span class="single-comments-author"><?php echo get_comment_author_link() ?></span>
				 - 
                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                    <time datetime="<?php comment_time( 'c' ); ?>">
                        <?php comment_date() ?>
                    </time>
                </a>
				<p>
				
                <ul class="list-inline my-3">
                    <?php edit_comment_link( __( 'Edit comment', 'zettaiwp' ), '<li class="d-inline mr-2">', '</li>' ); ?>
                    <?php
								comment_reply_link( array_merge( $args, array(
									'add_below' => 'div-comment',
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
									'before'    => '<li class="d-inline">',
									'after'     => '</li>'
								) ) );	
							?>
                </ul>
				<!-- .comment-metadata -->
			
				<div class="card-text">
                <?php comment_text(); ?>
				</div><!-- .comment-content -->
				
			</div>
        </div>
		
        <div class="card-block warning-color">
            <?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php _e( 'Your comment is awaiting moderation.', 'zettaiwp' ); ?></p>
            <?php endif; ?>

            <!-- </div> -->

            <!-- </div>		 -->
            <?php
	}	
}