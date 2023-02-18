<?php 
get_header();
// global $authordata;
$placeholder = get_template_directory_uri() . '/img/placeholder.webp';
$admin_author = get_template_directory_uri() . '/img/admin-author.png';
if (have_rows('page_builder')) {
    while (have_rows('page_builder')) {
        the_row();
        if (get_row_layout('slide_loop_on_off')) {
            $data_carousel_loop = get_sub_field('button');
            $data_auto_play = get_sub_field('button_auto_play');
            $data_carousel_autoplay_time = get_sub_field('slide_auto_play_time');
            // echo '<h1> test' . $slide_loop_toggle .'</h1>' ; 
        }
    }
}
?>

<div class="site-content">
    <!-- breadcrumbs start here -->
    <?php
    //get_template_part('template-parts/breadcrumbs');
    ?>
    <div class="breadcrumbs">
        <?php //echo my_breadcrumbs();
        do_action( 'breadcrumbs' );
        ?>
    </div>

    <!-- breadcrumbs -------------------------------end here-->
    <div class="flex-box">
        <div class="atbs-block atbs-block--fullwidth atbs-section-module">
            <div class="atbs-block atbs-block--fullwidth atbs-featured-module-1">
                <div class="atbs-block__inner">
                    <div class="section-main">
                        <?php
                        $sticky = get_option('sticky_posts');
                        $args = [
                            'post__in' => $sticky,
                            'ignore_sticky_posts' => 1,
                            'posts_per_page' => 1,
                        ];
                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                // featured image with placeholder end
                                // post title
                                $title = get_the_title();
                                $post_url = get_permalink($post->ID);
                                // category
                                $post_categories = get_the_category();
                                foreach ($post_categories as $post_category) {
                                    $post_cat_slug = $post_category->slug;
                                    $post_cat_name = $post_category->name;
                                }
                                // author detail
                                $author_id = get_the_author_meta('ID');
                                $author_avatar = get_avatar_url($author_id, ['size' => '96']);
                                $author_name = get_the_author_meta('display_name', $author_id);
                                $author_url = get_author_posts_url($author_id);
                        ?>
                                <article class="post post--overlay post--overlay-middle post--overlay-large post--overlay-height-680 post--overlay-padding-lg">
                                    <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                        <a href="<?php echo $post_url; ?>">
                                            <?php if (!empty($featured_image)) {
                                                $featured_image = $featured_image[0];
                                            } ?>
                                            <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image; ?>" alt="Featured Post Image">
                                        </a>
                                    </div>
                                    <div class="post__text inverse-text">
                                        <div class="post__text-wrap">
                                            <div class="post__text-inner max-width-640">
                                                <a href="<?php echo $post_cat_slug; ?>" class="post__cat post__cat--bg"><?php echo $post_cat_name; ?></a>
                                                <h3 class="post__title f-40 f-w-700 m-b-15 max-width-640">
                                                    <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                                </h3>
                                                <div class="post__meta">
                                                    <div class="post-author post-author_style-7">
                                                        <a class="post-author__avatar" href="<?php echo $author_url; ?>" title="Posts by <?php echo $author_name; ?>" rel="author">
                                                            <img src="<?php echo $placeholder; ?>" data-src="<?php echo $author_avatar; ?>" alt="author-techpd">
                                                        </a>
                                                        <div class="post-author__text">
                                                            <div class="author_name--wrap">
                                                                <span>by</span>
                                                                <a class="post-author__name" title="Posts by <?php echo $author_name; ?>" rel="author" href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                                                            </div>
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>"><?php echo get_the_date('D M j'); ?></time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo $post_url; ?>" class="link-overlay"></a>
                                </article>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                    <div class="section-sub">
                        <div class="owl-carousel js-atbs-carousel-4i30m atbs-carousel dots-circle dots-white" 
                        data-carousel-loop="<?php echo $data_carousel_loop; ?>"
                        data-auto-play="<?php echo $data_auto_play; ?>"
                        data-carousel-autoplay-time="<?php echo $data_carousel_autoplay_time; ?>"
                        >
                            <?php
                            $sticky = get_option('sticky_posts');
                            // display only sticky posts
                            $args = [
                                'post__in' => $sticky,
                                'ignore_sticky_posts' => 1,
                                'posts_per_page' => 6,
                                'offset' => 1,
                            ];
                            // display only sticky posts end
                            // ignore 1st sticky and display all latest 6 include sticky.
                            // $args = [
                            //     'ignore_sticky_posts' => 1,
                            //     'posts_per_page' => 6,
                            //     'post__not_in' => $sticky,
                            // ];
                            // ignore 1st sticky and display all latest 6 include sticky end
                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) :
                                    $query->the_post();
                                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                    // author detail
                                    $author_id = get_the_author_meta('ID');
                                    $author_avatar = get_avatar_url($author_id, ['size' => '96']);
                                    $author_name = get_the_author_meta('display_name', $author_id);
                                    $author_url = get_author_posts_url($author_id);

                                    // post title
                                    $title = get_the_title();
                                    $post_url = get_permalink($post->ID);
                                    // category
                                    $post_categories = get_the_category();
                                    foreach ($post_categories as $post_category) {
                                        $post_cat_slug = $post_category->slug;
                                        $post_cat_name = $post_category->name;
                                    }
                            ?>
                                    <div class="slide-content">
                                        <article class="post post--overlay post--overlay-cylinder post--overlay-cylinder-small post--overlay-bottom post--overlay-height-300">
                                            <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                                <a href="<?php echo $post_url; ?>">
                                                    <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="featured image">
                                                </a>
                                            </div>
                                            <div class="post__text inverse-text">
                                                <div class="post__text-wrap">
                                                    <div class="post__text-inner">
                                                        <h3 class="post__title f-18 f-w-600 m-b-10">
                                                            <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                                        </h3>
                                                        <div class="post__meta">
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>"><?php echo get_the_date('D M j'); ?></time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?php echo $post_url; ?>" class="link-overlay"></a>
                                            <a href="<?php echo $post_cat_slug; ?>" class="post__cat post__cat--bg overlay-item--top-left"><?php echo $post_cat_name; ?></a>
                                        </article>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="atbs-block atbs-block--fullwidth atbs-featured-module-3">
                <div class="block-heading block-heading_style-1 block-heading-no-line">
                    <h4 class="block-heading__title">
                        Featured Posts
                    </h4>
                </div>
                <div class="atbs-block__inner">
                    <div class="posts-list flex-box flex-space-30 flex-box-4i posts-list-tablet-2i">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'meta_key' => '_is_featured',
                            'meta_value' => '1',
                            'ignore_sticky_posts' => $sticky,
                        );
                        $featured_posts = new WP_Query($args);

                        if ($featured_posts->have_posts()) :
                            while ($featured_posts->have_posts()) :
                                $featured_posts->the_post();

                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                // author detail
                                $author_id = get_the_author_meta('ID');
                                $author_avatar = get_avatar_url($author_id, ['size' => '96']);
                                $author_name = get_the_author_meta('display_name', $author_id);
                                $author_url = get_author_posts_url($author_id);

                                // post title
                                $title = get_the_title();
                                $post_url = get_permalink($post->ID);
                                // category
                                $post_categories = get_the_category();
                                foreach ($post_categories as $post_category) {
                                    $post_cat_slug = $post_category->slug;
                                    $post_cat_name = $post_category->name;
                                }
                        ?>
                                <div class="list-item">
                                    <article class="post post--vertical post--vertical-style-card-thumb-aside atbs-post-hover-theme-style post--hover-theme">
                                        <div class="post__thumb object-fit">
                                            <a href="<?php echo $post_url; ?>">
                                                <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0] ?>" alt="Post Thumbnail">
                                            </a>
                                        </div>
                                        <div class="post__text flex-box flex-direction-column inverse-text">
                                            <div class="post__text-group">
                                                <a href="<?php echo $post_cat_slug; ?>" class="post__cat post__cat-primary"><?php echo $post_cat_name; ?></a>
                                                <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-3">
                                                    <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                                </h3>
                                                <div class="post-tags">
                                                    <ul class="list-unstyled list-horizontal">
                                                        <?php
                                                        $post_tags = get_the_tags();
                                                        if ($post_tags) :
                                                            foreach ($post_tags as $tag) :
                                                                $tag_url = get_tag_link($tag->term_id);
                                                                $tag_name = $tag->name;
                                                        ?>
                                                                <li><a href="<?php echo $tag_url; ?>" class="post-tag" rel="tag">#<?php echo $tag_name; ?></a></li>
                                                        <?php endforeach;
                                                        endif;
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="post__text-group flex-item-auto-bottom">
                                                <div class="post__meta time-style-1 flex-box justify-content-space align-item-center">
                                                    <div class="post-author post-author_style-6">
                                                        <div class="post-author__text">
                                                            <div class="author_name--wrap">
                                                                <span>by</span>
                                                                <a class="post-author__name" title="Posts by <?php echo $author_name; ?>" rel="author" href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>"><?php echo get_the_date('D M j'); ?></time>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="flex-box">
                <div class="atbs-main-col">
                    <div class="atbs-block atbs-block--fullwidth atbs-posts-block-main-col-2" style="margin-bottom: 30px">
                        <div class="block-heading block-heading_style-1 block-heading-no-line">
                            <h4 class="block-heading__title">
                                editor's choise
                            </h4>
                        </div>
                        <div class="atbs-block__inner flex-box">
                            <div class="section-main">
                                <div class="owl-carousel js-atbs-carousel-1i atbs-carousel dots-circle nav-circle nav-horizontal nav-white">
                                    <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 6,
                                        'category_name' => 'editors-choice',
                                        // 'ignore_sticky_posts' => $sticky,
                                    );
                                    $editors_choice_posts = new WP_Query($args);
                                    if ($editors_choice_posts->have_posts()) :
                                        while ($editors_choice_posts->have_posts()) :
                                            $editors_choice_posts->the_post();
                                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                            // author detail
                                            $author_id = get_the_author_meta('ID');
                                            $author_avatar = get_avatar_url($author_id, ['size' => '96']);
                                            $author_name = get_the_author_meta('display_name', $author_id);
                                            $author_url = get_author_posts_url($author_id);

                                            // post title
                                            $title = get_the_title();
                                            $post_url = get_permalink($post->ID);
                                            // category
                                            $post_categories = get_the_category();
                                            foreach ($post_categories as $post_category) {
                                                $post_cat_slug = $post_category->slug;
                                                $post_cat_name = $post_category->name;
                                            }
                                    ?>
                                            <div class="slide-content">
                                                <article class="post post--vertical post--vertical-card-overlap post--vertical-card-overlap-large">
                                                    <div class="post__thumb object-fit">
                                                        <a href="<?php echo $post_url; ?>">
                                                            <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="post thumbnail">
                                                        </a>
                                                    </div>
                                                    <div class="post__text inverse-text">
                                                        <a href="<?php echo $post_cat_slug; ?>" class="post__cat"><?php echo $post_cat_name; ?></a>
                                                        <h3 class="post__title f-26 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                                        </h3>
                                                        <div class="post__meta border-avatar flex-box align-item-center justify-content-space">
                                                            <div class="post-author post-author_style-7">
                                                                <a class="post-author__avatar" href="<?php echo $author_url; ?>" title="Posts by <?php echo $author_name; ?>" rel="author">
                                                                    <img alt="<?php echo $author_name; ?>" src="<?php echo $author_avatar; ?>">
                                                                </a>
                                                                <div class="post-author__text">
                                                                    <div class="author_name--wrap">
                                                                        <span>by</span>
                                                                        <a class="post-author__name" title="Posts by <?php echo $author_name; ?>" rel="author" href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>"><?php echo get_the_date('D M j'); ?></time>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                    <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="section-sub">
                                <div class="posts-list flex-box flex-box-1i">
                                    <?php
                                    // Get a random post that has not been displayed before
                                    $args = array(
                                        'post_type' => 'post',
                                        'orderby' => 'rand',
                                        'showposts' => 1,
                                        // 'posts_per_page' => 2,
                                    );
                                    $random_post = new WP_Query($args);
                                    if ($random_post->have_posts()) :
                                        while ($random_post->have_posts()) :
                                            $random_post->the_post();
                                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                            // author detail
                                            $author_id = get_the_author_meta('ID');
                                            $author_avatar = get_avatar_url($author_id, ['size' => '96']);
                                            $author_name = get_the_author_meta('display_name', $author_id);
                                            $author_url = get_author_posts_url($author_id);

                                            // post title
                                            $title = get_the_title();
                                            $post_url = get_permalink($post->ID);
                                            // category
                                            $post_categories = get_the_category();
                                            foreach ($post_categories as $post_category) {
                                                $post_cat_slug = $post_category->slug;
                                                $post_cat_name = $post_category->name;
                                            }
                                    ?>
                                            <div class="list-item">
                                                <article class="post post--horizontal post--horizontal-middle post--horizontal-card-space flex-box post--hover-theme">
                                                    <div class="post__thumb object-fit b-r-5 post__thumb-radius">
                                                        <a href="<?php echo $post_url; ?>"><img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="Post Thumbnail"></a>
                                                    </div>
                                                    <div class="post__text inverse-text">
                                                        <a href="<?php echo $post_cat_slug; ?>" class="post__cat"><?php echo $post_cat_name; ?></a>
                                                        <h3 class="post__title f-18 f-w-500 m-t-10 m-b-10 atbs-line-limit atbs-line-limit-2">
                                                            <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                                        </h3>
                                                        <div class="post__meta flex-box time-style-1">
                                                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>"><?php echo get_the_date('D M j'); ?></time>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                    <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid #ffffff10; padding-bottom: 40px;" class="atbs-block atbs-block--fullwidth atbs-posts-listing--grid-4-has-sidebar">
                        <div class="block-heading block-heading_style-1 block-heading-no-line">
                            <h4 class="block-heading__title">
                                Higher Comments
                            </h4>
                        </div>
                        <div class="atbs-block__inner flex-box">
                            <div class="posts-list flex-box flex-box-3i flex-space-30 posts-list-tablet-2i">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 2,
                                    'orderby' => 'comment_count',
                                    'order' => 'DESC',
                                );
                                $query = new WP_Query($args);
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                        // author detail
                                        $author_id = get_the_author_meta('ID');
                                        $author_avatar = get_avatar_url($author_id, ['size' => '96']);
                                        $author_name = get_the_author_meta('display_name', $author_id);
                                        $author_url = get_author_posts_url($author_id);

                                        // post title
                                        $title = get_the_title();
                                        $post_url = get_permalink($post->ID);
                                        // category
                                        $post_categories = get_the_category();
                                        foreach ($post_categories as $post_category) {
                                            $post_cat_slug = $post_category->slug;
                                            $post_cat_name = $post_category->name;
                                        }
                                ?>
                                        <div class="list-item">
                                            <article class="post post--vertical post--vertical-card-no-background">
                                                <div class="post__thumb object-fit b-r-8 post__thumb-radius">
                                                    <a href="<?php echo $post_url; ?>">
                                                        <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="Post Thumbnail">
                                                    </a>
                                                    <a href="<?php echo $post_cat_slug; ?>" class="post__cat post__cat--bg overlay-item--top-left"><?php echo $post_cat_name; ?></a>
                                                </div>
                                                <div class="post__text inverse-text author-avatar-right">

                                                    <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-2">
                                                        <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                                    </h3>
                                                    <div class="post__meta border-avatar">
                                                        <div class="post-author post-author_style-7">
                                                            <a class="post-author__avatar" href="<?php echo $author_url; ?>" title="Posts by <?php echo $author_name; ?>" rel="author">
                                                                <img alt="<?php echo $author_name; ?>" src="<?php echo $author_avatar; ?>">
                                                            </a>
                                                            <div class="post-author__text">
                                                                <div class="author_name--wrap">
                                                                    <span>by</span>
                                                                    <a class="post-author__name" title="Posts by <?php echo $author_name; ?>" rel="author" href="<?php echo $author_url; ?>"> <?php echo $author_name; ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>"><?php echo get_the_date('D M j'); ?></time>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- here lising template parts ajax load more -->
                    <?php get_template_part('template-parts/ajax-posts/listing-container-outer'); ?>
                    <!--end  here template parts -->
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
        <!--author sidebar -->
        <?php get_template_part('template-parts/author-sidebar'); ?>
        <!--author sidebar end -->
    </div>
</div>
<?php get_footer(); ?>