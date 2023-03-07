<?php
$placeholder = get_template_directory_uri() . '/img/placeholder.webp';
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
// category details start here ------------->
// category image thumbnail
// $image = get_field('category_image');
// $size = 'full'; // (thumbnail, medium, large, full or custom size)
// if ($image) {
//     $image_url = wp_get_attachment_image($image, $size);
// }
// category image thumbnail end here
$categories = get_categories();
if ($categories) :
    //echo '<div class="categories-list-container ">';
    foreach ($categories as $category) :
        $image_id = get_field('category_image', 'category_' . $category->term_id);
        // echo '<pre>';
        // print_r($image_id);
        // echo '</pre>';
        $image_url = wp_get_attachment_image_url($image_id['id'], 'thumbnail');
        $cat_link = get_category_link($category->term_id);
        // $cat_thumb_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $cat_description = $category->description;
        $cat_name = $category->name;
        $cat_post_count = $category->count;
        // category details end here ---------------->
?>
        <div class="categories-list">
            <div class="list-item">
                <article class="post post--horizontal post--horizontal-middle post--horizontal-card-space flex-box post--hover-theme">
                    <div class="post__thumb object-fit b-r-5 post__thumb-radius">
                        <a href="<?php echo $cat_link; ?>">
                            <img src="<?php echo $placeholder; ?>" data-src="<?php echo $image_url; ?>" alt="<?php //echo $image['alt']; ?>">
                        </a>
                    </div>
                    <div class="post__text inverse-text">
                        <a href="<?php echo $cat_link; ?>" class="post__cat"><?php echo $cat_name; ?></a>
                        <p class="post__title f-18 f-w-500 m-t-10 m-b-10 atbs-line-limit atbs-line-limit-2">
                            <a href="<?php echo $cat_link; ?>"><?php echo $cat_description ?></a>
                        </p>
                        <div class="post__meta flex-box time-style-1">
                            <time class="time published" datetime="2019-03-06T08:45:23+00:00" title="<?php echo get_the_date('D M j'); ?> at <?php the_time();  ?>">
                                <?php echo get_the_date('D M j');
                                echo ' - (' . sprintf(_n('%d post', '%d posts', $cat_post_count), $cat_post_count) . ')';
                                ?>
                            </time>
                        </div>
                    </div>
                </article>
            </div>
        </div>
<?php
    endforeach;
    //echo '</div>';
endif;
?>