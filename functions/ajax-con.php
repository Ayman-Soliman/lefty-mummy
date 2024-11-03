<?php
include '../config/dbcon.php';
if (isset($_POST['email_checking'])) {
    // echo $_POST['email_check'];
    $email_check = $_POST['email_checking'];
    // global $con;
    $get_email_check_qurey =  "SELECT * FROM users WHERE email = '$email_check'";
    // $get_sub_cat_qurey =  "SELECT * FROM sub_categories WHERE parent_cat_id = $parent_cat_id";
    $email_check_run = mysqli_query($con, $get_email_check_qurey);
    if (mysqli_num_rows($email_check_run)>0) {
    echo "ok";
    }
    // }
}
if (isset($_POST['store_id'])) {
    // echo $_POST['parent_cat_id'];
    $store_id = $_POST['store_id'];
    // global $con;
    $store_qurey =  "SELECT * FROM stores WHERE id = '$store_id' LIMIT 1";
    $store_data = mysqli_query($con, $store_qurey);
    $store = mysqli_fetch_array($store_data);
    echo ('apparel.php?store_id='.$store_id.'&amazon_store='.$store['name']);
    // header("Location: ../apparel.php?store_id=".$store_id."&amazon_store=".$store['name']);

    
}