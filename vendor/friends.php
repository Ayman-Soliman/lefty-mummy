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
            <h1 class="m-20 relative fit-content">Friends</h1>
            <div class="wrapper p-10 grid-col-5">
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="uploads/media-library/1728669824_lm_0.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-02.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-03.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-04.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-05.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-04.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-05.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-01.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-03.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>
                <div class="friend bg-white rad-10 relative overflow p-10">
                    <div class="contact absolute flex">
                        <i class="fas fa-phone rad-50 c-grey bg-grey p-5 mr-5 block"></i>
                        <i class="far fa-envelope rad-50 c-grey bg-grey p-5 block"></i>
                    </div>
                    <div class="name pt-20 pb-20 txt-c">
                        <img src="images/friend-02.jpg" alt="" class="rad-50">
                        <h5>Ayman Soliman</h5>
                        <p class="c-grey disc">Lorem ipsum dolor sit</p>
                    </div>
                    <div class="info pt-10 pb-10 relative border-bottom">
                        <span class="absolute c-orange">VIP</span>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-users mr-10"></i>
                            99 Friends
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-project-diagram mr-10"></i>
                            15 Projects
                        </div>
                        <div class="c-grey disc pb-5">
                            <i class="fas fa-save mr-10"></i>
                            25 Articals
                        </div>
                    </div>
                    <div class="browse flex-center-between pt-10">
                        <span class="disc c-grey mr-5">Joined 28/08/1983</span>
                        <span class="disc btn bg-main c-white mr-5">Profile</span>
                        <span class="disc btn bg-red c-white">Remove</span>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="js/main.js"></script>
</body>
</html>