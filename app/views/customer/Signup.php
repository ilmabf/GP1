<div class="bgImage">

    <?php
    include 'views/user/Header.php';
    ?>
    <main>

        <div id="container">


            <div class="login-signupbox">
                <div class="login-signupform">
                    <div class="loguser-icon"></div>
                    <h2 class="login-signupheader">Create Your Account</h2>

                    <form action="/customer/register" method="post" id="customer-signup" name="form1">

                        <input class="input-box" id="signUpFirstName" type="text" maxlength="50" name="firstname" autofocus placeholder="First Name" required>
                        <br>
                        <input class="input-box" id="signUpLastName" type="text" maxlength="50" name="lastname" autofocus placeholder="Last Name" required>
                        <br>
                        <input class="input-box" type="text" name="username" autofocus placeholder="Username" maxlength="50" required>
                        <br>
                        <p style="font-size: 11px; padding-bottom: 5px; color:red; max-width 200px;"><?php
                                                                                                        if ($_SESSION['flag'] == 1) {
                                                                                                            echo ($_SESSION['error']);
                                                                                                        }
                                                                                                        ?>
                        </p>

                        <input class="input-box" type="email" name="email" autofocus placeholder="Email" maxlength="50" required>
                        <br>
                        <p style="font-size: 11px; padding-bottom: 5px; color:red; max-width 200px;"><?php
                                                                                                        if ($_SESSION['flag'] == 2) {
                                                                                                            echo ($_SESSION['error']);
                                                                                                        }

                                                                                                        ?>
                        </p>
                        <input class="input-box" type="tel" name="mobilenumber" autofocus placeholder="Mobile No" pattern="[0-9]{10}" required>
                        <p class="form-input-error-msg" style="font-size: 10px; padding-bottom: 5px;"><b>Format: 07****</b></p>
                        <p style="font-size: 11px; padding-bottom: 5px; color:red; max-width 200px;"><?php
                                                                                                        if ($_SESSION['flag'] == 3) {
                                                                                                            echo ($_SESSION['error']);
                                                                                                        }
                                                                                                        ?>
                        </p>
                        <input class="input-box" id="signup-pwd" type="password" name="pwd" autofocus placeholder="Password" maxlength="255" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <br>
                        <input class="input-box" id="signup-confirm-pwd" type="password" name="confirm_pwd" autofocus placeholder="Confirm Password" required>

                        <button id="mySignupButton" class="input-box loggin-signup-button" type="submit" name="signup" onclick = "checkLetter();">Signup</button>
                    </form>

                </div>
                <div id="pwd-validate-message">
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>
            <p id="link-to-go-login"><a href="/user/login" style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Already have an account? Login</a></p>

            <?php

            if ($_SESSION['verifyBox'] == 1) { ?>
                <div id="signupVerify" class="toVerifySingupBox">
                    <div class="toVerifySignupBoxContent">
                        <h3>Thank you for signing up!<br>Please verify your email address to complete setting up your account.</h2>
                    </div>
                </div>
            <?php } ?>





        </div>




        <script src="/public/js/CustomerSignup.js"></script>
    </main>

    <div style="min-height: 110px;">



        <?php
        include 'views/user/Footer.php';
        ?>



        </html>