<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'functions/myfunctions.php';
if (isset($_GET['prod_id'])) {
    $prod_id = htmlspecialchars(mysqli_real_escape_string($con,$_GET['prod_id']));
    // echo $prod_id;
    $get_product = selectProdById('products', $prod_id);
    if (mysqli_num_rows($get_product) > 0 ) {
        $product = mysqli_fetch_array($get_product);
        $description = explode('[splithere]',$product['discription']);
        $unique_description = '"'. ltrim(substr(strip_tags($description[0]),0 ,150)).'..."';
    }
}
if (isset($_GET['post_id'])) {
    $post_id = htmlspecialchars(mysqli_real_escape_string($con,$_GET['post_id']));
    
    $get_post = selectOneById('posts', $post_id);
    if (mysqli_num_rows($get_post) > 0 ) {
        $post = mysqli_fetch_array($get_post);
        $description = explode('[splithere]',$post['post_sammary']);
        $unique_description = '"'.ltrim(substr(strip_tags($description[0]),0 ,150)).'..."';
    }
}
?>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <!-- <title>Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects</title> -->

    <title><?=isset($page_title)?"Lefty Mummy".": ".str_replace('_', ' ',$page_title) :"Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects"?></title>

    <meta name="description" content=<?=isset($unique_description)?$unique_description:'"Discover premium laser-cut digital designs at Lefty-Mummy store for creating personalized wooden gift boxes. Perfect for lovers, friends, family and more! Download now and start crafting meaningful, handmade gifts with ease."'?>/>

    <meta name="keywords" content="laser cutting designs, digital files, instant download, CNC router files, vector art, engraving machines, laser CNC, wooden gift boxes,MDF wood,glowforge, trending alphbet boxes designs, plywood, custom gift designs, personalized gifts, digital patterns, DXF, Coreldraw, CDR, SVG, vector designs, Lefty Mummy Store, Laser cut wooden boxes designs, Digital designs for laser cutting, Laser cutting design files, wooden gift box digital files, Downloadable laser cut designs, Laser cut designs for hobbyists, laser cutting for small businesses, laser cut designs for kids's gifts, kids games, wooden board games,laser cut wedding gift boxes, ready-to-cut laser designs, laser cut birthday gift designs, laser cut designs for anniversaries,handmade laser cut gifts for family, DXF laser cutting files, SVG files for laser cutting, Downloadable CDR laser cut designs, lase cut design files in PDF format, CNC-ready laser cut templates, Downloadable digital files for laser cutting wooden gift boxes, How to make a wooden gift box with laser cutter, Easy laser cut designs for wooden gift boxes, Digital templates for laser cut personalized gifts, laser cut designs for custom wooden boxes, best laser cut design files for personalized gifts, unique wooden box designs for laser cutting machines, Acrylic designs"/>

    <meta name="robots" content="index, follow"/>
    
    <link rel="canonical" href="https://www.lefty-mummy.com">
    
    <meta property="og:title" content="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects"/>
    
    <meta property="og:description" content="Discover premium laser-cut digital designs at 'Lefty-Mummy store' for creating personalized wooden gift boxes. Perfect for lovers, friends, family and more! Download now and start crafting meaningful, handmade gifts with ease."/>
    
    <meta property="og:url" content="https://www.lefty-mummy.com"/>
    
    <meta property="og:image" content="https://www.lefty-mummy.com/assets/images/slider/slide-001"/>
    
    <meta name="twitter:card" content="summary_large_image"/>
    
    <meta name="twitter:title" content="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects"/>
    
    <meta name="twitter:description" content="Discover premium laser-cut digital designs at 'Lefty-Mummy store' for creating personalized wooden gift boxes. Perfect for lovers, friends, family and more! Download now and start crafting meaningful, handmade gifts with ease."/>
    
    <meta property="twitter:image" content="https://www.lefty-mummy.com/assets/images/slider/slide-001"/>

    <meta name="author" content="Lefty Mummy"/>
    

    <!-- <meta name="description" content="Explore Lefty Mummy's professional laser-cutting and engraving designs, pffering high-quality DXF, SVG and vector art files. Perfect for CNC routers, plasma cutters, and engraving machines, our digital patterns help you craft unique, personalized gifts with ease.">
    <meta name="author" content=""> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> -->

    
    
    

    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <!-- <link rel="stylesheet" href="assets/css/lightbox.css"> -->


    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/alertify.min.css">
    <link rel="stylesheet" href="assets/css/themes/default.min.css">

    <link rel="stylesheet" href="assets/css/fwork.css">

    <link rel="icon" type="image/icon" href="assets/images/LOGO-white-with-blackBG.webp">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"> -->
</head>
<body >
    <div class="container">