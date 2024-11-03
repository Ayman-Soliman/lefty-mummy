<?php
// include 'functions/myfunctions.php';
// session_start();

?>
<section class="section-padding flex-center flex-col" id="contact-us">
    <div class="container flex-center flex-col mt-5">
        <form class="sign-in-up gap-20 bg-grey p-20 rad-10" action="search.php" method="POST">
            <div class="relative ">
                <input class="w-full p-10 block" type="text" name="search-word" placeholder="Type what you are looking for" required>
                <button class="btn btn-primary search-icon fa fa-search absolute bg-grey c-black flex-center" type="submit" name="search_btn"></button>
            </div>
            
            <!-- <input class="bg-main c-white w-full p-10 bold" type="submit" name="signin_btn" value="Login"> -->
        </form>
    </div>
</section>
