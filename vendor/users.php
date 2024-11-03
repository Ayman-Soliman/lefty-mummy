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
    <h1 class="m-20 relative fit-content">Users</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
        <div class="projects-table bg-white p-10 m-20 rad-10">
                <div class="top">
                    <!-- <h2>Social Media Stats</h2> -->
                </div>
                <div class="table-container">
                    <table class="auto mt-20">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey" >Image</td>
                                <td class="p-20 bg-grey" >Name</td>
                                <td class="p-20 bg-grey" >Email</td>
                                <td class="p-20 bg-grey" >Active</td>
                                <td class="p-20 bg-grey" >Created Date</td>
                                <td class="p-20 bg-grey" ><i class="fa-solid fa-message c-main"></i></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = selectAll('users');
                            if (mysqli_num_rows($users)>0) {
                                foreach ($users as $user) {
                                    if ($user['id'] != $_SESSION['auth_user']['id']) {
                                        ?>
                                    <tr>
                                        <td class="txt-c border-bottom" >
                                            <img class="rad-6" width="100" src="uploads/<?= $user['photo']?>" alt="">
                                        </td>
                                        <td class="p-20 border-bottom" ><?= $user['first_name'] ." ". $user['last_name'];?></td>
                                        <td class="p-20 border-bottom" ><?= $user['email'];?></td>
                                        <td class="p-20 border-bottom <?= $user['suspended'] ? 'c-main':'c-red';?>" ><?= $user['suspended'] ? 'Yes':'No';?></td>
                                        <td class="p-20 border-bottom" ><?= $user['created_at'];?></td>
                                        <td class="p-20 border-bottom" >
                                            <!-- <span class="bg-orange c-white btn p-5" >Edit</span> -->
                                                <a class="btn txt-c bg-main c-white rad-6 p-10 relative" href="chat.php?id=<?= $user['id'];?>" type="submit" name="chat-btn"><i class="fa-solid fa-message c-white"></i>
                                                <?php
                                                $unread_msgs = unreadMsg($user['id']);
                                                if (mysqli_num_rows($unread_msgs)>0) {
                                                    $unread_msgs_count = mysqli_fetch_array($unread_msgs);
                                                    if ($unread_msgs_count['unread'] > '0') {
                                                        ?>
                                                    <span class="absolute unread-msg flex-center bg-red rad-50"><?=$unread_msgs_count['unread']?></span>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                            }
                            ?>
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>