<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />

<section class="services">
<div class="swiper mySwiper container-services">
<h1 class="section__title">Services cards</h1>
        <div class="swiper-wrapper services__listt" style=" transition-duration: 0ms; 
   transform:none; ">
<?php if (have_rows('cards')): ?>
 
     <?php     while (have_rows('cards')): the_row();
        $ctitle = get_sub_field('title');
        $cdescription = get_sub_field('description');
        $cimage = get_sub_field('image');
      ?>
   
          <div class="swiper-slide services__card">
            <div class="services__card--image">
              <img src="<?php echo $cimage; ?>" />
            </div>
            <h3 class="services__card--title"><?php echo $ctitle; ?></h3>
          </div>
        
        

         
      <?php endwhile;?>
      
    
      <?php endif; ?>
  
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        centeredSlides: true,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      var appendNumber = 4;
      var prependNumber = 1;
      document
        .querySelector(".prepend-2-slides")
        .addEventListener("click", function (e) {
          e.preventDefault();
          swiper.prependSlide([
            '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
            '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
          ]);
        });
      document
        .querySelector(".prepend-slide")
        .addEventListener("click", function (e) {
          e.preventDefault();
          swiper.prependSlide(
            '<div class="swiper-slide">Slide ' + --prependNumber + "</div>"
          );
        });
      document
        .querySelector(".append-slide")
        .addEventListener("click", function (e) {
          e.preventDefault();
          swiper.appendSlide(
            '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>"
          );
        });
      document
        .querySelector(".append-2-slides")
        .addEventListener("click", function (e) {
          e.preventDefault();
          swiper.appendSlide([
            '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
            '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
          ]);
        });
</script>
