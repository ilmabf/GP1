<?php

include 'views/user/LoggedInHeader.php';
?>

<main>

    <div id="container">

        <section class="customer-home-main-section1">
            <div class="bookAwash">
                <h3>We wash your<br>vehicle at your doorstep!</h3>
                <div class="bookAwash-button">
                    <button class="customer-home-main-section1-button"><a href="/booking/details">Book a wash</a></button>
                </div>
            </div>

        </section>

        <section class="home-main-section2">

            <div class="section2-blocksup">

                <div class="section2-blocks1">
                    <div class="customer-home-section2-block-img1"></div>
                    <div class="section2-block-heading"><button>
                            <h3><a href="/account/" style="color:#085394;">My Account</a></h3>
                        </button></div>
                    <div class="section2-block-para">
                        <p>Manage your vehicle details and location details</p>
                    </div>

                </div>

                <div class="section2-blocks2">
                    <div class="customer-home-section2-block-img2"></div>
                    <div class="section2-block-heading"><button>
                            <h3><a href="/booking/upcoming" style="color:#085394;">Upcoming Reservations</a></h3>
                        </button></div>
                    <div class="section2-block-para">
                        <p>Check your upcoming reservations</p>
                    </div>

                </div>

                <div class="section2-blocks3">
                    <div class="customer-home-section2-block-img3"></div>
                    <div class="section2-block-heading"><button>
                            <h3><a href="/booking/completed" style="color:#085394;">Past Reservations</a></h3>
                        </button></div>
                    <div class="section2-block-para">
                        <p>Check your past reservations</p>
                    </div>

                </div>

                <div class="section2-blocks4">
                    <div class="customer-home-section2-block-img4"></div>
                    <div class="section2-block-heading"><button>
                            <h3><a href="/review/write" style="color:#085394;">Give Reviews</a></h3>
                        </button></div>
                    <div class="section2-block-para">
                        <p>Share your thoughts about our service</p>
                    </div>

                </div>

            </div>

        </section>
    </div>


</main>
<!-- <div style="min-height: 60px;"></div> -->

<?php
include 'views/user/Footer.php';
?>

</html>

<div class="help-icon-desk">
    <a href="/customer/help"><img src="https://img.icons8.com/fluency/75/000000/help.png" /></a>
</div>

<div class="help-icon-mob">
    <a href="/customer/help"><img src="https://img.icons8.com/fluency/48/000000/help.png" /></a>
</div>