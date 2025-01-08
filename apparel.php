<?php
$page_title="Amazon Apparel";
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'config/dbcon.php';
?>

    <section class="products bg section-padding" id="products">
            <div class='main-heading '>
                <?php
                if (isset($_GET['store_id'])) {
                    $store_id = $_GET['store_id'];
                    $store_name = selectOneById('stores', $store_id);
                    if (mysqli_num_rows($store_name)>0) {
                        $store = mysqli_fetch_array($store_name);
                    }else {
                        $store['name'] = "USA";
                    }
                    ?>
                <h1 class='heading pt-5 m-2'>Available Apparel on Amazon <span class="c-red"> (<?=$store['name']?>)</span></h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="relative">
                        <label class=" bold c-black" for="">Select Amazon Store:</label>
                        <div class="relative inline">
                            <select id="store_change" class=" mb-10 p-10 bg-grey" name="store_id" required>
                            <option disabled hidden>Choose Amazon Store...</option>
                            <?php
                                $stores = selectAll("stores");
                                foreach($stores as $store ){
                                    ?>
                                    <option value="<?=$store['id']?>" <?=$store['id']==$store_id?'selected':''?> ><?=$store['name']?></option>;
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                        <?php
                        $apparel = selectApparelByStore($store_id);
                        if (mysqli_num_rows($apparel) > 0 ) {
                            ?>
                    <div class="wrapper grid-col-3 p-10">
                            <?php
                            foreach ($apparel as $tshirt) {
                        ?>
                            <div class="card" style="">
                                <img src="vendor/uploads/apparel/<?=$tshirt['thumb_img']?>" class="card-img-top" alt="<?=str_replace('_', ' ',$tshirt['slug'])?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$tshirt['title']?></h5>
                                    <p class="card-text"><?=$tshirt['description']?></p>
                                    <p class="card-text c-orange">$<?=$tshirt['price']?></p>
                                    
                                    <a href="<?=$tshirt['url']?>" class="btn btn-primary">View On Amazon</a>
                                </div>
                            </div>
                        <?php
                            }
                        }else {
                            ?>
                            <div class="flex-center">
                                <h3 class="pt-5 txt-c">No Apparel Available In This Store </h3>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                        <?php
                    }
                        ?>
                </div>
            </div>
    </section>
    <?php include 'includes/footer.php' ?>