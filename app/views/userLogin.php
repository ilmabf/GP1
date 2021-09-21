<?php 
    include 'userHeader.php';
?>
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
                        <p style="font-size: 15px; padding-bottom: 5px; color:red;"><?php echo($_SESSION['error']);?></p>
                        <button class="input-box loggin-signup-button" type="submit" name="login">Login</button>
                    </form>

                </div>
            </div>
            <p class="forget_pwd"><a href="/user/passwordReset">Forgot password?</a></p>
            <p class="link-to-go-signup"><a href="/customer/signup">Create Account? SignUp</a></p>
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
