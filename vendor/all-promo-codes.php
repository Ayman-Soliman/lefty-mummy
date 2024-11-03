<?php 
    include 'includes/header.php';
    include 'functions/myfunctions.php';

    if (!isset($_SESSION['auth'])) {
        // $_SESSION['message_error']= 'Login To Countinue';
        // header('Location: ../signin.php');
        redirect('../signin.php',"message_error", "Login To Countinue");
    }
    
    if (isset($_SESSION['role_as'])) {
        if ($_SESSION['role_as'] != 1) {
            // $_SESSION['message_error']= 'Not Authorized';
            // header('Location: ../index.php');
            redirect('../index.php',"message_error", "Not Authorized");
        }
    }
?>
<?php include 'includes/side.php'?>
<div class="page-content flex-1 overflow">
    <?php include 'includes/navbar.php' ?>
    <h1 class="m-20 relative fit-content">All posts</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <div class="posts-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <!-- <h2>Social Media Stats</h2> -->
                </div>
                <div class="table-container" id="posts_table" >
                    <table class="auto mt-20">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >Id</td>
                                <td class="p-20 bg-grey" >Promo Code</td>
                                <td class="p-20 bg-grey" >Discount</td>
                                <td class="p-20 bg-grey" >Working Days</td>
                                <td class="p-20 bg-grey" >Starts At</td>
                                <td class="p-20 bg-grey" >Ends At</td>
                                <td class="p-20 bg-grey" >Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $promo_codes = selectAll('promo_codes');
                            if (mysqli_num_rows($promo_codes)>0) {
                                foreach ($promo_codes as $promo_code) {
                                    ?>
                                    <tr>
                                        <td class="txt-c border-bottom" >
                                            <?=$promo_code['id']?>
                                        </td>
                                        <td class="p-20 border-bottom">
                                            <?= $promo_code['promo_code'];?></td>
                                        <td class="p-20 border-bottom" >%<?=$promo_code['discount']?></td>
                                        <td class="p-20 border-bottom"><?= $promo_code['working_days']?></td>
                                        <td class="p-20 border-bottom" ><?=date('jS M, Y',strtotime($promo_code['created_at']))?></td>
                                        <?php
                                        $date =new DateTime($promo_code['created_at']);
                                        $end_date = date_add($date, date_interval_create_from_date_string($promo_code['working_days']."days"));
                                        $string_end_date = $end_date->format('jS M, Y');
                                        ?>
                                        <td class="p-20 border-bottom <?=new DateTime() >= $end_date?'c-red':''?>" ><?=$string_end_date?></td>
                                        <td class="p-20 border-bottom" >
                                                <a class="btn  txt-c bg-orange c-white rad-6 p-10" href="edit-promo-code.php?id=<?= $promo_code['id'];?>" type="submit" name="e
                                                dit-promo-btn">Edit</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="7" class="p-20 border-bottom txt-c c-red" ><?= 'no promo codes yet';?></td>
                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>