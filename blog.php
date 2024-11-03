<?php

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'config/dbcon.php';
?>

    <section class="products bg section-padding" id="products">
            <div class='main-heading'>
                <h1 class='heading mt-5 pb-2'>All posts</h1>
            </div>
            <div class="container">
                <?php
                    $posts = selectAllActive('posts');
                    if (mysqli_num_rows($posts) > 0 ) {
                        foreach ($posts as $post) {
                            ?>
                    <div class="row g-0 bg-body-secondary position-relative m-2">
                        <div class="col-md-6 mb-md-0 p-md-4">
                            <img src="vendor/uploads/posts/<?=$post['post_cover']?>" class="w-100" alt="<?=str_replace('_', ' ',$post['post_slug'])?>">
                        </div>
                        <div class="col-md-6 p-4 ps-md-0">
                            <?php
                            $post_title = explode('[splithere]',$post['title']);
                            ?>
                            <h2 class="mt-0 mb-2"><?=$post_title[0]?></h2>
                            <p><?=substr($post['post_sammary'], 0, 400)?>...</p>
                            <a href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>" class="stretched-link">Read More ... </a>
                            <p><small>created at: <?=date('jS M, Y',strtotime($post['created_at']))?></small></p>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
    </section>
    
<?php include 'includes/footer.php' ?>