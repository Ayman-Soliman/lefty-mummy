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
        <h1 class="m-20 relative fit-content">Add T-shirt</h1>
    <?php 
    // include 'includes/alert.php' 
    ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <!-- <form id="sub-form"  action=""  method="post"></form> -->
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <label class="block mb-5 bold c-main" for="">Title</label>
                <input value="<?= $_SESSION['auth_user']['id']?>" type="hidden" name="seller_id" >
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="title" placeholder="T-Shirt Title" required>
                
                <label class="block mb-5 bold c-main" for="">T-shirt Slug</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="slug" placeholder="T-shirt Slug" required>

                <div class="grid-col-2">
                    <div class="relative">
                        <span class="select block w-full"></span>
                        <label class="block mb-5 bold c-main" for="">Amazon Store(Country)</label>
                        <div class="relative">
                            <span class="select block w-full"></span>
                            <select id="store_name" class="w-full mb-10 p-10 block bg-grey" name="store_id" required>
                            <option disabled selected hidden>Choose Store Country ...</option>
                            <?php
                                $stores = selectAll("stores");
                                foreach($stores as $store){
                                    // echo '<option value="'.$country['id'].'"'.$country['id']=='64'? .'selected:""'>'.$country['country_name'].'</option>';
                                    ?>
                                    <option value="<?=$store['id']?>" ><?=$store['name']?></option>;
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="absolute mt-20 ml-10 c-red">330px X 330px images recommended</div>
                    <label class="block mb-5 bold c-main" for="">T-shirt Images</label>
                        <div class="thumb relative">
                            <span class="absolute mt-20 ml-10 c-main">thumbnail</span>
                            <label class=" mb-5 bold c-main pointer" for="thumb_img">
                            <img id="thumb" src="assets/images/upload.webp" width="100"/>
                            <!-- <img id="preview" src=""/> -->
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 hide" id="thumb_img" name="thumb_img" type="file" required onchange="view(this,'thumb');">
                            <div class="c-red txt-c disc" id="thumb_prod_error"></div>
                        </div>
                </div>
                <label class="block mb-5 bold c-main" for="">T-shirt Description</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="description" placeholder="Description"></textarea>
                <label class="block mb-5 bold c-main" for="">t-shirt Keywords</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="keywords" placeholder="Add Comma , Between Keywords Like That LASERCUT, MDF, ...."></textarea>
                <div class="grid-col-3">
                    <div>
                        <label class="block mb-5 bold c-main" for="">Price</label>
                        <input class="w-full bg-grey block mb-20 border-grey rad-6 p-10 txt-c" type="number" name="price" id="price" value="0" min="0" required>
                    </div>
                </div>
                <label class="block mb-5 bold c-main" for="">T-shirt URL</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="url" placeholder="T-shirt URL" required> 
                

                <label class="block mb-5 bold c-main" for="">Trending</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In trending</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="trending" type="checkbox">
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>

                <label class="block mb-5 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In T-shirts</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox" checked>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>

                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-products.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="add-apparel-btn" >Add T-shirt</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

include 'includes/footer.php'
?>