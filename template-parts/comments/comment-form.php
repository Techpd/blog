<?php
// Set new comments to "unapproved" status by default
add_filter('pre_comment_approved', function() { return 0; });

// Add custom fields to comment form
// add_filter('comment_form_default_fields', 'custom_comment_fields'); 

// function custom_comment_fields($fields) {
//     // Add name field
//     $fields['comment_name'] = '<p class="comment-form-name"><label for="comment_name">' . __('Name') . '<span class="required">*</span></label><input id="comment_name" name="comment_name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" required /></p>';

//     // Add email field
//     $fields['comment_email'] = '<p class="comment-form-email"><label for="comment_email">' . __('Email') . '<span class="required">*</span></label><input id="comment_email" name="comment_email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" required /></p>';

//     // Add comment text field
//     $fields['comment_text'] = '<p class="comment-form-comment"><label for="comment_text">' . __('Comment') . '<span class="required">*</span></label><textarea id="comment_text" name="comment_text" cols="45" rows="8" maxlength="65525" required></textarea></p>';

//     // Add spam control checkbox
//     $fields['comment_spam'] = '<p class="comment-form-spam"><input id="comment_spam" name="comment_spam" type="checkbox" value="1" /><label for="comment_spam">' . __('I am not a robot') . '</label></p>';

//     return $fields;
// }

// Output comment form
comment_form();
?>
