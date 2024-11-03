<?php

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/searchbar.php';
    include 'config/dbcon.php';
if (isset($_POST['search_btn'])) {
    $search_word = mysqli_real_escape_string($con,$_POST['search-word']);
    if ($search_word == null) {
        ?>
    <section class=" bg" id="products">
            <div class='main-heading'>
                <h2 class='heading'>No results for your search</h2>
            </div>
    </section>
    <?php
    }else{
                    $results = searchResult($search_word);
                    if (mysqli_num_rows($results)) {
?>
    <section class=" bg" id="products">
            <div class='main-heading'>
                <h1 class='heading'>Search Result</h1>
            </div>

            <div class="container">
                <div class="row">
                <!--------------------------------- repeat this gallery card------------------------------------>
                <?php
                        foreach ($results as $product) {
                            ?>
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="product.php?prod_id=<?=$product['id']?>&slug=<?=$product['prod_slug']?>"><i class="fa fa-eye"></i></a></li>
                                        <li class="addToWishlistBtn refresh-wishlist" value="<?=$product['id']?>"><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li class="addToCartBtn refresh-cart" value="<?=$product['id']?>"><a href="#" class=" "  ><i class="fa fa-shopping-cart"></i></a></li>
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
                        <section class=" bg" id="products">
                                <div class='main-heading'>
                                    <h2 class='heading'>No results for your search</h2>
                                </div>
                        </section>
                        <?php
                    }
                    ?>
                </div>
            </div>
            
    </section>

<?php
    }
}else {
    ?>
    <section class=" bg" id="products">
            <div class='main-heading'>
                <h2 class='heading'>No results for your search</h2>
            </div>
    </section>
    <?php
}
?>
    <?php include 'includes/footer.php' ?>