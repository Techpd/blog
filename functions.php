<?php
function add_cors_header()
{
    header("Access-Control-Allow-Origin: http://localhost");
    header("Access-Control-Allow-Headers: *");
}

add_action('init', 'add_cors_header');



function theme_styles()
{
    //main style sheet
    wp_enqueue_style('import-css', get_template_directory_uri() . '/css/import-style.css');
    // wp_enqueue_style('fontawesome_font_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    // wp_enqueue_style('lightbox_css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css' );

    //production jQuery
    wp_enqueue_script('main-jQuery', get_template_directory_uri() . '/js/jquery.js', array(), '1.0', true);
    // sidebar js script file    
    wp_enqueue_script('sidebar-js', get_template_directory_uri() . '/js/sidebar.js', array(), '1.0', true);
    //own-carousel
    wp_enqueue_script('slider-js', get_template_directory_uri() . '/js/owl-carousel.min.js', array(), '1.0', true);
    // main js script file
    wp_enqueue_script('main-script-js', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_styles');

// script and style only for wordpress dashboard
function enqueue_admin_dashboard_script()
{
    //   css
    wp_enqueue_style('admin-style', get_template_directory_uri() . '/admin/style.css', array(), '1.0');
    //   js
    wp_enqueue_script('admin-dashboard-script', get_template_directory_uri() . '/admin/script.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'enqueue_admin_dashboard_script');
// script and style only for wordpress dashboard end here ------------------>

/* ============================================================================================
   THEME SUPPORT CODE 
   ============================================================================================
*/
// site logo theme panel option
function themename_custom_logo_setup()
{
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');



// Register  menus
function my_custom_menus()
{
    $locations = array(
        'primary-menu' => __('Primary Menu', 'custom menu'),
        'footermenu' => __('Footer Menu', 'custom menu'),
    );
    register_nav_menus($locations);
}

// Hook them into the theme-'init' action
add_action('init', 'my_custom_menus');

// for adding class on anchor tag on menu
add_filter('nav_menu_link_attributes', function ($atts) {
    $atts['class'] = "nav-link";
    return $atts;
}, 100, 1);
// end of nav menu register


// theme support
//adding feature image upload option
add_theme_support('post-thumbnails');
//adding feature image upload option END ----------------->

// adding theme support to add featured image using URL
add_filter('admin_post_thumbnail_html', 'add_featured_image_url_input');
function add_featured_image_url_input($content)
{
    $content .= '<p><label for="featured_image_url">Image URL:</label><br /><input type="text" id="featured_image_url" name="featured_image_url" value="" size="40" /></p>';
    $content .= '<script>
        jQuery(document).ready(function($) {
            $("#featured_image_url").on("blur", function() {
                var url = document.getElementById("featured_image_url").value;
                try {
                    var xhr = new XMLHttpRequest();
                    xhr.open("HEAD", url, false);
                    xhr.send();
                    if (xhr.status == 404) {
                        alert("URL is not working, try another. 1");
                    }
                } catch (e) {
                    console.log("URL is valid");
                }
            });
          });
          
    </script>';
    return $content;
}

add_action('save_post', 'save_featured_image_from_url');
function save_featured_image_from_url($post_id)
{
    if (isset($_POST['featured_image_url']) && !empty($_POST['featured_image_url'])) {
        set_featured_image_from_url($post_id, $_POST['featured_image_url']);
    }
}

function set_featured_image_from_url($post_id, $image_url)
{
    if (!filter_var($image_url, FILTER_VALIDATE_URL)) {
        echo "<script>alert('URL is not valid. Please try another.');</script>";
        return;
    }

    $response = wp_remote_get($image_url);
    if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
        echo "<script>alert('URL is not accessible. Please try another.');</script>";
        return;
    }

    $upload_dir = wp_upload_dir();
    $image_data = wp_remote_retrieve_body($response);
    $filename = basename($image_url);
    if (wp_mkdir_p($upload_dir['path']))
        $file = $upload_dir['path'] . '/' . $filename;
    else
        $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $file, $post_id);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);
    set_post_thumbnail($post_id, $attach_id);
}

// adding theme support to add featured image using URL end here --------------->

// adding featured post On Off
function add_featured_post_support()
{
    add_theme_support('featured-content', array(
        'featured_content_filter' => 'my_featured_posts',
        'max_posts' => 10,
    ));
    add_post_type_support('post', 'featured-content');
}
add_action('after_setup_theme', 'add_featured_post_support');

// below is function to use or display featured posts example
//  function my_featured_posts( $content ) {
//      $content = array();
//      $query = new WP_Query( array(
//          'post_type' => 'post',
//          'meta_key' => '_is_featured',
//          'meta_value' => true,
//      ) );
//      while ( $query->have_posts() ) {
//          $query->the_post();
//          $content[] = get_the_ID();
//      }
//      wp_reset_postdata();
//      return $content;
//  }
// below is function to use or display featured posts end example

// Adding quick button on off for featured post
function my_quick_edit_custom_box($column_name, $post_type)
{
    if ($column_name != 'featured') return;
?>
    <fieldset class="inline-edit-col-left">
        <div class="inline-edit-col">
            <label>
                <input type="checkbox" name="_is_featured" value="1">
                <span class="checkbox-title">Featured</span>
            </label>
        </div>
    </fieldset>
<?php
}
add_action('quick_edit_custom_box', 'my_quick_edit_custom_box', 10, 2);

function my_save_quick_edit_data($post_id)
{
    if (isset($_POST['_is_featured']))
        update_post_meta($post_id, '_is_featured', true);
    else
        delete_post_meta($post_id, '_is_featured');
}
add_action('save_post', 'my_save_quick_edit_data');

// Adding quick button on off for featured post end

// Bulk Toggle featured in bulk action 
function my_admin_footer()
{
    echo '<script>jQuery(document).ready(function($) { $("table").on("click", ".hide-column-tog", function() { $(".column-featured").toggle(); }); });</script>';
}
add_action('admin_footer', 'my_admin_footer');


function my_bulk_actions($actions)
{
    $actions['featured'] = 'Set Bulk Featured';
    return $actions;
}
add_filter('bulk_actions-edit-post', 'my_bulk_actions');

function my_handle_bulk_actions($redirect_to, $doaction, $post_ids)
{
    if ($doaction !== 'featured') {
        return $redirect_to;
    }
    foreach ($post_ids as $post_id) {
        $featured = get_post_meta($post_id, '_is_featured', true);
        update_post_meta($post_id, '_is_featured', !$featured);
    }
    $redirect_to = add_query_arg('bulk_featured', count($post_ids), $redirect_to);
    return $redirect_to;
}
add_filter('handle_bulk_actions-edit-post', 'my_handle_bulk_actions', 10, 3);

function my_bulk_admin_notices()
{
    if (!empty($_REQUEST['bulk_featured'])) {
        $featured_count = intval($_REQUEST['bulk_featured']);
        printf('<div id="message" class="updated fade">' . _n('Toggled featured status of %s post.', 'Toggled featured status of %s posts.', $featured_count) . '</div>', $featured_count);
    }
}
add_action('admin_notices', 'my_bulk_admin_notices');

// Bulk Toggle featured in bulk action end here ----->


//  this is to display post is set to featured or not. on screen option of coloums
function my_posts_columns($columns)
{
    $columns['featured'] = 'Featured';
    return $columns;
}
add_filter('manage_posts_columns', 'my_posts_columns');

function my_custom_columns($column, $post_id)
{
    switch ($column) {
        case 'featured':
            if (get_post_meta($post_id, '_is_featured', true))
                echo 'Yes';
            else
                echo 'No';
            break;
    }
}
add_action('manage_posts_custom_column', 'my_custom_columns', 10, 2);
//  end featured display on 


// hove quick action for featured post
function my_post_row_actions($actions, $post)
{
    $featured = get_post_meta($post->ID, '_is_featured', true);
    if ($featured) {
        $actions['unfeatured'] = '<a href="' . wp_nonce_url(add_query_arg(array('post_id' => $post->ID, 'action' => 'unfeatured')), 'featured-post_' . $post->ID) . '">Un-feature</a>';
    } else {
        $actions['featured'] = '<a href="' . wp_nonce_url(add_query_arg(array('post_id' => $post->ID, 'action' => 'featured')), 'featured-post_' . $post->ID) . '">Feature</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'my_post_row_actions', 10, 2);

function my_handle_row_actions()
{
    if (empty($_REQUEST['post_id']) || ($_REQUEST['action'] !== 'featured' && $_REQUEST['action'] !== 'unfeatured')) {
        return;
    }
    $post_id = intval($_REQUEST['post_id']);
    check_admin_referer('featured-post_' . $post_id);
    update_post_meta($post_id, '_is_featured', $_REQUEST['action'] === 'featured');
    wp_safe_redirect(wp_get_referer());
    exit;
}
add_action('load-edit.php', 'my_handle_row_actions');

// hove quick action for featured post end here ------------------>

// hover quick action for the sticky post 
function my_sticky_post_row_actions($actions, $post)
{
    if (is_sticky($post->ID)) {
        $actions['unstick'] = '<a href="' . wp_nonce_url(add_query_arg(array('post_id' => $post->ID, 'action' => 'unstick')), 'sticky-post_' . $post->ID) . '">Un-sticky</a>';
    } else {
        $actions['stick'] = '<a href="' . wp_nonce_url(add_query_arg(array('post_id' => $post->ID, 'action' => 'stick')), 'sticky-post_' . $post->ID) . '">Sticky</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'my_sticky_post_row_actions', 10, 2);

function my_sticky_handle_row_actions()
{
    if (empty($_REQUEST['post_id']) || ($_REQUEST['action'] !== 'stick' && $_REQUEST['action'] !== 'unstick')) {
        return;
    }
    $post_id = intval($_REQUEST['post_id']);
    check_admin_referer('sticky-post_' . $post_id);
    if ($_REQUEST['action'] === 'stick') {
        stick_post($post_id);
    } else {
        unstick_post($post_id);
    }
    wp_safe_redirect(wp_get_referer());
    exit;
}
add_action('load-edit.php', 'my_sticky_handle_row_actions');

// hover quick action for the sticky post  end here ------------------>

// adding post duplicator funtion 
function duplicate_post()
{
    global $wpdb;

    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'duplicate_post' == $_REQUEST['action']))) {
        wp_die('No post to duplicate has been supplied!');
    }

    $post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
    $post = get_post($post_id);
    $i = 1;
    if (isset($post) && $post != null) {
        $new_post = array(
            'post_title' => $post->post_title . $i,
            'post_content' => $post->post_content,
            'post_status' => $post->post_status,
            'post_type' => $post->post_type,
            'post_author' => $post->post_author
        );

        $new_post_id = wp_insert_post($new_post);

        $taxonomies = get_object_taxonomies($post->post_type);

        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");

        if (count($post_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";

            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }

            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }

        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
    $i++;
}

add_action('admin_action_duplicate_post', 'duplicate_post');

// Add duplicate post row action
function add_duplicate_post_row_action($actions, $post)
{
    if (current_user_can('edit_posts')) {
        $actions['duplicate_post'] = '<a href="' . wp_nonce_url('admin.php?action=duplicate_post&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '">' . __('Duplicate Post', 'text-domain') . '</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'add_duplicate_post_row_action', 10, 2);

// Handle duplicate post action
function handle_duplicate_post_action()
{
    if (isset($_GET['action']) && $_GET['action'] == 'duplicate_post' && isset($_GET['post'])) {
        if (!wp_verify_nonce($_REQUEST['duplicate_nonce'], basename(__FILE__))) {
            die('Security check failed');
        }

        $post_id = absint($_GET['post']);
        $new_post_id = duplicate_post($post_id);

        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    }
}
add_action('admin_init', 'handle_duplicate_post_action');
// adding post duplicator funtion  end here ---------->

// Adding svg upload with fixng height width problem start here ------------->
// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
         </style>';
}
add_action('admin_head', 'fix_svg');
// Adding svg upload with fixng height width problem end here ----------------->

// Post categories have feature to upload categoires 
add_action('after_setup_theme', 'theme_setup');
function theme_setup()
{
    add_theme_support('category-thumbnails');
}
// Post categories have feature to upload categoires  -------------->

// created own breadcrumbs function ---------------------------------------------->
function my_breadcrumbs()
{
    $separator = '&gt;';
    $home_text = 'Home';
    $show_on_home = 0;
    $before = '<span class="current">';
    $after = '</span>';

    global $post;
    $output = '';

    if (is_home() || is_front_page()) {
        if ($show_on_home == 1) $output .= '<a href="' . get_home_url() . '">' . $home_text . '</a>';
    } else {
        $output .= '<a href="' . get_home_url() . '">' . $home_text . '</a> ' . $separator . ' ';

        if (is_category()) {
            $cat = get_category(get_query_var('cat'));
            if ($cat->parent != 0) {
                $output .= get_category_parents($cat->parent, true, ' ' . $separator . ' ');
            }
            $output .= $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            $output .= $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_404()) {
            $output .= $before . '404 Not Found' . $after;
        } elseif (is_single()) {
            $cat = get_the_category();
            if (isset($cat[0])) {
                $output .= get_category_parents($cat[0], true, ' ' . $separator . ' ');
            }
            $output .= $before . get_the_title() . $after;
        } elseif (is_page()) {
            if ($post->post_parent) {
                $ancestors = get_post_ancestors($post->ID);
                $ancestors = array_reverse($ancestors);
                foreach ($ancestors as $ancestor) {
                    $output .= '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a> ' . $separator . ' ';
                }
            }
            $output .= $before . get_the_title() . $after;
        }
    }
    echo $output;
    // Call an action hook for the breadcrumbs
    // do_action( 'my_breadcrumbs_display' );
}
add_action('breadcrumbs', 'my_breadcrumbs');
// add_action( 'my_breadcrumbs', 'my_breadcrumbs_display' );
// created own breadcrumbs function end here --------------------------------->
// Adding Class on Gravity form on submit button
add_filter('gform_submit_button', 'add_custom_css_classes', 10, 2);
function add_custom_css_classes($button, $form)
{
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $classes = $input->getAttribute('class');
    $classes .= " btn btn-primary contactform-submit";
    $input->setAttribute('class', $classes);
    return $dom->saveHtml($input);
}
add_filter('gform_submit_button', 'gf_change_submit_button_text', 10, 2);
function gf_change_submit_button_text($button, $form)
{
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $onclick = $input->getAttribute('onclick');
    $onclick .= " this.value='Sending...'"; // Change button text when clicked.
    $input->setAttribute('onclick', $onclick);
    return $dom->saveHtml($input);
}
// Adding Class on Gravity form on submit button end here ------------->

// adding custom profile pic for the admin user 
function custom_user_avatar($avatar, $id_or_email, $size, $default, $alt)
{
    // Set the user ID to 123
    $user_id = 1;

    // Check if the avatar is for the user with ID 123
    if (is_numeric($id_or_email) && $id_or_email == $user_id || (is_object($id_or_email) && $id_or_email->user_id == $user_id)) {
        // Set the URL of the custom avatar
        $imageFolder_avtars = get_template_directory_uri() . '/img/admin-author.png';
        $custom_avatar_url = $imageFolder_avtars;

        // Replace the default avatar with the custom avatar
        $avatar = '<img src="' . $custom_avatar_url . '" width="' . $size . '" height="' . $size . '" alt="' . $alt . '" class="avatar avatar-' . $size . ' photo" />';
    }

    return $avatar;
}
add_filter('get_avatar', 'custom_user_avatar', 10, 5);

// adding custom profile pic for the admin user  end --------------->

function custom_author_name($name)
{
    $admin = get_users(array('role' => 'administrator', 'number' => 1)); // Get the first administrator user
    if (!empty($admin)) {
        $name = $admin[0]->display_name; // Use the display name of the first administrator user
    }
    return $name;
}
add_filter('the_author', 'custom_author_name');

// Save custom field on user profile update
function save_custom_user_profile_fields($user_id)
{
    if (current_user_can('edit_user', $user_id)) {
        if (isset($_FILES['custom_image'])) {
            $attachment_id = media_handle_upload('custom_image', 0);
            if (is_numeric($attachment_id)) {
                update_user_meta($user_id, 'custom_image', wp_get_attachment_url($attachment_id));
            }
        }
    }
}
add_action('personal_options_update', 'save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'save_custom_user_profile_fields');

// custom image upload option the admin users end here

function custom_comment_author_name($author)
{
    $comment = get_comment(); // Get the current comment object
    $user_id = $comment->user_id; // Get the user ID of the comment author

    // Check if the comment author is an administrator
    if (user_can($user_id, 'administrator')) {
        $admin = get_users(array('role' => 'administrator', 'number' => 1)); // Get the first administrator user
        if (!empty($admin)) {
            $author = $admin[0]->display_name; // Use the display name of the first administrator user
        }
    }

    return $author;
}
add_filter('get_comment_author', 'custom_comment_author_name');
/* ============================================================================================
   THEME SUPPORT CODE END HERE
   ============================================================================================
*/

// including ajax function from template parts ajax posts
require_once get_template_directory() . '/template-parts/ajax-posts/ajax-function.php';
// end of including ajax on home page

// create nested comment system 
// function theme_prefix_setup()
// {
//     add_theme_support('nested-comments');
// }
// add_action('after_setup_theme', 'theme_prefix_setup');


$args = array(
    'walker'            => null,
    'max_depth'         => 3, // change the value as per your requirement
    'style'             => 'div',
    'callback'          => 'my_comment_callback',
    'end-callback'      => null,
    'type'              => 'all',
    'reply_text'        => 'Reply',
    'page'              => '',
    'per_page'          => '',
    'avatar_size'       => 80,
    'reverse_top_level' => true,
    'reverse_children'  => true,
    'format'            => 'html5',
    'short_ping'        => false,
    'echo'              => true,
);
wp_list_comments($args);

function my_comment_callback($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
?>
    <ol class="comment-list">
        <li id="comment-<?php comment_ID(); ?>"></li>
    </ol>
    <div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
        <footer class="comment-meta">
            <div class="comment-author vcard">
                <img src="" class="avatar photo" alt="avatar"><b class="fn"><?php comment_author(); ?></b><span class="says">says:</span>
            </div><!-- .comment-author -->
            <div class="comment-metadata">
                <a href="#">
                    <time datetime="2016-10-21T13:31:45+00:00"><?php comment_date(); ?></time>
                </a>
            </div><!-- .comment-metadata -->
        </footer>
        <div class="comment-content">
            <p>
                <?php comment_text(); ?>
            </p>
        </div>
        <div class="reply">
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
    <?php
}

// for adding and remove author url
function custom_comment_author_link($link, $author, $comment_ID)
{
    $comment = get_comment($comment_ID); // Get the current comment object
    $user_id = $comment->user_id; // Get the user ID of the comment author

    // Check if the comment author is an administrator
    if (user_can($user_id, 'administrator')) {
        $admin = get_users(array('role' => 'administrator', 'number' => 1)); // Get the first administrator user
        if (!empty($admin)) {
            $admin_profile_url = get_author_posts_url($admin[0]->ID); // Get the profile URL of the first administrator user
            $link = '<a href="' . $admin_profile_url . '">' . $author . '</a>'; // Wrap the comment author name in a link
        }
    } elseif (user_can($user_id, 'customer') || user_can($user_id, 'subscriber')) {
        $link = '<span>' . $author . '</span>'; // Wrap the comment author name in a span
    } else {
        $link = '<a href="#">' . $author . '</a>'; // Wrap the comment author name in a link with "#" URL
    }

    return $link;
}
add_filter('get_comment_author_link', 'custom_comment_author_link', 10, 3);

// for adding and remove author url end here--------------->

function my_theme_setup()
{
    add_theme_support('threaded-comments');
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('after_setup_theme', 'my_theme_setup');
function remove_comment_count_title($output, $number)
{
    // Return an empty string to remove the comment count and title
    return '';
}
add_filter('comments_number', 'remove_comment_count_title', 10, 2);


function add_admin_to_comment_reply_link($link, $args, $comment, $post)
{
    // Check if the user is logged in and has the 'administrator' role
    if (is_user_logged_in() && current_user_can('administrator')) {
        // Get the parent comment ID for the reply
        $parent_id = $comment->comment_parent ? $comment->comment_parent : $comment->comment_ID;

        // Add the 'data-user-id' attribute to the reply link with the admin user ID
        $link = str_replace('data-replyto="0"', 'data-replyto="' . $parent_id . '" data-user-id="1"', $link);
    }

    return $link;
}
add_filter('comment_reply_link', 'add_admin_to_comment_reply_link', 10, 4);

// create nested comment system  -------------end here--------------> 
