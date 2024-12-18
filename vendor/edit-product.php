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
        <h1 class="m-20 relative fit-content">Edit Product</h1>
    <?php 
    // include 'includes/alert.php' 
    ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <?php
        $can_edit = false;
            if (isset($_GET['id'])) {
                $prod_id = $_GET['id'];
                if (isset($_SESSION['role_as'])) 
                {
                    if ($_SESSION['role_as'] == 1) 
                    {
                        $product = selectByProd('products', $prod_id);
                        if (mysqli_num_rows($product)>0) {
                            $fetch_product = mysqli_fetch_array($product);
                            $can_edit = true;
                        }
                        $can_edit = true;
                    }else {
                        $product = checkProdSeller('products', $prod_id, $_SESSION['auth_user']['id']);
                        if (mysqli_num_rows($product)>0) {
                            $fetch_product = mysqli_fetch_array($product);
                            $can_edit = true;
                        }else{
                            $can_edit = false;
                        }
                    }
                }
            }
            if ($can_edit) {
        ?>
                <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <label class="block mb-5 bold c-main" for="">Product Name</label>
                <label class="block mb-2 bold c-main" for="">Type this text <span class="c-red">[splithere]</span> between languages (english title <span class="c-red">[splithere]</span> spanish title <span class="c-red">[splithere]</span> french title)</label>
                <input value="<?= $_SESSION['auth_user']['id']?>" type="hidden" name="seller_id" >
                <input value="<?= $prod_id?>" type="hidden" name="prod_id" >
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="prod_name" placeholder="Product Name" value="<?=$fetch_product['prod_name']?>" required>

                <label class="block mb-5 bold c-main" for="">Product Slug</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="prod_slug" placeholder="Product Slug" value="<?=$fetch_product['prod_slug']?>">

                <div class="grid-col-2">
                    <div class="relative">
                        <span class="select block w-full"></span>
                        <label class="block mb-5 bold c-main" for="">Parent Category</label>
                        <div class="relative">
                            <span class="select block w-full"></span>
                            <select id="parent_cat" class="w-full mb-10 p-10 block bg-grey" name="parent_cat_id" required>
                            <option disabled selected hidden>Choose Parent Category...</option>
                            <?php
                                $categories = selectAll("categories");
                                foreach($categories as $category ){
                                    // echo '<option value="'.$country['id'].'"'.$country['id']=='64'? .'selected:""'>'.$country['country_name'].'</option>';
                            ?>
                                    <option value="<?=$category['id']?>" sub_cat_id = '<?=$fetch_product['sub_cat_id']?>' <?=$category['id']==$fetch_product['parent_cat_id']?'selected':''?> ><?=$category['cat_name']?></option>;
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="relative">
                        <span class="select block w-full"></span>
                        <label class="block mb-5 bold c-main" for="">Sub-Category</label>
                        <div class="relative">
                            <span class="select block w-full"></span>
                            <select id="sub_cat" class="w-full mb-10 p-10 block bg-grey" name="sub_cat_id" required>
                                <option disabled selected hidden>Choose Sub-Category...</option>
                                <?php
                                $sub_categories = selectAll("sub_categories");
                                foreach($sub_categories as $sub_category ){
                                    // echo '<option value="'.$country['id'].'"'.$country['id']=='64'? .'selected:""'>'.$country['country_name'].'</option>';
                                ?>
                                    <option value="<?=$sub_category['id']?>" <?=$sub_category['id']==$fetch_product['sub_cat_id']?'selected':''?> ><?=$sub_category['sub_cat_name']?></option>;
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block mb-5 bold c-main" for="">Product Images</label>
                    <?php
                    $images = selectByProdId("products_images", $fetch_product['id']);
                    if (mysqli_num_rows($images)>0) {
                        $fetch_images = mysqli_fetch_array($images);
                        ?>
                    <div class="flex">
                        <div class="thumb relative">
                            <span class="absolute mt-20 ml-10 c-main">thumbnail</span>
                            <label class=" mb-5 bold c-main pointer" for="thumb_prod">
                            <img id="thumb" src="<?='designsImages/'.$fetch_images['thumb_image'] ?>" width="100"/>
                            <!-- <img id="preview" src=""/> -->
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 hide" id="thumb_prod" name="thumb_image" type="file" onchange="view(this,'thumb');">
                            <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="old_thumb_image" type="hidden" value="<?=$fetch_images['thumb_image']?>">

                            <div class="c-red txt-c disc" id="thumb_prod_error"></div>
                        </div>
                        <div class="one">
                            <label class=" mb-5 bold c-main pointer" for="one_prod">
                            <img id="one" src="<?=$fetch_images['img_one']!=null?'designsImages/'.$fetch_images['img_one']: "assets/images/upload.webp"?>" width="100"/>
                            <!-- <img id="preview" src=""/> -->
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 hide" id="one_prod" name="one_image" type="file" onchange="view(this,'one');">
                            <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="old_one_image" type="hidden" value="<?=$fetch_images['img_one']?>">

                            <div class="c-red txt-c disc" id="one_prod_error"></div>
                        </div>
                        <div class="two">
                            <label class=" mb-5 bold c-main pointer" for="two_prod">
                            <img id="two" src="<?=$fetch_images['img_two']!=null?'designsImages/'.$fetch_images['img_two']: "assets/images/upload.webp"?>" width="100"/>
                            <!-- <img id="preview" src=""/> -->
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 hide" id="two_prod" name="two_image" type="file" onchange="view(this,'two');">
                            <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="old_two_image" type="hidden" value="<?=$fetch_images['img_two']?>">

                            <div class="c-red txt-c disc" id="two_prod_error"></div>
                        </div>
                        <div class="three">
                            <label class=" mb-5 bold c-main pointer" for="three_prod">
                            <img id="three" src="<?=$fetch_images['img_three']!=null?'designsImages/'.$fetch_images['img_three']: "assets/images/upload.webp"?>" width="100"/>
                            <!-- <img id="preview" src=""/> -->
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 hide" id="three_prod" name="three_image" type="file" onchange="view(this,'three');">
                            <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="old_three_image" type="hidden" value="<?=$fetch_images['img_three']?>">
                            
                            <div class="c-red txt-c disc" id="three_prod_error"></div>
                        </div>
                        <div class="four">
                            <label class=" mb-5 bold c-main pointer" for="four_prod">
                            <img id="four" src="<?=$fetch_images['img_four']!=null?'designsImages/'.$fetch_images['img_four']: "assets/images/upload.webp"?>" width="100"/>
                            <!-- <img id="preview" src=""/> -->
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 hide" id="four_prod" name="four_image" type="file" onchange="view(this,'four');">
                            <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="old_four_image" type="hidden" value="<?=$fetch_images['img_four']?>">

                            <div class="c-red txt-c disc" id="four_prod_error"></div>
                        </div>
                    </div>
                        <?php
                    }
                        
                    ?>
                </div>
                <label class="block mb-5 bold c-main" for="">Product Description</label>
                <label class="block mb-2 bold c-main" for="">Type this text <span class="c-red">[splithere]</span> between languages (english description <span class="c-red">[splithere]</span> spanish description <span class="c-red">[splithere]</span> french description)</label>
                <textarea class="content bg-grey w-full border-grey rad-6 p-10 mb-20" name="discription" placeholder="Discription"><?=$fetch_product['discription']?></textarea>
                <label class="block mb-5 bold c-main" for="">Product Keywords</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="keywords" placeholder="Add Comma , Between Keywords Like That LASERCUT, MDF, ...."><?=$fetch_product['keywords']?></textarea>
                <div class="grid-col-3">
                    <div>
                        <label class="block mb-5 bold c-main" for="">Original Price</label>
                        <input class="w-full bg-grey block mb-20 border-grey rad-6 p-10 txt-c" type="number" name="original_price" id="original_price" value="<?=$fetch_product['original_price']?>" min="0" required>
                    </div>
                    <div>
                        <label class="block mb-5 bold c-red" for="">Discount</label>
                        <div class="flex-center">
                            <input class="w-full bg-grey block mb-20 border-grey rad-6 p-10 txt-c" type="number" name="price_discount" id="price_discount" value="<?=$fetch_product['price_discount']?>" min="0">
                            <div class="mb-20 p-10">%</div>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-5 bold c-red" for="">Price After Discount</label>
                        <input class="w-full bg-grey block mb-20 border-grey rad-6 p-10 txt-c" type="number" name="price_after_discount" id="price_after_discount" value="<?=$fetch_product['price_after_discount']?>" min="0" readonly>
                    </div>
                </div>
                <div class="thumb relative">
                            <!-- <span class="absolute mt-20 ml-10 c-main">thumbnail</span> -->
                            <label class=" mb-5 bold c-main" for="">
                            <!-- <img id="thumb" src="assets/images/upload.webp" width="100"/> -->
                            <!-- <img id="preview" src=""/> -->
                            Upload Your Design
                            </label>
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 pointer" id="design_file_prod_error" name="design_file" type="file" onchange="designFile(this); ">
                            <input class="bg-grey mb-20 w-full border-grey rad-6 p-10 c-red" type="hidden" name="old_design_file" id=""value="<?=$fetch_product['design_file']?>">
                            <div class="c-red txt-c disc" id="design_file_error"></div>
                        </div>
                <label class="block mb-5 bold c-main" for="">Trending</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In trending</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="trending" type="checkbox" <?=$fetch_product['trending']?'checked':''?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>
                <label class="block mb-5 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In Products</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox"<?=$fetch_product['status']?'checked':''?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>

                <div>
                    <label class="block mb-5 bold c-red" for="">Puyers NO. for Old products</label>
                    <input class="w-full bg-grey block mb-20 border-grey rad-6 p-10 txt-c" type="number" name="prev_rate" id="prev_rate" value="<?=$fetch_product['prev_rate']?>" min="0">
                </div>

                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="my-products.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="edit-product-btn" >Edit Product</button>
                </div>
            </form>
                <?php
            }else{

            }
        ?>
        <!-- <form id="sub-form"  action=""  method="post"></form> -->
            
        </div>
    </div>
</div>

<?php

include 'includes/footer.php'
?>