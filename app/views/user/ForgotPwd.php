<div class="bgImage">

    <?php
    include 'views/user/Header.php';
    ?>
    <main>
        <div id="container">

            <div class="login-signupbox">
                <div class="login-signupform">
                    <div class="loguser-icon"></div>
                    <h3 class="login-signupheader">Reset your password</h3>

                    <form action="/user/passwordChange" method="POST" autocomplete="off">
                        <input class="input-box" type="email" name="email_to_send_pwd" placeholder="Enter your email" autocomplete="off" style="">
                        <br>
                        <p class="errorDisplay" style="font-size: 11px; padding-bottom: 5px; color:red; max-width: 200px;"><?php echo ($_SESSION['error']); ?></p>
                        <button class="input-box loggin-signup-button" type="submit" name="send_pwd_email" style = "width: 100%;">Send Password Reset Link</button>
                    </form>

                </div>
            </div>

            <?php

            if ($_SESSION['changePwdVerifyBox'] == 1) { ?>
                <div id="signupVerify" class="toVerifySingupBox">
                    <div class="toVerifySignupBoxContent">
                        <h3>Email was sent.<br>Click the link in email to enter your new password</h3>
                    </div>
                </div>
            <?php } ?>

        </div>


    </main>


    <?php
    include 'views/user/Footer.php';
    ?>

    </html>