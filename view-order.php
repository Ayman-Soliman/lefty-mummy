<?php 
ob_start();
// session_start();
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
        if (isset($_GET['t'])){
            $t = $_GET['t'];
            $result = validTrackingNo($user_id, $t);
            if (mysqli_num_rows($result)>0){
                $order = mysqli_fetch_array($result);
                $order_details = orderDetails($user_id, $t);
                if (mysqli_num_rows($order_details)>0) {
                    
    ?>
    <div class='main-heading pt-5'>
            <h1 class='heading pb-2'>Order Details</h1>
    </div>        
    <h4 class='c-gold bg-black fit-content p-2'>Order NO. : <?=$order['tracking_no']?></h4>
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
            foreach ($order_details as $order_detail) {
            ?>
            <tr>
                <td  class="p-10 border-bottom"><?=$num?></td>
                <td  class="p-10 border-bottom"><img style="width: 50px; height:50px" src="vendor/designsImages/<?=$order_detail['thumb_image']?>" alt="<?=str_replace('_', ' ',$order_detail['prod_slug'])?>"></td>
                <td  class="p-10 border-bottom"><a class="c-red" href="product.php?prod_id=<?=$order_detail['pid']?>"><?=$order_detail['prod_name']?></a></td>
                <td  class="p-10 border-bottom">$ <?=$order_detail['original_price']?></td>
                <td  class="p-10 border-bottom"><?=$order_detail['price_discount']?>%</td>
                <td  class="p-10 border-bottom">$ <?=$order_detail['price_after_discount']?></td>
                <td  class="p-10 border-bottom">
                <?php
                ?>
                <a class="btn txt-c btn-danger rad-6 p-10 refresh-cart" href="vendor/designsFiles/<?=$order_detail['design_file']?>" download rel="noopener noreferrer nofollow" target="_blank">Download <i class="fas fa-download"></i></a>
                </td>
                <?php $total += $order_detail['price_after_discount']; ?>
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
        <a class="btn block fit-content btn-primary c-white rad-6 m-20 p-10 left-auto" href="my-orders.php" name="checkout" >Back <i class="fa-solid fa-reply"></i></a>
        
    <?php
                }else {
                    redirect('my-orders.php','message_error','something went wrong');
                    }

            }else {
            redirect('my-orders.php','message_error','something went wrong');
            }
        }else {
            redirect('my-orders.php','message_error','something went wrong');
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