<?php
session_start();
include '../../config/dbcon.php';
include '../functions/myfunctions.php';

if (isset($_SESSION['auth'])) {
    if (isset($_POST['send-message-btn'])) {
        $admin_id = $_SESSION['auth_user']['id'];
         $user_id = mysqli_real_escape_string($con,$_POST['user_id']);
        $message = mysqli_real_escape_string($con,$_POST['message']);
        
        $chat_query = "INSERT INTO chat (sender_id, receiver_id, message)
        VALUES('$admin_id', '$user_id', '$message')";

        $chat_query_run = mysqli_query($con, $chat_query);
        if ($chat_query_run) {
            redirect('../chat.php?id='.$user_id,"", "");
        }else{
            redirect('../chat.php?id='.$user_id,"message_error", "Something Went Wrong");

        }
    }
}