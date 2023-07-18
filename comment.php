<ol class="comment-list">
    <?php
    $comments_args = array(
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 74,
    );
    wp_list_comments( $comments_args );
    ?>
</ol>

<?php
function custom_post_type_init() {
    $args = array(
        'public'   => true,
        'supports' => array( 'title', 'editor', 'comments' ),
       
    );
    register_post_type( 'custom_post_type', $args );
}
add_action( 'init', 'custom_post_type_init' ); ?>


