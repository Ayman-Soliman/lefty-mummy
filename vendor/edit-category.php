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
    <h1 class="m-20 relative fit-content">Edit Category</h1>
        <?php 
        include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
                <?php
                    if (isset($_GET['id'])) {
                        $cat_id = $_GET['id'];
                        $category = selectById('categories',$cat_id);
                        if (mysqli_num_rows($category)>0) {
                            $fetch_category = mysqli_fetch_array($category);
                        }else {
                            redirect('edit-category.php','message-error', 'something went wrong');
                        }
                    }
                ?>
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cat_id" value="<?=$fetch_category['id']?>">
                <label class="block mb-5 bold c-main" for="">Category Name</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" type="text" name="cat_name" placeholder="Category Name" value="<?=$fetch_category['cat_name']?>" required>
                <label class="block mb-5 bold c-main" for="">Category Image</label>
                <input class="bg-grey block mb-20 w-full border-grey rad-6 p-10" name="cat_image" type="file">
                <input type="hidden" name="old_image" value="<?=$fetch_category['cat_image']?>">
                <img class="rad-6" width="100" src="uploads/<?=$fetch_category['cat_image']?>" alt="<?=$fetch_category['cat_name']?>">
                <label class="block mb-5 bold c-main" for="">Category Discription</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="discription" placeholder="Discription"><?=$fetch_category['discription']?></textarea>
                <label class="block mb-5 bold c-main" for="">Category Keywords</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="keywords" placeholder="Add Comma , Between Keywords Like That LASERCUT, MDF, ...."><?=$fetch_category['keywords']?></textarea>
                <label class="block mb-5 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In Categories</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox" <?=$fetch_category['status']?'checked':""?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>
                <div class="flex fit-content left-auto gap-20">
                    <a class="btn block bg-red c-white rad-6 p-10 fit-content" href="all-categories.php" >Cancel</a>
                    <button class="btn block bg-main c-white rad-6 p-10" type="submit" name="edit-category-btn" >Edit Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>