<div class="content">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="login-default-box">
        <h1>Login</h1>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label>Username (or email)</label>
                <input type="text" name="user_name" required />
                <label>Password</label>
                <input type="password" name="user_password" required />
                <?php
                // include hidden input when sesame code exists
                if (isset($_GET['code'])) { ?>
                    <input type="hidden" name="sesamecode" value="<?php echo $_GET['code'] ?>" />
                <?php } ?>
                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Keep me logged in (for 2 weeks)</label>
                <input type="submit" class="login-submit-button" />
        </form>
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>
    </div>

    <?php
    // for now sesame is not working with facebook login
    if (FACEBOOK_LOGIN == true && !isset($_GET['code'])) { ?>
    <div class="login-facebook-box">
        <h1>or</h1>
        <a href="<?php echo $this->facebook_login_url; ?>" class="facebook-login-button">Log in with Facebook</a>
    </div>
    <?php } ?>

    <?php
    // when use_sesame is true and get param doesn't have sesamecode then display qrcode
    if (USE_SESAME && !isset($_GET['code'])) { ?>
    <meta http-equiv="refresh" content="5">
    <div class="login-facebook-box">
        <h1>or</h1>
        <h2>Login with sesame</h2>
        <img src="<?php echo URL . $this->sesame_qrcode_url ?>"><br/>
        <a href="<?php echo $this->sesame_url ?>" target="_blank"><?php echo $this->sesame_url ?></a>
    </div>
    <?php } ?>

</div>
