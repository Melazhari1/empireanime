<?php

// filter to replace class on reply link
                     
add_filter('comment_reply_link', 'zettaiwp_replace_reply_link_class');
function zettaiwp_replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='btn btn-custom btn-sm", $class);
    return $class;
}

// filter to replace class on comment edit link
                     
function zettaiwp_replace_edit_comment_link_class( $output ) {
  $myclass = 'btn btn-custom btn-sm';
  return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $myclass, $output, 1 );
}
add_filter( 'edit_comment_link', 'zettaiwp_replace_edit_comment_link_class' );

// change default fields

add_filter( 'comment_form_default_fields', 'zettaiwp_bootstrap_comment_form_fields' );
function zettaiwp_bootstrap_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
		
        'author' => '<div class="form-row"><div class="col"><div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'zettaiwp' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
        'email'  => '<div class="col"><div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'zettaiwp' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div></div>',
        
		'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'zettaiwp' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
    );
    
    return $fields;
}

add_filter( 'comment_form_defaults', 'zettaiwp_bootstrap_comment_form_text' );
function zettaiwp_bootstrap_comment_form_text( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
			<label for="comment">' . __( 'Comment', 'zettaiwp' ) . ( ' <span class="required">*</span>' ) . '</label>
            <textarea class="form-control border-class" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
	$args['id_submit'] = 'submit-zettaiwp'; 
    $args['class_submit'] = 'btn btn-custom' ; 
    
    return $args;
}

add_filter( 'comment_form_defaults', 'zettaiwp_custom_reply_title' );
	function zettaiwp_custom_reply_title( $defaults ){
	$defaults['title_reply_before'] = '<h4>';
	return $defaults;
}

add_filter( 'comment_form_fields', 'zettaiwp_move_comment_field_to_bottom' );
	function zettaiwp_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_action( 'set_comment_cookies', function( $comment, $user ) {
    setcookie( 'ta_comment_wait_approval', '1', 0, '/' );
}, 10, 2 );

// Sended comment message

add_action( 'init', function() {
    if( isset( $_COOKIE['ta_comment_wait_approval'] ) && $_COOKIE['ta_comment_wait_approval'] === '1' ) {
        setcookie( 'ta_comment_wait_approval', '0', 0, '/' );
        add_action( 'comment_form_before', function() {
			
			echo '
			
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Your comment has been sent successfully.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			
			';			
			
        });
    }
});


add_filter( 'comment_post_redirect', function( $location, $comment ) {
    $location = get_permalink( $comment->comment_post_ID ) . '#wait_approval';
    return $location;
}, 10, 2 );

function zettaiwp_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }
	
}
add_action(  'wp_enqueue_scripts', 'zettaiwp_enqueue_comments_reply' );