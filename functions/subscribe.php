<?php
session_start();
include "../config/dbcon.php";
// include '../functions/myfunctions.php';

        $visitor_name = mysqli_real_escape_string($con,$_POST['name']);
        $visitor_email = mysqli_real_escape_string($con,$_POST['email']);

        $chck_email_query = "SELECT email FROM subscription WHERE email = '$visitor_email'";
        $chck_run = mysqli_query($con, $chck_email_query);
        if (mysqli_num_rows($chck_run)>0) {
            echo 300;
        }else{

            $subscribe_query = "INSERT INTO subscription (name, email)
            VALUES('$visitor_name', '$visitor_email')";
    
            $subscribe_query_run = mysqli_query($con, $subscribe_query);
            if ($subscribe_query_run) {
                echo 201;
            }else{
                echo 500;
            }
        }
        
    