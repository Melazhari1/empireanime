<?php
/* The template for displaying comments */
if ( post_password_required() )
    return;
?>

<div id="comments" class="my-3">

    <?php if ( have_comments() ) : ?>

    <h4>
        <?php
        printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'zettaiwp' ),
            number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
    ?>
    </h4>

    <ol class="px-0">
        <?php   

  get_template_part('inc/comments/commentlist');
  
  wp_list_comments( array(
      'style'         => 'ol',
      'max_depth'     => 4,
      'short_ping'    => true,
      'avatar_size'   => '50',
      'walker'        => new Bootstrap_Comment_Walker(),
  ) );
?>
    </ol><!-- .comment-list -->

    <?php
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'zettaiwp' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'zettaiwp' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'zettaiwp' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments"><?php _e( 'Comments are closed.', 'zettaiwp' ); ?></p>
    <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->