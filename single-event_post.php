


<?php get_header(); 
?>


<div class="event_profile">
  <?php if(has_post_thumbnail()): ?>
    <div class="foto">
      <?php the_post_thumbnail('event_image'); ?>
    </div>
  <?php endif; ?>
  
<div class="test">
    <div class="event-emri">
      <h2><?php the_field('emri_event'); ?></h2>
    </div>

	<div class="text-event-profile">
  <h3>   <span class="icon-wrapper">
      <i class="fas fa-info-circle"></i>
    </span> Details:</h3>
  <span><?php the_field('event_p'); ?></span>
</div>

  </div>
</div>
</div>

 <?php include (get_template_directory().'/include/module.php'); ?>

 
    
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">





   


<?php get_footer(); ?>

