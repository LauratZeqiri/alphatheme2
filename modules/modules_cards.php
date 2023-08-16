
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<div class="container">
    <?php
    $post_type_selected = get_sub_field('post_type_select');
    $titull = get_sub_field('field_64d258aab7833');
    ?>
    <h2 class="title-cards"><?php echo $titull; ?></h2>

  



    <?php if ($post_type_selected === 'pages'): ?>
        <?php $selected_pages = get_sub_field('pages'); ?>
        <?php if (!empty($selected_pages)): ?>
            <div class="modules-cards-container slider">
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
            <div class="modules-cards-container slider">
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
    <?php elseif ($post_type_selected === 'services'): ?>
        <?php $selected_services = get_sub_field('services'); ?>
        <?php if (!empty($selected_services)): ?>
            <div class="modules-cards-container slider">
                <?php foreach ($selected_services as $service): ?>
                    <div class="card_services">
                        <div class="modules-card-image">
                            <?php echo get_the_post_thumbnail($service->ID, 'thumbnail'); ?>
                        </div>
                        <h3><?php echo get_the_title($service->ID); ?></h3>
                        <button class="btn-button"><a href="<?php echo get_permalink($service->ID); ?>">View Service</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
</div>




<script>
        jQuery(document).ready(function ($) {
            $('.modules-cards-container.slider').slick({
               
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button class="slick-prev "></button>',
                nextArrow: '<button class="slick-next "></button>',
                
            });
        });
    </script>