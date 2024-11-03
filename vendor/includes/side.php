<?PHP
// session_start();
?>
<aside class="side-bar shadow bg-white p-10 stiky">
            <h3 class="relative txt-c p-20 c-main"><?=$_SESSION['auth_user']['name']?></h3>
            <ul class="links pt-10">
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='index.php'?'active':''?> flex-align-center p-10 c-black" href="index.php">
                        <i class="pr-10 fas fa-chart-bar"></i>
                        <span class="link cap hide-mobile">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-categories.php'?'active':''?> flex-align-center p-10 c-black" href="all-categories.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All Categories</span>
                    </a>
                </li>
                
                <?php
                if (isset($_SESSION['role_as'])) 
                {
                    if ($_SESSION['role_as'] == 1) 
                    {
                ?>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-category.php'?'active':''?> flex-align-center p-10 c-black" href="add-category.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add Category</span>
                    </a>
                </li>
                <?php
                    }
                }
                ?>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-Sub-categories.php'?'active':''?> flex-align-center p-10 c-black" href="all-Sub-categories.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All Sub-Categories</span>
                    </a>
                </li>
                <?php
                
                if (isset($_SESSION['role_as'])) 
                {
                    if ($_SESSION['role_as'] == 1) 
                    {
                ?>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-Sub-category.php'?'active':''?> flex-align-center p-10 c-black" href="add-Sub-category.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add Sub-Category</span>
                    </a>
                </li>
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-products.php'?'active':''?> flex-align-center p-10 c-black" href="all-products.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All Products</span>
                    </a>
                </li>
                <?php
                    }
                }
                ?>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='my-products.php'?'active':''?> flex-align-center p-10 c-black" href="my-products.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">My Products</span>
                    </a>
                </li>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-product.php'?'active':''?> flex-align-center p-10 c-black" href="add-product.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add Product</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['role_as'])) 
                {
                    if ($_SESSION['role_as'] == 1) 
                    {
                ?>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-posts.php'?'active':''?> flex-align-center p-10 c-black" href="all-posts.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All posts</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-post.php'?'active':''?> flex-align-center p-10 c-black" href="add-post.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add post</span>
                    </a>
                </li>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-posts.php'?'active':''?> flex-align-center p-10 c-black" href="all-media.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All media</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-post.php'?'active':''?> flex-align-center p-10 c-black" href="add-media.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add media</span>
                    </a>
                </li>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-stores.php'?'active':''?> flex-align-center p-10 c-black" href="all-stores.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All Stores</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-amazon-store.php'?'active':''?> flex-align-center p-10 c-black" href="add-amazon-store.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add Store</span>
                    </a>
                </li>
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-apparel.php'?'active':''?> flex-align-center p-10 c-black" href="all-apparel.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All T-shirts</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-apparel.php'?'active':''?> flex-align-center p-10 c-black" href="add-apparel.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add T-shirt</span>
                    </a>
                </li>
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='all-promo-codes.php'?'active':''?> flex-align-center p-10 c-black" href="all-promo-codes.php">
                        <i class="pr-10 far fa-folder"></i>
                        <span class="link cap hide-mobile">All Promo Codes</span>
                    </a>
                </li>
                
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-promo-code.php'?'active':''?> flex-align-center p-10 c-black" href="add-promo-code.php">
                        <i class="pr-10 fas fa-plus"></i>
                        <span class="link cap hide-mobile">Add Promo Code</span>
                    </a>
                </li>
                
                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='sales.php'?'active':''?> flex-align-center p-10 c-black" href="sales.php">
                        <i class="pr-10 fas fa-chart-pie"></i>
                        <span class="link cap hide-mobile">Sales</span>
                    </a>
                </li>

                <li>
                    <a class="<?=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='users.php'?'active':''?> flex-align-center p-10 c-black" href="users.php">
                        <i class="pr-10 fas fa-user"></i>
                        <span class="link cap hide-mobile">Users</span>
                    </a>
                </li>
                <?php
                    }
                }
                ?>
                <li>
                    <a class="flex-align-center p-10 c-black" href="settings.html">
                        <i class="pr-10 fas fa-gear"></i>
                        <span class="link cap hide-mobile">settings</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="profile.html">
                        <i class="pr-10 fas fa-user"></i>
                        <span class="link cap hide-mobile">profile</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="projects.html">
                        <i class="pr-10 fas fa-folder"></i>
                        <span class="link cap hide-mobile">projects</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="courses.html">
                        <i class="pr-10 fas fa-graduation-cap"></i>
                        <span class="link cap hide-mobile">courses</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="friends.html">
                        <i class="pr-10 fas fa-users"></i>
                        <span class="link cap hide-mobile">friends</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="files.html">
                        <i class="pr-10 fas fa-file"></i>
                        <span class="link cap hide-mobile">files</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="plans.html">
                        <i class="pr-10 fas fa-edit"></i>
                        <span class="link cap hide-mobile">plans</span>
                    </a>
                </li>
                <li>
                    <a class="flex-align-center p-10 c-black" href="../logout.php">
                    <i class="pr-10 fa-solid fa-right-from-bracket"></i>
                        <span class="link cap hide-mobile">Logout</span>
                    </a>
                </li>
            </ul>
        </aside>