<?php 
// session_start();
ob_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/dbcon.php';
?>
<section class="prod-preview mb-20 container section-padding" id="cart_table">
    <?php
    if (isset($_SESSION['auth'])) {
        if (!$_SESSION['role_as'] == 1){
            $user_id = $_SESSION['auth_user']['id'];
            ?>
            <div class="wrapper grid-col-3 p-10">
                
                <div class="top-buyers bg-white p-20 txt-c-mobile rad-10 ">
                </div>
                <div id="chat-parent" class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
                    <div class="left">
                    <div class='main-heading pt-5 m-2'>
                        <h1 class='heading'>Chat with the Admin</h1>
                </div>
                        <span class="c-grey block mt-10">Contact Admin Directly</span>
                    </div>
                    <div id="chat" class="border-main rad-10 p-3 mt-3 chat" >
                        <?php
                        $chat_history = chat($user_id);
                        if (mysqli_num_rows($chat_history)>0) {
                            foreach ($chat_history as $chat_record) {
                                ?>
                                <div class="row flex-center-between pt-10">
                                    <h6 class="p-10 ml-3 fit-content bg-<?=$chat_record['sender_id']==$user_id?'red':'main'?>-transparent" ><?=$chat_record['sender_id']==$user_id?'YOU':'LEFTY'?> :</h6>
                                    <span class="bg-grey rad-10 p-10 m-3 fit-content" ><?=$chat_record['message']?></span>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="">
                            <form id="chat" class="mt-20" action="functions/handlechat.php" method="POST">
                                <textarea class="bg-grey w-full border-grey rad-6 p-1" name="message" placeholder="Your Thoughts"></textarea>
                                  <button type="submit" id="form-submit" class="btn btn-primary main-dark-button sendMessageBtn" name="send-message-btn">Send <i class="fa fa-paper-plane"></i></button>
                            </form>
                            <div class="flex-center">
                                <a href="" class="btn btn-danger c-white p-2 mt-10 block fit-content refresh-chat">Refresh Chat <i class="fa-solid fa-arrows-rotate"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else{
            redirect('index.php', 'message_error', 'not for admin');
            exit();
        }
    ?> 
</section>

    <?php
}else {
    $_SESSION['message_error'] = 'Log In To Continue';
    header('Location: signin.php');
    exit();
}
?>
<?php include 'includes/footer.php' ?>