<div class="toplist_module container">
    <h1 class="toplist-section">TOPLIST</h1>
    <div class="blog-posts">
    <?php if (get_row_layout() === 'toplist_section') {
        $businesses = get_sub_field('toplist_items');
        $count = 0;

        foreach ($businesses as $business) {
            $count++;
            $title = $business->post_title;
            $id = $business->ID;
            $oneliner = get_field('informata', $id);
            $featured_image = get_the_post_thumbnail_url($id);
            $permalink = get_permalink($id);

            if($count < 4) {
        ?>
            <div class="post">
                <img src="<?php echo $featured_image; ?>" class="toplist_thumbnail">
                <h1><?= $title; ?></h1>
                <div class="textare"><?php echo esc_html($oneliner); ?></div>
                <a href="<?php echo $permalink; ?>" class="permalink-bus">Visit Business</a>
            </div>
        <?php }}} ?>
    </div>
    <div class="load-more">
        <div class="loadmore">Load More</div>
    </div>
</div>