<?php
    $name = $_POST ['name'];
    // $company = $_POST ['company'];
    $email = $_POST ['email'];
    $message = $_POST ['message'];

    // $email_from = 'omarhamza1115@gmail.com';
    // $email_subject = "New Email From Website";
    // $email_body = "User Name: $name.\n".
    //                 "User company: $company.\n".
    //                 "User email: $email.\n".
    //                 "User message: $message.\n";
    
    $to = "contact@lefty-mummy.com";
    // $headers = "from: $email_from \r\n";
    $body="";
    $body .= "From: ".$name. "\r\n";
    // $body .= "Company: ".$company. "\r\n";
    $body .= "Email: ".$email. "\r\n";
    $body .= "Message: ".$message. "\r\n";

    mail($to,$name,$body);
    header("Location: index.html");
    
?>