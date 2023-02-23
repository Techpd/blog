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
        $author_avatar = get_avatar_url($author_id, ['size' => '96']);
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
                                                    <p>Set to launch on the manufacturer’s new A330neo aircraft in 2017, it’s offering
                                                        lots of extra space, including wider seats as standard, no control boxes under
                                                        seats for the in-flight entertainment system, which means it’s all open for you
                                                        to stretch your legs.
                                                    </p>
                                                    <figure data-shortcode="caption" class="wp-caption alignnone atbs-post-media-wide">
                                                        <img class="wp-image-7 size-full" src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="Post image">
                                                    </figure>
                                                    <p>Set to launch on the manufacturer’s new A330neo aircraft in 2017, it’s offering
                                                        lots of extra space, including wider seats as standard, no control boxes under
                                                        seats for the in-flight entertainment system, which means it’s all open for you
                                                        to stretch your legs.
                                                    </p>
                                                    <p>The planes will offer improved built-in broadband connectivity that’ll allow
                                                        passengers to use their phones and tablets as normal, even making calls and
                                                        sending and receiving text messages. Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis numquam
                                                        pariatur quia velit?</p>
                                                    <h3>Features</h3>
                                                    <p> Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.
                                                    </p>
                                                    <blockquote>
                                                        <p>I am enough of an artist to draw freely upon my imagination. Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.</p>
                                                        <footer>
                                                            <cite>Albert Einstein</cite>
                                                        </footer>
                                                    </blockquote>
                                                    <p>The planes will offer improved built-in broadband connectivity that’ll allow
                                                        passengers to use their phones and tablets as normal, even making calls and
                                                        sending and receiving text messages. Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis numquam
                                                        pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit. Facilis numquam pariatur quia velit? Aliquam asperiores
                                                        commodi consequatur delectus iusto nisi non, nostrum quaerat quo quos rerum
                                                        saepe sit vero voluptates.
                                                    </p>
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
                                                                    <a href="#" class="comments-count" data-toggle="tooltip" data-placement="top" title="" data-original-title="13 Views"><i class="mdicon mdicon-comment-o"></i> <span>4</span></a>
                                                                    <a href="#" class="view-count" data-toggle="tooltip" data-placement="top" title="" data-original-title="31 Commnent"><i class="mdicon mdicon-visibility"></i> <span>31</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>
                                                    <div class="author-box">
                                                        <div class="author-avatar">
                                                            <img alt="Ryan Reynold" src="http://via.placeholder.com/150x150" class="avatar photo">
                                                        </div>
                                                        <div class="author-box__text">
                                                            <div class="author-name">
                                                                <a href="./author.html" class="entry-author__name">Ryan Reynold</a>
                                                            </div>
                                                            <div class="author-bio">
                                                                A 26-year-old health centre receptionist who enjoys going to the movies, photography and social media.
                                                            </div>
                                                            <ul class="author-social list-unstyled list-horizontal">
                                                                <li>
                                                                    <a href="#"><i class="mdicon mdicon-facebook"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="mdicon mdicon-twitter"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="mdicon mdicon-instagram"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="posts-navigation-wrap">
                                                        <div class="posts-navigation flex-box flex-box-2i">
                                                            <div class="posts-navigation__prev">
                                                                <article class="post post--horizontal post--horizontal-middle post--horizontal-reverse post--horizontal-xs post__thumb--width-100 post__thumb-100">
                                                                    <div class="post__thumb atbs-thumb-object-fit">
                                                                        <a href="./single-1.html"><img src="http://via.placeholder.com/150x150" alt="File Not Found"></a>
                                                                    </div>
                                                                    <div class="post__text text-right">
                                                                        <a class="posts-navigation__label" href="./single-1.html">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.999" height="6.545" viewBox="0 0 11.999 6.545">
                                                                                <path d="M11.454,78.818H1.862l1.8,1.8a.545.545,0,1,1-.771.771L.16,78.658a.545.545,0,0,1,0-.771L2.887,75.16a.545.545,0,1,1,.771.771l-1.8,1.8h9.591a.545.545,0,1,1,0,1.091Z" transform="translate(0 -75)" fill="#222" />
                                                                            </svg>
                                                                            <span>previous</span>
                                                                        </a>
                                                                        <h3 class="post__title f-18 f-w-500 atbs-line-limit atbs-line-limit-3 m-b-10"><a href="./single-1.html">Life Is Too Important to Be Taken Seriously</a></h3>
                                                                        <div class="post__meta time-style-1">
                                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">March 6, 2019</time>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div>
                                                            <!-- posts-navigation__prev-->
                                                            <div class="posts-navigation__next clearfix">
                                                                <article class="post post--horizontal post--horizontal-middle post--horizontal-xs post__thumb--width-100 post__thumb-100">
                                                                    <div class="post__thumb atbs-thumb-object-fit">
                                                                        <a href="./single-1.html"><img src="http://via.placeholder.com/150x150" alt="File Not Found"></a>
                                                                    </div>
                                                                    <div class="post__text text-left">
                                                                        <a class="posts-navigation__label text-left" href="./single-1.html">
                                                                            <span>next</span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.999" height="6.545" viewBox="0 0 11.999 6.545">
                                                                                <path d="M.545,78.818h9.591l-1.8,1.8a.545.545,0,1,0,.771.771l2.727-2.727a.545.545,0,0,0,0-.771L9.112,75.16a.545.545,0,1,0-.771.771l1.8,1.8H.545a.545.545,0,1,0,0,1.091Z" transform="translate(0 -75)" fill="#222" opacity="0.8" />
                                                                            </svg>
                                                                        </a>
                                                                        <h3 class="post__title f-18 f-w-500 atbs-line-limit atbs-line-limit-3 m-b-10"><a href="./single-1.html">Life Is Too Important to Be Taken Seriously</a></h3>
                                                                        <div class="post__meta time-style-1">
                                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">March 6, 2019</time>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            </div><!-- posts-navigation__next -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-box-translate js-sticky-sidebar">
                                                    <div class="entry-meta">
                                                        <?php
                                                        // check if user is an admin

                                                        // get the ACF field value for the current user
                                                        $image = get_field('profile_pic_upload');
                                                        if ($image) {
                                                            $image_url = $image['url'];
                                                            // output the image using the image URL
                                                            echo '<img src="' . $image_url . '" alt="Profile Image">';
                                                        }
                                                        ?>
                                                        <div class="entry-author entry-author_style-1">
                                                            <a class="entry-author__avatar" href="<?php echo $author_url; ?>" title="Posts by <?php echo $author_name; ?>" rel="author">
                                                                <img alt="author-<?php echo $author_name; ?>-image" src="<?php echo $placeholder; ?>" data-src="<?php //echo $image_url; 
                                                                                                                                                                ?>">
                                                            </a>
                                                            <div class="entry-author__text">
                                                                <a class="entry-author__name" title="Posts by <?php echo $author_name; ?>" rel="author" href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                                                                <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="March 6, 2019 at 8:45 am">6 December 2021</time>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="socials-share-box">
                                                        <span class="social-share-label">Share</span>
                                                        <ul class="social-list">
                                                            <li class="facebook-share">
                                                                <a class="sharing-btn sharing-btn-primary facebook-btn facebook-theme-bg-hover" data-placement="top" title="Share on Facebook" href="#">
                                                                    <div class="share-item__icon">
                                                                        <svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                                                                            <g>
                                                                                <path d="m21.7 16.7h5v5h-5v11.6h-5v-11.6h-5v-5h5v-2.1c0-2 0.6-4.5 1.8-5.9 1.3-1.3 2.8-2 4.7-2h3.5v5h-3.5c-0.9 0-1.5 0.6-1.5 1.5v3.5z"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="twitter-share">
                                                                <a class="sharing-btn sharing-btn-primary twitter-btn twitter-theme-bg-hover" data-placement="top" title="Share on Twitter" href="#">
                                                                    <div class="share-item__icon">
                                                                        <svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                                                                            <g>
                                                                                <path d="m31.5 11.7c1.3-0.8 2.2-2 2.7-3.4-1.4 0.7-2.7 1.2-4 1.4-1.1-1.2-2.6-1.9-4.4-1.9-1.7 0-3.2 0.6-4.4 1.8-1.2 1.2-1.8 2.7-1.8 4.4 0 0.5 0.1 0.9 0.2 1.3-5.1-0.1-9.4-2.3-12.7-6.4-0.6 1-0.9 2.1-0.9 3.1 0 2.2 1 3.9 2.8 5.2-1.1-0.1-2-0.4-2.8-0.8 0 1.5 0.5 2.8 1.4 4 0.9 1.1 2.1 1.8 3.5 2.1-0.5 0.1-1 0.2-1.6 0.2-0.5 0-0.9 0-1.1-0.1 0.4 1.2 1.1 2.3 2.1 3 1.1 0.8 2.3 1.2 3.6 1.3-2.2 1.7-4.7 2.6-7.6 2.6-0.7 0-1.2 0-1.5-0.1 2.8 1.9 6 2.8 9.5 2.8 3.5 0 6.7-0.9 9.4-2.7 2.8-1.8 4.8-4.1 6.1-6.7 1.3-2.6 1.9-5.3 1.9-8.1v-0.8c1.3-0.9 2.3-2 3.1-3.2-1.1 0.5-2.3 0.8-3.5 1z"></path>
                                                                            </g>

                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="pinterest-share">
                                                                <a class="sharing-btn pinterest-btn pinterest-theme-bg-hover" data-placement="top" title="Share on Pinterest" href="#">
                                                                    <div class="share-item__icon">
                                                                        <svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                                                                            <g>
                                                                                <path d="m37.3 20q0 4.7-2.3 8.6t-6.3 6.2-8.6 2.3q-2.4 0-4.8-0.7 1.3-2 1.7-3.6 0.2-0.8 1.2-4.7 0.5 0.8 1.7 1.5t2.5 0.6q2.7 0 4.8-1.5t3.3-4.2 1.2-6.1q0-2.5-1.4-4.7t-3.8-3.7-5.7-1.4q-2.4 0-4.4 0.7t-3.4 1.7-2.5 2.4-1.5 2.9-0.4 3q0 2.4 0.8 4.1t2.7 2.5q0.6 0.3 0.8-0.5 0.1-0.1 0.2-0.6t0.2-0.7q0.1-0.5-0.3-1-1.1-1.3-1.1-3.3 0-3.4 2.3-5.8t6.1-2.5q3.4 0 5.3 1.9t1.9 4.7q0 3.8-1.6 6.5t-3.9 2.6q-1.3 0-2.2-0.9t-0.5-2.4q0.2-0.8 0.6-2.1t0.7-2.3 0.2-1.6q0-1.2-0.6-1.9t-1.7-0.7q-1.4 0-2.3 1.2t-1 3.2q0 1.6 0.6 2.7l-2.2 9.4q-0.4 1.5-0.3 3.9-4.6-2-7.5-6.3t-2.8-9.4q0-4.7 2.3-8.6t6.2-6.2 8.6-2.3 8.6 2.3 6.3 6.2 2.3 8.6z"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="linkedin-share">
                                                                <a class="sharing-btn linkedin-btn linkedin-theme-bg-hover" data-placement="top" title="Share on Linkedin" href="#">
                                                                    <div class="share-item__icon">
                                                                        <svg fill="#888" preserveAspectRatio="xMidYMid meet" height="1.3em" width="1.3em" viewBox="0 0 40 40">
                                                                            <g>
                                                                                <path d="m13.3 31.7h-5v-16.7h5v16.7z m18.4 0h-5v-8.9c0-2.4-0.9-3.5-2.5-3.5-1.3 0-2.1 0.6-2.5 1.9v10.5h-5s0-15 0-16.7h3.9l0.3 3.3h0.1c1-1.6 2.7-2.8 4.9-2.8 1.7 0 3.1 0.5 4.2 1.7 1 1.2 1.6 2.8 1.6 5.1v9.4z m-18.3-20.9c0 1.4-1.1 2.5-2.6 2.5s-2.5-1.1-2.5-2.5 1.1-2.5 2.5-2.5 2.6 1.2 2.6 2.5z"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
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
                                                comments_template('template-parts/comments/comment-form.php');
                                            }
                                            $imageFolder_avtars = get_template_directory_uri() . '/img/author-icons/';
                                            // echo '<h1>' . $imageFolder_avtars . '</h1>';
                                            ?>
                                            <!-- below script to change commented user avatar image randomly -->
                                            <script>
                                                $ = jQuery;
                                                $(function() {
                                                    const dir_path = "<?php echo $imageFolder_avtars ?>";
                                                    const image_files = [];

                                                    fetch(dir_path)
                                                        .then(response => response.text())
                                                        .then(html => {
                                                            const parser = new DOMParser();
                                                            const doc = parser.parseFromString(html, 'text/html');
                                                            const links = doc.querySelectorAll('a');
                                                            links.forEach(link => {
                                                                if (link.getAttribute('href').match(/\.(webp)$/)) {
                                                                    const image_url = dir_path + link.getAttribute('href');
                                                                    image_files.push(image_url);
                                                                }
                                                            });
                                                            $('.commentlist .vcard img').each(function() {
                                                                const is_admin_avatar = $(this).parent().parent().parent().hasClass('comment-author-admin') && $(this).index() === 0;
                                                                if (is_admin_avatar) {
                                                                    $(this).parent().parent().parent().addClass('admin-comment');
                                                                }
                                                                if (!is_admin_avatar) {
                                                                    const random_icon_index = Math.floor(Math.random() * image_files.length);
                                                                    const random_author_icon = image_files[random_icon_index];
                                                                    $(this).attr('src', random_author_icon);
                                                                }
                                                            });

                                                        });
                                                    // appending the reply where user click
                                                    // $(document).on('click', '.comment-reply-link', function(e) {
                                                    //     e.preventDefault();
                                                    //     $('#respond').fadeIn();
                                                    //     $(this).parent().append($('#respond'));
                                                    // });
                                                    $(document).on('click', '.comment-reply-link[data-commentid]', function(e) {
                                                        e.preventDefault();
                                                        const commentId = $(this).data('commentid');
                                                        $('#comment_parent').val(commentId);
                                                        const respondContainer = $('#respond');
                                                        const currentParent = $(this).parent();
                                                        if (currentParent.children('#respond').length) {
                                                            currentParent.children('#respond').remove();
                                                        } else {
                                                            respondContainer.fadeIn();
                                                            currentParent.append(respondContainer);
                                                        }
                                                    });
                                                });
                                            </script>

                                        </div><!-- #comments -->
                                        <div id="load-more-comments-container">
                                            <button id="load-more-comments" data-comment-post-id="<?php echo get_the_ID(); ?>" class="comment-btn">Load More Comments</button>
                                        </div>
                                    </div>
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
                                                        <a href="./single-1.html">
                                                            <img src="http://via.placeholder.com/250x150" alt="File not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text author-avatar-right">
                                                        <a href="./category.html" class="post__cat post__cat--bg post__cat-overlap">GADGETS</a>
                                                        <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="./single-1.html">Oculus Working on Update to Improve Rift S Audio</a>
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
                                                        <a href="./single-1.html">
                                                            <img src="http://via.placeholder.com/250x150" alt="File not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text author-avatar-right">
                                                        <a href="./category.html" class="post__cat post__cat--bg post__cat-overlap">GADGETS</a>
                                                        <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="./single-1.html">Oculus Working on Update to Improve Rift S Audio</a>
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
                                                        <a href="./single-1.html">
                                                            <img src="http://via.placeholder.com/250x150" alt="File not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text author-avatar-right">
                                                        <a href="./category.html" class="post__cat post__cat--bg post__cat-overlap">GADGETS</a>
                                                        <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="./single-1.html">Oculus Working on Update to Improve Rift S Audio</a>
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