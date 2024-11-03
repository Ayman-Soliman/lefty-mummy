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
    <h1 class="m-20 relative fit-content">All Amazon Stores</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <div class="posts-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <!-- <h2>Social Media Stats</h2> -->
                </div>
                <div class="table-container" id="posts_table" >
                    <table class="auto mt-20">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >ID</td>
                                <td class="p-20 bg-grey" >Store Name</td>
                                <td class="p-20 bg-grey" >Active</td>
                                <td class="p-20 bg-grey" >Created Date</td>
                                <td class="p-20 bg-grey" >Edit</td>
                                <td class="p-20 bg-grey" >Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stores = selectAll('stores');
                            if (mysqli_num_rows($stores)>0) {
                                foreach ($stores as $store) {
                                    ?>
                                    <tr>
                                        <td class="txt-c border-bottom" ><?=$store['id']?>
                                        </td>
                                        <td class="p-20 border-bottom" >Amazon <?=$store['name'];?></td>
                                        <td class="p-20 border-bottom <?= $store['status'] ? 'c-main':'c-red';?>" ><?= $store['status'] ? 'Yes':'No';?></td>
                                        <td class="p-20 border-bottom" ><?=date('jS M, Y',strtotime($store['created_at']))?></td>
                                        <td class="p-20 border-bottom" >
                                            <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                                <a class="btn  txt-c bg-orange c-white rad-6 p-10" href="edit-store.php?id=<?= $store['id'];?>" type="submit" name="">Edit</a>
                                        </td>
                                        <td class="p-20 border-bottom" >
                                            <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                            <!-- <form action="functions/code.php" method="POST" >
                                                <input type="hidden" name="post_id" >
                                                <button class="btn txt-c bg-red c-white rad-6 p-10" href="" type="submit" data-image="<?= $post['post_cover'];?>" value="<?= $post['id'];?>" id="delete-post-btn">Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        
                                        <td colspan="7" class="p-20 border-bottom txt-c c-red" ><?= 'no posts yet';?></td>
                                        
                                    </tr>
                                <?php
                                // echo 'no posts yet';
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