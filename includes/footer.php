<!-- ***** Footer Start ***** -->
</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo flex-center">
                            <img src="assets/images/LOGO-white-with-blackBG.webp" alt="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects logo" style="width:6vw; height:6vw;">
                        </div>
                        <ul class="txt-c">
                            <!-- <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li> -->
                            <li class="c-white">E-Mail: <a href="#">contact@lefty-mummy.com</a></li>
                            <!-- <li><a href="#">010-020-0340</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <?php
                            $categories = selectAllActive('categories');
                            $max_no=0;
                            if (mysqli_num_rows($categories) > 0 ) {
                                foreach ($categories as $category) {
                                    if ($max_no<4) {
                                        ?>
                        <li><a href="sub-categories.php?cat_id=<?=$category['id']?>&cat_name=<?=$category['cat_name']?>"><?=$category['cat_name']?></a></li>
                        <?php
                                    }
                                    $max_no++;
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Trending Designs</h4>
                    <ul>
                        <?php
                        $max_no=0;
                        $products = selectAllTrending();
                        if (mysqli_num_rows($products) > 0 ) {
                            foreach ($products as $product) {
                                if ($max_no<4) {
                                    ?>
                        <li><a href="product.php?prod_id=<?=$product['id']?>&slug=<?=$product['prod_slug']?>"><?=$product['prod_name']?></a></li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-3">
                <h4>Useful Links</h4>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2020 Lefty Mummy Shop. All Rights Reserved. 
                        
                        <br>Design: <a href="https://lefty-mummy.com" target="_parent" title="Lefty Mymmy - Premium Laser Cutting Digital Designs for Personalized Gifts & CNC Projects">Lefty Mummy Shop</a></p>
                        <ul>
                            <li><a href="https://www.facebook.com/leftyMummy"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://youtube.com/@leftymummycompilation5340?si=RD6crPSBc-hEqq0l"><i class="fab fa-youtube"></i></a></li>
                            <!-- <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- jQuery -->
<!-- <script src="assets/js/jquery-2.1.0.min.js"></script> -->
<script src="assets/js/jquery-3.6.3.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- alertify -->
<script src="assets/js/alertify.min.js"></script>

    <!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    
    <!-- My JS File -->
    <script src="assets/js/main.js"></script>


    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

    <script>
    $(document).ready(function () {
        $('#email_check').blur(function () {
        var email_check = $(this).val();
        // console.log(email_check);
        // $.post("add-product.php",{
        //         parent_cat_id : parent_id,
        //         // "get_sub_cat" : "check_sub"
        //     },function (data, status) {
                
        //     })
        
            
            $.ajax({
                type: "POST",
                url: "functions/ajax-con.php",
                data: {
                    'email_checking' : email_check,
                    // "get_sub_cat" : "check_sub"
                },
                // dataType: "dataType",
                success: function (response) {
                    if (response == 'ok') {
                        $('#check_response').html("this email is already registered");
                        console.log(response);
                    }else{
                        $('#check_response').html("");
                        console.log(response);
                    
                    }
                }
            });
        
        })
    });
</script>
<script>
    alertify.set('notifier','position', 'top-center');
    <?php 
        if (isset($_SESSION['message_error'])) {
            ?>
            alertify.error('<?=$_SESSION['message_error']?>');
            <?php
            unset($_SESSION['message_error']);
        }
    ?>
    <?php 
        if (isset($_SESSION['message_success'])) {
            ?>
            alertify.success('<?=$_SESSION['message_success']?>');
            <?php
            unset($_SESSION['message_success']);
        }
    ?>
</script>
</body>
</html>