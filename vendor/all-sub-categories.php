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
    <h1 class="m-20 relative fit-content">All sub Categories</h1>
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
                                <td class="p-20 bg-grey" >Parent Category</td>
                                <td class="p-20 bg-grey" >Discription</td>
                                <td class="p-20 bg-grey" >Active</td>
                                <td class="p-20 bg-grey" >Created Date</td>
                                <td class="p-20 bg-grey" >Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sub_categories = selectAll('sub_categories');
                            if (mysqli_num_rows($sub_categories)>0) {
                                foreach ($sub_categories as $sub_category) {
                                    ?>
                                    <tr>
                                        <td class="txt-c border-bottom" >
                                            <img class="rad-6" width="100" src="uploads/<?= $sub_category['sub_cat_image']?>" alt="">
                                        </td>
                                        <td class="p-20 border-bottom" ><?= $sub_category['sub_cat_name'];?></td>
                                        <?php
                                        $category = selectById('categories',$sub_category['parent_cat_id']);
                                        if (mysqli_num_rows($category)>0) {
                                            $fetch_category = mysqli_fetch_array($category);
                                        ?>
                                        <td class="p-20 border-bottom" ><?= $fetch_category['cat_name'];?></td>
                                        <?php
                                        }?>
                                        <td class="p-20 border-bottom" ><?= $sub_category['discription'];?></td>
                                        <td class="p-20 border-bottom <?= $sub_category['status'] ? 'c-main':'c-red';?>" ><?= $sub_category['status'] ? 'Yes':'No';?></td>
                                        <td class="p-20 border-bottom" ><?=date('jS M, Y',strtotime($sub_category['created_at']))?></td>
                                        <td class="p-20 border-bottom" >
                                            <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                                <form action="edit-sub-category.php" method="get" >
                                                    <input type="hidden" name="id" value="<?= $sub_category['id'];?>">
                                                    <input type="hidden" name="parent_cat_id" value="<?=$sub_category['parent_cat_id']?>">
                                                    <button class="btn  txt-c bg-orange c-white rad-6 p-10" href=""type="submit">Edit</button>
                                                </form>
                                                
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