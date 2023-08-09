<div class="testimonial-section">
    <div class="container">
        <h1 class="h1-testimonials">Testimonials</h1>
        <div class="row">
            <div class="testimonial-wrapper">
                <?php
                if (have_rows('testimonials_items')) :
                    while (have_rows('testimonials_items')) :
                        the_row();
                        $image = get_sub_field('image');
                        $name = get_sub_field('name');
                        $title = get_sub_field('title');
                        $comment = get_sub_field('comment');
                ?>
                        <div class="testimonial">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <?php if (!empty($image)) : ?>
                                        <img src="<?php echo $image; ?>" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <div class="user-content">
                                    <h4 class="mb-0"><?php echo $name; ?></h4>
                                    <p><?php echo $comment; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
      