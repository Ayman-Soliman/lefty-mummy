<?php 
ob_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/dbcon.php';

if (!isset($_SESSION['auth'])) {
    redirect('signin.php',"message_error", "Login To Countinue");
}

?>
<section class="prod-preview mb-20 container section-padding" id="cart_table">
<?php
if (isset($_SESSION['auth'])) {
    $user_id = $_SESSION['auth_user']['id'];
    $cart = getCartItems($user_id);
    if (mysqli_num_rows($cart)>0) {
    
?>
    <div class='main-heading pt-5'>
            <h1 class='heading pb-2'>Checkout</h1>
            
                <div class="table-container flex-center" >
                    <table class="w-full">
                        <thead class="bold">
                            <tr>
                                <td class="p-20 bg-grey disc">#</td>
                                <td class="p-20 bg-grey disc">Image</td>
                                <td class="p-20 bg-grey disc">Name</td>
                                <td class="p-20 bg-grey disc">Original Price</td>
                                <td class="p-20 bg-grey disc">Discount</td>
                                <td class="p-20 bg-grey disc">Price</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        $num = 1;
                        foreach ($cart as $cartItem) {
                        ?>
                        <tr>
                            <td  class="p-10 border-bottom"><?=$num?></td>
                            <td  class="p-10 border-bottom"><img style="width: 50px; height:50px" src="vendor/designsImages/<?=$cartItem['thumb_image']?>" alt="<?=str_replace('_', ' ',$cartItem['prod_slug'])?>"></td>
                            <td  class="p-10 border-bottom"><a class="c-red" href="product.php?prod_id=<?=$cartItem['pid']?>&slug=<?=$cartItem['prod_slug']?>"><?=$cartItem['prod_name']?></a></td>
                            <td  class="p-10 border-bottom">$ <?=$cartItem['original_price']?></td>
                            <td  class="p-10 border-bottom"><?=$cartItem['price_discount']?>%</td>
                            <td  class="p-10 border-bottom">$ <?=$cartItem['price_after_discount']?></td>
                            <?php $total += $cartItem['price_after_discount']; ?>
                            <?php $num++; ?>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="5" class="p-20 bg-grey c-main bold">total : </td>
                            <td colspan="2" class="p-20 bg-grey c-main bold">$ <?=$total?></td>
                        </tr>
                        <?php
                            $promo_code_disc = 0;
                            if (isset($_POST['promo_code_btn'])) {
                                $promo_code = mysqli_real_escape_string($con,$_POST['promo_code']);
                                $promo_code_data = selectPromoCode($promo_code);
                                if (mysqli_num_rows($promo_code_data)>0) {
                                    $p_c = mysqli_fetch_array($promo_code_data);
                                    $date =new DateTime($p_c['created_at']);
                                    $end_date = date_add($date, date_interval_create_from_date_string($p_c['working_days']."days"));
                                    $valid = new DateTime() < $end_date;
                                    if ($valid) {
                                        $promo_code_disc=(int)$p_c['discount'];
                                        $total = ($total*(100-$promo_code_disc))/100;
                                        ?>
                            <tr>
                                <td colspan="5" class="p-20 c-red bold">you got discount : </td>
                                <td colspan="2" class="p-20 c-red bold">% <?=$promo_code_disc?></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="p-20 bg-grey c-main bold">total after discount : </td>
                                <td colspan="2" class="p-20 bg-grey c-main bold">$ <?=$total?></td>
                            </tr>
                            <?php
                                    }else{
                                        ?>
                            <tr>
                                <td colspan="6" class="p-20 c-red bold">Promo Code Not Valid</td>
                            </tr>
                                        <?php
                                    }
                                }else{
                                ?>
                                
                            <tr>
                                <td colspan="6" class="p-20 c-red bold">Wrong Promo Code</td>
                            </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
                
                <form class="fit-content m-20 p-10 left-auto" method="POST">
                    <input class="block mb-2 p-2 rad-10" type="text" placeholder="Enter Promo Code Here" name="promo_code">
                    <input class="btn btn-success p-2" type="submit" id="promo_code" name="promo_code_btn" value="Submit">
                </form>
                <div class="btn block fit-content c-white rad-6 m-20 p-10 left-auto" id="paypal-button-container" name="paypal_btn"></div>
                <!-- <a class="btn block fit-content bg-main c-white rad-6 m-20 p-10 left-auto" href="" name="checkout" >The Paypal Button</a> -->
                <!-- <input type="submit" value=""> -->
                <!--client-id : AZOn-D4G1_qgE0Do8l565tEe6ag4Of_x382MzJ8wg8xGcgWIQckWgubhfs7orBbiPw0rkvVbXJDbPYLP -->
            </div>
<?php
}else{
    ?>
    <h3 class="pt-5 flex-center">Your Cart Is Empty <a href="all-products.php" class="c-main"> Go Shopping Now</a><i class="fas fa-shopping-cart c-main"></i></h3>
    <?php
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
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AbW4UEcTSpoqMmEJcKlywDWCbmGvt_XGDzgoHK53UlNL9gfoEmcNcDYOBrKq-qONj5PQhB3ZOsKibn89&components=buttons&enable-funding=paylater,venmo,card" data-sdk-integration-source="integrationbuilder_sc"></script> -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AYFx-YFsoZJTuE5x9D1i6XS64tueX2XnGpcOsO-2HVtdw5KiCeh3k5RtuhP_M-m3AH0WCaHCQJ2pAJRD&components=buttons&enable-funding=paylater,venmo,card" data-sdk-integration-source="integrationbuilder_sc"></script> -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=ARt51oFoFedcawnngx-JGs3AwQDd9UDs8ak_LeG6qeFBgzKMRv3i4WHGisLi6V2MfdJ1eV3ZkuYoIizc&components=buttons&enable-funding=paylater,venmo,card" data-sdk-integration-source="integrationbuilder_sc"></script> -->

<!-- test sandbox id -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AXhm8fwEy-gNTibq_gwXq2enxriRHoqNE89EJwK8NdLVQUI_8MwfthcNvN2EKdIjmDT4Vqoc9s4a0BhE&components=buttons&enable-funding=paylater,venmo,card" data-sdk-integration-source="integrationbuilder_sc"></script> -->
<!-- live  -->
<script src="https://www.paypal.com/sdk/js?client-id=AQIpTHhGpu-CN6YFWndvS0nXuozRD-JI65jrHI9JqV8JCQebHjf1tqvlJoNts9KdZW-6TWlcWINwRKEO&components=buttons&enable-funding=paylater,venmo,card" data-sdk-integration-source="integrationbuilder_sc"></script>
<SCript>
    window.paypal.Buttons({
        // Start
        onclick(){
            
        },
        createOrder:(data, actions)=> {
            return actions.order.create({
                purchase_units:[{
                    amount:{
                        value:'<?=$total?>',
                    }
                }]
            });
        },
        onApprove:(data, actions)=>{
            return actions.order.capture().then(function(orderData){
                console.log('cupture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                // alert(`transaction ${transaction.status}: ${orderData.payer.email_address}`)
                $.ajax({
                    method: "POST",
                    url: "functions/placeorder.php",
                    data: {
                        "total_price" :"<?=$total?>",
                        "payment_id": transaction.id,
                        "payment_time": transaction.create_time,
                        "paypal_email": orderData.payer.email_address,
                        "paypal_payer_id": orderData.payer.payer_id,
                        "paypal_btn": true
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 401) {
                            alertify.error('Login To Continue');
                        }
                        else if (response == 201) {
                            // header('Location: my-orders.php');
                            // header('Location: my-orders.php');
                            window.location.href = 'my-orders.php';
                            // alertify.error('Order Placed Successfully');
                            // window.location.reload();

                        }
                        else if (response == 500) {
                            alertify.error('Something Went Wrong');
                        }
                        // $("#cart_table").load(location.href + " #cart_table");
                    }
                });
            });
        }
        // end
    }).render('#paypal-button-container');
</SCript>
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AZOn-D4G1_qgE0Do8l565tEe6ag4Of_x382MzJ8wg8xGcgWIQckWgubhfs7orBbiPw0rkvVbXJDbPYLP&components=buttons&enable-funding=paylater,venmo,card" data-sdk-integration-source="integrationbuilder_sc"></script> -->
<?php include 'includes/footer.php' ?>
