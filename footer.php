<?php if (!is_search() && have_posts() && !is_single()) : ?>
    <?php include(__DIR__ . '/sections/author.php'); ?>
<?php endif; ?>

<footer>

<button onclick="topFunction()" id="myBtn" title="Go to top" class="fa fa-angle-up button" style="display: none;"></button>

<script>

  function checkScrollPosition() {
    let mybutton = document.getElementById("myBtn");
    const footer = document.querySelector("footer");
    const footerLine = footer.offsetTop - window.innerHeight;

    if (window.scrollY >= footerLine) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }


  window.addEventListener("scroll", checkScrollPosition);


  function topFunction() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
       </script>

        <div class="container">
                <div class="footer-section">
                        <div class="left-footer">

                                <img src="<?php echo get_stylesheet_directory_uri() . '/img/icon.svg'; ?>" class="left">

                                <div class="text">
                                        <h3>About Alpha Theme </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum tenetur voluptatem, alias animi magni ab, repudiandae,
                                                nihil voluptatibus voluptatum aperiam accusantium. Mollitia ab esse reprehenderit ullam, sunt fugiat odit nostrum? </p>
                                </div>
                                <div class="social">
                                        <span> Follow Us </span>
                                        <div class="logo">
                                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                                <a href="#"> <i class="fa-brands fa-instagram"></i></a>



                                        </div>
                                </div>
                        </div>
                        <div class="right-footer">
                                <div class="menu1">
                                        <h3>Site Links </h3>

                                        <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
                                </div>
                                <div class="menu2">
                                        <h3>Our Sites</h3>
                                        <?php wp_nav_menu(array('theme_location' => 'third')); ?>
                                </div>
                        </div>
                </div>
        </div>
        <p class="footer-paragraf">2023. All rights reserved. </p>
</footer>