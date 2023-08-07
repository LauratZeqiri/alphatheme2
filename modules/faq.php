

<?php


?>
<div class="test">
<?php 
if (have_rows('faq_items')) :
?>

<div class="faq">
<div class="container">
<div class="faq_section">
<h1>Frequently Asked Questions</h1>
<div class="faq__questions">
<div class="faq__questions__items">
      <?php while (have_rows('faq_items')) : the_row();
              $questions = get_sub_field('faq_question');
              $answers = get_sub_field('faq_answer');
      ?>
      <div class="faq__questions__items__item">
  <img class="chevron" src="<?php echo get_stylesheet_directory_uri() . '/img/foto2.svg'; ?>"  class="left">
    <div class="question" onclick="pyetja(this)">
      <?php echo $questions; ?>
    </div>
    <div class="answer">
      <?php echo $answers; ?>
    </div>
  </div>
      <?php endwhile; ?>
  </div>
</div>
<!-- </div>
</div> -->

</div>
</div>
<?php
endif;
?>
</div>

<script>
  function pyetja(question) {
    var answer = question.nextElementSibling;

    if (answer.style.display === 'none') {
      answer.style.display = 'block';
    } else {
      answer.style.display = 'none';
    }
}

  </script>








