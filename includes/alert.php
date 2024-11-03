<?php
if (isset($_SESSION['message_error'])) {
    ?>
    <div class="container flex-center relative">
        
        <div class="alert bg-red-transparent p-20 rad-6 txt-c bold relative"><?= $_SESSION['message_error'] ?>
            <i class="fas fa-times alert-close absolute"></i>
        </div>
    </div>
    <?php
    // unset($_SESSION['message_error']);
}else if (isset($_SESSION['message_success'])) {
    ?>
    <div class="container flex-center relative">
        
        <div class="alert bg-green-transparent p-20 rad-6 txt-c bold relative"><?= $_SESSION['message_success'] ?>
            <i class="fas fa-times alert-close absolute"></i>
        </div>
    </div>
    <?php
    // unset($_SESSION['message_success']);
}