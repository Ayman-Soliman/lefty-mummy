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
    <h1 class="m-20 relative fit-content">Sales</h1>
        <?php 
        include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <div class="projects-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <!-- <h2>Social Media Stats</h2> -->
                </div>
                <div class="table-container" id="products_table">
                    <table class="auto mt-20">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >Image</td>
                                <td class="p-20 bg-grey" >Design Name</td>
                                <td class="p-20 bg-grey" >Puyer</td>
                                <td class="p-20 bg-grey" >Tracking NO. </td>
                                <td class="p-20 bg-grey" >Original Price</td>
                                <td class="p-20 bg-grey" >Discount</td>
                                <td class="p-20 bg-grey" >Price After Discount</td>
                                <td class="p-20 bg-grey" >Payment Date</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $products = allSales();
                        if (mysqli_num_rows($products)>0) {
                            foreach ($products as $product) {
                            ?>
                                <tr>
                                
                                    
                                    <td class="txt-c border-bottom" >
                                            <img class="rad-6" width="100" src="designsImages/<?= $product['thumb_image']?>" alt="">
                                    </td>
                                    <td class="p-20 border-bottom" ><a href="../product.php?prod_id=<?=$product['pid']?>&slug=<?=$product['prod_slug']?>">
                                        <?= $product['prod_name'];?></a></td>
                                    <td class="p-20 border-bottom" ><?= $product['first_name']." ".$product['last_name'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['tracking_no'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['original_price'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['price_discount'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['price_after_discount'];?></td>
                                    <td class="p-20 border-bottom" ><?=date('jS M, Y',strtotime($product['payment_time']))?></td>
                                    
                                    
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