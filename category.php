<?php
get_header();
?>
<div class="site-content">
    <div class="flex-box">
        <div class="atbs-block atbs-block--fullwidth atbs-section-module">
            <div class="atbs-block atbs-block--fullwidth atbs-featured-module-3">
                <div class="block-heading block-heading_style-1 block-heading-no-line">
                    <h4 class="block-heading__title">
                        <?php single_cat_title(); ?>
                    </h4>
                </div>
                <div class="atbs-block__inner">
                    <div class="posts-list cat-post-load-more flex-box flex-space-30 flex-box-4i posts-list-tablet-2i">
                        <?php
                    $category = get_the_category($post->ID);
                    $category = $category[0]->cat_ID;
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '4',
                        'paged' => 1,
                        'cat' =>  $category,
                    );
                    $cat_args = new WP_Query($args);
                        if ($cat_args->have_posts()) :
                            while ($cat_args->have_posts()) :
                                $cat_args->the_post();
                                get_template_part('template-parts/ajax-posts/listing-cat-inner');
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>

                    </div>
                    <nav id="cat-load-more-btn-container" class="atbs-pagination text-center">
                        <a href="javascript:void(0)" id="cat-load-more" data-cat-id="<?php echo $category; ?>" class="btn btn-default">Load More</a>
                    </nav>
                </div>
            </div>
        </div>
        <!--author sidebar -->
        <?php get_template_part('template-parts/author-sidebar'); ?>
        <!--author sidebar end -->
    </div><!-- .site-content -->
    <?php get_footer(); ?>