
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
            <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
                <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" />
            </form>
                
    </div>
</div>

</div>
</div>
</div>


