
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



<div class="container">
<?php
$post_type_selected = get_sub_field('post_type_select');
$titull = get_sub_field('field_64d258aab7833');
?>
<h2 class="new-custom-title"><?php echo $titull; ?></h2>

<?php if ($post_type_selected === 'pages'): ?>
    <?php $selected_pages = get_sub_field('pages'); ?>
    <?php if (!empty($selected_pages)): ?>
        <div class="new-custom-cards-container">
            <?php foreach ($selected_pages as $page): ?>
                <div class="new-custom-card-page">
                    <div class="new-custom-card-image">
                        <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
                    </div>
                    <h3><?php echo get_the_title($page->ID); ?></h3>
                    <button class="new-custom-btn"><a class="new-custom-link" href="<?php echo get_permalink($page->ID); ?>">View more</a></button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

<?php elseif ($post_type_selected === 'businesses'): ?>
    <?php $selected_businesses = get_sub_field('businesses_test'); ?>
    <?php if (!empty($selected_businesses)): ?>
        <div class="new-custom-cards-container">
            <?php foreach ($selected_businesses as $business): ?>
                <div class="new-custom-card-business">
                    <div class="new-custom-card-image">
                        <?php echo get_the_post_thumbnail($business->ID, 'thumbnail'); ?>
                    </div>
                    <h3><?php echo get_the_title($business->ID); ?></h3>
                    <button class="new-custom-btn"><a class="new-custom-link" href="<?php echo get_permalink($business->ID); ?>">View more</a></button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
<?php elseif ($post_type_selected === 'services'): ?>
    <?php $selected_services = get_sub_field('services'); ?>
    <?php if (!empty($selected_services)): ?>
        <div class="new-custom-cards-container">
            <?php foreach ($selected_services as $service): ?>
                <div class="new-custom-card-service">
                    <div class="new-custom-card-image">
                        <?php echo get_the_post_thumbnail($service->ID, 'thumbnail'); ?>
                    </div>
                    <h3><?php echo get_the_title($service->ID); ?></h3>
                    <button class="new-custom-btn"><a class="new-custom-link" href="<?php echo get_permalink($service->ID); ?>">View more</a></button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

</div>





<script>
        jQuery(document).ready(function () {
            $('.new-custom-cards-container').slick({
               
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button class="slick-prev "></button>',
                nextArrow: '<button class="slick-next "></button>',
                
            });
        });
    </script>


 
