<?php require APPROOT . '/views/includes/head.php' ?>
<div class="container">
    <?php require APPROOT . '/views/includes/nav.php' ?>
    <div class="form-container">
        <form action="<?php echo URLROOT ?>/users/login" method="POST">
            <h1>Login</h1>
            <div class="form-item">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" placeholder="Email . . ." class="form-input">
                <p class="form-error">
                    <?php echo $data['emailError']; ?>
                </p>
            </div>
            <div class="form-item">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Password . . ." class="form-input">
                <p class="form-error">
                    <?php echo $data['passwordError']; ?>
                </p>
            </div>
            <div class="form-item">
                <input type="submit" value="Login" class="form-submit">
            </div>
            <p>Don't have an account? <a href="<?php echo URLROOT ?>/users/register">Join today</a></p>
        </form>
    </div>
    <?php require APPROOT . '/views/includes/footer.php' ?>
</div>