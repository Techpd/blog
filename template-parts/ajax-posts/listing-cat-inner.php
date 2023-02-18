<?php
$placeholder = get_template_directory_uri() . '/img/placeholder.webp';
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
// author detail
$author_id = get_the_author_meta('ID');
$author_avatar = get_avatar_url($author_id, ['size' => '96']);
$author_name = get_the_author_meta('display_name', $author_id);
$author_url = get_author_posts_url($author_id);
// post title
$title = get_the_title();
$post_url = get_permalink($post->ID);

$post_categories = get_the_category();
foreach ($post_categories as $post_category) {
    $post_cat_slug = $post_category->slug;
    $post_cat_name = $post_category->name;
}
?>
<div class="list-item">
    <article class="post post--vertical post--vertical-style-card-thumb-aside atbs-post-hover-theme-style post--hover-theme" data-dark-mode="true">
        <div class="post__thumb object-fit">
            <a href="<?php echo $post_url; ?>">
                <img src="<?php echo $placeholder; ?>" data-src="<?php echo $featured_image[0]; ?>" alt="thumbnail">
            </a>
        </div>
        <div class="post__text flex-box flex-direction-column inverse-text">
            <div class="post__text-group">
                <a href="<?php echo $post_cat_slug; ?>" class="post__cat post__cat-primary"><?php echo $post_cat_name; ?></a>
                <h3 class="post__title f-20 f-w-600 m-b-10 m-t-10 atbs-line-limit atbs-line-limit-3">
                    <a href="<?php echo $post_url; ?>"><?php the_title(); ?></a>
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