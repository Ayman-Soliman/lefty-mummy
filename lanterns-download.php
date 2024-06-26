<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three lanterns</title>
    <!-- font-awesome cdn link -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"> -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- custom css file -->
    <link rel="stylesheet" href="css/framework.css">
    <link rel="stylesheet" href="css/articles.css">
    <link rel="icon" type="image/icon type" href="/images/title-logo.svg">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.html">
                <img src="images/LOGO-white-with-blackBG.png" alt="" class="logo-img">
                <h2 class="logo-text">Lefty Mummmy</h2>
            </a>
        </div>
        <div class="links">
            <ul>
                <li><a href="index.html"class="active">Back to home</a></li>
                
            </ul>
        </div>
    </nav>
    <i class="nav fas fa-bars"></i>
    <!-- <section id="hire-me" class="pad-top">
        <div class="container">
            <p>Send me the lanterns design on this E-Mail</p>
            <div class="contact-form card">
                
                <form id="contact-form" method="POST" action="request-design-form-handler.php">
                    <input class="form-control" type="text" name="name" placeholder="Transaction ID" required><br>
                    <input class="form-control" type="email" name="email" placeholder="E-mail" required><br>
                    <input type="hidden" class="form-control" type="text" name="design-name" id="" placeholder="lanterns" value="lanterns" ></input><br>
                    <input type="submit" class="form-control submit" value="Send" >
                    <input type="text" id="website" name="website"/>
                </form>
            </div>
        </div>
    </section> -->
    <?php
        if (isset ($_GET['name'])) {
            if ($_GET['name'] == 'three-lanterns') {
    ?>
                # code...
                <div class="download-div">
                    <a href="/downloads/ThreeLanterns.rar" download rel="noopener noreferrer nofollow" target="_blank">Download design.</a>
                    <a class="win-rar-btn" href="/downloads/winrar351.exe" download rel="noopener noreferrer nofollow" target="_blank">Win rar program.</a>
                    <p class="win-rar">Use win rar program to extract the compressed design file </p>
                </div>
    <?php
            }
        }else {
            header('Location: index.html');
        };
    ?>
    
    <!-- jquery cdn link -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <!-- custom script file -->
    <script src="js/main.js"></script>
</body>
</html>