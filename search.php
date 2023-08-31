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
  <div class="search_result_page">
    <section class="content-area">
        <?php
      $total = $wp_query->found_posts;
      $maxpage =($total/3)+1;
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        if ( have_posts() ) : ?>
            <header class="results_heading">
                <h6 class="rsults_title"><?php printf( esc_html__( 'Search Results for: %s', 'satsco' ), '<span class="search_query">' . get_search_query() . '</span>' ); ?></h6>
            </header><!-- .page-header -->
            <div id="result_search">
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              //echo $post->ID;
            get_template_part('content', 'search');

            endwhile;?>
            </div>
            <?php
            the_posts_navigation();
        else :
          get_template_part('content', 'search');
        endif; ?>
    </section><!-- #primary -->
  </div>
    
  
</div>
<?php //custom_pagination_links(); ?>
<div class="pagination-slide">
    <nav>
        <ul class="pagination_count">
      
            
        <?php
$big = 999999999; 

$paginate_links = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '/page/%#%', // Use '/page/%#%' for pretty permalinks
    'current' => max(1, $paged),
    'total' => $maxpage,
    'prev_next' => true,
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    'type' => 'list',
));

if (have_posts()) {
    // Display search results or other posts
    while (have_posts()) {
        the_post();
        // Display individual post content
    }

    // Display pagination links if there are multiple pages
    if ($paginate_links) {
        echo $paginate_links;
    }
} else {
    echo 'No posts found!';
}
?>


        </ul>
    </nav>
</div>


<?php get_footer(); ?>




