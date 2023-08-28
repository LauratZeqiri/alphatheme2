<?php
$image = null; 
$title = null; 

if (get_row_layout() === 'homepage_header') {

        $image = get_sub_field('image');
        $title = get_sub_field('title');
    }

?>

<div class="container-image" style="background-image: url('<?php echo $image['url']; ?>'); ">


    <div class="overlay"></div>
    <div class="container">
    <div class="all">

    <div class="title">
        <?php echo $title; ?>
        <div class="p">
        <p style="color:white;">Search, Discover, and Review Range of Local Businesses and Services. Start now!</p>
</div>
    </div>



    <div class="div">
     <div class="input-container">
            <form role="search" class="form-control" method="get" action="<?php echo home_url( '/' ); ?>">
                <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />
                <?php
                    wp_dropdown_categories( array(
                    'show_option_all' => 'All Businesses',
                    'orderby' => 'name',
                    'echo' => 3,
                    'selected' => $cat,
                    'hierarchial' => true,
                    'class' => 'location-dropdown',
                    'id' => 'custom_loc_drop',
                    'value_field' => 'term_id'
                    ) );
                ?>
                <button type="submit" class="icon-search"><i class="fa fa-search"></i></button>
            </form>
    </div>
    </div>

</div>
</div>
</div>