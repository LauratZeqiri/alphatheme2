


<?php

if (get_row_layout() === 'cta_section') {
    $relation_items = get_sub_field('cta_items');
    $text_items = get_sub_field('oneliner_text');
  
if ($relation_items) {
    foreach ($relation_items as $relation_item) {
        $biznesi_title = $relation_item->post_title;
        $biznesi_id = $relation_item->ID;
        $biznesi_images = get_field('foto', $biznesi_id);
        $biznesi_permalink = get_permalink($biznesi_id);


    
            $biznesi_image = get_the_post_thumbnail($biznesi_id, 'thumbnail');
        
    }
}
}
?>
<div class="relationship-section">
<div class="container">
    <div class="relationship-items">
        <div class="relationship-info">
        <!-- <div class="relationship-img"> -->
<?php echo $biznesi_image;?>
<!-- </div> -->
<h4><?php echo $biznesi_title; ?></h4>
</div>
<div class="relation-par">
<p class="relationship-paragraf"><?php echo $text_items; ?></p>
</div>
<button class="relationship-btn"><a href="<?php echo $biznesi_permalink; ?>" class="relation-href">Visit Business</a></button>
</div>
</div>
</div>
 