


<?php get_header(); 
?>

<div class="profile">
<div class="container">
<div class="bussines_profile">

<?php if( has_post_thumbnail() ): ?>
		<?php endif; ?>
			<div class="foto">
			<?php the_post_thumbnail('thumbnail'); ?></div>

<div class="bussines-content">
    <div class="content-profile">
<div class="emri_reviews">
    <div class="bussines-emri">
<h2> <?php the_field('emri'); ?> </h2>
</div>
<div class="bussines-reviews">
    <p> Reviews: </p>
 

<?php
$reviews = get_field('reviews');
if ($reviews) {
    $max = $reviews;
    $silver = 5 - $max; 
    for ($i = 0; $i < $max; $i++) {
        echo '<i class="fa-solid fa-star" style="color: gold;"></i>';
    }

    for ($i = 0; $i < $silver; $i++) {
        echo '<i class="fa-solid fa-star" style="color: gray;"></i>';
    }
}
?>
</div>
</div>
<?php
$status = 'Closed';

$business_hours = get_field('c_general_business_hours_repeater');

if ($business_hours) {
    date_default_timezone_set('Europe/Berlin');
    $current_day = strtolower(date('l'));

    foreach ($business_hours as $row) {
        $day_of_week = strtolower($row['c_general_business_hours_day_of_the_week']);
        $opening_time = $row['c_general_business_hours_opening_time'];
        $closing_time = $row['c_general_business_hours_closing_time'];

        if ($current_day === $day_of_week) {
            if (!empty($opening_time) && !empty($closing_time)) {
                $current_time = strtotime(date('H:i'));
                $opening_time = strtotime($opening_time);
                $closing_time = strtotime($closing_time);

                if ($closing_time < $opening_time) {
                    if ($current_time >= $opening_time || $current_time < $closing_time) {
                        $status = 'Open Now';
                    }
                } else {
                    if ($current_time >= $opening_time && $current_time < $closing_time) {
                        $status = 'Open Now';
                    }
                }
            } else {
                $status = 'Closed';
            }
            break; 
        }
    }
}
?>

<div class="opening-closing-hours" >
  <i class="fa-solid fa-clock clock-hour" ></i>
  <p id="myBtnn" style="color: <?php echo $status === 'Open Now' ? 'green' : 'red'; ?>;"><?php echo $status; ?></p>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>
    <aside class="opening-times">
      <h3 class="opening-time-h3">Opening Hours</h3>
  
      <hr>
     
      <div class="opening-closing-hours" >
          <i class="fa-regular fa-clock clock-hour"></i>
        <p id="myBtnn" style="color: <?php echo $status === 'Open Now' ? 'green' : 'red'; ?>;"><?php echo $status; ?></p>
      </div>
    
   
      <?php
       $c_general_business_hours_repeater = get_field('c_general_business_hours_repeater', get_the_ID());
       if (!empty($c_general_business_hours_repeater)) {
        foreach ($c_general_business_hours_repeater as $period) {
            echo '<div class="businesses-day--hours">';
          echo '<div> <strong>' . $period['c_general_business_hours_day_of_the_week'] . ' </strong></div>';
          $opening_time = $period['c_general_business_hours_opening_time'];
          $closing_time = $period['c_general_business_hours_closing_time'];

          if (!empty($opening_time) && !empty($closing_time)) {
            $opening_time_utc = strtotime($opening_time);
            $berlin_time = new DateTime("@$opening_time_utc");
            $berlin_time->setTimezone(new DateTimeZone('Europe/Berlin'));
            $formatted_opening_time = $berlin_time->format('g:i a');

            $closing_time_utc = strtotime($closing_time);
            $berlin_closing_time = new DateTime("@$closing_time_utc");
            $berlin_closing_time->setTimezone(new DateTimeZone('Europe/Berlin'));
            $formatted_closing_time = $berlin_closing_time->format('g:i a');

            echo $formatted_opening_time . ' - ' . $formatted_closing_time;
          } else {
            echo 'Closed';
          }
         
          echo '<br />';
          echo '</div>';
         }
        }
       ?>
 
    </aside>
    </p>
  </div>
</div>
<div class="text-bussines-profile">
<h3> About Us </h3>
 <span>  <?php the_field('informata'); ?> </span>
</div>


<div class="contact-bussines">
    <div class="left-info">
      
        <h4>Email : </h4>   <span>   <?php the_field('email'); ?></span>
    </div>
    <div class="right-info">
       
        <h4>Tel:  </h4> <span><?php the_field('telefoni'); ?></span>
    </div>
  
</div>
</div>
</div>
</div>


 <?php include (get_template_directory().'/include/module.php'); ?>
<div id="comments" class="comments-area">
    <?php comment_form(); ?>
    
</div>

<div class="komente">
    <?php
    if (get_comments_number() > 0) {
       
        $comments = get_comments(array(
            'post_id' => get_the_ID(),
            'status' => 'approve', 
            
        ));

        if ($comments) {
            foreach ($comments as $comment) {
                ?>
                <div class="comment-content">
                    <div class="comment-meta">
                        <span class="comment-time"><?php echo get_comment_date('F j, Y', $comment->comment_ID); ?></span>
                    </div>
                    <div class="comment-text">
                       
                        <span class="comment-author"><?php echo $comment->comment_author; ?> :</span>  <?php echo $comment->comment_content; ?>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
</div>

</div>
<?php
include 'comment.php'; ?>



   


<?php get_footer(); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

var modal = document.getElementById("myModal");


var btn = document.getElementById("myBtnn");

var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>