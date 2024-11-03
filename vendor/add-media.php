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
    // session_start();
?>
<?php include 'includes/side.php'?>
<div class="page-content flex-1 overflow">
        <?php include 'includes/navbar.php' ?>
        <h1 class="m-20 relative fit-content">Add Media</h1>
    <?php 
    // include 'includes/alert.php' 
    ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <!-- <form id="sub-form"  action=""  method="post"></form> -->
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
            <div>
                <!-- <div class="absolute mt-20 ml-10 c-red">330px X 330px images recommended</div> -->
                    <label class="block mb-1 bold c-main" for="">Upload Media</label>
                    
                    <input class="bg-grey mb-3 w-full border-grey rad-6 p-10" id="post_cover" name="media[]" type="file" required multiple>
                    <div class="c-red txt-c disc" id="preview_prod_error"></div>
                </div>

                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-media.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="add-media-btn" >Add Media</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

include 'includes/footer.php'
?>