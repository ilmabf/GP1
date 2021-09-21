<?php 
    include 'userHeader.php';
?>
<main>
    <div id="container">
<<<<<<< HEAD
=======
        <div>
>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
            
            <div class="login-signupbox">
                <div class="login-signupform">
                    <div class="loguser-icon"></div>
                    <h3 class="login-signupheader">Enter email</h3>

                    <form action="/user/passwordChange" method="POST" autocomplete="off">
                        <input class="input-box" type="email" name="email_to_send_pwd" placeholder="Email" autocomplete="off">
                        <br>
                        <p style="font-size: 15px; padding-bottom: 5px; color:red;"><?php echo($_SESSION['error']);?></p>
                        <button class="input-box loggin-signup-button" type="submit" name="send_pwd_email">Send</button>
                    </form>

                </div>
            </div>
<<<<<<< HEAD

            <?php

            if($_SESSION['changePwdVerifyBox'] == 1){?>
                <div id="signupVerify" class="toVerifySingupBox">
                <div class="toVerifySignupBoxContent">
                    <!-- <span class="close-signupVerifyMessage">&times;</span> -->
                    <h3>Email was sent.<br>Click the link in email to enter your new password</h3>
                </div>
                </div>
      <?php } ?>

        </div>
=======
        </div>


    </div>

>>>>>>> 7922f5c304c26b90092f474e73bc74af00ae6225
    

</main>


<?php 
    include 'userFooter.php';
?>

</html>



