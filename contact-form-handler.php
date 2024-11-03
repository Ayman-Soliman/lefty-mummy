<?php
include 'functions/myfunctions.php';

// if (isset($_POST['contact_form_btn'])) {
    $name = htmlspecialchars(mysqli_real_escape_string($con,$_POST['name']));
    $email = htmlspecialchars(mysqli_real_escape_string($con,$_POST['email']));
    $message = htmlspecialchars(mysqli_real_escape_string($con,$_POST['message']));
    $status = htmlspecialchars(mysqli_real_escape_string($con,isset($_POST['status'])?'1':'0'));
    $to = "contact@lefty-mummy.com";
    $body="";
    $body .= "Name: ".$name. "\r\n";
    $body .= "Email: ".$email. "\r\n";
    $body .= "Message: ".$message. "\r\n";
    if ($status == '1') {


        mail($to,$name,$body);
        echo 201;
    }else{
        // echo 'Confirm you are not robot';
        echo 500;
        // $_SESSION['message_error'] = 'Confirm you are not robot';
    }
// }
?>