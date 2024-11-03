<?php
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/searchbar.php';
?>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <!-- ***** Main Banner Area Start ***** -->
    <main class="main-banner " id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content relative">
                        <div class="thumb relative">
                            <div class="inner-content txt-c flex-col flex-center">
                                <h1 class="main-heading">Lefty Mummy shop for Laser cutting Digital designs</h1>
                                <span class="p-5">Explore Awesome, clean &amp; digital designs prefect for crafting personalized gifts for everyone you love</span>
                                <div class="main-border-button">
                                    <a href="all-products.php">Shop Now!</a>
                                </div>
                            </div>
                            <img src="assets/images/thumbnails/thumb-011.jpeg" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hide-mobile">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h2 class="hd4">Birthday Gifts</h2>
                                            <span>Craft the perfect gift in minutes!</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 class="hd4">Gift Boxes</h4>
                                                <p>Create Unforgettable Momments with Unique Laser-Cut Designs.</p>
                                                <div class="main-border-button">
                                                    <a href="all-products.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/slider/slide-001.png" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h2 class="hd4">Board Games</h2>
                                            <span>Downloadable laser cut designs</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 class="hd4">Board Games</h4>
                                                <p>From friends to family, find the perfect design for your laser-cut creations.</p>
                                                <div class="main-border-button">
                                                    <a href="categories.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/thumbnails/thumb-004.jpeg" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h2 class="hd4">Kids Games</h2>
                                            <span>Best Wooden learning games for Kids</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 class="hd4">Kids Games</h4>
                                                <p>Best Wooden learning games for Kids.</p>
                                                <div class="main-border-button">
                                                    <a href="all-products.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/thumbnails/thumb-005.jpeg" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h2 class="hd4">Accessories</h2>
                                            <span>Wooden and Acrilic Accessories</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 class="hd4">Trending Designs</h4>
                                                <p>Our Trending digital designs make it easy to create heartfelt wooden gifts for evry occasion.</p>
                                                <div class="main-border-button">
                                                    <a href="#trending">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/slider/slide-002.png" alt="Trending Designs</h4>
                                                <p>Our Trending digital designs make it easy to create heartfelt wooden gifts for evry occasion.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Men Area Starts ***** -->
    <section class="section trending" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Trending Designs</h2>
                        <span><a class="" href="all-products.php">Show all designs.</a></span>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-item-carousel">
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
                                        <!-- <h5 class="c-gold bg-black fit-content p-2 mt-2 mb-2 line-through">
                                            $<?=$product['original_price']?>
                                        </h5> -->
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

    <!-- ***** Women Area Starts ***** -->
    <section class="section categories" id="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Categories</h2>
                        <span><a class="" href="categories.php">Show all categories.</a></span>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="categories-item-carousel">
                        <div class="owl-categories-item owl-carousel">
                            <?php
                            $categories = selectAllActive('categories');
                            if (mysqli_num_rows($categories) > 0 ) {
                                foreach ($categories as $category) {
                                    ?>
                                    <div class="item">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a href="sub-categories.php?cat_id=<?=$category['id']?>&cat_name=<?=$category['cat_name']?>"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="image">
                                                    <img src="vendor/uploads/<?=$category['cat_image']?>" alt="<?=str_replace('_', ' ',$category['discription'])?>">
                                                </div>
                                            </div>
                                            <div class="down-content flex-center">
                                                <h4 class="c-main"><?=$category['cat_name']?></h4>
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
    <!-- ***** Women Area Ends ***** -->
    <!-- ***** Women Area Starts ***** -->
    <section class="section shirts" id="shirts">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Our Amazon T-shirts</h2>
                        <span><a class="" href="apparel.php?store_id=1&amazon_store=usa">Show more apparel designs.</a></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-item-carousel">
                        <div class="owl-trending-item owl-carousel">
                            <?php
                            $tshirts = selectAllActive('apparel');
                            if (mysqli_num_rows($tshirts) > 0 ) {
                                $rand_arr =[];
                                for ($i=0; $i < 10; $i++) { 
                                    if (count($rand_arr)==4) {
                                        break;
                                    }
                                    $rand_id=rand(0,mysqli_num_rows($tshirts));
                                    if (!in_array($rand_id, $rand_arr)) {
                                        array_push($rand_arr,$rand_id);
                                    }
                                }
                                // print_r($rand_arr);
                                foreach ($tshirts as $tshirt) {
                                    if (in_array($tshirt['id'], $rand_arr)) {
                                ?>
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="<?=$tshirt['url']?>"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        
                                        
                                        <img src="vendor/uploads/apparel/<?=$tshirt['thumb_img']?>" alt="<?=str_replace('_', ' ',$tshirt['description'])?>">
                                    </div>
                                    <div class="down-content">
                                        <h3><?=$tshirt['title']?></h3>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section shirts" id="shirts">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Most viewed posts</h2>
                        <span><a class="" href="blog.php">Visit our blog.</a></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-item-carousel">
                        <div class="owl-trending-item owl-carousel">
                            <?php
                            $posts = selectAllActive('posts');
                            if (mysqli_num_rows($posts) > 0 ) {
                                $rand_arr =[];
                                for ($i=0; $i < 20; $i++) { 
                                    if (count($rand_arr)==4) {
                                        break;
                                    }
                                    $rand_id=rand(0,6);
                                    if (!in_array($rand_id, $rand_arr)) {
                                        array_push($rand_arr,$rand_id);
                                    }
                                }
                                // print_r($rand_arr);
                                foreach ($posts as $post) {
                                    if (in_array($post['id'], $rand_arr)) {
                                        $post_title = explode('[splithere]',$post['title']);
                                        // echo $post_title[0];
                                ?>
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        
                                        
                                        <img src="vendor/uploads/posts/<?=$post['post_cover']?>" alt="<?=str_replace('_', ' ',$post['post_sammary'])?>">
                                    </div>
                                    <div class="down-content">
                                        <h3><?=$post_title[0]?></h3>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->


    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Explore Our Products</h2>
                        <span>Discover premium laser-cut digital designs at 'Lefty-Mummy store' for creating personalized wooden gift boxes. Perfect for lovers, friends, family and more! Download now and start crafting meaningful, handmade gifts with ease.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects.</p>
                        </div>
                        <p>Explore Lefty Mummy's professiona laser-cutting and engraving designs, offering high-quality DXG, SVG and vector art files. Perfect for CNC router, plasma cutters and engraving machines, our digital patterns help you craft unique, personalized gifts with ease.</p>
                        <p>Variety of premium designed laser-cut wooden gift boxes in different shapes for wedding, birthdays, events and board games.</p>
                        <p>a place for stuning, hot selling and digital laser cutting and engraving designs. available in all types of file formats like (dxf , cdr , svg , Ai , pdf and eps).</p>
                        <div class="main-border-button">
                            <a href="all-products.php">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Hot selling designs</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/thumbnails/thumb-009.jpeg" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects"  style="max-height: 255px;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/thumbnails/thumb-010.jpeg" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects" style="max-height: 255px;">
                                </div>
                            </div>
                                <?php
                                $all_products = selectAll('products');
                                if (mysqli_num_rows($all_products)>0) {
                                    $products_no= mysqli_num_rows($all_products);
                                }
                                ?>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Different Types</h4>
                                    <span>Over <?=$products_no?> Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Subscribe To Our Newsletter To Get Special Discounts</h2>
                        <!-- <span>Details to details is what makes Hexashop different from the other themes.</span> -->
                    </div>
                    <form id="subscribe" action="functions/subscribe.php" method="POST">
                        <div class="row">
                            <div class="col-lg-5">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name" required>
                            </fieldset>
                            </div>
                            <div class="col-lg-5">
                            <fieldset>
                                <input name="email" type="email" id="email" placeholder="Your Email Address" required>
                            </fieldset>
                            </div>
                            <div class="col-lg-2">
                            <fieldset>
                                <button type="submit" id="subscribe_btn" class="main-dark-button" name="subscribe_btn"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                            <li>Email:<br><span>contact@lefty-mummy.com</span></li>
                                <li>Social Media:<br><span><a href="https://www.facebook.com/leftyMummy">Facebook</a>,<a href="https://youtube.com/@leftymummycompilation5340?si=RD6crPSBc-hEqq0l">YouTube</a>
                                <!-- , <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li> -->
                                <!-- <li>Phone:<br><span>+02-10-020-0340</span></li> -->
                            </ul>
                        </div>
                        <!-- <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>contact@lefty-mummy.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->
    
        


    <?php include 'includes/footer.php'?>