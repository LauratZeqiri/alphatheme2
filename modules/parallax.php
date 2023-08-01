
<?php

if (have_rows('parallax_effect')) {
  while (have_rows('parallax_effect')) {
    the_row();
    $parallax_image = get_sub_field('parallax_image_effects');
    ?>

    <section class="parallax-section" style="background-image: url(<?php echo $parallax_image; ?>);     background-repeat: no-repeat;
    background-size: 100% 100%;
    height: 605px;">
      <div class="parallax-content">
        <h2>Local Businesses</h2>
        <p>Explore businesses in your area</p>
      </div>
    </section>

    <?php
  }
}
?>


