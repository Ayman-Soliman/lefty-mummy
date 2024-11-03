<?php

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'config/dbcon.php';
    if (isset($_SESSION['auth'])) {
        header('Location: index.php');
        exit();
    }
?>

<section class=" section-padding flex-center flex-col" id="contact-us">
    <?php
    ?>
    <h2 class="c-main mb-10 txt-c pt-5">Sign Up</h2>
    <div class="container flex-center flex-col">
        <form class="sign-in-up gap-10 bg-grey p-10 rad-10" action="functions/authcode.php" method="post">
            <input class="w-full mb-10 p-10 block" type="text" name="first_name" placeholder="Your First Name" required>
            <input class="w-full mb-10 p-10 block" type="text" name="last_name" placeholder="Your Last Name" required>
            <input class="w-full mb-10 p-10 block" type="email" name="email" placeholder="Your Email" required id="email_check">
            <span id="check_response" class="bg-red txt-c c-white w-full mb-10 block"></span>
            <div class="relative mb-10">
                <input class="w-full p-10 block" type="password" name="password" placeholder="Your Password" required>
                <i class="eye far fa-eye absolute bg-grey flex-center"></i>
            </div>
            <div class="relative mb-10">
                <input class="w-full  p-10 block" type="password" name="cpassword" placeholder="Confirm Your Password" required>
                <i class="eye far fa-eye absolute bg-grey flex-center p-10"></i>
            </div>
            <input class="w-full mb-10 p-10 block" type="number" name="phone" placeholder="Your Phone Number" required>
            <input class="w-full mb-10 p-10 block" type="text" name="address" placeholder="Your Address">
            
            <div class="relative">
                <span class="select block w-full"></span>
                <select class="w-full mb-10 p-10 block" name="country_id" required>
                    <option disabled selected hidden>Choose Your Country...</option>
                    <?php
                        $countries = selectAll("countries");
                        foreach($countries as $country ){
                            ?>
                            <option value="<?=$country['id']?>" <?php if($country['id']=='236'){  ?>selected <?php } ?>><?=$country['country_name']?></option>;
                            <?php
                        }
                    
                    ?>
                </select>
            </div>
            <input class="bg-main c-white w-full p-10 bold" type="submit" name="register_btn" value="Sign Up">
        </form>
        <h4 class="c-gold p-10">Already Member To Lefty Mummy? <a class="c-main" href="signin.php">Sign in!</a></h4>

    </div>
    </section>

<?php include 'includes/footer.php' ?>