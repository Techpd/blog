<?php
// Set new comments to "unapproved" status by default
add_filter('pre_comment_approved', function () {
    return 0;
});
// Output comment form
comment_form();
?>

