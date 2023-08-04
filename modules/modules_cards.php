<h1>Test </h1>

<div class="cards-container">
  <?php
  $selected_businesses = get_field('businesses');
  $selected_pages = get_field('pages');
  $selected_services = get_field('related_services');
  if (get_row_layout() === 'modules_cards') {
    $relation_items = get_sub_field('post_type_select');

    var_dump($relation_items);
  }


  if ($selected_businesses) {
    foreach ($selected_businesses as $business_id) {

      $business = get_post($business_id); ?>
      <div class="card business-card">
        <?php echo $business->post_title; ?>
      </div>
    <?php }
  }



 
  if ($selected_pages) {
    foreach ($selected_pages as $page_id) {
      $page = get_post($page_id); ?>
      <div class="card page-card">
        <?php echo $page->post_title; ?>
      </div>
    <?php }
  }


  if ($selected_services) {
    foreach ($selected_services as $service_id) {
      $service = get_post($service_id); ?>
      <div class="card service-card">
        <?php echo $service->post_title; ?>
      </div>
    <?php }
  }
  ?>
</div>







