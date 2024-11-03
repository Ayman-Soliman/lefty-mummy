<?php
include "config/dbcon.php";

function redirect($url,$msgtype, $message){
    $_SESSION[$msgtype] = $message;
    header('Location: '.$url);
    exit();
}
function selectAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectAllActive($table){
    global $con;
    $query = "SELECT * FROM $table WHERE status = '1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectAllActiveById($table, $parent_cat_id){
    global $con;
    $query = "SELECT * FROM $table WHERE parent_cat_id='$parent_cat_id' AND status = '1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectAllActiveSubById($table, $sub_cat_id){
    global $con;
    $query = "SELECT * FROM $table WHERE sub_cat_id='$sub_cat_id' AND status = '1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectAllTrending(){
    global $con;
    $query = "SELECT * FROM products WHERE trending = '1' AND status = '1' ORDER BY RAND()";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectAllActiveProdById($table, $sub_cat_id){
    global $con;
    $query = "SELECT * FROM $table WHERE sub_cat_id='$sub_cat_id' AND status = '1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectImages($table, $prod_id){
    global $con;
    $query = "SELECT * FROM $table WHERE prod_id='$prod_id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectProdById($table, $prod_id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$prod_id' AND status='1' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getCartItems($user_id){
    global $con;
    $query = "SELECT c.id as cid, c.prod_id as cprod_id, p.id as pid, p.prod_name, p.prod_slug, p.discription, p.original_price, p.price_discount, p.price_after_discount, i.id as iid, i.prod_id as iprod_id, i.thumb_image
    FROM carts c, products p, products_images i
    WHERE c.prod_id=p.id AND i.prod_id = p.id AND user_id='$user_id' ORDER BY c.id DESC";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectPromoCode($promo_code){
    global $con;
    $query = "SELECT * FROM promo_codes WHERE promo_code='$promo_code' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getWishlistItems($user_id){
    global $con;
    $query = "SELECT w.id as wid, w.prod_id as wprod_id, p.id as pid, p.prod_name, p.prod_slug, p.discription, p.original_price, p.price_discount, p.price_after_discount, i.id as iid, i.prod_id as iprod_id, i.thumb_image
    FROM wishlist w, products p, products_images i
    WHERE w.prod_id=p.id AND i.prod_id = p.id AND user_id='$user_id' ORDER BY w.id DESC";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function getOrders($user_id){
    global $con;
    $query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC ";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function validTrackingNo($user_id, $t){
    global $con;
    $query = "SELECT * FROM orders WHERE tracking_no = '$t' AND user_id = '$user_id' ";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function orderDetails($user_id, $t){
    global $con;
    $query = "SELECT o.id as oid, o.tracking_no, ot.id as otid, ot.*,p.id as pid, p.prod_name, p.discription, p.original_price, p.price_discount, p.price_after_discount, p.design_file, P.prod_slug, i.id as iid, i.prod_id as iprod_id, i.thumb_image
    FROM orders o, order_items ot, products p, products_images i
    WHERE o.tracking_no='$t' AND o.user_id='$user_id' AND ot.order_id = o.id AND p.id=ot.prod_id AND i.prod_id=p.id ORDER BY o.id DESC";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function allPurchasedDesigns($user_id){
    global $con;
    $query = "SELECT o.id as oid, o.tracking_no, o.payment_time, ot.id as otid, ot.*, p.id as pid, p.prod_name, p.prod_slug, p.discription, p.original_price, p.price_discount, p.price_after_discount, p.design_file, i.id as iid, i.prod_id as iprod_id, i.thumb_image
    FROM orders o, order_items ot, products p, products_images i
    WHERE o.user_id='$user_id' AND ot.order_id = o.id AND p.id=ot.prod_id AND i.prod_id=p.id ORDER BY o.id DESC";

    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function chat($user_id){
    global $con;
    $query = "SELECT * FROM chat WHERE (sender_id='$user_id') OR (receiver_id='$user_id') ORDER BY created_at";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function rating($prod_id){
    global $con;
    $query = "SELECT COUNT(id) AS rating_count, SUM(rate) AS total_rate FROM rating WHERE (prod_id='$prod_id')";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function checkPrevPurchase($user_id, $prod_id){
    global $con;
    $query = "SELECT o.id AS oid, order_id, prod_id FROM orders o, order_items WHERE user_id='$user_id' AND order_id= o.id AND prod_id='$prod_id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function checkRating($prod_id, $user_id){
    global $con;
    $query = "SELECT * FROM rating WHERE prod_id='$prod_id' AND user_id='$user_id'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function searchResult($search_word){
    global $con;
    $query = "SELECT * FROM products WHERE prod_name LIKE '%$search_word%'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectOneById($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
function selectApparelByStore($store_id){
    global $con;
    $query = "SELECT * FROM apparel WHERE store_id='$store_id' AND status='1'";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}
