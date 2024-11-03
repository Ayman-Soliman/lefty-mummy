<?php 
ob_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/dbcon.php';
if (!isset($_SESSION['auth'])) {
    redirect('signin.php',"message_error", "Login To Countinue");
}


?>
<section class="prod-preview mb-20 container section-padding" id="cart_table">
    <?php
    if (isset($_SESSION['auth'])) {
        $user_id = $_SESSION['auth_user']['id'];
            $all_designs = allPurchasedDesigns($user_id);
            if (mysqli_num_rows($all_designs)>0) {
    ?>
    <div class='main-heading pt-5'>
            <h2 class='heading'>My Purchased Designs</h2>
    </div>        
    <div class="table-container flex-center" >
        <table class="w-full table table-striped">
            <thead class="bold">
                <tr>
                    <td class="p-20 disc">#</td>
                    <td class="p-20 disc">Image</td>
                    <td class="p-20 disc">Name</td>
                    <td class="p-20 disc">Original Price</td>
                    <td class="p-20 disc">Discount</td>
                    <td class="p-20 disc">Price</td>
                    <td class="p-20 disc">Download Design</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            $num = 1;
            foreach ($all_designs as $design) {
            ?>
            <tr>
                <td  class="p-10 border-bottom"><?=$num?></td>
                <td  class="p-10 border-bottom"><img style="width: 50px; height:50px" src="vendor/designsImages/<?=$design['thumb_image']?>" alt="<?=str_replace('_', ' ',$design['prod_slug'])?>"></td>
                <td  class="p-10 border-bottom"><a class="c-red" href="product.php?prod_id=<?=$design['pid']?>&slug=<?=$design['prod_slug']?>"><?=$design['prod_name']?></a></td>
                <td  class="p-10 border-bottom">$ <?=$design['original_price']?></td>
                <td  class="p-10 border-bottom"><?=$design['price_discount']?>%</td>
                <td  class="p-10 border-bottom">$ <?=$design['price_after_discount']?></td>
                <td  class="p-10 border-bottom">
                <?php
                ?>
                <a class="btn txt-c btn-danger rad-6 p-10 refresh-cart" href="vendor/designsFiles/<?=$design['design_file']?>" download rel="noopener noreferrer nofollow" target="_blank">Download <i class="fas fa-download"></i></a>
                </td>
                <?php $total += $design['price_after_discount']; ?>
                <?php $num++; ?>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="2" class="p-20 bg-grey c-main bold"></td>
                <td colspan="3" class="p-20 bg-grey c-main bold">total : </td>
                <td colspan="1" class="p-20 bg-grey c-main bold">$ <?=$total?></td>
                <td colspan="1" class="p-20 bg-grey c-main bold"></td>
            </tr>
            </tbody>
        </table>
        
    </div>
    <?php
                }else {
                    ?>
                        <h3 class="pt-5 flex-center">Your Cart Is Empty <a href="all-products.php" class="c-main"> Go Shopping Now</a><i class="fas fa-shopping-cart c-main"></i></h3>
                    <?php
                    }

            
        
    ?> 
</section>

    <?php
}else {
    $_SESSION['message_error'] = 'Log In To Continue';
    header('Location: signin.php');
    exit();
}
?>
<?php include 'includes/footer.php' ?>