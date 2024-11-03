<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lefty Mummy Template 04</title>

        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
        
        <link rel="icon" type="image/icon" href="../assets/images/LOGO-white-with-blackBG.webp">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="assets/css/alertify.min.css">
        <link rel="stylesheet" href="assets/css/themes/default.min.css">


        <link rel="stylesheet" href="assets/css/fwork.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <!-- google fonts -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> -->

        <!-- start rich text editor files -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <!-- <link rel="stylesheet" href="css/site.css"> -->
        <?php
        if (substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-post.php' || str_contains(substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1), 'edit-post.php') || str_contains(substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1), 'add-product.php') || str_contains(substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1), 'edit-product.php') ) {    
        ?>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/richtext.min.css">
        <?php
        }
        ?>
        <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <!-- end rich text editor files -->

    </head>
<body>
    <div class="page flex">