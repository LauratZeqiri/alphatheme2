<!DOCTYPE html>
<html lang="en" style="margin-top: 0px !important">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a1c656b99c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?> >
<section class="header">
    <div class="container">
        <div class="menu-toggle">
            <button class="menu-button" id="menu-button">&#9776;</button>
        </div>
        <div class="img">
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/foto1.svg'; ?>" class="left">
            </a>
        </div>
        <div class="navmenu">
            <?php      
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'link_before' => '<span class="link-class">',
                'link_after' => '</span>'
            ));
            ?>
        </div>
    </div>
</section>


<script>
document.getElementById("menu-button").addEventListener("click", function() {
    var navmenu = document.querySelector(".navmenu");
    navmenu.classList.toggle("active");
});




</script>



