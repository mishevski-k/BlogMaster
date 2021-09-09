<?php require APPROOT . '/views/includes/head.php' ?>
<div class="container">
    <?php require APPROOT . '/views/includes/nav.php' ?>
    <div class="form-container">
        <form action="<?php echo URLROOT ?>/users/register" method="POST" class="mw-40">
            <h1>Register</h1>
            <div class="form-item">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Name . . ." class="form-input">
                <p class="form-error">
                    <?php echo $data['nameError']; ?>
                </p>
            </div>
            <div class="form-item">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname" id="surname" placeholder="Surname . . ." class="form-input">
                <p class="form-error">
                    <?php echo $data['surnameError']; ?>
                </p>
            </div>
            <div class="form-item">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Email . . ." class="form-input">
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
                <label for="password-confirm" class="form-label">Confirm password</label>
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Confirm password . . ." class="form-input">
                <p class="form-error">
                    <?php echo $data['confirmPasswordError']; ?>
                </p>
            </div>
            <div class="form-item">
                <input type="submit" value="Register" class="form-submit">
            </div>
            <p>Alredy a member? <a href="<?php echo URLROOT ?>/users/login">Login now!</a></p>
        </form>
    </div>
    <?php require APPROOT . '/views/includes/footer.php' ?>
</div>