

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
    <p>Average Rating:  </p>
 <?php

if (isset($_POST['submit_feedback'])) {
 
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $user_info = get_userdata($user_id);
        $name_user = $user_info->display_name;
    }
    
    $rating = intval($_POST['user_rating']);
    $comment = sanitize_textarea_field($_POST['comment']);

    $current_time = current_time('mysql'); 

    $post_id = get_the_ID(); 

    $feedback_data = array(
        'name' => $name_user,
        'rating' => $rating,
        'comment' => $comment,
        'date' => $current_time,
    );

    add_post_meta($post_id, 'feedback', $feedback_data);
}
$post_id = get_the_ID();

$average_rating = mesatarja_rating($post_id);


?>
<?php

    $max = $average_rating;
    $silver = 5 - $max; 
    for ($i = 0; $i < $max; $i++) {
        echo '<i class="fa-solid fa-star" style="color: gold;"></i>';
    }

    for ($i = 0; $i < $silver; $i++) {
        echo '<i class="fa-solid fa-star" style="color: gray;"></i>';
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
 <span class="aboutus">  <?php the_field('informata'); ?> </span>
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
<div class="right-info">
    <?php  $location_link = get_field("location_link");
    if ($location_link) : ?>
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe 
                width="100%" 
                height="300" 
                id="gmap_canvas" 
                src="<?php echo $location_link['url']; ?>"
                frameborder="0" 
                scrolling="no" 
                marginheight="0" 
                marginwidth="0">
                </iframe>
                <br>
            </div>
        </div>
        <?php else : ?>
        <span class="location-unknow">Location Unknown</span>
    <?php endif;   ?>
</div>

   
<?php include (get_template_directory().'/include/module.php'); ?>

 <div class="rating-forma">
    <form method="post" class="feedback-form" id="rating-form">
        <div class="star-rating">
            <div class="star-rate">
                <span class="star" data-rating="1">☆</span>
                <span class="star" data-rating="2">☆</span>
                <span class="star" data-rating="3">☆</span>
                <span class="star" data-rating="4">☆</span>
                <span class="star" data-rating="5">☆</span>
            </div>
        </div>
        <input type="hidden" id="user_rating_input" name="user_rating" value="0">
        <label for="comment" id="komenti-id">Komenti:</label>
        <textarea name="comment" id="comment" rows="4" disabled></textarea>
        <input type="submit" name="submit_feedback" class="button-bussinesprofile"  id="submit" value="Vlerëso">
    </form>
</div>


<?php


$feedbacks = get_post_meta(get_the_ID(), 'feedback', false);

if (!empty($feedbacks)) :
    $totalFeedbacks = count($feedbacks);
    $showFeedbacks = 3; 
    $remainingFeedbacks = $totalFeedbacks - $showFeedbacks;
    
    $feedbacks = array_reverse($feedbacks);
    ?>

  <div class="feedback-section">
        <?php  foreach ($feedbacks as $index => $feedback) :
            $hiddenClass = $index < $showFeedbacks ? '' : 'hidden';
            ?> 
            <div class="feedback <?php echo $hiddenClass; ?>">
                <div class="name-rating">
                    <div class="feed-name">
                        <p class="feedback-name"><?php echo esc_html($feedback['name']); ?></p>
                        <p class="feedback-date"><?php echo date('F j, Y', strtotime($feedback['date'])); ?></p>
                    </div>
                    <div class="rating-value" data-rating="<?php echo intval($feedback['rating']); ?>">
                        <?php
                        $ratingValue = intval($feedback['rating']);
                        $max = $ratingValue;
                        $silver = 5 - $max;
                        for ($i = 0; $i < $max; $i++) {
                            echo '<i class="fa-solid fa-star" style="color: gold;"></i>';
                        }
                        for ($i = 0; $i < $silver; $i++) {
                            echo '<i class="fa-solid fa-star" style="color: gray;"></i>';
                        }
                        ?>
                    </div>
                </div>
                <p class="feedback-comment"><?php echo  esc_html($feedback['comment']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    if ($remainingFeedbacks > 0) {
        echo '<button class="button-bussinesprofile" id="load-more-comments">All comments</button>';
    }
     ?>
<?php endif;  ?>

<script>
    const loadMoreButton = document.getElementById('load-more-comments');
    const feedbackContainer = document.querySelector('.feedback-section');

    loadMoreButton.addEventListener('click', function() {
        const hiddenFeedbacks = document.querySelectorAll('.feedback.hidden');

        hiddenFeedbacks.forEach(function(feedback) {
            feedback.classList.remove('hidden');
        });

        loadMoreButton.style.display = 'none';
    });
</script>






    <?php 
function mesatarja_rating($post_id) {
$feedbacks = get_post_meta($post_id, 'feedback', false);

$all_ratings = array();

foreach ($feedbacks as $feedback) {
    if (isset($feedback['rating']) && !empty($feedback['rating'])) {
        $all_ratings[] = intval($feedback['rating']);
    }
}

$total_ratings = count($all_ratings);

if ($total_ratings === 0) {
     return 0; 
} else {
    $sum_ratings = array_sum($all_ratings);
    $average_rating = $sum_ratings / $total_ratings;
    return  round($average_rating);
}
 }

?>


<?php get_footer(); ?>


  </div>
</div>
 


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