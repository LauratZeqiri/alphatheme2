<?php
/*
Template Name: contact
*/

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        // the_content();
    }
}
?>

<div class="contact-container">
  <h1>Contact Us</h1>
    <form id="contact-form" method="post" action="">
        <input type="hidden" name="action" value="submit_contact_form">
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" id="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message"  rows="6" cols="30" required></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>
<?php get_footer();?>