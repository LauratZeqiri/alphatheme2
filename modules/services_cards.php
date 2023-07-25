<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section class="services">
  <div class="swiper mySwiper container">
    <h1 class="section__title">Services cards</h1>
    <div class="swiper-wrapper services__listt">
      <?php
      if (have_rows('cards')):
        $cardIndex = 0; 
        while (have_rows('cards')): the_row();
          $ctitle = get_sub_field('title');
          $cdescription = get_sub_field('description');
          $cimage = get_sub_field('image');
      ?>
          <div class="swiper-slide services__card" data-card-index="<?php echo $cardIndex; ?>">
            <div class="services__card--image">
              <img src="<?php echo $cimage; ?>" />
            </div>
            <h3 class="services__card--title"><?php echo $ctitle; ?></h3>
          </div>
      <?php
          $cardIndex++; 
        endwhile;
      endif;
      ?>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 30,
    speed: 0, // Set the speed to 0 for instant transition
    loop: true, // Enable loop if needed
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      init: function () {
        // Set the initial slide based on the data-card-index attribute
        var activeSlide = document.querySelector('.swiper-slide[data-card-index="0"]');
        if (activeSlide) {
          this.slideTo(activeSlide, 0);
        }
      },
    },
  });

  var appendNumber = 4;
  var prependNumber = 1;
  document.querySelector(".prepend-2-slides").addEventListener("click", function (e) {
    e.preventDefault();
    swiper.prependSlide([
      '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
      '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
    ]);
  });
  document.querySelector(".prepend-slide").addEventListener("click", function (e) {
    e.preventDefault();
    swiper.prependSlide('<div class="swiper-slide">Slide ' + --prependNumber + "</div>");
  });
  document.querySelector(".append-slide").addEventListener("click", function (e) {
    e.preventDefault();
    swiper.appendSlide('<div class="swiper-slide">Slide ' + ++appendNumber + "</div>");
  });
  document.querySelector(".append-2-slides").addEventListener("click", function (e) {
    e.preventDefault();
    swiper.appendSlide([
      '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
      '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
    ]);
  });
</script>