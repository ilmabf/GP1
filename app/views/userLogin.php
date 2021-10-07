<?php 
    include 'userHeader.php';
    if (isset($_SESSION["locked"])){
        $difference = time() - $_SESSION["locked"];
        echo $difference;
        if ($difference > 30){
            unset($_SESSION["locked"]);
            unset($_SESSION["login_attempts"]);
        }
    }
    // if (isset($_SESSION["login_attempts"])){
    //     if($_SESSION["login_attempts"] > 2){
    //         $_SESSION["locked"] = time();
    //     }
    // }
?>
<div class="bgImage" style="height:100%">
<main>

    <div id="container">
        <div>
            
            <div class="login-signupbox">
                <div class="login-signupform">
        
                    <h2 class="login-signupheader">Login</h2>

                    <form action="/user/home" method="post" id="user-login" name="loginForm" >
                        
                        <input class="input-box" type="text" name="usernameemail" autofocus placeholder="Username/Email" required>
                        <br>
                        <input class="input-box" type="password" name="pwd" autofocus placeholder="Password" required>
                        <br>
                        <p class="errorDisplay" style="font-size: 11px; padding-bottom: 5px; color:red; max-width: 200px;"><?php echo($_SESSION['error']);?></p>
                        <?php 
                            // echo time(); echo $difference;
                            // echo " " . $_SESSION["locked"];
                            if (isset($_SESSION["locked"]))
                            {
                                // echo $_SESSION["login_attempts"];
                                echo "Please wait for 30 seconds";
                            }
                            else{
                                echo "<button class='input-box loggin-signup-button' type='submit' name='login'>Login</button>";
                            }
                        ?>
                    </form>

                </div>
            </div>
            <p class="forget_pwd"><a href="/user/passwordReset" style = "color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Forgot password?</a></p>
            <p class="link-to-go-signup"><a href="/customer/signup" style = "color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Create Account? SignUp</a></p>
        </div>

        
    </div>
    
</main>

<?php 
    include 'userFooter.php';
?>



</html>


<!-- <br>
    <div class="select-user">
        <label class="user-label" for="users">Who you are?:</label>
        <br>
        <select class="input-box" name="users" id="users">
        <option value="user">Customer</option>
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        <option value="service-team-leader">Service Team Leader</option>
        </select>
    </div> -->
