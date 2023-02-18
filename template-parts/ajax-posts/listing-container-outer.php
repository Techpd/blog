
<?php
$args = array(
    'posts_per_page' => 3,
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => 1,
);
$recent_posts = new WP_Query($args);
?>
<div class="atbs-block atbs-block--fullwidth atbs-posts-listing--grid-1-has-sidebar">
    <div class="block-heading block-heading_style-1 block-heading-no-line">
        <h4 class="block-heading__title">
            Listing Posts
        </h4>
    </div>
    <div class="atbs-block__inner">
        <?php
        if ($recent_posts->have_posts()) : ?>
            <div class="posts-list load-more flex-box flex-space-30 flex-box-3i posts-list-tablet-2i">
                <?php
                while ($recent_posts->have_posts()) :
                    $recent_posts->the_post();
                    get_template_part('template-parts/ajax-posts/listing-card-inner');
                endwhile;
                ?>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
        <nav id="load-more-btn-container" class="atbs-pagination text-center">
            <a href="javascript:void(0)" class="btn btn-default" id="load-more">Load More</a>
        </nav>
    </div>
</div>
