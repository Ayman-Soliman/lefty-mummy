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
        $orders = getOrders($user_id);
        if (mysqli_num_rows($orders)>0) {
    ?>
    <div class='main-heading pt-5'>
            <h1 class='heading pb-2'>Ny Orders</h1>
    </div>        
        <div class="table-container flex-center" >
            <table class="w-full table table-striped">
                <thead class="bold">
                    <tr>
                        <td class="p-20 disc">#</td>
                        <td class="p-20 disc">Order No.</td>
                        <td class="p-20 disc">Total price</td>
                        <td class="p-20 disc">Purchased at</td>
                        <td class="p-20 disc">View</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                $num = 1;
                foreach ($orders as $order) {
                ?>
                <tr>
                    <td  class="p-10 border-bottom"><?=$num?></td>
                    <td  class="p-10 border-bottom"><?=$order['tracking_no']?></td>
                    <td  class="p-10 border-bottom">$<?=$order['total_price']?></td>
                    <td  class="p-10 border-bottom"><?=date('d M Y',strtotime($order['payment_time']))?></td>
                    
                    <td  class="p-10 border-bottom">
                    <a class="btn btn-primary rad-6 p-10" href="view-order.php?t=<?= $order['tracking_no'];?>"type="submit" value="<?= $order['id'];?>" id="view-order-items-btn">View Details <i class="fa-solid fa-eye"></i></a>
                    </td>
                    <?php $num++; ?>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            
        </div>
<?php
}else {
    ?>
        <h3 class="pt-5 flex-center">No previous orders <a href="all-products.php" class="c-main"> Go Shopping Now</a><i class="fas fa-shopping-cart c-main"></i></h3>
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