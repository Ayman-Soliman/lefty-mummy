<?php
    ob_start();
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'config/dbcon.php';
?>
<?php
if (isset($_GET['sub_cat_id'])) {
    $sub_cat_id = $_GET['sub_cat_id'];
    $products = selectAllActiveSubById('products', $sub_cat_id);
    if (mysqli_num_rows($products) > 0 ) {
    ?>
    <section class="products section-padding bg" id="products">
            <div class='main-heading pt-5'>
                <h1 class='heading m-5'>Products</h1>
            </div>
            
            <div class="container">
                <div class="row">
                    <!--------------------------------- repeat this gallery card------------------------------------>
                    <?php
                    $products = selectAllActiveProdById('products', $sub_cat_id);
                    if (mysqli_num_rows($products) > 0 ) {
                        foreach ($products as $product) {
                            ?>
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="product.php?prod_id=<?=$product['id']?>&slug=<?=$product['prod_slug']?>"><i class="fa fa-eye"></i></a></li>
                                        <li class="addToWishlistBtn refresh-wishlist" value="<?=$product['id']?>"><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li class="addToCartBtn refresh-cart" value="<?=$product['id']?>"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <?php
                                $images = selectImages('products_images', $product['id']);
                                if (mysqli_num_rows($images) > 0 ) {
                                    $fetch_images = mysqli_fetch_array($images);
                                ?>
                                    <img src="vendor/designsImages/<?=$fetch_images['thumb_image']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="down-content">
                                <h3><?=$product['prod_name']?></h3>
                                <h5 class="c-gold bg-black fit-content p-2 mt-2 mb-2">
                                            Price: $<?=$product['price_after_discount']?>
                                        </h5>
                                        <?php
                                        $rating = rating($product['id']);
                                        if (mysqli_num_rows($rating)>0) {
                                            $rating_data = mysqli_fetch_array($rating);
                                            $rating_count = $rating_data['rating_count'];
                                            $imaginary_count=$product['prev_rate'];
                                            $actual_rate=0;
                                            if ($rating_count>0) {
                                                $actual_rate = ($rating_data['total_rate'] + $imaginary_count*5) / ($rating_count+$imaginary_count);
                                            }else{
                                                if ($imaginary_count==0) {
                                                    $actual_rate=0;
                                                }else{
                                                    $actual_rate = ($imaginary_count*5) / $imaginary_count;
                                                }
                                            }
                                            $int_rate = floor($actual_rate);
                                            $reminder = $actual_rate - floor($actual_rate);
                                            ?>
                                            
                                            <ul class="stars c-gold d-inline-block">
                                                <?php
                                                for ($i=0; $i < $int_rate ; $i++) { 
                                                    ?>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <?php
                                                }
                                                if ($reminder >0 && $reminder <=0.5 ) {
                                                    ?>
                                                    <li>
                                                        <i class="fas fa-star-half-stroke"></i>
                                                    </li>
                                                    <?php
                                                }else if ($reminder >0.5 ) {
                                                    ?>
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                    <?php
                                                }
                                                $rest_rating = 5 - ceil($actual_rate);
                                                for ($i=0; $i < $rest_rating; $i++) { 
                                                    ?>
                                                    <li>
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                                </ul>
                                                <span class="bold" >(<?=$rating_count+$imaginary_count?> <?=($rating_count+$imaginary_count)==1?"Rate":"Rates"?> )</span>
                                                <?php
                                            }
                                            ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
    </section>
    <?php
    }else{
        ?>
    <section class="products section-padding bg" id="products">
        <div class='main-heading pt-5'>
            <h2 class='heading'>This Category has no designs</h2>
        </div>
        <a href="categories.php" class="flex-center bold">Find more designs</a>
    </section>
        <?php
    }

}
elseif (isset($_GET['parent_cat_id'])) {
    $parent_cat_id = $_GET['parent_cat_id'];
    $cat_name = $_GET['cat_name'];

    
    ?>

<section class="products section-padding bg" id="products">
    <?php
    $products = selectAllActiveById('products', $parent_cat_id);
    if (mysqli_num_rows($products) > 0 ) {
    ?>
    <div class='main-heading pt-5'>
        <h2 class='heading'><?=$cat_name?> Products</h2>
    </div>
    <div class="container">
        <div class="row">
            <?php
                foreach ($products as $product) {
            ?>
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                                <li><a href="product.php?prod_id=<?=$product['id']?>&slug=<?=$product['prod_slug']?>"><i class="fa fa-eye"></i></a></li>
                                <li class="addToWishlistBtn refresh-wishlist" value="<?=$product['id']?>"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="addToCartBtn refresh-cart" value="<?=$product['id']?>"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <?php
                        $images = selectImages('products_images', $product['id']);
                        if (mysqli_num_rows($images) > 0 ) {
                            $fetch_images = mysqli_fetch_array($images);
                        ?>
                            <img src="vendor/designsImages/<?=$fetch_images['thumb_image']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="down-content">
                        <h3><?=$product['prod_name']?></h3>
                        <h5 class="c-gold bg-black fit-content p-2 mt-2 mb-2">
                                            Price: $<?=$product['price_after_discount']?>
                                        </h5>
                        <?php
                        $rating = rating($product['id']);
                        if (mysqli_num_rows($rating)>0) {
                            $rating_data = mysqli_fetch_array($rating);
                                            $rating_count = $rating_data['rating_count'];
                                            $imaginary_count=$product['prev_rate'];
                                            $actual_rate=0;
                                            if ($rating_count>0) {
                                                $actual_rate = ($rating_data['total_rate'] + $imaginary_count*5) / ($rating_count+$imaginary_count);
                                            }
                                            $int_rate = floor($actual_rate);
                                            $reminder = $actual_rate - floor($actual_rate);
                            ?>
                            
                            <ul class="stars c-gold d-inline-block">
                                <?php
                                for ($i=0; $i < $int_rate ; $i++) { 
                                ?>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                <?php
                                }
                                if ($reminder >0 && $reminder <=0.5 ) {
                                ?>
                                    <li>
                                        <i class="fas fa-star-half-stroke"></i>
                                    </li>
                                <?php
                                }else if ($reminder >0.5 ) {
                                ?>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                <?php
                                }
                                $rest_rating = 5 - ceil($actual_rate);
                                for ($i=0; $i < $rest_rating; $i++) { 
                                ?>
                                    <li>
                                        <i class="far fa-star"></i>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <span class="bold" >(<?=$rating_count+$imaginary_count?> <?=($rating_count+$imaginary_count)==1?"Rate":"Rates"?> )</span>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
    <?php
                }
    }else {
        ?>
<section class="products section-padding bg" id="products">

<div class='main-heading pt-5'>
    <h2 class='heading'>This Category has no designs</h2>
</div>
<a href="categories.php" class="flex-center bold">Find more designs</a>
<?php
}
?>
</section>
    
            </div>
        </div>
    </section>
<?php
}else{
    redirect('all-products.php','','');
?>
<section class="products section-padding bg" id="products">

<div class='main-heading pt-5'>
    <h2 class='heading'>This Category has no designs</h2>
</div>
<a href="categories.php" class="flex-center bold">Find more designs</a>
<?php
}
?>
</section>
<?php
?>
    <?php include 'includes/footer.php' ?>