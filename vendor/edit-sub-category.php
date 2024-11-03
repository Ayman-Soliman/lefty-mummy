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
    <h1 class="m-20 relative fit-content">Edit Sub-Category</h1>
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
                    $sub_category = selectById('sub_categories',$_GET['id']);
                    if (mysqli_num_rows($sub_category)>0) {
                        $fetch_sub_category = mysqli_fetch_array($sub_category);
                    }else {
                        redirect('edit-sub-category.php','message-error', 'something went wrong');
                    }
                }
            ?>
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="sub_cat_id" value="<?=$_GET['id']?>">
                <label class="block mb-5 bold c-main" for="">Sub Category Name</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="sub_cat_name" placeholder="Sub Category Name" value="<?=$fetch_sub_category['sub_cat_name']?>" required>
                <div class="relative">
                    <span class="select block w-full"></span>
                    <label class="block mb-5 bold c-main" for="">Parent Category</label>
                    <div class="relative">
                        <span class="select block w-full"></span>
                        <select class="w-full mb-10 p-10 block" name="parent_cat_id" required>
                            <?php
                                $categories = selectAll("categories");
                                foreach($categories as $category ){
                                    // echo '<option value="'.$country['id'].'"'.$country['id']=='64'? .'selected:""'>'.$country['country_name'].'</option>';
                                    ?>
                                    <option value="<?=$category['id']?>" <?=isset($_GET['parent_cat_id'])&&$_GET['parent_cat_id']==$category['id']?'selected':""?>><?=$category['cat_name']?></option>;
                                    <?php
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <label class="block mb-5 bold c-main" for="">Sub Category Image</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="sub_cat_image" type="file" >
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="old_image" type="hidden" value="<?=$fetch_sub_category['sub_cat_image']?>">
                <img class="rad-6" width="100" src="uploads/<?=$fetch_sub_category['sub_cat_image']?>" alt="<?=$fetch_sub_category['sub_cat_name']?>">
                <label class="block mb-5 bold c-main" for="">Sub Category Discription</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="discription" placeholder="Discription"><?=$fetch_sub_category['discription']?></textarea>
                <label class="block mb-5 bold c-main" for="">Sub Category Keywords</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="keywords" placeholder="Add Comma , Between Keywords Like That LASERCUT, MDF, ...."><?=$fetch_sub_category['keywords']?></textarea>
                <label class="block mb-5 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In Sub Categories</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox" <?=$fetch_sub_category['status']?"checked":""?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>
                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-sub-categories.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10 left-auto" type="submit" name="edit-sub-category-btn" >Edit Sub Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>