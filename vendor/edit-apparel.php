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
        <h1 class="m-20 relative fit-content">Edit T-shirt</h1>
    <?php 
    // include 'includes/alert.php' 
    ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <!-- <form id="sub-form"  action=""  method="post"></form> -->
        <?php
            if (isset($_GET['id'])) {
                $shirt_id = $_GET['id'];
                $shirt_query = selectById('apparel',$shirt_id);
                if (mysqli_num_rows($shirt_query)>0) {
                    $shirt = mysqli_fetch_array($shirt_query);
                ?>
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <label class="block mb-5 bold c-main" for="">Title</label>
                <input value="<?= $_SESSION['auth_user']['id']?>" type="hidden" name="seller_id" >
                <input value="<?= $shirt_id?>" type="hidden" name="shirt_id" >
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="title" placeholder="T-Shirt Title" value="<?=$shirt['title']?>" required>
                
                <label class="block mb-5 bold c-main" for="">T-shirt Slug</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="slug" placeholder="T-shirt Slug" value="<?=$shirt['slug']?>" required>

                <div class="grid-col-2">
                    <div class="relative">
                        <span class="select block w-full"></span>
                        <label class="block mb-5 bold c-main" for="">Amazon Store(Country)</label>
                        <div class="relative">
                            <span class="select block w-full"></span>
                            <select id="store_name" class="w-full mb-10 p-10 block bg-grey" name="store_id" required>
                            <option disabled hidden>Choose Store Country ...</option>
                            <?php
                                $stores = selectAll("stores");
                                foreach($stores as $store){
                                    // echo '<option value="'.$country['id'].'"'.$country['id']=='64'? .'selected:""'>'.$country['country_name'].'</option>';
                                    ?>
                                    <option value="<?=$store['id']?>" <?=$store['id']==$shirt['store_id']?'selected':''?> ><?=$store['name']?></option>;
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                <!-- <div class="absolute mt-20 ml-10 c-red">330px X 330px images recommended</div> -->
                    <label class="block mb-1 bold c-main" for="">Post Cover</label>
                    <label class=" mb-3 bold c-main pointer" for="post_cover">
                        <input type="hidden" name="old_image" value="<?=$shirt['thumb_img']?>">

                        <img id="preview" src="uploads/apparel/<?=$shirt['thumb_img']?>" width="100"/>
                        <!-- <img id="preview" src=""/> -->
                    </label>
                    <input class="bg-grey mb-3 w-full border-grey rad-6 p-10 hide" id="post_cover" name="post_cover" type="file" onchange="view(this,'preview');">
                    <div class="c-red txt-c disc" id="preview_prod_error"></div>
                </div>

                <label class="block mb-5 bold c-main" for="">T-shirt Description</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="description" placeholder="Description"><?=$shirt['description']?></textarea>
                <label class="block mb-5 bold c-main" for="">t-shirt Keywords</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="keywords" placeholder="Add Comma , Between Keywords Like That LASERCUT, MDF, ...."><?=$shirt['description']?></textarea>
                <div class="grid-col-3">
                    <div>
                        <label class="block mb-5 bold c-main" for="">Price</label>
                        <input class="w-full bg-grey block mb-20 border-grey rad-6 p-10 txt-c" type="number" name="price" id="price" value="<?=$shirt['price']?>" min="0" required>
                    </div>
                </div>
                <label class="block mb-5 bold c-main" for="">T-shirt URL</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="url" placeholder="T-shirt URL" value="<?=$shirt['url']?>" required> 
                

                <label class="block mb-5 bold c-main" for="">Trending</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In trending</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="trending" type="checkbox" <?=$shirt['trending']?'checked':''?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>

                <label class="block mb-5 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In T-shirts</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox" <?=$shirt['status']?'checked':''?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>

                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-apparel.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="edit-apparel-btn" >Edit T-shirt</button>
                </div>
            </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php

include 'includes/footer.php'
?>