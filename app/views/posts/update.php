<?php require APPROOT . '/views/includes/head.php' ?>
<div class="container">
    <?php require APPROOT . '/views/includes/nav.php' ?>
    <div class="form-container">
        <form action="<?php echo URLROOT . "/posts/update/" . $data['post']->id ?>" method="POST" class="mw-60">
            <h1>Update post</h1>
            <div class="form-item">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-input" placeholder="<?php echo $data['post']->title ?>">
                <p class="form-error">
                    <?php echo $data['titleError']; ?>
                </p>
            </div>
            <div class="form-item">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-input" placeholder="<?php echo $data['post']->full_text ?>"></textarea>
                <p class="form-error">
                    <?php echo $data['contentError']; ?>
                </p>
            </div>
            <div class="form-item">
                <input type="submit" class="form-submit" value="Update post"> 
            </div>
        </form>
    </div>
    <?php require APPROOT . '/views/includes/footer.php' ?>
</div>