<?php
session_start();
include "../config/dbcon.php";
include '../functions/myfunctions.php';

if (isset($_SESSION['auth'])) {
    if (isset($_POST['send-message-btn'])) {
        $user_id = $_SESSION['auth_user']['id'];
        $admin_id = '1';
        $message = htmlspecialchars(mysqli_real_escape_string($con,$_POST['message']));
        
        $chat_query = "INSERT INTO chat (sender_id, receiver_id, message)
        VALUES('$user_id', '$admin_id', '$message')";

        $chat_query_run = mysqli_query($con, $chat_query);
        if ($chat_query_run) {
            redirect('../chat.php',"", "");
        }else{
            redirect('../chat.php',"message_error", "Something Went Wrong");

        }
    }
}