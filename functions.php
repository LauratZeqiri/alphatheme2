<?php 

function alpha_script() {
    wp_enqueue_style( 'customestyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/index.js', array(), '1.0.0', true );

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

add_theme_support( 'post-thumbnails' );

add_action('init', 'my_remove_editor_from_post_type');

function my_remove_editor_from_post_type() {
remove_post_type_support( 'post', 'editor' );
remove_post_type_support( 'page', 'editor' );
}









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

function enqueue_custom_scripts() {

}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

?>