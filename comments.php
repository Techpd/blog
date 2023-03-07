<?php
if (post_password_required()) {
    return;
}
?>

<div class="comments-order-toggle">
    <span class="post__cat">Order by : <span id="comments-order-by"></span></span>
    <div class="comments-order-container">
        <button class="comments-order-button <?php echo (get_option('comment_order') == 'asc') ? 'active' : ''; ?>" data-order="asc"><i class="mdi mdi-sort-ascending"></i>Oldest</button>
        <button class="comments-order-button <?php echo (get_option('comment_order') == 'desc') ? 'active' : ''; ?>" data-order="desc"><i class="mdi mdi-sort-descending"></i>Newest</button>
    </div>
</div>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title"><?php echo get_the_title() ?></h2><!-- .comments-title -->
        
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 34,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1) : ?>
            <div class="navigation">
                <div class="alignleft"><?php previous_comments_link(esc_html__('« Older Comments', 'theme_name')); ?></div>
                <div class="alignright"><?php next_comments_link(esc_html__('Newer Comments »', 'theme_name')); ?></div>
            </div><!-- .navigation -->
        <?php endif; ?>

    <?php endif; // Check for have_comments(). 
    ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'theme_name'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
    ));
    ?>

    <script>
        jQuery(document).ready(function($) {
            var $current_comments_order = $('.comments-order-button.active').text();
            $('#comments-order-by').text($current_comments_order);
            $('.comments-order-button').click(function() {
                if ($(this).hasClass('active')) {
                    return;
                }
                var order = $(this).data('order');
                $('.comments-order-button').removeClass('active');
                $(this).addClass('active');
                $.ajax({
                    type: 'GET',
                    url: window.location.href,
                    data: {
                        comment_order: order
                    },
                    success: function(response) {
                        $('.comment-list').replaceWith($(response).find('.comment-list'));
                        $('.comment-edit-link').addClass('mdi mdi-pencil');
                        $('.comment-edit-link').text('\u00A0Edit');
                        $current_comments_order = $('.comments-order-button.active').text();
                        $('#comments-order-by').text($current_comments_order);
                    }
                });
            });
        });
    </script>

</div><!-- .comments-area -->