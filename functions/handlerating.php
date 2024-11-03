<?php
// ob_start();
include "../config/dbcon.php";
// include 'myfunctions.php';
session_start();

if (isset($_SESSION['auth'])) {
    if (isset($_POST['rating'])) {
        $user_id = $_SESSION['auth_user']['id'];
        $prod_id = mysqli_real_escape_string($con,$_POST['prod_id']);
        $rate = mysqli_real_escape_string($con,$_POST['rate']);

    $rating_query = "INSERT INTO rating (prod_id, user_id, rate)
    VALUES('$prod_id', '$user_id', '$rate')";
    $rating_query_run = mysqli_query($con,$rating_query);
    if ($rating_query_run) {
        // header('Location: ../alter.php');
        // redirect('../my-orders.php', 'message_success', 'Order Placed Successfully');
        // exit();
        
        echo 201;


    }else{
        echo 500;
    }

    }
}else {
    echo 401;
}