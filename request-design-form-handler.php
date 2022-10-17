<?php
    $transID = $_POST ['name'];
    // $company = $_POST ['company'];
    $email = $_POST ['email'];
    $message = $_POST ['design-name'];
    //in your php ignore any submissions that inlcude this field
    if(!empty($_POST['website'])) die();

    // $email_from = 'omarhamza1115@gmail.com';
    // $email_subject = "New Email From Website";
    // $email_body = "User Name: $name.\n".
    //                 "User company: $company.\n".
    //                 "User email: $email.\n".
    //                 "User message: $message.\n";
    
    $to = "contact@lefty-mummy.com";
    // $headers = "from: $email_from \r\n";
    $body="";
    $body .= "Transaction ID: ".$transID. "\r\n";
    // $body .= "Company: ".$company. "\r\n";
    $body .= "Email: ".$email. "\r\n";
    $body .= "design-name: ".$message. "\r\n";

    mail($to,$transID,$body);
    header("Location: index.html");
    
?>