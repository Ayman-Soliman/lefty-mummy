<?php 
    include 'includes/header.php';
    include 'functions/myfunctions.php';
    // session_start();
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
        <div class="page-content flex-1 ">
            <div class="head bg-white p-10 flex-center-between">
                <div class="search relative">
                    <input class="ml-10 pl-20" type="text" placeholder="search">
                    <i class="fas fa-search absolute"></i>
                </div>
                <div class="user-icon flex-center">
                    <i class="far fa-bell relative"></i>
                    <img class="avatar ml-10 mr-10" src="images/avatar.png" alt="">
                </div>
            </div>
            <h1 class="m-20 relative fit-content">Courses</h1>
            <div class="wrapper p-10 grid-col-5">
                <div class="course bg-white rad-10 relative overflow">
                    <img src="uploads/media-library/1728669824_lm_0.jpg" alt="">
                    <img src="images/team-01.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-04.jpg" alt="">
                    <img src="images/team-04.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-01.jpg" alt="">
                    <img src="images/team-01.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-02.jpg" alt="">
                    <img src="images/team-05.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-04.jpg" alt="">
                    <img src="images/team-04.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-03.jpg" alt="">
                    <img src="images/team-01.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-02.jpg" alt="">
                    <img src="images/team-02.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-03.jpg" alt="">
                    <img src="images/team-03.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-04.jpg" alt="">
                    <img src="images/team-05.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="images/course-05.jpg" alt="">
                    <img src="images/team-04.png" alt="" class="instractor absolute rad-50 bg-white">
                    <div class="info p-10 pb-20">
                        <h4>Mastering Web Design</h4>
                        <p class="c-grey disc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem dolor qui </p>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc">Course Info</a>
                        <div class="buyers c-grey disc">
                            <i class="fas fa-user"></i>
                            950
                        </div>
                        <div class="earn c-grey disc">
                            <i class="fas fa-dollar-sign"></i>
                            165
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>


    <script src="js/main.js"></script>
</body>
</html>