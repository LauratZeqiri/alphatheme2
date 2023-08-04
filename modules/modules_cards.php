


<div class="container">
    <?php
    $post_type_selected = get_sub_field('post_type_select');
    ?>
    <h2>Selected Post Type: <?php echo $post_type_selected; ?></h2>

    <?php if ($post_type_selected === 'pages'): ?>
        <?php $selected_pages = get_sub_field('pages'); ?>
        <?php if (!empty($selected_pages)): ?>
            <div class="cards-container">
                <?php foreach ($selected_pages as $page): ?>
                    <div class="card_page">
                        <div class="card-image">
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
            <div class="cards-container">
                <?php foreach ($selected_businesses as $business): ?>
                    <div class="card_businesses">
                        <div class="card-image">
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




.cards-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  
}


.card_page, .card_businesses {
    flex: 1 0 220px; 
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    transition: box-shadow 0.3s ease-in-out;
}

.card_page:hover, .card_businesses:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


.card-image img {
    width: 100%;
    height: 265px;
    object-fit: cover;
    border-radius: 8px;
  
}

.cards-container h3 {
    font-size: 20px;
    margin-top: 120px;

}


.btn-button {
  width: 100%;
  padding: 10px 16px;
  border-radius: 16px;
  background: #54d577;
  border: none;
  color: #0f172a;
  font-size: 14px;
  font-style: normal;
  font-weight: 700;
  line-height: 21px;
}



</style>







