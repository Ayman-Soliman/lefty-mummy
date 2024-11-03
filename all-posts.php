<?php
    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'config/dbcon.php';
?>
    <section class="products bg" id="products">
            <div class='main-heading '>
                <h1 class='heading'>All posts</h1>
            </div>
            <div class="container">
                <?php
                $posts = selectAll('posts');
                if (mysqli_num_rows($posts) > 0 ) {
                    foreach ($posts as $post) {
                        ?>
                <div class="card" style="width: 18em;">
                    <img src="vendor/uploads/posts/<?=$post['post_cover']?>" class="card-img-top" alt="<?=str_replace('_', ' ',$post['post_slug'])?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$post['title']?></h5>
                        <div class="card-text"><?=$post['content']?></div>
                        <a href="post.php?post_id=<?=$post['id']?>&slug=<?=$post['post_slug']?>" class="btn btn-primary">Read More ... </a>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
    </section>   
<?php include 'includes/footer.php' ?>