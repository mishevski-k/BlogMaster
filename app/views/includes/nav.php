<nav class="nav box-shadow-1">
    <div class="nav-brand">
        <a href="<?php echo URLROOT ?>/pages/index"">BlogMaster</a>
    </div>
    <a class="nav-menu">
        <i class="gg-menu"></i>
    </a>
    <div class="nav-links">
        <ul>
            <?php if(isLoggedIn()): ?>
                <li class="nav-link"><a href="<?php echo URLROOT ?>/posts/new"><i class="gg-add-r"></i></a></li>
            <?php endif; ?>
            <li class="nav-link"><a href="<?php echo URLROOT ?>/pages/index">Home</a></li>
            <li class="nav-link"><a href="<?php echo URLROOT ?>/pages/about">About</a></li>
            <li class="nav-link"><a href="<?php echo URLROOT ?>/pages/contact">Contact</a></li>
            <li class="nav-link"><a href="<?php echo URLROOT ?>/posts/feed">Posts</a></li>
            <li class="nav-btn">
                <?php if(isset($_SESSION['user_id'])): ?>    
                    <a href="<?php echo URLROOT ?>/users/logout">Log out</a></li>
                <?php else:  ?>
                    <a href="<?php echo URLROOT ?>/users/login">Login</a></li>
                <?php endif; ?>
        </ul>
    </div>
</nav>