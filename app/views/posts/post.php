<?php require APPROOT . '/views/includes/head.php' ?>
<div class="container">
    <?php require APPROOT . '/views/includes/nav.php' ?>
    <div class="post-container">
        <div class="post">
            <h1><?php echo $data['title']?></h1>
            <h3><?php echo $data['author']?></h3>
            <p><?php echo $data['description']?></p>
            <p><?php echo $data['fullText']?></p>
        </div>
    </div>
    <?php require APPROOT . '/views/includes/footer.php' ?>
</div>