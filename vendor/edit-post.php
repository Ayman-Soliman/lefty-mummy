<?php 
    include 'includes/header.php';
    include 'functions/myfunctions.php';

    if (!isset($_SESSION['auth'])) {
        // $_SESSION['message_error']= 'Login To Countinue';
        // header('Location: ../signin.php');
        redirect('../signin.php',"message_error", "Login To Countinue");
    }
    
    if (isset($_SESSION['role_as'])) {
        if ($_SESSION['role_as'] != 1) {
            // $_SESSION['message_error']= 'Not Authorized';
            // header('Location: ../index.php');
            redirect('../index.php',"message_error", "Not Authorized");
        }
    }
?>
<?php include 'includes/side.php'?>
<div class="page-content flex-1 overflow">
    <?php include 'includes/navbar.php' ?>
    <h1 class="m-20 relative fit-content">Edit Post</h1>
        <?php 
        // include 'includes/alert.php' 
        ?>
    <div class="wrapper  p-10">
        <div class="quick-draft bg-white p-20 txt-c-mobile rad-10 relative">
            <?php
            if (isset($_GET['id'])) {
                $post_id = $_GET['id'];
                $post_query = selectById('posts',$post_id);
                if (mysqli_num_rows($post_query)>0) {
                    $post = mysqli_fetch_array($post_query);
                
                ?>
            <form class="mt-20 txt-c-mobile" action="functions/code.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?=$post['id']?>">

                <label class="block mb-2 bold c-main" for="">Post Title</label>
                <label class="block mb-2 bold c-main" for="">Type this text <span class="c-red">[splithere]</span> between languages (english title <span class="c-red">[splithere]</span> spanish title <span class="c-red">[splithere]</span> french title)</label>
                <input class="bg-grey block mb-5 w-full border-grey rad-6 p-10" type="text" name="title" placeholder="Post Title" value="<?=$post['title']?>" required>
                
                <label class="block mb-2 bold c-main" for="">Post Slug</label>
                <input class="bg-grey block mb-5 w-full border-grey rad-6 p-10" type="text" name="slug" placeholder="Post Slug" value="<?=$post['post_slug']?>" required>
                <div>
                <!-- <div class="absolute mt-20 ml-10 c-red">330px X 330px images recommended</div> -->
                    <label class="block mb-1 bold c-main" for="">Post Cover</label>
                    <label class=" mb-3 bold c-main pointer" for="post_cover">
                        <input type="hidden" name="old_image" value="<?=$post['post_cover']?>">

                        <img id="preview" src="uploads/posts/<?=$post['post_cover']?>" width="100"/>
                        <!-- <img id="preview" src=""/> -->
                    </label>
                    <input class="bg-grey mb-3 w-full border-grey rad-6 p-10 hide" id="post_cover" name="post_cover" type="file" onchange="view(this,'preview');">
                    <div class="c-red txt-c disc" id="preview_prod_error"></div>
                </div>
                <label class="block mb-2 bold c-main" for="">Post Sammary</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="sammary" placeholder="Post Sammary"><?=$post['post_sammary']?></textarea>

                <label class="block mb-2 bold c-main" for="">Post Content</label>
                <label class="block mb-2 bold c-main" for="">Type this text <span class="c-red">[splithere]</span> between languages (english content <span class="c-red">[splithere]</span> spanish content <span class="c-red">[splithere]</span> french content)</label>
                <textarea class="content bg-grey w-full border-grey rad-6 p-10 mb-20" name="content" placeholder="Post Content"><?=$post['content']?></textarea>

                <label class="block mb-2 bold c-main" for="">Post Keywords</label>
                <textarea class="bg-grey w-full border-grey rad-6 p-10 mb-20" name="keywords" placeholder="Add Comma , Between Keywords Like That LASERCUT, MDF, ...."><?=$post['keywords']?></textarea>
                <label class="block mb-2 bold c-main" for="">Active</label>
                <div class="flex-center-mobile flex m-10 txt-c-mobile">
                    <p class="c-grey disc mr-10">Show In Posts</p>
                    <label class="swich-checkbox">
                        <input class="toggle-checkbox" name="status" type="checkbox" <?=$post['status']?'checked':''?>>
                        <div class="toggle-switch relative bg-grey"></div>
                    </label>
                </div>
                <div class="flex fit-content left-auto gap-20">
                    <a class="btn btn-danger rad-6 p-2 m-2 " href="all-posts.php" >Cancel</a>
                    <button class="btn btn-primary rad-6 p-2 m-2" type="submit" name="edit-post-btn" >Edit Post</button>
                </div>
            </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php'
?>