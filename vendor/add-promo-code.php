<?php 
    include 'includes/header.php';
    include 'functions/myfunctions.php';

    if (!isset($_SESSION['auth'])) {
        // $_SESSION['message_error']= 'Login To Countinue';
        // header('Location: ../signin.php');
        redirect('../signin.php',"message_error", "Login To Countinue");
    }
    
    if (isset($_SESSION['role_as'])) {
        if ($_SESSION['role_as'] != 1) {
            // $_SESSION['message_error']= 'Not Authorized';
            // header('Location: ../index.php');
            redirect('../index.php',"message_error", "Not Authorized");
        }
    }
?>
<?php include 'includes/side.php'?>
<div class="page-content flex-1 overflow">
    <?php include 'includes/navbar.php' ?>
    <h1 class="m-20 relative fit-content">Add Promo Code</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
                <label class="block mb-5 bold c-main" for="">Promo Suggestion</label>
                <div class="flex">
                <input class="bg-grey block mr-20 border-grey rad-6 p-10" type="text" id="promo-sugg" value="promo30" readonly>
                <a class="bg-red c-white rad-6 p-10" href="" id="generate-code-btn">Generate code</a>
                </div>
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <div class="flex">
                    <div class="pr-10">
                        <label class="block mb-5 bold c-main" for="">Promo Code</label>
                        <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="promo_code" placeholder="Enter Promo Code Here" required>
                    </div>
                    <div class="pr-10">
                        <label class="block mb-5 bold c-main" for="">Discount NO.</label>
                        <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="number" name="discount" placeholder="0" required>
                    </div>
                    <div class="pr-10">
                        <label class="block mb-5 bold c-main" for="">Promo Days</label>
                        <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="number" name="working_days" placeholder="0" required>
                    </div>
                </div>
                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-promo-codes.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="add-promo-code-btn" >Add Promo Code</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>