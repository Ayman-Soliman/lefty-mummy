<?php
    ob_start();
    include 'includes/header.php';
    include 'includes/navbar.php';
include 'includes/searchbar.php';

    include 'config/dbcon.php';
?>
<?php
if (isset($_GET['cat_id'])) {
    $parent_cat_id = $_GET['cat_id'];
    $parent_cat_name = $_GET['cat_name'];
}

$sub_categories = selectAllActiveById('sub_categories', $parent_cat_id);
if (mysqli_num_rows($sub_categories) > 0 ) {
?>
<section class="sub-categories bg" id="products">
        <div class='main-heading'>
            <h1 class='heading'>Sub Categories</h1>
        </div>
        <div class="container">
            <div class="row">
            <!--------------------------------- repeat this gallery card------------------------------------>
            <?php
                $sub_categories = selectAllActiveById('sub_categories', $parent_cat_id);
                if (mysqli_num_rows($sub_categories) > 0 ) {
                    foreach ($sub_categories as $sub_category) {
                        ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="products.php?sub_cat_id=<?=$sub_category['id']?>"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                                <img src="vendor/uploads/<?=$sub_category['sub_cat_image']?>" alt="<?=str_replace('_', ' ',$sub_category['discription'])?>">
                        </div>
                        <div class="down-content">
                            <h4><?=$sub_category['sub_cat_name']?></h4>
                            
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

    redirect('products.php?parent_cat_id='.$parent_cat_id.'&cat_name='.$parent_cat_name,"", "");
}
?>
    <?php include 'includes/footer.php' ?>