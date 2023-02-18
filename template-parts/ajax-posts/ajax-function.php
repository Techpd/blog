<?php
// for ajax load more function on home  page start here ---------------------->
function techpd_load_more()
{
  $ajaxposts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $_POST['paged'],
  ]);

  $response = '';

  if ($ajaxposts->have_posts()) {
    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      // code to display the default header
      $response .= get_template_part('template-parts/ajax-posts/listing-card-inner');
    endwhile;
    wp_reset_postdata();
  } else {
    $response = '';
  }
  echo $response;
  exit;
}
add_action('wp_ajax_techpd_load_more', 'techpd_load_more');
add_action('wp_ajax_nopriv_techpd_load_more', 'techpd_load_more');
// for ajax load more function on home  page ------------end here---------->

// scrip regitering and security for ajax 
function blog_scripts()
{
  // Register the script
  wp_register_script('custom-script', get_stylesheet_directory_uri() . '/js/ajax.js', array('jquery'), false, true);

  // Localize the script with new data
  $script_data_array = array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('load_more_posts'),
  );
  wp_localize_script('custom-script', 'blog', $script_data_array);

  // Enqueued script with localized data.
  wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'blog_scripts');
// scrip regitering and security for ajax end here ---------------------->


// function for category page load more ajax button start here --------------->
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');
function load_posts_by_ajax_callback()
{
  check_ajax_referer('load_more_posts', 'security');

  $paged = $_POST['page'];
  $category = get_the_category($post->ID);
  $category = $category[0]->cat_ID;
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => '4',
    'cat' =>  $_POST['cat_id'],
    'paged' => $paged,
  );
  $blog_posts = new WP_Query($args);
  $response = '';
  if ($blog_posts->have_posts()) {
    while ($blog_posts->have_posts()) :
      $blog_posts->the_post();
      $response .= get_template_part('template-parts/ajax-posts/listing-cat-inner');
    endwhile;
    wp_reset_postdata();
  } else {
    $response = '';
  }
  echo $response;
  exit;
}
// function for category page load more ajax button end here --------------->