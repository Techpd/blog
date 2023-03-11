<!-- single post page -->
<?php
get_header();
//getting the current post details
if (have_posts()) :
    while (have_posts()) :
        the_post();

        $placeholder = get_template_directory_uri() . '/img/placeholder.webp';
        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
        // category
        $post_categories = get_the_category();
        foreach ($post_categories as $post_category) {
            $post_slug = $post_category->slug;
            $post_cat_name = $post_category->name;
        }
        $title = get_the_title();

        // author details
        $author_id = get_the_author_meta('ID');
        // get the ACF field value for the current user
        $post_author_id = get_post_field('post_author', get_the_ID());
        $post_author = get_userdata($post_author_id);
        if (in_array('administrator', $post_author->roles) || in_array('author', $post_author->roles)) {
            $author_avatar = get_field('profile_pic_upload', 'user_' . $post_author_id);
        }
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_url = get_author_posts_url($author_id);
?>
        <div class="site-content">
            <div class="flex-box">
                <div class="atbs-block atbs-block--fullwidth single-1 atbs-section-module">
                    <div class="atbs-block atbs-block--fullwidth atbs-single-header">
                        <div class="single-header__inner">
                            <div class="entry-thumb single-entry-thumb">
                                <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="Post Featured image">
                            </div>
                        </div>
                    </div>
                    <div class="atbs-block atbs-block--fullwidth single-entry-wrap">
                        <div class="flex-box">
                            <div class="atbs-main-col">
                                <article class="post post--single">
                                    <div class="single-content">
                                        <header class="single-header inverse-text">
                                            <a href="<?php echo $post_slug; ?>" class="entry-cat post__cat"><?php echo $post_cat_name; ?></a>
                                            <h1 class="entry-title f-44 f-w-700"><?php echo $title; ?></h1>
                                        </header>
                                        <div class="single-body entry-content typography-copy">
                                            <div class="single-row">
                                                <div class="single-presentation">
                                                    <!-- content from the wordpres post editor -->
                                                    <?php
                                                    the_content();
                                                    ?>
                                                    <!-- content from the wordpres post editor -->
                                                    <footer class="single-footer entry-footer">
                                                        <div class="entry-interaction entry-interaction--horizontal">
                                                            <div class="entry-interaction__left">
                                                                <div class="entry-tags">
                                                                    <ul>
                                                                        <li><a href="./tags.html" class="post-tag" rel="tag">Lifestyle</a></li>
                                                                        <li><a href="./tags.html" class="post-tag" rel="tag">Travel</a></li>
                                                                        <li><a href="./tags.html" class="post-tag" rel="tag">Fashion</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="entry-interaction__right">
                                                                <div class="entry-meta-count flex-box justify-content-end">
                                                                    <?php
                                                                    $comment_count = get_comments_number();
                                                                    if ($comment_count > 0) :
                                                                    ?>
                                                                        <a href="#" class="comments-count" data-toggle="tooltip" data-placement="top" title="" data-original-title="13 Views">
                                                                            <i class="mdicon mdicon-comment-o"></i> <span><?php printf(_n('1 Comment', '%s Comments', $comment_count), number_format_i18n($comment_count)); ?></span>
                                                                        </a>
                                                                    <?php
                                                                    endif;
                                                                    ?>
                                                                    <a href="#" class="view-count" data-toggle="tooltip" data-placement="top" title="" data-original-title="31 Commnent">
                                                                        <i class="mdicon mdicon-visibility"></i>
                                                                        <span>
                                                                            <?php
                                                                            custom_post_views();
                                                                            $postID = get_the_ID();
                                                                            $count_key = 'custom_post_views_count';
                                                                            $count = get_post_meta($postID, $count_key, true);
                                                                            printf(_n('1 view', '%s views', $count), number_format_i18n($count));
                                                                            ?>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                    <div class="author-box">
                                                        <div class="author-avatar">
                                                            <img alt="<?php echo $author_name; ?>" src="<?php echo $placeholder; ?>" data-src="<?php echo $author_avatar; ?>" class="avatar photo">
                                                        </div>
                                                        <div class="author-box__text">
                                                            <div class="author-name">
                                                                <a href="./author.html" class="entry-author__name"><?php echo $author_name; ?></a>
                                                            </div>
                                                            <div class="author-bio">
                                                                <?php
                                                                $current_author_id = get_the_author_meta('ID');
                                                                $current_author_bio = get_the_author_meta('description', $current_author_id);

                                                                if (!empty($current_author_bio)) {
                                                                    echo  wpautop($current_author_bio);
                                                                }
                                                                ?>
                                                            </div>
                                                            <ul class="author-social list-unstyled list-horizontal">
                                                                <li>
                                                                    <a href="#"><i class="mdicon mdicon-facebook"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="mdicon mdicon-instagram"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="mdicon mdicon-mail_outline"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="posts-navigation-wrap">
                                                        <div class="posts-navigation flex-box flex-box-2i">
                                                            <?php
                                                            $categories = get_the_category();
                                                            $category = $categories[0]->cat_ID;

                                                            $args = array(
                                                                'category' => $category,
                                                                'orderby' => 'post_date',
                                                                'order' => 'ASC',
                                                                'posts_per_page' => -1,
                                                            );

                                                            $posts_query = new WP_Query($args);

                                                            $current_post_id = get_the_ID();
                                                            $current_post_index = -1;

                                                            // Find current post index in query
                                                            foreach ($posts_query->posts as $i => $post) {
                                                                if ($post->ID == $current_post_id) {
                                                                    $current_post_index = $i;
                                                                    break;
                                                                }
                                                            }

                                                            $prev_post = ($current_post_index > 0) ? $posts_query->posts[$current_post_index - 1] : null;
                                                            $next_post = ($current_post_index < count($posts_query->posts) - 1) ? $posts_query->posts[$current_post_index + 1] : null;

                                                            ?>
                                                            <?php if ($prev_post) { ?>
                                                                <div class="posts-navigation__prev">
                                                                    <article class="post post--horizontal post--horizontal-middle post--horizontal-reverse post--horizontal-xs post__thumb--width-100 post__thumb-100">
                                                                        <div class="post__thumb atbs-thumb-object-fit">
                                                                            <a href="<?php echo get_permalink($prev_post->ID); ?>"><img src="<?php echo $placeholder; ?>" data-src="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'); ?>" alt="<?php echo get_the_title($prev_post->ID); ?>"></a>
                                                                        </div>
                                                                        <div class="post__text text-right">
                                                                            <a class="posts-navigation__label" href="<?php echo get_permalink($prev_post->ID); ?>">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.999" height="6.545" viewBox="0 0 11.999 6.545">
                                                                                    <path d="M11.454,78.818H1.862l1.8,1.8a.545.545,0,1,1-.771.771L.16,78.658a.545.545,0,0,1,0-.771L2.887,75.16a.545.545,0,1,1,.771.771l-1.8,1.8h9.591a.545.545,0,1,1,0,1.091Z" transform="translate(0 -75)" fill="#222" />
                                                                                </svg>
                                                                                <span>previous</span>
                                                                            </a>
                                                                            <h3 class="post__title f-18 f-w-500 atbs-line-limit atbs-line-limit-3 m-b-10"><a href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo get_the_title($prev_post->ID); ?></a></h3>
                                                                            <div class="post__meta time-style-1">
                                                                                <time class="time published" datetime="<?php echo get_the_date('c', $prev_post->ID); ?>" title="<?php echo get_the_date('', $prev_post->ID); ?>"><?php echo get_the_date('', $prev_post->ID); ?></time>
                                                                            </div>
                                                                        </div>
                                                                    </article>
                                                                </div>
                                                            <?php } ?>
                                                            <!-- posts-navigation__prev-->
                                                            <?php if ($next_post) { ?>
                                                                <div class="posts-navigation__next clearfix">
                                                                    <article class="post post--horizontal post--horizontal-middle post--horizontal-xs post__thumb--width-100 post__thumb-100">
                                                                        <div class="post__thumb atbs-thumb-object-fit">
                                                                            <a href="<?php echo get_permalink($next_post->ID); ?>"><img src="<?php echo $placeholder; ?>" data-src="<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail'); ?>" alt="<?php echo get_the_title($next_post->ID); ?>"></a>
                                                                        </div>
                                                                        <div class="post__text text-left">
                                                                            <a class="posts-navigation__label text-left" href="<?php echo get_permalink($next_post->ID); ?>">
                                                                                <span>next</span>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.999" height="6.545" viewBox="0 0 11.999 6.545">
                                                                                    <path d="M.545,78.818h9.591l-1.8,1.8a.545.545,0,1,0,.771.771l2.727-2.727a.545.545,0,0,0,0-.771L9.112,75.16a.545.545,0,1,0-.771.771l1.8,1.8H.545a.545.545,0,1,0,0,1.091Z" transform="translate(0 -75)" fill="#222" opacity="0.8" />
                                                                                </svg>
                                                                            </a>
                                                                            <h3 class="post__title f-18 f-w-500 atbs-line-limit atbs-line-limit-3 m-b-10"><a href="<?php echo get_permalink($next_post->ID); ?>">Life Is Too Important to Be Taken Seriously</a></h3>
                                                                            <div class="post__meta time-style-1">
                                                                                <time class="time published" datetime="<?php echo get_the_date('c', $next_post->ID); ?>" title="<?php echo get_the_date('', $next_post->ID); ?>"><?php echo get_the_date('', $next_post->ID); ?></time>
                                                                            </div>
                                                                        </div>
                                                                    </article>
                                                                </div><!-- posts-navigation__next -->
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-box-translate js-sticky-sidebar">
                                                    <div class="entry-meta">
                                                        <?php
                                                        // get the ACF field value for the current user
                                                        $post_author_id = get_post_field('post_author', get_the_ID());
                                                        $post_author = get_userdata($post_author_id);
                                                        if (in_array('administrator', $post_author->roles) || in_array('author', $post_author->roles)) {
                                                            $author_profile_image = get_field('profile_pic_upload', 'user_' . $post_author_id);
                                                        }
                                                        ?>
                                                        <div class="entry-author entry-author_style-1">
                                                            <a class="entry-author__avatar" href="<?php echo $author_url; ?>" title="Posts by <?php echo $author_name; ?>" rel="author">
                                                                <?php if ($author_profile_image) : ?>
                                                                    <img alt="author-<?php echo $author_name; ?>-image" src="<?php echo $placeholder; ?>" data-src="<?php echo $author_profile_image; ?>">
                                                                <?php endif; ?>
                                                            </a>
                                                            <div class="entry-author__text">
                                                                <a class="entry-author__name" title="Posts by <?php echo $author_name; ?>" rel="author" href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                                                                <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">6 December 2021</time>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="socials-share-box">
                                                        <span class="social-share-label">Share</span>
                                                        <!-- social share button start in comming from the function.php custom made. -->
                                                        <?php wpb_social_share_buttons(); ?>
                                                        <!-- social share button start in comming from the function.php custom made. -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .single-content -->
                                </article>
                                <!-- comment template  ================================== start here-->
                                <?php
                                if (comments_open() || get_comments_number()) :
                                ?>
                                    <div class="comments-section single-entry-section">
                                        <div id="comments" class="comments-area">
                                            <div class="block-heading block-heading_style-1 block-heading-no-line">
                                                <h4 class="block-heading__title">
                                                    <?php
                                                    $comment_count = get_comments_number();
                                                    if ($comment_count > 0) {
                                                        echo '<div class="comment-count">';
                                                        printf(_n('1 Comment', '%s Comments', $comment_count), number_format_i18n($comment_count));
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                </h4>
                                            </div>
                                            <?php
                                            if (comments_open() || get_comments_number()) {
                                                comments_template();
                                            }
                                            ?>
                                        </div><!-- #comments -->
                                        <div id="leave-new-comment-container">
                                            <button id="leave-new-comment" data-comment-post-id="<?php echo get_the_ID(); ?>" class="comment-btn">Leave new comment</button>
                                        </div>
                                    </div>
                                    <!-- below script to append comment form and change text of comment btn -->
                                    <script>
                                        $ = jQuery;
                                        // single line for the wrapping comment edit link with icon
                                        $('.comment-edit-link').addClass('mdi mdi-pencil');
                                        $('.comment-edit-link').text('\u00A0Edit');
                                        // single line for the wrapping comment edit link with icon end here
                                        $(function() {
                                            const comment_btn = $('#leave-new-comment');
                                            const comment_btn_text = comment_btn.text();
                                            const comment_btn_newtext = 'Cancel Leave Comment';
                                            const respondContainer = $('#respond');

                                            $(document).on('click', '.comment-reply-link, #leave-new-comment', function(e) {
                                                e.preventDefault();
                                                const commentId = $(this).data('commentid');
                                                $('#comment_parent').val(commentId);
                                                const currentParent = $(this).parent();

                                                if (respondContainer.is(':visible')) {
                                                    // If respondContainer is visible, hide it and restore the original button text
                                                    respondContainer.fadeOut(200, function() {
                                                        comment_btn.text(comment_btn_text);
                                                        currentParent.children('#respond').remove();
                                                    });
                                                } else {
                                                    // If respondContainer is hidden, show it and change the button text
                                                    comment_btn.text(comment_btn_newtext);
                                                    currentParent.append(respondContainer);
                                                    respondContainer.fadeIn();
                                                }
                                            });
                                        });
                                    </script>
                                    <!--below script to append comment form and change text of comment btn -->
                                <?php
                                endif;
                                ?>
                                <!-- comment template  ==================================end here-->
                                <div class="atbs-block related-posts">
                                    <div class="block-heading block-heading_style-1 block-heading-no-line">
                                        <h4 class="block-heading__title">
                                            Related News
                                        </h4>
                                    </div>
                                    <div class="atbs-block__inner">
                                        <div class="posts-list flex-box flex-box-3i flex-space-30 posts-list-tablet-2i">
                                            <div class="list-item">
                                                <article class="post post--vertical post--vertical-card-overlap post--hover-theme">
                                                    <div class="post__thumb object-fit">
                                                        <a href="#single.html">
                                                            <img src="http://via.placeholder.com/250x150" alt="File not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text author-avatar-right">
                                                        <a href="./category.html" class="post__cat post__cat--bg post__cat-overlap">GADGETS</a>
                                                        <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="#single.html">Oculus Working on Update to Improve Rift S Audio</a>
                                                        </h3>
                                                        <div class="post__meta border-avatar flex-box align-item-center justify-content-space">
                                                            <div class="post-author post-author_style-7">
                                                                <a class="post-author__avatar" href="./author.html" title="Posts by Connor Randall" rel="author">
                                                                    <img alt="Connor Randall" src="http://via.placeholder.com/100x100">
                                                                </a>
                                                                <div class="post-author__text">
                                                                    <div class="author_name--wrap">
                                                                        <span>by</span>
                                                                        <a class="post-author__name" title="Posts by Connor Randall" rel="author" href="./author.html"> Connor Randall</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">March 6, 2019</time>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="list-item">
                                                <article class="post post--vertical post--vertical-card-overlap post--hover-theme">
                                                    <div class="post__thumb object-fit">
                                                        <a href="#single.html">
                                                            <img src="http://via.placeholder.com/250x150" alt="File not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text author-avatar-right">
                                                        <a href="./category.html" class="post__cat post__cat--bg post__cat-overlap">GADGETS</a>
                                                        <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="#single.html">Oculus Working on Update to Improve Rift S Audio</a>
                                                        </h3>
                                                        <div class="post__meta border-avatar flex-box align-item-center justify-content-space">
                                                            <div class="post-author post-author_style-7">
                                                                <a class="post-author__avatar" href="./author.html" title="Posts by Connor Randall" rel="author">
                                                                    <img alt="Connor Randall" src="http://via.placeholder.com/100x100">
                                                                </a>
                                                                <div class="post-author__text">
                                                                    <div class="author_name--wrap">
                                                                        <span>by</span>
                                                                        <a class="post-author__name" title="Posts by Connor Randall" rel="author" href="./author.html"> Connor Randall</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">March 6, 2019</time>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="list-item">
                                                <article class="post post--vertical post--vertical-card-overlap post--hover-theme">
                                                    <div class="post__thumb object-fit">
                                                        <a href="#single.html">
                                                            <img src="http://via.placeholder.com/250x150" alt="File not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text author-avatar-right">
                                                        <a href="./category.html" class="post__cat post__cat--bg post__cat-overlap">GADGETS</a>
                                                        <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="#single.html">Oculus Working on Update to Improve Rift S Audio</a>
                                                        </h3>
                                                        <div class="post__meta border-avatar flex-box align-item-center justify-content-space">
                                                            <div class="post-author post-author_style-7">
                                                                <a class="post-author__avatar" href="./author.html" title="Posts by Connor Randall" rel="author">
                                                                    <img alt="Connor Randall" src="http://via.placeholder.com/100x100">
                                                                </a>
                                                                <div class="post-author__text">
                                                                    <div class="author_name--wrap">
                                                                        <span>by</span>
                                                                        <a class="post-author__name" title="Posts by Connor Randall" rel="author" href="./author.html"> Connor Randall</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">March 6, 2019</time>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- left sidebar template posts -->
                            <div class="atbs-sub-col js-sticky-sidebar">
                                <!-- here popular template parts -->
                                <?php get_template_part('template-parts/popular-posts'); ?>
                                <?php get_template_part('template-parts/trending-posts'); ?>
                            </div>
                            <!--end  here template parts -->
                        </div>
                    </div>
                </div>
                <!-- main author sidebar -->
                <?php get_template_part('template-parts/author-sidebar'); ?>
            </div>
        </div><!-- .site-content -->
<?php
    endwhile;
// main while loop ends
endif;
// main if ends
get_footer();
?>