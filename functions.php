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
    );

    register_post_type( 'bussines_post', $args );
}
add_action( 'init', 'post_type' );

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');

    $args = array(
        'post_type' => 'bussines_post',
        'post_status' => 'publish'
    );

    $blog_posts = new WP_Query($args);
    ob_start();
    // var_dump($blog_posts);die;
    if ($blog_posts->have_posts()) :
        while ($blog_posts->have_posts()) :
            $blog_posts->the_post();
            // var_dump($blog_posts);die;
            ?>
            <div class="post">
                <?php $imag = get_field('imag'); ?>
                <?php if ($imag) : ?>
                    <img src="<?php echo esc_url($imag['url']); ?>" alt="<?php echo esc_attr($imag['alt']); ?>" class="imag">
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>

                <?php $biznesi_text = get_field('informata'); ?>
                <?php if ($biznesi_text) : ?>
                    <div class="textare"><?php echo esc_html($biznesi_text); ?></div>
                <?php endif; ?>
                
                <?php $biznesi_permalink = get_permalink(); ?>
                <a href="<?php echo esc_url($biznesi_permalink); ?>" class="permalink-bus">Visit Business</a>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;

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


// Enqueued script with localized data.
?>