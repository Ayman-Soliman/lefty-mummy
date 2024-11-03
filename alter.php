<?php
// include 'includes/header.php';
include 'includes/header copy.php';
// include 'includes/settings-box.php';
// include 'includes/navbar.php';
include 'includes/navbar copy.php';
// include 'includes/slider.php';
// include 'functions/myfunctions.php'
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
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content bg-black-transparent p-5">
                                <h4 class="">We Are Hexashop</h4>
                                <span>Awesome, clean &amp; creative HTML5 Template</span>
                                <div class="main-border-button">
                                    <a href="#">Purchase Now!</a>
                                </div>
                            </div>
                            <img src="assets/images/thumbnails/thumb-001.jpeg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Women</h4>
                                            <span>Best Clothes For Women</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Women</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <img src="assets/images/thumbnails/thumb-002.jpeg"> -->
                                        <img src="assets/images/slider/slide-001.png">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Men</h4>
                                            <span>Best Clothes For Men</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Men</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/thumbnails/thumb-004.jpeg">
                                        <!-- <img src="assets/images/slider/slide-002.png"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Kids</h4>
                                            <span>Best Clothes For Kids</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Kids</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/thumbnails/thumb-005.jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Accessories</h4>
                                            <span>Best Trend Accessories</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Accessories</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <img src="assets/images/thumbnails/thumb-005.jpeg"> -->
                                        <img src="assets/images/slider/slide-002.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section trending" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Trending Designs</h2>
                        <span>The Trending Designs in our Store.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <?php
                            $products = selectAllTrending();
                            if (mysqli_num_rows($products) > 0 ) {
                                foreach ($products as $product) {
                            ?>
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="product.php?prod_id=<?=$product['id']?>"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                                <li class="addToCartBtn refresh-cart" value="<?=$product['id']?>"><a href="#" class=" "  ><i class="fa fa-shopping-cart"></i></a></li>
                                                
                                                <!-- <button class="block bg-main border-main c-white rad-6 p-10 pointer addToCartBtn refresh-cart" id="" value="<?=$product['id']?>" ><i class="fas fa-shopping-cart"></i> Add To Cart</button> -->
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
                                        <!-- <img src="assets/images/men-01.jpg" alt=""> -->

                                    </div>
                                    <div class="down-content">
                                        <h4><?=$product['prod_name']?></h4>
                                        <div class="">
                                            <!-- <span>Old price: $<?=$product['original_price']?></span> -->
                                            <span>$<?=$product['price_after_discount']?></span>
                                            <span><?=$product['id']?></span>
                                        </div>
                                        <ul class="stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
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
    <section class="section categories" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Categories</h2>
                        <!-- <span>Details to details is what makes Hexashop different from the other themes.</span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
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
                                                        <!-- <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                                        <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li> -->
                                                    </ul>
                                                </div>
                                                <img src="vendor/uploads/<?=$category['cat_image']?>" alt="">
                                            </div>
                                            <div class="down-content">
                                                <h4><?=$category['cat_name']?></h4>
                                                <!-- <ul class="stars">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul> -->
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

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Kid's Latest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/kid-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>School Collection</h4>
                                    <span>$80.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/kid-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Summer Cap</h4>
                                    <span>$12.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/kid-03.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Classic Kid</h4>
                                    <span>$30.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/kid-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Classic Spring</h4>
                                    <span>$120.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Explore Our Products</h2>
                        <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify or edit this layout. You can convert this template as any kind of ecommerce CMS theme as you wish.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                        </div>
                        <p>There are 5 pages included in this HexaShop Template and we are providing it to you for absolutely free of charge at our TemplateMo website. There are web development costs for us.</p>
                        <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                        <div class="main-border-button">
                            <a href="products.html">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Leather Bags</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Different Types</h4>
                                    <span>Over 304 Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Social Media</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-03.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-04.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-05.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-06.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                            <div class="col-lg-5">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-5">
                            <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-2">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Phone:<br><span>010-020-0340</span></li>
                                <li>Office Location:<br><span>North Miami Beach</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->
    
        
    <section class="categories section-padding bg">
        <div class='main-heading'>
            <h2 class='heading'>Categories</h2>
            <!-- <p class='heading-para'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p> -->
        </div>
            <div class="container grid-col-4">
                <!--------------------------------- repeat this gallery card------------------------------------>
                <?php
                    $categories = selectAllActive('categories');
                    if (mysqli_num_rows($categories) > 0 ) {
                        foreach ($categories as $category) {
                            ?>
                            <a href="sub-categories.php?cat_id=<?=$category['id']?>&cat_name=<?=$category['cat_name']?>" class="flashing-card relative">
                                <h3 class="c-main pb-10 txt-c"><?=$category['cat_name']?></h3>
                                <div class="card-img">
                                    <img src="vendor/uploads/<?=$category['cat_image']?>" alt="">
                                </div>
                            </a>
                <?php
                        }
                    }
                ?>
                
            </div>
    </section>
    <section class="features gallery section-padding bg">
        <div class='main-heading'>
            <h2 class='heading'>Features</h2>
            <!-- <p class='heading-para'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p> -->
        </div>
            <div class="container grid-col-4">
                <!--------------------------------- repeat this gallery card------------------------------------>
                <div class="flashing-card relative">
                    <h3 class="c-main pb-10 txt-c">category one</h3>
                    <div class="card-img">
                        <img src="assets/images/activity-01.png" alt="">
                    </div>
                </div>
                
            </div>
    </section>
    
    
    <section class="about section-padding" id="about-us">
            <div class="container flex-center-between gap-20 wrap">
                <div class="about-text">
                    <h2 class="c-main mb-20">About Us</h2>
                    <p class="c-grey">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum adipisci excepturi id error quasi repudiandae nobis tempore reiciendis molestiae at.</p>
                </div>
                <img src="assets/images/welcome.png" alt="" class="about-img">
            </div>
    </section>
    <section class="our-skills bg-grey section-padding" id="skills">
        <div class="container">
            <h2 class="c-main txt-c">Our Skills</h2>
            <div class="skill bg-white flex-center-between">
                <span class="skill-name p-5 c-main txt-c">HTML</span>
                <div class="skill-progress m-10 flex-1 rad-6 bg-grey relative">
                    <span class="progress-bar absolute bg-main rad-6" data-width = "95%"></span>
                </div>
            </div>
            <div class="skill bg-white flex-center-between">
                <span class="skill-name p-5 c-main txt-c">CSS</span>
                <div class="skill-progress m-10 flex-1 rad-6 bg-grey relative">
                    <span class="progress-bar absolute bg-main rad-6" data-width = "85%"></span>
                </div>
            </div>
            <div class="skill bg-white flex-center-between">
                <span class="skill-name p-5 c-main txt-c">JavaScript</span>
                <div class="skill-progress m-10 flex-1 rad-6 bg-grey relative">
                    <span class="progress-bar absolute bg-main rad-6" data-width = "90%"></span>
                </div>
            </div>
            <div class="skill bg-white flex-center-between">
                <span class="skill-name p-5 c-main txt-c">PHP</span>
                <div class="skill-progress m-10 flex-1 rad-6 bg-grey relative">
                    <span class="progress-bar absolute bg-main rad-6" data-width = "70%"></span>
                </div>
            </div>
            <div class="skill bg-white flex-center-between">
                <span class="skill-name p-5 c-main txt-c">MySQL</span>
                <div class="skill-progress m-10 flex-1 rad-6 bg-grey relative">
                    <span class="progress-bar absolute bg-main rad-6" data-width = "80%"></span>
                </div>
            </div>
        </div>
    </section>
    <div class="gallery-overlay fixed w-full bg-black-transparent flex-center">
        <div class="container arrows absolute flex-center-between">
            <i class="left-arrow fas fa-chevron-left fa-3x c-white p-5 rad-6 bg-main"></i>
            <i class="right-arrow fas fa-chevron-right fa-3x c-white p-5 rad-6 bg-main"></i>
        </div>
        <div class="flashing-card relative">
            <h3 class="mb-10 txt-c c-main bold">image one</h3>
            <i class="fas fa-xmark absolute c-white fa-2x rad-50 bg-main flex-center close-overlay"></i>
            <div class="card-img">
                <img src="assets/images/gallery-02.png" alt="Image Three">
            </div>
        </div>
    </div>
    <section class="gallery section-padding bg relative" id="gallery">
        <h2 class="container c-main mb-20 txt-c">Gallery</h2>
        <div class="container grid-col-4 pt-20">
            <!--------------------------------- repeat this gallery card------------------------------------>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-02.png" alt="Image One">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-03.jpg" alt="Image Two">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-04.png" alt="Image Three">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-05.jpg" alt="Image Four">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-04.png" alt="">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-01.png" alt="">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-06.png" alt="">
                </div>
            </div>
            <div class="flashing-card">
                <div class="card-img">
                    <img src="assets/images/gallery-02.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="timeline bg-grey section-padding" id="timeline">
        <div class="container">
            <h2 class="c-main mb-20 txt-c">Timeline</h2>
            <div class="timeline-wrap relative">
                <div class="one-row relative">
                    <div class="year auto txt-c bg-main c-white  btn fit-content ">2023</div>
                    <div class="grid-col-2 gap-20 mt-20 mb-20">
                        <div class="left text rad-6 bg-white relative p-20 m-10">
                            <h4 class="c-main mb-20">Project Discription</h4>
                            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae placeat voluptates provident optio minus tenetur deserunt, nam delectus nisi velit necessitatibus esse? Voluptas culpa quo sapiente voluptate, veniam nihil!</p>
                        </div>
                        <div class="right"></div>
                    </div>
                </div>
                <div class="one-row relative">
                    <div class="year auto txt-c bg-main c-white  btn fit-content ">2022</div>
                    <div class="grid-col-2 gap-20 mt-20 mb-20">
                        <div class="left"></div>
                        <div class="right text rad-6 bg-white relative p-20 m-10">
                            <h4 class="c-main mb-20">Project Discription</h4>
                            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae placeat voluptates provident optio minus tenetur deserunt, nam delectus nisi velit necessitatibus esse? Voluptas culpa quo sapiente voluptate, veniam nihil!</p>
                        </div>
                    </div>
                </div>
                <div class="one-row relative">
                    <div class="grid-col-2 gap-20 mt-20 mb-20">
                        <div class="left"></div>
                        <div class="right text rad-6 bg-white relative p-20 m-10">
                            <h4 class="c-main mb-20">Project Discription</h4>
                            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae placeat voluptates provident optio minus tenetur deserunt, nam delectus nisi velit necessitatibus esse? Voluptas culpa quo sapiente voluptate, veniam nihil!</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="contact-us section-padding" id="contact-us">
        <h2 class="c-main mb-20 txt-c">Contact Us</h2>
        <div class="container">
            <form class=" flex-center-between gap-20" action="">
                <div class="left flex-1">
                    <input class="w-full mb-10 p-5 " type="text" placeholder="Your Name">
                    <input class="w-full mb-10 p-5" type="number" placeholder="Number">
                    <input class="w-full mb-10 p-5" type="email" placeholder="Your Email">
                    <input class="w-full p-5" type="text" placeholder="Subject">
                </div>
                <div class="right flex-1">
                    <textarea class="w-full mb-5 p-5" name="" placeholder="Your Message"></textarea>
                    <input class="bg-main c-white w-full p-5 bold" type="submit" value="Send">
                </div>
            </form>
        </div>
    </section>


    <?php include 'includes/footer.php' ?>