<?php 
ob_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/dbcon.php';
if (!isset($_SESSION['auth'])) {
    redirect('signin.php',"message_error", "Login To Countinue");
}


?>
<section class="prod-preview mb-20 container section-padding" id="wishlist_table">
    <?php
    if (isset($_SESSION['auth'])) {
        $user_id = $_SESSION['auth_user']['id'];
        $wishlist = getWishlistItems($user_id);
        if (mysqli_num_rows($wishlist)>0) {
        
    ?>
    <div class='main-heading pt-5'>
            <h1 class='heading pb-2'>Wishlist Items</h1>
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
                        <td class="p-20 disc">Delete</td>
                        <td class="p-20 disc">Add To Cart</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                $num = 1;
                foreach ($wishlist as $wishlistItem) {
                ?>
                <tr>
                    <td  class="p-10 border-bottom"><?=$num?></td>
                    <td  class="p-10 border-bottom"><img style="width: 50px; height:50px" src="vendor/designsImages/<?=$wishlistItem['thumb_image']?>" alt="<?=str_replace('_', ' ',$wishlistItem['prod_slug'])?>"></td>
                    <td  class="p-10 border-bottom"><a class="c-red" href="product.php?prod_id=<?=$wishlistItem['pid']?>&slug=<?=$wishlistItem['prod_slug']?>"><?=$wishlistItem['prod_name']?></a></td>
                    <td  class="p-10 border-bottom">$ <?=$wishlistItem['original_price']?></td>
                    <td  class="p-10 border-bottom"><?=$wishlistItem['price_discount']?>%</td>
                    <td  class="p-10 border-bottom">$ <?=$wishlistItem['price_after_discount']?></td>
                    <td  class="p-10 border-bottom">
                    <button class="btn btn-danger txt-c rad-6 p-10 refresh-wishlist" href=""type="submit" value="<?= $wishlistItem['pid'];?>" id="delete-wishlist-item-btn">Delete <i class="fas fa-trash"></i></button>
                    </td>
                    <td  class="p-10 border-bottom">
                    <button class="btn btn-primary txt-c rad-6 p-10 addToCartBtn refresh-cart" href=""type="submit" value="<?= $wishlistItem['pid'];?>" id="delete-wishlist-item-btn">Add To Cart <i class="fas fa-shopping-cart"></i></button>
                    </td>
                    <?php $total += $wishlistItem['price_after_discount']; ?>
                    <?php $num++; ?>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="6" class="p-20 bg-grey c-main bold">total : </td>
                    <td colspan="2" class="p-20 bg-grey c-main bold">$ <?=$total?></td>
                </tr>
                </tbody>
            </table>
            
        </div>
<?php
}else {
    ?>
        <h3 class="pt-5 flex-center">Your wishlist Is Empty <a href="all-products.php" class="c-main"> Go Shopping Now</a><i class="fas fa-shopping-wishlist c-main"></i></h3>
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