<?php if ( !(is_front_page())) { ?>
  <div class="author">
    <div class="about-author">
      <div class="about-author-avatar">
          <?php echo get_avatar( get_the_author_meta('ID'), 100,)?>
          <?php $id=get_post_field( 'post_author' )?>
      </div>
      <div class="about-author-info">
        <h2 class="nickname"><?php echo get_the_author_meta('nickname',$id)?></h2>
          <div class="icons">
          <?php
          
            $facebook_url = get_the_author_meta('facebook', $id);
            $anchor_html = sprintf(
            '<a href="%s" target="_blank"><i class="fab fa-facebook"></i></a>', 
              esc_url($facebook_url)
            );

              echo $anchor_html;?>
              <?php
              $instagram_url = get_the_author_meta('instagram', $id);
              $anchor_html = sprintf(
              '<a href="%s" target="_blank"><i class="fab fa-instagram"></i></a>', 
              esc_url($instagram_url)
              );

              echo $anchor_html;?>
              <?php
              $pinterest_url = get_the_author_meta('pinterest', $id);
              $anchor_html = sprintf(
              '<a href="%s" target="_blank"><i class="fab fa-pinterest"></i></a>', 
              esc_url($pinterest_url)
              );

              echo $anchor_html;
              


              ?>   
              
          </div>
      </div> 

      <div class="description">
      <p><?php echo get_the_author_meta('user_description',$id) ?></p>
      <a href="", class="more-info">More info on <?php echo get_the_author_meta('nickname',$id)?></a>
      </div>
    </div>  
  </div>
<?php } ?>