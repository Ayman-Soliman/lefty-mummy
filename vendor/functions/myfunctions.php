<?php
// include "../../config/dbcon.php";

function redirect($url,$msgtype, $message){
    $_SESSION[$msgtype] = $message;
    header('Location: '.$url);
    // echo"<script>window.location.href='$url'</script>";
    exit();
}
function selectAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function selectById($table,$id){
    global $con;
    $query = "SELECT * FROM $table WHERE id = $id";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectByParentId($table,$parent_id){
    global $con;
    $query = "SELECT * FROM $table WHERE parent_cat_id = $parent_id";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectByProdId($table,$prod_id){
    global $con;
    $query = "SELECT * FROM $table WHERE prod_id = $prod_id";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectByProd($table,$prod_id){
    global $con;
    $query = "SELECT * FROM $table WHERE id = $prod_id";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectSellerProd($table,$seller_id){
    global $con;
    $query = "SELECT * FROM $table WHERE seller_id = $seller_id";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function checkProdSeller($table,$prod_id,$seller_id){
    global $con;
    $query = "SELECT * FROM $table WHERE id = $prod_id AND seller_id = $seller_id";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function totalMembers(){
    global $con;
    $query = "SELECT COUNT(id) FROM users";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function totalDesigns(){
    global $con;
    $query = "SELECT COUNT(id) FROM products";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function totalSales(){
    global $con;
    $query = "SELECT COUNT(id) AS sales_count, SUM(total_price) sales_amount FROM orders";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function lastWeekSales(){
    global $con;
    $query = "SELECT COUNT(id) AS week_count, SUM(total_price) AS week_amount FROM orders WHERE payment_time BETWEEN DATE_SUB(CURRENT_TIMESTAMP(), INTERVAL 1 WEEK) AND CURRENT_TIMESTAMP()";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function lastMonthSales(){
    global $con;
    $query = "SELECT COUNT(id) AS month_count, SUM(total_price) AS month_amount FROM orders WHERE payment_time BETWEEN DATE_SUB(CURRENT_TIMESTAMP(), INTERVAL 1 MONTH) AND CURRENT_TIMESTAMP()";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function topBuyers(){
    global $con;
    // $query = "SELECT first_name FROM users WHERE id IN (SELECT user_id FROM orders)";
    
    $query = "SELECT user_id, SUM(total_price), COUNT(user_id) FROM orders
     GROUP BY user_id ORDER BY SUM(total_price) DESC LIMIT 3";
    
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function bestSelling(){
    global $con;
    // $query = "SELECT first_name FROM users WHERE id IN (SELECT user_id FROM orders)";
    
    $query = "SELECT prod_id, SUM(price), COUNT(prod_id) FROM order_items
     GROUP BY prod_id ORDER BY SUM(price) DESC ";
    
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function chat($user_id){
    global $con;
    $query = "SELECT * FROM chat WHERE (sender_id='$user_id') OR (receiver_id='$user_id') ORDER BY created_at";
    $query_run = mysqli_query($con, $query);
    
    $read_msg = '1';
    $update_unread_msg = "UPDATE chat Set read_msg='$read_msg' WHERE (sender_id='$user_id') OR (receiver_id='$user_id')";
    $update_unread_msg_run = mysqli_query($con, $update_unread_msg);
    return $query_run;
}
function unreadMsg($user_id){
    global $con;
    $query = "SELECT COUNT(id) AS unread FROM chat WHERE ((sender_id='$user_id') OR (receiver_id='$user_id')) AND read_msg='0'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function allSales(){
    global $con;
    $query = "SELECT o.id as oid, o.user_id, o.tracking_no, o.payment_time, ot.id as otid, ot.*, p.id as pid, p.prod_name, p.prod_slug, p.discription, p.original_price, p.price_discount, p.price_after_discount, p.design_file, i.id as iid, i.prod_id as iprod_id, i.thumb_image, u.id as uid, u.first_name, u.last_name
    FROM orders o, order_items ot, products p, products_images i, users u
    WHERE ot.order_id = o.id AND p.id=ot.prod_id AND i.prod_id=p.id AND u.id = o.user_id ORDER BY o.payment_time DESC";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectAllApparel(){
    global $con;
    $query = "SELECT a.id as aid,a.status as astat, a.created_at as adate, a.*, s.id as sid, s.status as stats, s.created_at as sdate, s.* FROM apparel a, stores s
    WHERE s.id = a.store_id ORDER BY s.id ASC";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}