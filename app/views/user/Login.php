<?php
include 'views/user/Header.php';
if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    echo $difference;
    if ($difference > 30) {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}
?>
<div class="bgImage" style="height:100%">
    <main>

        <div id="container">

            <div>

                <div class="login-signupbox" id="login-resizing">
                    <div class="login-signupform">

                        <h2 class="login-signupheader">Login</h2>

                        <form action="/user/home" method="post" id="user-login" name="loginForm">

                            <input id="input-resize" class="input-box" type="text" name="usernameemail" autofocus placeholder="Username/Email" required>
                            <br>
                            <input class="input-box input-resize" type="password" name="pwd" autofocus placeholder="Password" required>
                            <br>
                            <p class="errorDisplay" style="font-size: 11px; padding-bottom: 5px; color:red; max-width: 200px;"><?php echo ($_SESSION['error']); ?></p>
                            <?php
                            if (isset($_SESSION["locked"])) { ?>
                                <p style='font-size:12px;'><?php echo "Please wait for 40 seconds"; ?></p>
                            <?php } else {
                                echo "<button class='input-box loggin-signup-button' type='submit' name='login'>Login</button>";
                            }
                            ?>
                        </form>

                    </div>
                </div>
                <p class="forget_pwd"><a href="/user/passwordReset" style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Forgotten password?</a></p>
                <p class="link-to-go-signup"><a href="/customer/signup" style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Create an account? SignUp!</a></p>

            </div>


        </div>
    </main>

    <script src="/public/js/UserLogin.js"></script>
    <?php
    include 'views/user/Footer.php';
    ?>


    </html>