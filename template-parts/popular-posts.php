<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'meta_key' => 'post_views',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
);

$query = new WP_Query($args);
?>
<div class="widget atbs-atbs-widget atbs-widget-posts-2">
    <div class="widget-wrap">
        <div class="widget__title">
            <h4 class="widget__title-text">Popular</h4>
        </div>
        <div class="widget__inner">
            <div class="posts-list flex-box flex-space-30 flex-box-1i posts-list-tablet-2i">
                <?php
                if ($query->have_posts()) :
                    $i=1;
                    while ($query->have_posts()) :
                        $query->the_post();
                        // Your post content here
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                        // post title
                        $title = get_the_title();
                        $post_url = get_permalink($post->ID);
                 ?>
                <div class="list-item">
                    <article class="post post--horizontal post--horizontal-reverse post--horizontal-xxs post--horizontal-middle">
                        <div class="post__thumb atbs-thumb-object-fit b-r-5 post__thumb-radius">
                            <a href="<?php echo $post_url; ?>"><img src="<?php $placeholder;?>" data-src="<?php echo $featured_image[0] ?>" alt="Post Thumbnail"></a>
                        </div>
                        <div class="post__text flex-box align-item-center">
                            <span class="list-index"><?php echo '0'.$i ?></span>
                            <h3 class="post__title f-16 f-w-500 flex-item-auto hover-color-primary">
                                <a href="<?php echo $post_url; ?>"><?php echo $title; ?></a>
                            </h3>
                        </div>
                    </article>
                </div>
                <?php 
                $i++;
                endwhile;
                wp_reset_postdata();
            endif; ?>
            </div>
        </div>
    </div>
</div>