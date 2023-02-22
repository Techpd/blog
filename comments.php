<?php
// Set new comments to "unapproved" status by default
add_filter('pre_comment_approved', function () {
    return 0;
});

// Add custom fields to comment form
// add_filter('comment_form_default_fields', 'custom_comment_fields'); 

// if ( have_comments() ) :
//     wp_list_comments( array(
//         'style'       => 'ol',
//         'short_ping'  => true,
//         'avatar_size' => 50,
//         'callback'    => 'my_comment_callback'
//     ) );
// endif;

// $args = array(
//     'title_reply'          => __( 'Leave a Reply' ),
//     'comment_notes_before' => '',
//     'comment_notes_after'  => '',
//     'class_submit'         => 'submit button',
//     'label_submit'         => __( 'Post Comment' ),
//     'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" class="form-control-custom" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="Your review"></textarea></p>',
//     'fields'               => apply_filters( 'comment_form_default_fields', array(
//         'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . '</label> ' .
//                     '<input placeholder="Name*" id="author" class="form-control-custom" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
//         'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' .
//                     '<input placeholder="Email*" id="email" class="form-control-custom" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
//         'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
//                     '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
//     ) )
// );

comment_form();
?>
