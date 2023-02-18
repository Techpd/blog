<?php
/* Template Name: category-archive */
get_header(); ?>

<style>
    #load-more {
    text-align: center;
    padding: 20px 0;
}

#load-more span {
    background-color: #0088cc;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.post {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
}

</style>

<div id="category-archive">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<div id="load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <span>Load More</span>
</div>

<?php get_footer(); 
?>

<script>
    jQuery(document).ready(function($) {
    var page = 2;
    var category_id = <?php echo get_query_var('cat'); ?>;

    $('#load-more').on('click', function() {
        var data = {
            'action': 'load_more_posts',
            'page': page,
            'category_id': category_id
        };

        $.post($('#load-more').data('url'), data, function(response) {
            $('#category-archive').append(response);
            page++;
        });

        return false;
    });
});

</script>

