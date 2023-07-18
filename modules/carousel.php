
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php
$images = array();
if (have_rows('image_gallery')):
    while (have_rows('image_gallery')) : the_row();
        $image = get_sub_field('gallerycarousel');
        $images[] = $image;
    endwhile;
endif;
?>
<div class="gallery">
    <div class="container">
        <h1>Gallery Carousel</h1>
        <div class="gallerycarousel">
            <?php foreach ($image as $image_item) : ?>
                <div class="gallerycarousel1">
                <a href="<?php echo $image_item; ?>" target="_blank">
                     <img src="<?php echo $image_item; ?>" alt="Image Gallery">
                </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
$(document).ready(function(){
  $('.gallerycarousel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
   
  });
});
</script>


