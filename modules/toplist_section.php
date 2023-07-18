<h1 class="toplist-section">TOPLIST</h1>
<div class="entry-content">
<?php
if (get_row_layout() === 'toplist_section') {
    $posts = get_sub_field('toplist_items');

    if ($posts) {
        foreach ($posts as $relation_item) {
            $biznesi_title = $relation_item->post_title;
            $biznesi_id = $relation_item->ID;
            $biznesi_text = get_field('informata', $biznesi_id);
            $biznesi_reviews = get_field('reviews', $biznesi_id);
            $imag = get_field('imag', $biznesi_id);
            $biznesi_permalink = get_permalink($biznesi_id);
            ?>
            <?php
        }
    }
}

$args = array(
    'post_type' => 'bussines_post',
    'post_status' => 'publish',
    'orderby' => 'ID', // Order posts based on the order of selected post IDs
    'posts_per_page' => 1,

);

$blog_posts = new WP_Query($args);

if ($blog_posts->have_posts()) :
    ?>
    <div class="blog-posts">
        <?php
        while ($blog_posts->have_posts()) :
            $blog_posts->the_post();
            ?>
               <div class="post">
            <?php $imag = get_field('imag'); ?>
                <?php if ($imag) : ?>
                    <img src="<?php echo $imag['url']; ?>" alt="<?php echo $imag['alt']; ?>" class="imag">
                <?php endif; ?>
                <h1><?php the_title(); ?></h1>

<?php $biznesi_text = get_field('informata'); ?>
<?php if ($biznesi_text) : ?>
    <div class="textare"><?php echo esc_html($biznesi_text); ?></div>
<?php endif; ?>
               <a href="<?php echo $biznesi_permalink; ?>" class="permalink-bus">Visit Business</a>
            </div>
            <?php
        endwhile;
        ?>
    </div>
    <?php
endif;
?>
</div>
<div class="load-more">
    <div class="loadmore">Load More</div>
</div>



<script>

var page = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function(response) {
            if ($.trim(response) != '') {
                $('.blog-posts').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });
});

</script>