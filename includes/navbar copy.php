<?php
include 'functions/myfunctions.php';
session_start();

?>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky"  >
        <nav class="container">
            <div class="row">
                <div class="col-12" id="cart-count-parent">
                    <nav class="main-nav nav-bar" id="cart-count">
                        <!-- ***** Logo Start ***** -->
                        <!-- <a href="index.html" class="logo">
                            <img src="assets/images/template/logo.png">
                        </a> -->
                        <div class="logo flex-center gap-10">
                            <a href="index.php" class="flex-center">
                                <img src="assets/images/LOGO-white-with-blackBG.webp" alt="" class="rad-50 mr-2">
                                <span class="brand c-grey bold">Lefty Mummy</span>
                            </a>
                        </div>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='index.php'?'active':''?>" href="index.php" data-section="">Home</a></li>
                            <li class="scroll-to-section"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='categories.php'?'active':''?>" href="categories.php" data-section="skills" >Categories</a></li>
                            <li class="scroll-to-section"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-products.php'?'active':''?>" href="all-products.php" data-section="skills" >All Products</a></li>
                            <?php if (isset($_SESSION['auth'])) {
                            ?>
                            <li class="scroll-to-section relative"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='cart.php'?'active':''?>" href="cart.php" data-section="gallery"><i class="fas fa-shopping-cart"></i> Cart</a>
                            <?php
                            $user_id = $_SESSION['auth_user']['id'];
                            // echo $user_id;
                            $cart = getCartItems($user_id);
                            if (mysqli_num_rows($cart)>0) {
                            ?>
                                <div class="absolute bg-red c-white p-2 rad-50 cart-count flex-center"><?=mysqli_num_rows($cart)?></div>
                            <?php
                            }
                            ?></li>
                            <li class="submenu">
                                <a href="javascript:;"><?=$_SESSION['auth_user']['name']; ?></a>
                                <ul>
                                    <?php
                                    if (isset($_SESSION['role_as'])) 
                                    {
                                        if ($_SESSION['role_as'] == 1) 
                                        {
                                    ?>
                                    <li class="">
                                        <a class="c-white" href="vendor/index.php" data-section="">Dashboard</a>
                                    </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <li><a href="my-orders.php">My orders</a></li>
                                    <li><a href="my-designs.php">Purchased Designs</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a class="c-white" href="logout.php" data-section="">Logout</a></li>
                            <!-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>-->

                            <?php
                            }else {
                            ?>
                            <li class="scroll-to-section"><a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='signin.php'?'active':''?> c-white" href="signin.php" data-section="">Sign in</a></li>
                            <li class="scroll-to-section"><a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='signup.php'?'active':''?> c-white" href="signup.php" data-section="">Sign up</a></li>
                            <?php
                            }
                            ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-12">
                    
                    
                    </div>
                </div> -->
        </nav>
    </header>
        <!-- ***** Header Area End ***** -->
