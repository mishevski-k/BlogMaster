<?php require APPROOT . '/views/includes/head.php' ?>
<div class="container">
    <?php require APPROOT . '/views/includes/nav.php' ?>
    <div class="post-container">
        <div class="post">
            <h1 class="post-title"><?php echo $data['post']->title?></h1>
            <p class="post-content"><?php echo $data['post']->full_text?></p>
            <p class="post-updated"><?php echo $data['post']->updated_at?></p>
            <div class="post-details">
                <h3 class="post-author">Auhor: <?php echo $data['post']->author?></h3>
                <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] === $data['post']->user_id): ?>
                    <a class="update-post success" href="<?php  echo URLROOT. "/posts/update/". $data['post']->id ?>">Update post</a>
                    <form action="<?php echo URLROOT . "/posts/delete/" . $data['post']->id ?>" method="POST">
                        <input type="submit" value="Delete" name="delete-post" class="post-delete danger">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/includes/footer.php' ?>
</div>