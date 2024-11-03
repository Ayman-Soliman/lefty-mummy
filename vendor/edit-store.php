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
    <h1 class="m-20 relative fit-content">Edit Store</h1>
        <?php 
        include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
                <!-- <div class="left">
                    <h2>Quick Draft</h2>
                    <span class="c-grey block mt-10">Write A Draft for your ideas</span>
                </div> -->
            <?php
                if (isset($_GET['id'])) {
                    $store_id = $_GET['id'];
                    $store_data = selectById('stores',$_GET['id']);
                    if (mysqli_num_rows($store_data)>0) {
                        $store = mysqli_fetch_array($store_data);
                    }else {
                        redirect('all-stores.php','message-error', 'something went wrong');
                    }
                }
            ?>
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <input value="<?= $store_id?>" type="hidden" name="store_id" >
                <label class="block mb-5 bold c-main" for="">Country Store Name</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="country_name" placeholder="Country Name" value="<?=$store['name']?>" required>
                
                <label class="block mb-5 bold c-main" for="">Country Abbreviation</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="country_abbr" placeholder="Country Abbreviation" value="<?=$store['abbr']?>" required>
                
                
                <label class="block mb-5 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In Stores</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox" <?=$store['status']?'checked':''?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>

                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-stores.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="edit-store-btn" >Edit Store</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>