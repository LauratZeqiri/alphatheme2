<?php
if (have_rows('profile_items')) :
?>

<div class="profile-bussines">
    <div class="container">
        <div class="test">
            <div class="items-wrapper">
                <?php while (have_rows('profile_items')) : the_row();
                    $emri = get_sub_field('emri');
                    $informata = get_sub_field('informata');
                    $reviews = get_sub_field('reviews');
                
                    $stars = '';
                    if ($reviews) {
                        for ($i = 0; $i < $reviews; $i++) {
                            $stars .= '<i class="fas fa-star star"></i>'; 
                        }
                    }
                ?>
                <div class="item">
                    <h2><?php echo $emri; ?></h2>
                    <h5><?php echo $informata; ?></h5>
                    <p><?php echo $stars; ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php
endif;


