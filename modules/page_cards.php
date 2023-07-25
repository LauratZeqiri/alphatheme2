<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>


<?php if(get_row_layout() == 'page_cards'): 

$pages = get_sub_field('get_page'); 
?>
<div class="container">
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>

            <h1 class="module-title"> Page Cards Module</h1>
            <div class="row-cards">
            <!-- <div class="grid-container"> -->
                    <div class="swiper card-swiper">                            

                        <div class="swiper-wrapper">

                            <?php foreach($pages as $page): ?>  
                                
                                <div class="swiper-slide">
                                    <div class="card"> 
                                        <div class="card-body">

                                            <img class="card-image" src="<?php echo get_the_post_thumbnail_url($page->ID, 'medium'); ?>" alt="">
                                            
                                            <h1 class="card-title"><?php echo $page->post_title; ?></h1>

                                            <?php if(!$page->post_content):?>
                                                <h4>&nbsp; </h4>

                                                <?php else: ?>

                                                <?php
                                                $content = $page->post_content;
                                                $short_content = wp_trim_words( $content, 6, ' ...' );
                                                echo '<h4>'. $short_content .'</h4>';
                                                ?>  

                                            <?php endif; ?>
                                            
                                            <div class="row justify-center">
                                            <a href="<?php echo get_page_link($page->ID) ?>"><button class="btn-lime">Read More</button></a>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                <!-- </div> -->
            </div>
        <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
const swiper = new Swiper('.card-swiper', {
  // Optional parameters
    observer: true,
    observeParents: true,
    parallax:true,
    slidesPerColumn: 1,
    slidesPerGroup: 1,

    loop:false,
    slidesPerView: 3,
    navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
          },
});
</script>