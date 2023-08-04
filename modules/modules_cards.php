


<div class="container">
    <?php
    $post_type_selected = get_sub_field('post_type_select');
    ?>
    <h2>Cards Module</h2>

    <?php if ($post_type_selected === 'pages'): ?>
        <?php $selected_pages = get_sub_field('pages'); ?>
        <?php if (!empty($selected_pages)): ?>
            <div class="modules-cards-container">
                <?php foreach ($selected_pages as $page): ?>
                    <div class="card_page">
                        <div class="modules-card-image">
                            <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
                        </div>
                        <h3><?php echo get_the_title($page->ID); ?></h3>
                       
                        <button class="btn-button"><a href="<?php echo get_permalink($page->ID); ?>">View Page</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php elseif ($post_type_selected === 'businesses'): ?>
        <?php $selected_businesses = get_sub_field('businesses_test'); ?>
        <?php if (!empty($selected_businesses)): ?>
            <div class="modules-cards-container">
                <?php foreach ($selected_businesses as $business): ?>
                    <div class="card_businesses">
                        <div class="modules-card-image">
                            <?php echo get_the_post_thumbnail($business->ID, 'thumbnail'); ?>
                        </div>
                        <h3><?php echo get_the_title($business->ID); ?></h3>
                        <button class="btn-button"><a href="<?php echo get_permalink($business->ID); ?>">View Business</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>



<style>








</style>







