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
        'taxonomies' => array( 'category' ) 
    );

    register_post_type( 'bussines_post', $args );
}
add_action( 'init', 'post_type' );

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


add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');



function load_posts_by_ajax_callback() {
   
 check_ajax_referer('load_more_posts', 'security');

    $current_page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 2;
    $displayed_businesses = $_POST['displayed_businesses'];
    $allowedIds =  $_POST['allowedIds'];
    $allowedIds = explode(",",$allowedIds);
    


    

    
    // print_r($displayed_business_ids);
    $offset = ($current_page <= 3) ? 0 : ($current_page - 3 - 1) * $posts_per_page;
    $offset = max($offset, 0);

    $notin = explode(",", $displayed_businesses);
     
    $exclude_ids = array_diff( $allowedIds, $notin);
    if (empty($allowedIds) || empty($exclude_ids)) {
        // Either or both arrays are empty
        wp_send_json( "No post available.");
    } else if (count(array_intersect($allowedIds, $exclude_ids)) === count($allowedIds)) {
        // All the allowed IDs are also in the exclude IDs, which means no post is available
        wp_send_json( "No post available.");
    }
    $args = array(
        'post_type' => 'bussines_post',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'post__in' => $exclude_ids,
       
    );



    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            
            $query->the_post();
        
            $featured_image = get_the_post_thumbnail_url();
            $id = get_the_ID();
            // if(!in_array($allowedIds,$id)){
            //     continue;
            // }
            $title = get_the_title();
            $oneliner = get_field('informata', $id);
            $permalink = get_permalink();
            ?>
            <div class="post" data-id="<?php echo esc_attr($id); ?>">
                <img src="<?php echo esc_url($featured_image); ?>" class="toplist_thumbnail">
                <h1><?php echo esc_html($title); ?></h1>
                <div class="textare"><?php echo esc_html($oneliner); ?></div>
                <a href="<?php echo esc_url($permalink); ?>" class="permalink-bus">Visit Business</a>
            </div>
            <?php
           
    }
        wp_reset_postdata();
    } else {
        echo 'No more posts to display.';
    }

    wp_die();
    

    

    

}

?>