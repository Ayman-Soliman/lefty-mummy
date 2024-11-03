</div>
<script src="assets/js/jquery-3.6.3.min.js"></script>
<script src="assets/js/alertify.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>

        <!-- start rich text editor files -->
        <?php
        if (substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1)=='add-post.php' || str_contains(substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1), 'edit-post.php') || str_contains(substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1), 'add-product.php') || str_contains(substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1), 'edit-product.php'))  {    
        ?>
            <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="assets/js/jquery.richtext.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.content').richText();
                });
            </script>
        <?php
        }
        ?>
        <!-- end rich text editor files -->


<script src="assets/js/main.js"></script>
<!-- <script src="assets/js/backend-ajax-con.js"></script> -->
<script>
    $(document).ready(function () {
        
    });
</script>
<script>
    <?php 
        if (isset($_SESSION['message_error'])) {
            ?>
            alertify.set('notifier','position', 'top-center');
            alertify.error('<?=$_SESSION['message_error']?>');
            <?php
            unset($_SESSION['message_error']);
        }
    ?>
    <?php 
        if (isset($_SESSION['message_success'])) {
            ?>
            alertify.set('notifier','position', 'top-center');
            alertify.success('<?=$_SESSION['message_success']?>');
            <?php
            unset($_SESSION['message_success']);
        }
    ?>
</script>
</body>
</html>