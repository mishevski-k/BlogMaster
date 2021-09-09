<?php require APPROOT . '/views/includes/head.php' ?>
<div class="container">
    <?php require APPROOT . '/views/includes/nav.php' ?>
    <div class="posts-container">
        <?php foreach($data['posts'] as $post): ?>
            <div class="post box-shadow-1">
                <img src="<?php echo URLROOT ?>/img/home-banner.png" alt="" class="post-img">
                <h1 class="post-title"><?php echo $post->title ?></h1>
                <h3 class="post-desc"><?php echo $post->Description ?></h3>
                <h3 class="post-author">Author: <?php echo $post->author ?></h3>
                <a href="<?php echo  URLROOT . "/posts/post/" . $post->id ?> " class="post-link">Show more</a>
            </div>
        <?php endforeach?>
    </div>
    <?php require APPROOT . '/views/includes/footer.php' ?>
</div>