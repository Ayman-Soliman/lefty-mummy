
<?php
$page_title="All Categories";

 include 'includes/header.php'?>
<?php
 include 'includes/navbar.php';
include 'includes/searchbar.php';

 ?>

<?php 
?>
<section class="categories bg" id="products">
    <div class='main-heading'>
        <h1 class='heading'>All Categories</h1>
    </div>

    <div class="container">
        <div class="row">
        <?php
            $categories = selectAllActive('categories');
            if (mysqli_num_rows($categories) > 0 ) {
                foreach ($categories as $category) {
                    ?>
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                                <li><a href="sub-categories.php?cat_id=<?=$category['id']?>&cat_name=<?=$category['cat_name']?>"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                            <img src="vendor/uploads/<?=$category['cat_image']?>" alt="<?=str_replace('_', ' ',$category['discription'])?>">
                    </div>
                    <div class="down-content">
                        <h4><?=$category['cat_name']?></h4>
                        
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
<?php include 'includes/footer.php' ?>