<?php

ob_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/dbcon.php';
    if (isset($_SESSION['auth'])) {
        redirect('index.php','message_error','You Already Logged In');
    }else{

?>

<section class="form section-padding flex-center flex-col" id="contact-us">
    <h2 class="c-main mb-20 txt-c">Sign in</h2>
    <div class="container flex-center flex-col">
        <form class="sign-in-up gap-20 bg-grey p-20 rad-10" action="functions/authcode.php" method="post">
            <input class="w-full mb-20 p-10 block" type="email" name="email" placeholder="Your Email" required>
            <div class="relative mb-20">
                <input class="w-full p-10 block" type="password" name="password" placeholder="Your Password" required>
                <i class="eye far fa-eye absolute bg-grey flex-center"></i>
            </div>
            
            <input class="bg-main c-white w-full p-10 bold" type="submit" name="signin_btn" value="Login">
        </form>
        <h4 class="c-gold p-10">New To Lefty Mummy? <a class="c-main" href="signup.php">Sign Up!</a></h4>
    </div>
</section>
<?php
    }
?>

<?php include 'includes/footer.php' ?>