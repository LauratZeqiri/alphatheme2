
<?php get_header(); ?>

<div class="container">
  <div class="search2">
    <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
      <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />

      <?php
        wp_dropdown_categories( array(
          'show_option_all' => 'All Businesses',
          'orderby' => 'name',
          'echo' => 3,
          'selected' => $cat,
          'hierarchial' => true,
          'class' => 'location-dropdown',
          'id' => 'custom_loc_drop',
          'value_field' => 'term_id'
          ) );
      ?>
      <button type="submit" class="icon-search"><i class="fa fa-search"></i></button>
    </form>
  </div>
  <div class="search">
    <div class="form-search">
      <?php 
      if( have_posts() ):
        while( have_posts() ): the_post();
          get_template_part('content', 'search');
        endwhile;
      else:
      ?>
      <p>No results found!</p>
      <?php endif; ?>
    </div>
  </div>
</div>



<?php get_footer(); ?>