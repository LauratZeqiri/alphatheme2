<?php 

function alpha_script() {
    wp_enqueue_style( 'customestyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/index.js', array('jquery'));

}
add_action( 'wp_enqueue_scripts', 'alpha_script' );

function alpha_theme_setup(){
    add_theme_support( 'menus');
 
    register_nav_menu( 'primary', 'Primary Nav Menu'); 
    register_nav_menu( 'secondary', 'Secondary Nav Menu');
    register_nav_menu( 'third', 'Third Nav Menu');
   

}
add_action( 'init', 'alpha_theme_setup');

if (file_exists(get_stylesheet_directory() . '/acf-export/acf-data.php')) {
    include_once(get_stylesheet_directory() . '/acf-export/acf-data.php');
}

if (file_exists(get_stylesheet_directory() . '/acf-export/acf-bussines.php')) {
    include_once(get_stylesheet_directory() . '/acf-export/acf-bussines.php');
}
add_theme_support( 'html5', array('search-form'));
add_theme_support( 'post-thumbnails' );

add_action('init', 'my_remove_editor_from_post_type');

function my_remove_editor_from_post_type() {
remove_post_type_support( 'post', 'editor' );
remove_post_type_support( 'page', 'editor' );
}

add_role(
    'business',
    ( 'Business'  ),
    array(
        'read'  => true,
        'delete_posts'  => true,
        'delete_published_posts' => true,
        'edit_posts'   => true,
        'publish_posts' => true,
        'upload_files'  => true,
        'edit_pages'  => true,
        'edit_published_pages'  =>  true,
        'publish_pages'  => true,
        'delete_publishedpages' => false,
        'edit[businesspost]'  =>  true,
        'read[business_post]'  =>  true,


    )
);

add_role(
    'customer',
    ( 'Customer'  ),
    array(
        'read'  => true,
        'delete_posts'  => true,
        'delete_published_posts' => true,
        'edit_posts'   => true,
        'publish_posts' => true,
        'upload_files'  => true,
        'edit_pages'  => true,
        'edit_published_pages'  =>  true,
        'publish_pages'  => true,
        'delete_published_pages' => false, 
    )
);


function register_custom_post_type_services() {
    register_post_type( 'services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Servicess',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'services' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-tools', 
        'supports' => array( 'title', 'thumbnail',),
    ) );
}
add_action( 'init', 'register_custom_post_type_services' );






function post_type() {
    $etiketa = array(
        'name' => 'Businesses',
        'singular_name' => 'Businesses',
        'menu_name' => 'Businesses',
    );

    $args = array(
        'labels' => $etiketa,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields','comments' ),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-store',  
    );

    register_post_type( 'bussines_post', $args );
}
add_action( 'init', 'post_type' );

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');

    $current_page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = array(
        'post_type' => 'bussines_post',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'paged' => $current_page // Add paged parameter to fetch the appropriate page
    );

    $blog_posts = new WP_Query($args);

    ob_start();
    $count = 0; // Initialize count outside the while loop
    if ($blog_posts->have_posts()) {
        while ($blog_posts->have_posts()) {
            $blog_posts->the_post();
            
            // Assuming $featured_image, $title, $oneliner, and $permalink are post-related values
            $featured_image = get_the_post_thumbnail_url();
            $id = $business->ID;
            $title = get_the_title();
            $oneliner = get_field('informata', $id);
            $oneliner = !empty($oneliner) ? $oneliner : 'Default Text'; // Set a default value if the custom field is empty

            $permalink = get_permalink();

            if ($count < 1) { // Check count before displaying the post
                ?>
                <div class="post">
                    <img src="<?php echo $featured_image; ?>" class="toplist_thumbnail">
                    <h1><?= $title; ?></h1>
                    <div class="textare"><?php echo esc_html($oneliner); ?></div>
                    <a href="<?php echo $permalink; ?>" class="permalink-bus">Visit Business</a>
                </div>
                <?php
            }
            $count++; // Increment the count for each post displayed
        }

        wp_reset_postdata();

        // Check if there are more posts on the next page
        $args_next_page = array(
            'post_type' => 'bussines_post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'paged' => $current_page + 1 // Next page number
        );

        $blog_posts_next_page = new WP_Query($args_next_page);

        // If there are no more posts to load, hide the load more button
        if (!$blog_posts_next_page->have_posts()) {
            ?>
            <style type="text/css">
                #load-more-button {
                    display: none;
                }
            </style>
            <?php
        }
    }

    $response = ob_get_clean();
    echo $response;
    wp_die(); // Terminate the AJAX request

    // Ensure that there are no further actions or output after wp_die()
    exit;
}




add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function blog_scripts() {
    // Register the script
    // wp_register_script('custom-script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true);

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    );
    wp_localize_script('customjs', 'blog', $script_data_array);
}
  

add_action( 'wp_enqueue_scripts', 'blog_scripts');

// wp_enqueue_script('custom-script');


?>