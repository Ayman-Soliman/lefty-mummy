<?php
// session_start();
// include 'functions/myfunctions.php';

?>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky"  >
        <nav class="container">
            <div class="row">
                <div class="col-12" id="update-count-parent">
                    <nav class="main-nav nav-bar" id="update-count">
                        <!-- ***** Logo Start ***** -->
                        <!-- <a href="index.html" class="logo">
                            <img src="assets/images/template/logo.png">
                        </a> -->
                        <div class="logo flex-center gap-10">
                            <a href="index.php" class="flex-center">
                                <img src="assets/images/LOGO-white-with-blackBG.webp" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects logo" class="rad-50 mr-5">
                                <span class="brand c-grey bold">Lefty Mummy</span>
                            </a>
                        </div>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"  title="Home Page"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='index.php'?'active':''?>" href="index.php" data-section=""><i class="fas fa-home"></i> Home</a></li>
                            <li class="scroll-to-section"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='blog.php'?'active':''?>" href="blog.php" data-section="">Blog</a></li>
                            <li class="scroll-to-section"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='categories.php'?'active':''?>" href="categories.php" data-section="skills" >Categories</a></li>
                            <li class="scroll-to-section"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-products.php'?'active':''?>" href="all-products.php" data-section="skills" >Products</a></li>
                            <!-- <li></li> -->
                            <li class="scroll-to-section" title="T-Shirts On Amazon"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='apparel.php'?'active':''?>" href="apparel.php?store_id=1&amazon_store=usa" data-section="skills"><i class="fas fa-shirt c-red"></i></a></li>
                            <!-- <li></li> -->
                            <?php if (isset($_SESSION['auth'])) {
                            ?>

                            <li class="scroll-to-section relative" title="Cart"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='cart.php'?'active':''?>" href="cart.php" data-section="gallery" ><i class="fas fa-shopping-cart"></i> </a>
                            <?php
                            $user_id = $_SESSION['auth_user']['id'];
                            // echo $user_id;
                            $cart = getCartItems($user_id);
                            if (mysqli_num_rows($cart)>0) {
                            ?>
                                <div class="absolute bg-red c-white p-2 rad-50 cart-count flex-center"><?=mysqli_num_rows($cart)?></div>
                            <?php
                            }
                            ?>
                            </li>
                            <!-- <li></li> -->
                            <?php
                            $wishlist = getWishlistItems($user_id);
                            
                            ?>
                            <li class="scroll-to-section relative" title="Wishlist"><a class="c-white <?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='wishlist.php'?'active':''?>" href="wishlist.php" data-section="gallery"><i class="fas fa-heart <?= mysqli_num_rows($wishlist)>0 ? "c-red":""?>"></i> </a>
                            <?php
                                if(mysqli_num_rows($wishlist)>0){
                                    ?>
                                <div class="absolute bg-red c-white p-2 rad-50 wishlist-count flex-center"><?=mysqli_num_rows($wishlist)?></div>
                            <?php
                            }
                            ?>
                            </li>
                            <!-- <li></li> -->
                            <li><a href="contact-us.php" class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='contact-us.php'?'active':''?>">Contact Us</a></li>

                        
                            <li class="submenu">
                                <a href="javascript:;">
                                    <!-- <?=$_SESSION['auth_user']['name']; ?> -->
                                    <i class="fa fa-user c-red"></i>
                                </a>
                                <ul>
                                    <?php
                                    if (isset($_SESSION['role_as'])) 
                                    {
                                        ?>
                                        <li class="">
                                        <a class="c-white" href="index.php" data-section="">Hi <?=substr($_SESSION['auth_user']['name'],0,10); ?></a>
                                        </li>
                                        <?php
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
                                    <?php
                                    if (isset($_SESSION['role_as'])) 
                                    {
                                        if ($_SESSION['role_as'] != 1) 
                                        {
                                    ?>
                                    <li><a href="chat.php">Chat With Lefty</a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                    
                                    <li class="scroll-to-section"><a class="c-white" href="logout.php" data-section="">Logout</a></li>
                                </ul>
                            </li>
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
