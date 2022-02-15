<div class="bgImage">

    <?php
    include 'views/user/Header.php';
    ?>
    <main>
        <div id="container">

            <div class="login-signupbox" id="forgotPwd-resizing">
                <div class="login-signupform">
                    <div class="loguser-icon"></div>
                    <h3 class="login-signupheader">Reset your password</h3>

                    <form action="/user/passwordChange" method="POST" autocomplete="off">
                        <input class="input-box" id="userEnterMail" type="text" name="email_to_send_pwd" placeholder="Enter Email / Username" autocomplete="off" style="">
                        <br>
                        <p class="errorDisplay" style="font-size: 11px; padding-bottom: 5px; color:red; max-width: 200px;"><?php echo ($_SESSION['error']); ?></p>
                        <button class="input-box loggin-signup-button" type="submit" name="send_pwd_email" style="width: 100%;">Send Password Reset Link</button>
                    </form>

                </div>
            </div>

            <?php

            if ($_SESSION['changePwdVerifyBox'] == 1) { ?>
                <div id="signupVerify" class="toVerifySingupBox">
                    <div class="toVerifySignupBoxContent">
                        <h3 style="color:#193498">An email was sent.<br><br><span style="font-size:smaller">Click the link in email to enter your new password</span></h3>
                    </div>
                </div>
            <?php } ?>

        </div>


    </main>

    <script src="/public/js/UserForgotPwd.js"></script>
    <?php
    include 'views/user/Footer.php';
    ?>

    </html>