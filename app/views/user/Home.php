<?php
include 'views/user/Header.php';
?>

<main>
    <div id="container">

        <section class="home-main-section1">
            <div class="home-main-section1-content">
                <h3>We wash your<br>vehicle at your doorstep!</h3>
                <div class="home-main-section1-button">
                    <button class="home-login-signup"><a href="/login">Login</a></button>
                    <button class="home-login-signup"><a href="/signup">SignUp</a></button>
                </div>
            </div>
        </section>

        <section class="home-main-section2">

            <h2 id="about-tag">How does WandiWash work?</h2>
            <p class="section2-para1">Reserve a date and time on our website to obtain car wash services on your preferred location.</p>

            <div class="section2-blocksup">

                <div class="section2-blocks1">
                    <div class="section2-block-img1"></div>
                    <div class="section2-block-heading">
                        <h3>MAKE A RESERVATION</h3>
                    </div>
                    <div class="section2-block-para">
                        <p>Pick a convienient date and time and the desired service through our web application. Provide the details of your vehicle and your location.</p>
                    </div>
                </div>
                <div class="section2-blocks2">
                    <div class="section2-block-img2"></div>
                    <div class="section2-block-heading">
                        <h3>SERVICE TEAM COMES TO YOU</h3>
                    </div>
                    <div class="section2-block-para">
                        <p>Our service team would come to your location fully equipped to provide you the requested service.</p>
                    </div>
                </div>
                <div class="section2-blocks3">
                    <div class="section2-block-img3"></div>
                    <div class="section2-block-heading">
                        <h3>GET A CLEAN CAR</h3>
                    </div>
                    <div class="section2-block-para">
                        <p>Rate and pay for our service. We are Eco Friendly!</p>
                    </div>
                </div>

            </div>

            <h2>Get your car washed at your home!</h2>
            <p class="section2-para1">Sit back, relax and enjoy while our team of professionals provide you services just the way you like it!</p>

            <div class="section2-blocksdown">
                <?php
                $count = 0;
                while ($count < sizeof($_SESSION['WashPackages'])) {
                    echo "<div class='section2-blocks4'>";
                    echo "<div class='section2-block-heading'>";
                    echo "<h3>" . $_SESSION['WashPackages'][$count]['Name'] . "</h3>";
                    echo "</div>";
                    echo "<div class='section2-block-para'>";
                    echo "<p>" . $_SESSION['WashPackages'][$count]['Description'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    $count = $count + 1;
                }
                ?>
            </div>

            <h2>We provide services for the following vehicle types!</h2>



            <div class="section2-blocksdown">

                <?php
                $count = 0;
                while ($count < sizeof($_SESSION['Vehicles'])) {
                    echo "<div class='section3-blocks4'>";
                    echo "<div class='section2-block-heading'>";
                    echo "<h3>" . $_SESSION['Vehicles'][$count]['Vehicle_Type'] . "</h3>";
                    echo "</div>";
                    echo "</div>";
                    $count = $count + 1;
                }
                ?>
            </div>

        </section>

    </div>


</main>


<?php
include 'views/user/Footer.php';
?>