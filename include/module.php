<?php
    $modules = get_field('modules_list');

    if( have_rows('modules_list') ):
        while ( have_rows('modules_list') ) : the_row();
            include (get_template_directory().'/modules/'.get_row_layout().'.php');
        endwhile;
    endif;
?>