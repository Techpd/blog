<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'meta_key' => 'post_views',
    'orderby' => 'comment_count',
    'order' => 'DESC',
);
$query = new WP_Query($args);
?>
<div class="widget atbs-atbs-widget atbs-widget-posts-1">
    <div class="widget-wrap">
        <div class="widget__title">
            <h4 class="widget__title-text">Trending News</h4>
        </div>
        <div class="widget__inner">
            <div class="posts-list flex-box flex-space-30 flex-box-1i posts-list-tablet-2i">
                <?php
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
                            <article class="post post--vertical post--vertical-rectangle-outside">
                                <div class="post__thumb object-fit">
                                    <a href="<?php echo $post_url; ?>"><img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0] ?>" alt="Post Thumbnail"></a>
                                    <a href="<?php echo $post_cat_slug; ?>" class="post__cat post__cat--bg"><?php echo $post_cat_name; ?></a>
                                </div>
                                <div class="post__text">
                                    <h3 class="post__title f-20 m-b-10 f-w-600">
                                        <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                                    </h3>
                                    <div class="post__meta time-style-1">
                                        <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date( 'D M j' ); ?> at <?php the_time();  ?>"><?php echo get_the_date( 'D M j' ); ?></time>
                                    </div>
                                </div>
                            </article>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</div>