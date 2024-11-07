<?php
        ob_start();
        if (isset($_GET['slug'])) {
            $page_title=$_GET['slug'];
        }
        include 'includes/header.php';
        include 'includes/navbar.php';
        include 'config/dbcon.php';
        ?>
        <?php  
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
            $url.= $_SERVER['REQUEST_URI'];    
            
            // echo $url;  
        ?>  
<?php

    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        
        $get_post = selectOneById('posts', $post_id);
        if (mysqli_num_rows($get_post) > 0 ) {
            $post = mysqli_fetch_array($get_post);
            if (!$post['status']) {
                redirect('blog.php',"message_error", "post not found");
            }
            $page_title=$post['post_slug'];
    ?>

<section class="prod-preview mb-20 container section-padding">
    <ul class="nav nav-tabs lang pt-5">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" data-lang="english">English</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-lang="spanish">Spanish</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-lang="french">French</a>
        </li>
    </ul>
        <?php
            $post_title = explode('[splithere]',$post['title']);
            $post_content = explode('[splithere]',$post['content']);
        ?>
    <div class='main-heading pt-5 m-2'>
            <h1 class='heading lang-desc english'><?=$post_title[0]?></h1>
            <h1 class='heading lang-desc spanish'><?=count($post_title)>1?$post_title[1]:$post_title[0]?></h1>
            <h1 class='heading lang-desc french'><?=count($post_title)>2?$post_title[2]:$post_title[0]?></h1>
    </div>
    <div class="flex-center">
        <div class="card" style="width: 80%;">
            <img src="vendor/uploads/posts/<?=$post['post_cover']?>" class="card-img-top" alt="<?=str_replace('_', ' ',$post['post_slug'])?>">
            <div class="card-body">
                <h2 class="card-title lang-desc english">english <?=$post_title[0]?></h2>
                <h2 class="card-title lang-desc spanish">spanish <?=count($post_title)>1?$post_title[1]:$post_title[0]?></h2>
                <h2 class="card-title lang-desc french">french <?=count($post_title)>2?$post_title[2]:$post_title[0]?></h2>

                <div class="card-text lang-desc english">english <?=$post_content[0]?></div>
                <div class="card-text lang-desc spanish">spanish <?=count($post_content)>1?$post_content[1]:$post_content[0]?></div>
                <div class="card-text lang-desc french">french <?=count($post_content)>2?$post_content[2]:$post_content[0]?></div>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>" class="btn btn-primary">Share On Facebook</a>
                <a href="https://www.twitter.com/intent/tweet?url=<?=$url?>" class="btn btn-primary">Share On Twitter</a>
            </div>
        </div>
    </div>
    <div class="pagenation flex-center section-padding">
        <?php
        $posts = selectAllActive('posts');
        if (mysqli_num_rows($posts) > 0 ) {
            $no='1';
            foreach ($posts as $post) {
                if ($_GET['post_id'] - $post['id'] ==1) {
                    ?>
                    <div class="p-2" style="">
                        <div class="card">
                            <img src="vendor/uploads/posts/<?=$post['post_cover']?>" class="card-img-top" alt="<?=str_replace('_', ' ',$post['post_slug'])?>" style="">
                            <div class="card-body">
                                <?php
                                    $post_title = explode('[splithere]',$post['title']);
                                ?>
                                <h3 class="card-title"><?=$post_title[0]?></h3>
                                <p class="card-text"><?=substr($post['post_sammary'], 0, 50)?>...</p>
                                <a href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>" class="btn btn-primary">Read More ...</a>
                            </div>
                        </div>
                        <!-- <div class="txt-c">
                            <a class="btn bg-black c-white m-2" href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>">Previous Post</a>
                        </div> -->
                    </div>
                    <?php
                }elseif ($_GET['post_id'] - $post['id'] == -1) {
                    ?>
                    <div class="p-2" style="">
                        <div class="card">
                            <img src="vendor/uploads/posts/<?=$post['post_cover']?>" class="card-img-top" alt="<?=str_replace('_', ' ',$post['post_slug'])?>"  style="">
                            <div class="card-body">
                                <h3 class="card-title"><?=$post_title[0]?></h3>
                                <p class="card-text"><?=substr($post['post_sammary'], 0, 50)?>...</p>
                                <a href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>" class="btn btn-primary">Read More ...</a>
                            </div>
                        </div>
                        <!-- <div class="txt-c" >
                            <a class="btn bg-black c-white m-2" href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>">Next Post</a>
                        </div> -->
                    </div>
                    
                    <?php

                }elseif ($_GET['post_id'] == $post['id']) {
                    ?>
                    <?php
                }else {
                    ?>
                    <div class="p-2" style="">
                        <div class="card">
                            <img src="vendor/uploads/posts/<?=$post['post_cover']?>" class="card-img-top" alt="<?=str_replace('_', ' ',$post['post_slug'])?>" style="">
                            <div class="card-body">
                                <h3 class="card-title"><?=$post_title[0]?></h3>
                                <p class="card-text"><?=substr($post['post_sammary'], 0, 50)?>...</p>
                                <a href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>" class="btn btn-primary">Read More ...</a>
                            </div>
                        </div>
                        <!-- <div class="txt-c" >
                        <a class="btn bg-black c-white m-2" href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>"><?=$no?></a>
                        </div> -->
                    </div>
                    
                    <?php
                }
                $no++;
            }
        }
        ?>
    </div>
    
</section>
    <?php
    }
    else {
        redirect('blog.php',"message_error", "post not found");
    }
}
    ?>
<?php include 'includes/footer.php' ?>