<?php
session_start();
include "../config/dbcon.php";

if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case 'add':
                $prod_id = $_POST['prod_id'];
                $user_id = $_SESSION['auth_user']['id'];
                $check_existing = "SELECT * FROM wishlist WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                $check_existing_run = mysqli_query($con,$check_existing);
                if (mysqli_num_rows($check_existing_run)>0) {
                    echo 'existing';
                }
                else{
                    $add_to_wishlist_query = "INSERT INTO wishlist (prod_id, user_id) VALUES ('$prod_id','$user_id')";
                    $add_to_wishlist_query_run = mysqli_query($con, $add_to_wishlist_query);
                    if ($add_to_wishlist_query_run) {
                        echo 201;
                    }else {
                        echo 500;
                    }
                }
            break;
            case 'delete':
                $prod_id = $_POST['prod_id'];
                $user_id = $_SESSION['auth_user']['id'];
                $check_existing = "SELECT * FROM wishlist WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                $check_existing_run = mysqli_query($con,$check_existing);
                if (mysqli_num_rows($check_existing_run)>0) {
                    $delete_wishlist_item = "DELETE FROM wishlist WHERE prod_id='$prod_id' AND user_id='$user_id'";
                    $delete_wishlist_item_run = mysqli_query($con, $delete_wishlist_item);
                    if ($delete_wishlist_item_run) {
                        # code...
                        // echo 'deleted';
                        echo 201;
                    }else {
                        # code...
                        echo 500;
                    }
                }
                else{
                    echo 500;
                }
            break;
                
            default:
            # code...
            break;
        }
    }
}else {
    echo 401;
}