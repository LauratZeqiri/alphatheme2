<section>
    <div class="container">
        <h1 class="section__title">Businesses Cards Module</h1>
        <div class="bussiness__list">
            <?php
            if (get_row_layout() === 'business_cards') {
                $relation_items = get_sub_field('cards_relationship');
                if ($relation_items) {
                    foreach ($relation_items as $relation_item) {
                        $biznesi_title = $relation_item->post_title;
                        $biznesi_id = $relation_item->ID;
                        $biznesi_permalink = get_permalink($biznesi_id);
                        $biznesi_text = get_field('informata', $biznesi_id);
                        $biznesi_reviews = get_field('reviews', $biznesi_id);
                        $biznesi_featured_image = get_the_post_thumbnail_url($biznesi_id, 'thumbnail');
                        ?>
                        <div class="bussiness__card">
                            <div class="bussines__card--image">
                                <?php if ($biznesi_featured_image) { ?>
                                    <img src="<?php echo esc_url($biznesi_featured_image); ?>" alt="<?php echo esc_attr($biznesi_title); ?>" />
                            </div>
                            <div class="bussiness__card--headlines">
                                <h3 class="bussiness__card--title"><?php echo $biznesi_title; ?></h3>
                                <div class="bussiness__card--stars">
                                    <i class="fa-solid fa-star bussines-font"></i>
                                    <?php echo $biznesi_reviews; ?>/5
                                </div>
                            </div>
                            <p class="bussiness__card--description">
                                <?php echo implode(' ', array_slice(explode(' ', $biznesi_text), 0, 10)) . '...'; ?>
                            </p>
                            <button class="button-btn"><a href="<?php echo $biznesi_permalink; ?>">View Business</a></button>
                        </div>
                        <?php
                    }
                }
            }
            }
            ?>
        </div>
    </div>
</section>
