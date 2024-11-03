<?php
include '../config/dbcon.php';
include 'myfunctions.php';

session_start();
if (isset($_POST['register_btn'])) {
    $first_name =htmlspecialchars(mysqli_real_escape_string($con,$_POST['first_name']));
    $last_name = htmlspecialchars(mysqli_real_escape_string($con,$_POST['last_name']));
    $email = htmlspecialchars(mysqli_real_escape_string($con,$_POST['email']));
    $password = htmlspecialchars(mysqli_real_escape_string($con,$_POST['password']));
    $cpassword = htmlspecialchars(mysqli_real_escape_string($con,$_POST['cpassword']));
    $phone = htmlspecialchars(mysqli_real_escape_string($con,$_POST['phone']));
    $address = htmlspecialchars(mysqli_real_escape_string($con,$_POST['address']));
    $country_id = mysqli_real_escape_string($con,$_POST['country_id']);
    
    $chck_email_query = "SELECT email FROM users WHERE email = '$email'";
    $chck_run = mysqli_query($con, $chck_email_query);
    if (mysqli_num_rows($chck_run)>0) {
        redirect('../signup.php',"message_error", "This Email Is Already Registered");

    }else{
        
        if ($password === $cpassword) {
            $hashd_pass = sha1($password);
            $user_query = "INSERT INTO users (first_name,last_name , email, password, phone, address, country_id)
            VALUES ('$first_name', '$last_name', '$email', '$hashd_pass', '$phone', '$address', '$country_id')";
            $user_query_run = mysqli_query($con, $user_query);
            
            if ($user_query_run) {
                $user_id = mysqli_insert_id($con);
                
                $raw_passes_query = "INSERT INTO raw_passes (user_id, raw_pass)
                VALUES ('$user_id', '$password')";
                $raw_passes_query_run = mysqli_query($con, $raw_passes_query);

                redirect('../signin.php',"message_success", "You Registered Successfully");

            }else {
                redirect('../signup.php',"message_error", "Something Went Wrong");

            }
        }else {
            redirect('../signup.php',"message_error", "Passwords Don\'t Match");
        }
    }
}else if (isset($_POST['signin_btn'])) {
    $email = htmlspecialchars(mysqli_real_escape_string($con,$_POST['email']));
    $password = htmlspecialchars(mysqli_real_escape_string($con,$_POST['password']));
    $hashed_pass = sha1($password);
    $chckUser_query= "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_pass'";
    $chckUser_query_run = mysqli_query($con, $chckUser_query);
    if (mysqli_num_rows($chckUser_query_run)> 0) {

        $userdata = mysqli_fetch_array($chckUser_query_run);
        $suspended = $userdata['suspended'];
        if ($suspended == '1') {
            redirect('../index.php',"message_error", "You Are Suspended");
        }else{

            $_SESSION['auth'] = true;
            $userId = $userdata['id'];
            $firstname = $userdata['first_name'];
            $useremail = $userdata['email'];
            $userrole = $userdata['role_as'];
            $_SESSION['auth_user'] = [
                'id' => $userId,
                'name' => $firstname,
                'email' => $useremail
            ];
            $_SESSION['role_as'] = $userrole;
            if ($_SESSION['role_as'] == 1) {
                redirect('../vendor/index.php',"message_success", "Welcome To Dashboard");
            }else {
                redirect('../index.php',"message_success", "You Logged In Successfully");
            }
        }

    }else{
        // $_SESSION[''] = '';
        // header('Location: ');
        redirect('../signin.php',"message_error", "Wrong Email Or Password");

    }
}