<?php
// ob_start();
include "../config/dbcon.php";
// include 'myfunctions.php';
session_start();

if (isset($_SESSION['auth'])) {
    if (isset($_POST['paypal_btn'])) {
        $user_id = $_SESSION['auth_user']['id'];
        $total_price = mysqli_real_escape_string($con,$_POST['total_price']);
        $payment_id = mysqli_real_escape_string($con,$_POST['payment_id']);
        $payment_time = mysqli_real_escape_string($con,$_POST['payment_time']);
        $paypal_payer_email = mysqli_real_escape_string($con,$_POST['paypal_email']);
        $paypal_payer_id = mysqli_real_escape_string($con,$_POST['paypal_payer_id']);

        $tracking_no = "LM".rand(1111,9999).substr($payment_id,5);

    //     $cat_query = "INSERT INTO categories (cat_name, cat_image, discription, keywords, status)
    // VALUES('$cat_name', '$img_name', '$discription', '$keywords', '$status')";
    $orders_query = "INSERT INTO orders (user_id, total_price, tracking_no, payment_id, payment_time)
    VALUES('$user_id', '$total_price', '$tracking_no', '$payment_id', '$payment_time')";
    $orders_query_run = mysqli_query($con,$orders_query);
    if ($orders_query_run) {
        $order_id = mysqli_insert_id($con);

        $cart_query = "SELECT c.id as cid, c.prod_id as cprod_id, p.id as pid, p.prod_name, p.discription, p.original_price, p.price_discount, p.price_after_discount, i.id as iid, i.prod_id as iprod_id, i.thumb_image
        FROM carts c, products p, products_images i
        WHERE c.prod_id=p.id AND i.prod_id = p.id AND user_id='$user_id' ORDER BY c.id DESC";

        $cart_items = mysqli_query($con, $cart_query);

        foreach ($cart_items as $item) {
            $prod_id = $item['pid'];
            $qty = '1';
            $price = $item['price_after_discount'];

            $chck_prod_sales = "SELECT * FROM product_sales WHERE prod_id = '$prod_id' LIMIT 1";
            $chck_run = mysqli_query($con, $chck_prod_sales);
        
        if (mysqli_num_rows($chck_run)>0) {
            $sales_data = mysqli_fetch_array($chck_run);
            $sales_no = $sales_data['sales_no'];
            $sales_no++;
            $update_sales = "UPDATE product_sales SET sales_no='$sales_no' WHERE prod_id='$prod_id' ";
            $update_sales_run = mysqli_query($con, $update_sales);
        }else {
            $add_sales = "INSERT INTO product_sales (prod_id) VALUES ('$prod_id')";
            $add_sales_query_run = mysqli_query($con,$add_sales);
        }

            
            $order_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price)
            VALUES('$order_id', '$prod_id', '$qty', '$price')";
            
            $order_items_query_run = mysqli_query($con,$order_items_query);
        }
        $delete_cart_query = "DELETE FROM carts WHERE user_id = '$user_id'";
        $delete_cart_query_run = mysqli_query($con,$delete_cart_query);

        
        // $_SESSION['message_success'] = 'Order Placed Successfully';
        // header('Location: ../alter.php');
        // redirect('../my-orders.php', 'message_success', 'Order Placed Successfully');
        // exit();
        
        echo 201;


    }else{
        echo 500;
    }

    }
}else {
    echo 401;
}