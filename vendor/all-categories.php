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
    <h1 class="m-20 relative fit-content">All Categories</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <div class="projects-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <!-- <h2>Social Media Stats</h2> -->
                </div>
                <div class="table-container">
                    <table class="auto mt-20">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >Image</td>
                                <td class="p-20 bg-grey" >Name</td>
                                <td class="p-20 bg-grey" >Discription</td>
                                <td class="p-20 bg-grey" >Active</td>
                                <td class="p-20 bg-grey" >Created Date</td>
                                <td class="p-20 bg-grey" >Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $categories = selectAll('categories');
                            if (mysqli_num_rows($categories)>0) {
                                foreach ($categories as $category) {
                                    ?>
                                    <tr>
                                        <td class="txt-c border-bottom" >
                                            <img class="rad-6" width="100" src="uploads/<?= $category['cat_image']?>" alt="">
                                        </td>
                                        <td class="p-20 border-bottom" ><?= $category['cat_name'];?></td>
                                        <td class="p-20 border-bottom" ><?= $category['discription'];?></td>
                                        <td class="p-20 border-bottom <?= $category['status'] ? 'c-main':'c-red';?>" ><?= $category['status'] ? 'Yes':'No';?></td>
                                        <td class="p-20 border-bottom" ><?=date('jS M, Y',strtotime($category['created_at']))?></td>
                                        <td class="p-20 border-bottom" >
                                            <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                                <a class="btn block mb-5 txt-c bg-orange c-white rad-6 p-10" href="edit-category.php?id=<?= $category['id'];?>" type="submit" name="e
                                                dit-category-btn">Edit</a>
                                                <a class="btn block mb-5 txt-c bg-green c-white rad-6 p-10" href="add-sub-category.php?cat_id=<?= $category['id'];?>" type="submit" name="e
                                                dit-category-btn">Add Sub Category</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>