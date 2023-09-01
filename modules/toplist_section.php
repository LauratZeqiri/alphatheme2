<div class="toplist-section">
<div class="container">
    <h1 class="toplist-section">TOPLIST</h1>
    <div class="blog-posts">
    <?php if (get_row_layout() === 'toplist_section') {
        $businesses = get_sub_field('toplist_items');
        $count = 0;
        $business_ids = array();
        foreach ($businesses as $business) {
            $business_ids[] = $business->ID;
        }
        
        $business_ids_str = implode(',', $business_ids);

        foreach ($businesses as $business) {
            $count++;
            $title = $business->post_title;
            $id = $business->ID;
            $oneliner = get_field('informata', $id);
            $featured_image = get_the_post_thumbnail_url($id);
            $permalink = get_permalink($id);

            if($count < 4) {
        ?>
            <div class="post" data-id= "<?php echo $id; ?>">
            <img src="<?php echo $featured_image; ?>" class="toplist_thumbnail">
                <h1><?= $title; ?></h1>
                <div class="textare"> <?php echo implode(' ', array_slice(explode(' ', $oneliner), 0, 30)) . '...'; ?></div>
              
                <a href="<?php echo $permalink; ?>" class="permalink-bus">Visit Business</a>
            </div>
        <?php }}} ?>
        <input type="hidden" name="business_ids" id="business_ids" value="<?php echo esc_attr($business_ids_str); ?>">
    </div>
    <div class="load-more">
        <div class="loadmore">Load More</div>
    </div>
</div>
            </div>