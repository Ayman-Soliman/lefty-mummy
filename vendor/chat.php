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
    <?php
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $users = selectById('users',$user_id);
            if (mysqli_num_rows($users)>0) {
                $all_users = mysqli_fetch_array($users);
                // echo $all_users['first_name'];
                ?>
    <h1 class="m-20 relative fit-content">Chat with <?=ucfirst($all_users['first_name'] . " " . $all_users['last_name'])?> </h1>
        <?php 
        include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
            <div class="wrapper grid-col-3 p-10">
                <div class="top-buyers bg-white p-20 txt-c-mobile rad-10 ">
                </div>
                <div id="chat-parent" class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
                    <div class="left">
                    <!-- <h2>Chat with the User</h2> -->
                    <!-- <span class="c-grey block mt-10">Contact Admin Directly</span> -->
                    </div>
                    <div id="chat" class="border-main rad-10 p-5 mt-5 chat" >
                        <?php
                        $chat_history = chat($user_id);
                        if (mysqli_num_rows($chat_history)>0) {
                            foreach ($chat_history as $chat_record) {
                                ?>
                                <div class="row flex-center-between pt-10">
                                    <h6 class="p-10 ml-5 bg-<?=$chat_record['sender_id']==$user_id?'red':'main'?>-transparent" ><?=$chat_record['sender_id']==$user_id?ucfirst($all_users['first_name']):'YOU'?> :</h6>
                                    <span class="bg-grey rad-10 p-10 m-5" ><?=$chat_record['message']?></span>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <form id="contact" class="mt-20" action="functions/handlechat.php" method="POST">
                            <textarea class="bg-grey w-full border-grey rad-6 p-5" name="message" placeholder="Your Thoughts"></textarea>
                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                            <button type="submit" id="form-submit" class="btn bg-main c-white p-5 sendMessageBtn" name="send-message-btn">Send <i class="fa fa-paper-plane"></i></button>
                        </form>
                        <div class="flex-center">
                            <a href="" class="btn bg-red c-white p-5 mt-10 block fit-content refresh-chat">Refresh Chat <i class="fa-solid fa-arrows-rotate"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else {
    redirect('users.php','message-error', 'something went wrong');
}
}

include 'includes/footer.php'
?>