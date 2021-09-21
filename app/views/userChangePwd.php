<?php 
    include 'userHeader.php';
?>
<main>
    <div id="container">
      
            
            <div class="login-signupbox">
                <div class="login-signupform">
                    <div class="loguser-icon"></div>
                    <h2 class="login-signupheader">Enter New Password</h2>

                    <form action="/user/updatePassword" method="POST" autocomplete="off">
                        <input class="input-box" id="new-pwd" type="password" name="new_pwd" placeholder="New Password" autocomplete="off" required>
                        <br>
                        <input class="input-box" id="new-confirm-pwd" type="password" name="re-enter_new_pwd" placeholder="ReEnter Password" autocomplete="off" required>
                        <br>
                        <button class="input-box loggin-signup-button" type="submit" name="confirm_new_pwd">Confirm</button>
                    </form>

                </div>
                <div id="pwd-validate-message">
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>
        


    </div>

    <script src="/public/js/userChangePwd.js"></script>  

</main>


<?php 
    include 'userFooter.php';
?>

</html>