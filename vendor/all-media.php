<?php 
    include 'includes/header.php';
    include 'functions/myfunctions.php';

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
<div class="page-content flex-1 overflow">
    <?php include 'includes/navbar.php' ?>
    <h1 class="m-20 relative fit-content">All Media</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper p-10 grid-col-5">
        <?php
        $media_data = selectAll('media');
        if (mysqli_num_rows($media_data)>0) {
            foreach ($media_data as $media) {
            ?>
                <div class="course bg-white rad-10 relative overflow">
                    <img src="uploads/media-library/<?=$media['name']?>" alt="">
                    <!-- <img src="images/team-01.png" alt="" class="instractor absolute rad-50 bg-white"> -->
                    <div class="info p-10 pb-20">
                        <span>The Link: </span><textarea class="c-grey disc w-full p-5" readonly>vendor/uploads/media-library/<?=$media['name']?></textarea>
                        <h4><?=$media['orginal_name']?></h4>
                    </div>
                    <div class="numbers relative flex-center-between p-10">
                        <a href="#" class="absolute btn bg-main c-white disc p-5">Media Info</a>
                        <div class="buyers c-grey disc">
                            Created at
                        </div>
                        <div class="earn c-grey disc">
                            <?=date('jS M, Y',strtotime($media['created_at']))?>
                        </div>
                    </div>
                </div>
                                <?php
                                }
                            }else{
                                ?>
                                        
                                        <p class="p-20 border-bottom txt-c c-red" ><?= 'no Media in the library';?></p>
                                        
                                <?php
                                // echo 'no posts yet';
                            }
                            ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>