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

                <div class="login-signupbox">
                    <div class="login-signupform">

                        <h2 class="login-signupheader">Login</h2>

                        <form action="/user/home" method="post" id="user-login" name="loginForm">

                            <input class="input-box" type="text" name="usernameemail" autofocus placeholder="Username/Email" required>
                            <br>
                            <input class="input-box" type="password" name="pwd" autofocus placeholder="Password" required>
                            <br>
                            <?php if (isset($_SESSION['error'])) {  ?>
                                <p class="errorDisplay" style="font-size: 11px; padding-bottom: 5px; color:red; max-width: 182px;"><?php echo ($_SESSION['error']); ?></p>
                            <?php $_SESSION['error'] = '';
                            } ?>

                            <?php
                            if (isset($_SESSION['locked'])) { ?>
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

    <?php
    include 'views/user/Footer.php';
    ?>

    </html>