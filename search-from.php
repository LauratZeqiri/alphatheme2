
<?php 
/*
* Template Name: Search
*/

?>
<?php get_header(); ?>

<div class="container">

  <div class="search2">
  <form id="search-form" method="post">
    <input type="text" id="search-input" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>
<div class="search-results"></div>
  </div>
</div>
<?php get_footer(); ?>