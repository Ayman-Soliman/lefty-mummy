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
    <h1 class="m-20 relative fit-content">My Products</h1>
        <?php 
        include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <div class="projects-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <!-- <h2>Social Media Stats</h2> -->
                </div>
                <div class="table-container" >
                    <table class="auto mt-20" id="products_table">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >Image</td>
                                <td class="p-20 bg-grey" >Name</td>
                                <td class="p-20 bg-grey" >Parent Category</td>
                                <td class="p-20 bg-grey" >Sub Category</td>
                                <td class="p-20 bg-grey" >Seller</td>
                                <td class="p-20 bg-grey" >Discription</td>
                                <td class="p-20 bg-grey" >Original Price</td>
                                <td class="p-20 bg-grey" >Discount</td>
                                <td class="p-20 bg-grey" >Price After Discount</td>
                                <td class="p-20 bg-grey" >Active</td>
                                <td class="p-20 bg-grey" >Created Date</td>
                                <td class="p-20 bg-grey" >Edit</td>
                                <td class="p-20 bg-grey" >Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $products = selectSellerProd('products', $_SESSION['auth_user']['id']);
                        if (mysqli_num_rows($products)>0) {
                            foreach ($products as $product) {
                            ?>
                                <tr>
                                <?php
                                    $prod_image = selectByProdId('products_images',$product['id']);
                                    if (mysqli_num_rows($prod_image)>0) {
                                        $fetch_prod_image = mysqli_fetch_array($prod_image);
                                    ?>
                                    <td class="txt-c border-bottom" >
                                            <img class="rad-6" width="100" src="designsImages/<?= $fetch_prod_image['thumb_image']?>" alt="">
                                        </td>
                                    <?php
                                    }?>
                                    <td class="p-20 border-bottom" ><?= $product['prod_name'];?></td>
                                    <?php
                                    $category = selectById('categories',$product['parent_cat_id']);
                                    if (mysqli_num_rows($category)>0) {
                                        $fetch_category = mysqli_fetch_array($category);
                                    ?>
                                    <td class="p-20 border-bottom" ><?= $fetch_category['cat_name'];?></td>
                                    <?php
                                    }?>
                                    <?php
                                    $sub_category = selectById('sub_categories',$product['sub_cat_id']);
                                    if (mysqli_num_rows($sub_category)>0) {
                                        $fetch_sub_category = mysqli_fetch_array($sub_category);
                                    ?>
                                    <td class="p-20 border-bottom" ><?= $fetch_sub_category['sub_cat_name'];?></td>
                                    <?php
                                    }else{
                                    ?>
                                    <td class="p-20 border-bottom c-red" >Empty</td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    ?>
                                    <?php
                                    $seller = selectById('users',$product['seller_id']);
                                    if (mysqli_num_rows($seller)>0) {
                                        $fetch_seller = mysqli_fetch_array($seller);
                                    ?>
                                    <td class="p-20 border-bottom" ><?= $fetch_seller['first_name'];?></td>
                                    <?php
                                    }?>
                                    <td class="p-20 border-bottom" ><?= $product['discription'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['original_price'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['price_discount'];?></td>
                                    <td class="p-20 border-bottom" ><?= $product['price_after_discount'];?></td>
                                    <td class="p-20 border-bottom <?= $product['status'] ? 'c-main':'c-red';?>" ><?= $product['status'] ? 'Yes':'No';?></td>
                                    <td class="p-20 border-bottom" ><?= $product['created_at'];?></td>
                                    <td class="p-20 border-bottom" >
                                        <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                            <form action="edit-product.php" method="get" >
                                                <input type="hidden" name="id" value="<?= $product['id'];?>">
                                                <button class="btn  txt-c bg-orange c-white rad-6 p-10" href=""type="submit">Edit</button>
                                            </form>
                                            
                                    </td>
                                    <td class="p-20 border-bottom" >
                                        <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                                <button class="btn  txt-c bg-red c-white rad-6 p-10" href=""type="submit" value="<?= $product['id'];?>" id="delete-product-btn">Delete</button>
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