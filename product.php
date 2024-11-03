<?php
if (isset($_GET['slug'])) {
    $page_title=$_GET['slug'];
}
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'config/dbcon.php';
    if (isset($_GET['prod_id'])) {
        $prod_id = $_GET['prod_id'];
        
        $get_product = selectProdById('products', $prod_id);
        if (mysqli_num_rows($get_product) > 0 ) {
            $product = mysqli_fetch_array($get_product);
            
        ?>
<?php
    ?>

<section class="prod-preview mb-20 container section-padding">
    <div class='main-heading pt-5'>
            <h1 class='heading m-5'><?=$product['prod_name']?></h1>
            <!-- <p class='heading-para'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p> -->
    </div>
    <?php
    $images = selectImages('products_images', $product['id']);
    if (mysqli_num_rows($images) > 0 ) {
        $fetch_images = mysqli_fetch_array($images);
        ?>
            <div class="grid-col-2 product-page">
                <div class="images flex">
                    <div class="small-iamges">
                        <div class="small-img active first pointer" style="width: 110px; height:110px;">
                            <img src="vendor/designsImages/<?=$fetch_images['thumb_image']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                        </div>
                        <?php
                        if ($fetch_images['img_one']) {
                        ?>
                        <div class="small-img pointer" style="width: 110px; height:110px;">
                            <img src="vendor/designsImages/<?=$fetch_images['img_one']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($fetch_images['img_two']) {
                        ?>
                        <div class="small-img pointer" style="width: 110px; height:110px;">
                            <img src="vendor/designsImages/<?=$fetch_images['img_two']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($fetch_images['img_three']) {
                        ?>
                        <div class="small-img pointer" style="width: 110px; height:110px;">
                            <img src="vendor/designsImages/<?=$fetch_images['img_three']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if ($fetch_images['img_four']) {
                        ?>
                        <div class="small-img pointer" style="width: 110px; height:110px;">
                            <img src="vendor/designsImages/<?=$fetch_images['img_four']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="big-image p-1 m-2">
                        <img src="vendor/designsImages/<?=$fetch_images['thumb_image']?>" alt="<?=str_replace('_', ' ',$product['prod_slug'])?>">
                    </div>
                </div>
                <div class="content relative">
                    <?php
                    if ($product['price_discount']>0) {
                        ?>
                    <h3 class="price"> <strong class="c-grey">Original Price:</strong><span class="after c-grey"> $<?=$product['original_price']?> </span></h3>
                    <h2 class="price p-20 bg-red rad-50 fit-content flex-center absolute" style="height: 100px; width: 100px;top: 0; right: 0;transform:rotate(-20deg)"><span class="after c-white"> <?=$product['price_discount']?>%</span></h2>
                        <?php
                    }
                    ?>
                    <h2 class="price"> <strong class="c-main">Price :</strong><span class="after c-gold"> $<?=$product['price_after_discount']?> </span></h2>
                    <!--<h4 class="price"> <strong> use this coupon to get 50% off:</strong><span class="after"> 50SALE</span></h4>-->
                    
                    <?php
                    $rating = rating($prod_id);
                    if (mysqli_num_rows($rating)>0) {
                        $rating_data = mysqli_fetch_array($rating);
                        $rating_count = $rating_data['rating_count'];
                        $imaginary_count=$product['prev_rate'];
                        $actual_rate=0;
                        // echo $rating_count+$imaginary_count;
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
                        
                        <div class="stars c-gold d-inline-block">
                            <?php
                            for ($i=0; $i < $int_rate ; $i++) { 
                                ?>
                            <i class="fas fa-star"></i>
                                <?php
                            }
                            if ($reminder >0 && $reminder <=0.5 ) {
                                ?>
                            <i class="fas fa-star-half-stroke"></i>
                                <?php
                            }else if ($reminder >0.5 ) {
                                ?>
                            <i class="fas fa-star"></i>
                                <?php
                            }
                            $rest_rating = 5 - ceil($actual_rate);
                            for ($i=0; $i < $rest_rating; $i++) { 
                                ?>
                            <i class="far fa-star"></i>
                                <?php
                            }
                            ?>
                        </div>
                            <span class="bold" >(<?=$rating_count+$imaginary_count?>)</span>
                            <?php
                        }
                        ?>
                            <?php
                            $description = explode('[splithere]',$product['discription']);
                            ?>
                            <div class="language-tabs pt-4">
                                <ul class="nav nav-tabs lang">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" data-lang="english">English</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-lang="spanish">Spanish</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-lang="french">French</a>
                                    </li>
                                </ul>
                                <div class="lang-desc english">
                                    <p class="description mt-10 mb-10 w-full"><strong class="c-main block">Description : </strong></p>
                                    <div class="description mt-10 mb-10 w-full"><?=$description[0]?></div>
                                </div>
                                <div class="lang-desc spanish">
                                    <div class="description mt-10 mb-10 w-full"><strong class="c-main block">Descripción : </strong></div>
                                    <div class="description mt-10 mb-10 w-full"><?=count($description)>1?$description[1]:$description[0]?></div>
                                </div>
                                <div class="lang-desc french">
                                    <p class="description mt-10 mb-10 w-full"><strong class="c-main block">Description : </strong></p>
                                    <p class="description mt-10 mb-10 w-full"><?=count($description)>2?$description[2]:$description[0]?></p>
                                </div>
                            </div>
            
                    <button class="btn btn-primary rad-6 p-10 pointer addToCartBtn refresh-cart" id="" value="<?=$product['id']?>" ><i class="fas fa-shopping-cart"></i> Add To Cart</button>
                    

                    <button class="btn btn-danger addToWishlistBtn refresh-wishlist rad-6 p-10 pointer" id="" value="<?=$product['id']?>" ><i class="fa fa-star"></i> Add To Wishlist</button>
                    
                </div>
            </div>
            <?php
            if (isset($_SESSION['auth_user']['id'])) {
                
                $user_id = $_SESSION['auth_user']['id'];
                $purchased = checkPrevPurchase($user_id, $prod_id);
                if (mysqli_num_rows($purchased)>0) {
                    
                
                    $chk_rate = checkRating($prod_id, $user_id);
                    if (!mysqli_num_rows($chk_rate)>0) {
                        ?>
            <div class="rate mt-5">
                <h4 class="price"> <strong class="c-red">Rate the Design :</strong></h4>
                <div class="star">
                    <span>1 star : </span>
                    <a class="pointer c-black ratingBtn" value="<?=$prod_id?>" data-rating="1">
                        <i class="fas fa-star-half-stroke"></i>
                    </a>
                </div>
                <div class="star">
                    <span>2 stars : </span>
                    <a class="pointer c-black ratingBtn" value="<?=$prod_id?>" data-rating="2">
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                    </a>
                </div>
                <div class="star">
                    <span>3 stars : </span>
                    <a class="pointer c-black ratingBtn" value="<?=$prod_id?>" data-rating="3">
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                    </a>
                </div>
                <div class="star">
                    <span>4 stars : </span>
                    <a class="pointer c-black ratingBtn" value="<?=$prod_id?>" data-rating="4">
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                    </a>
                </div>
                <div class="star">
                    <span>5 stars : </span>
                    <a class="pointer c-black ratingBtn" value="<?=$prod_id?>" data-rating="5">
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                        <i class="fas fa-star-half-stroke"></i>
                    </a>
                </div>
            </div>
                    <?php
                    }
                }
            }
                    ?>
        <?php
    }
    ?>
</section>
<!-- ***** Men Area Starts ***** -->
<section class="section trending" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Related Design</h2>
                        <!-- <span>The Trending Designs in our Store.</span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-item-carousel">
                        <div class="owl-trending-item owl-carousel">
                            <?php
                            $products = selectAllTrending();
                            if (mysqli_num_rows($products) > 0 ) {
                                foreach ($products as $product) {
                            ?>
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="product.php?prod_id=<?=$product['id']?>&slug=<?=$product['prod_slug']?>"><i class="fa fa-eye"></i></a></li>
                                                <li class="addToWishlistBtn refresh-wishlist" value="<?=$product['id']?>"><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li class="addToCartBtn refresh-cart" value="<?=$product['id']?>"><a href="#" class="" ><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <?php
                                        $images = selectImages('products_images', $product['id']);
                                        if (mysqli_num_rows($images) > 0 ) {
                                            $fetch_images = mysqli_fetch_array($images);
                                            ?>
                                        <img src="vendor/designsImages/<?=$fetch_images['thumb_image']?>" alt="">
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
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->
    <?php
    }
    else {
        redirect('categories.php',"message_error", "Product not found");
    }
}


    ?>

    <?php include 'includes/footer.php' ?>