<?php
/*
Template Name: contact
*/
//     include (get_template_directory().'/vendor/autoload.php'); 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        // the_content();
    }
}
?>

<style>
    .contact-h2{
        margin-top:30px;
        margin-left: 570px;
    }
</style>


<?php
   include (get_template_directory().'/vendor/autoload.php'); 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
   
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "a.agushi23@gmail.com";
    $mail->Password = "Almedin123!";
    $mail->setFrom($email, $name); 

    $mail->addAddress("a.agushi23@gmail.com", "Alpha");
    $mail->addReplyTo($email, $name);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        echo "<script>var successMessage = 'Emaili u dërgua me sukses!';</script>";
    }
};
?>

<div class="contact-section">
<div class="container">
    <form method="post">
<div class="contact-items">
    <div class="contact-input">
        <div class="contact-formgrup">
            <h3 class="contact-h3"> Get in touch </h3>
            <div class="name-input">
            <input type="text" name="fullname" placeholder="Name" required >
            <input type="email" name="email"  placeholder="Email" required>
</div>
<div class="input-subject">
<input type="text" name="subject" placeholder="Subject" required>
<textarea name="message" placeholder="Message"  rows="6" cols="30" required></textarea>

</div>
<input type="submit"  name="submit" value="Send Message">
</div>
</div>
<div class="contact-info">
    <div class="contact-content">
        <h3 class="contact-h3">Contact us </h3>
        <div class="adres">
            <div class="addres-font">
            <i class="fa-solid fa-location-dot addres-fo"></i>
</div>
<div class="addres-text">
<p>Address: 198 West 21th Street, Suite 721 New York NY 10016 </p>
</div>
</div>
<div class="adres">
            <div class="addres-font">
            <i class="fa-solid fa-phone"></i>
</div>
<div class="addres-text">
<p>Phone: +38345111222</p>
</div>
</div>
<div class="adres">
            <div class="addres-font">
            <i class="fa-solid fa-envelope"></i>
</div>
<div class="addres-text">
<p>Email: lauratzeqiri@hotmail.com </p>
</div>
</div>
<div class="adres">
            <div class="addres-font">
            <i class="fa-solid fa-earth-americas"></i>
</div>
<div class="addres-text">
<p>Website alphasite.com</p>
</div>
</div>
</div>
</form>
</div>
<div class="popup" id="successPopup">
    <div class="popup-content">
        <span class="popup-message" id="successMessage"></span>
    </div>
</div>
</div>
</div>
</div>



<?php include (get_template_directory().'/include/module.php'); ?>
<?php get_footer();?>


<script>
    <?php if (isset($_POST['submit']) && !empty($_POST['submit'])) { ?>
        showSuccessPopup("Emaili u dërgua me sukses!", 5); 
    <?php } ?>
</script>



