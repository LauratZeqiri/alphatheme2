<?php 
$title = "";
$description = "";
$image = "";

if (get_row_layout() === 'banner_section') {
$title = get_sub_field('title');
$description = get_sub_field('description');
$image = get_sub_field('photo');
}
?>
<div class="banner-section">
<div class="container">
   <div class="banner-items">
   <div class="banner-content">
    <div class="title-banner">
   <h1><?php echo $title;?> </h1>
 </div>
    <div class="description-banner">
 <?php echo $description;
 ?>
 </div>
</div>

 <div class="banner-foto">
 <img src=" <?php echo $image; ?>" />  
</div>
<?php $id=get_post_field( 'post_author' )?>
    
    <h3 class="banner-writen">Written by: <?php echo get_the_author_meta('nickname',$id)?> </h3>

</div>
</div>
</div>


