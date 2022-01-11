<?php
include 'views/user/LoggedInHeader.php';
?>
<main>

    <div id="container">
        <div>

            <div class="login-signupbox">
                <div class="login-signupform">

                    <h2 class="login-signupheader"><?php echo $_SESSION['bookingError'];?></h2>

                </div>
            </div>
        </div>


    </div>

</main>

<?php
include 'views/user/Footer.php';
?>

</html>