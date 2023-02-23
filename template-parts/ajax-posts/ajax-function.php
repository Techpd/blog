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


// Load more comment ajax admin fucntion 
// function load_comments_ajax_handler() {
//   check_ajax_referer('load_more_posts', 'security');
//   $page = $_GET['page'];
//   $post_id = $_GET['post_id'];
//   $comments_per_page = get_option('comments_per_page');
//   $offset = ($page - 1) * $comments_per_page;
//   $comments = get_comments(array(
//       'post_id' => $post_id,
//       'status' => 'approve',
//       'number' => $comments_per_page,
//       'offset' => $offset,
//       'order' => 'ASC'
//   ));
//   $last_page = count($comments) < $comments_per_page;
//   ob_start();
//   wp_list_comments(array(
//       'style' => 'div',
//       'short_ping' => true,
//       'avatar_size' => 50,
//       'callback' => 'my_custom_comments'
//   ), $comments);
//   $html = ob_get_clean();
//   wp_send_json_success(array(
//       'html' => $html,
//       'last_page' => $last_page
//   ));
// }
// add_action('wp_ajax_load_comments', 'load_comments_ajax_handler');
// add_action('wp_ajax_nopriv_load_comments', 'load_comments_ajax_handler');

function my_custom_load_comments() {
  $post_id = $_POST['post_id'];
  $page = $_POST['page'];
  $per_page = $_POST['per_page'];
  $args = array(
      'post_id' => $post_id,
      'status' => 'approve',
      'orderby' => 'comment_date_gmt',
      'order' => 'ASC',
      'offset' => $page * $per_page,
      'number' => $per_page
  );
  $comments = get_comments($args);
  ob_start();
  foreach($comments as $comment) {
      // Output each comment as HTML
      wp_list_comments(array(
          'type' => 'comment',
          'callback' => 'my_comment_callback',
          'max_depth' => 3,
          'reverse_top_level' => false
      ), array($comment), 1);
  }
  $output = ob_get_clean();
  // echo $output;
  wp_send_json_success($output);
  wp_die();
}

add_action('wp_ajax_my_custom_load_comments', 'my_custom_load_comments');
add_action('wp_ajax_nopriv_my_custom_load_comments', 'my_custom_load_comments');

function my_custom_scripts() {
  wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() . '/js/ajax.js', array('jquery'), '1.0', true);
  wp_localize_script('my-custom-script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'my_custom_scripts');

// Load more comment ajax admin fucntion  end here ------------------>