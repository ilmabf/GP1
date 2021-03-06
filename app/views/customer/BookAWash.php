<?php

include 'views/user/LoggedInHeader.php';
$vehicles = $_SESSION['vehicles'];
$booked = $_SESSION['booked'];
?>

<link rel="stylesheet" href="/public/css/actors/customer/BookAWashCalendar.css" />

<body onload="typeWriter(0)">

    <div style="min-height: 110px;"></div>

    <div class="addVehicleform" id="errorForm">
        <div class="forma">
            <h2 class="login-signupheader">Error</h2>
            <div id="error-msg" style="font-size: medium;"></div>
            <form action="" method="post" id="delete-Address-Form"><br>
                <button id="closeErrorBtn" class="formSubmitButton" type="submit" name="signup" onclick="closeError()">Close</button>
            </form>
        </div>
    </div>

    <div id="mainbox">
        <div>
            <div class="heading">
                <h2 style="font-size: 30px;">Start Your Booking!</h2>
            </div>
            <p id="sub-heading-p" style="font-size: 15px;"></p>
            <div id="completeMsg" style="text-align:center; color:red; margin-top:10px;"></div>
        </div>
        <div class="dateTime">
            <div class="wash-date">
                <h3>Select a convenient date & available time slot from the calendar</h3>

                <div id="closeOnClick">
                    <div class="dateWash"><button id="wandiwashCalendar" onclick="viewCalendar();"><i class="far fa-calendar" sizes="64x64"> View Calendar</i></button></div>
                </div>
                <div id="selected">
                    <span id="day"></span>
                    <span id="slash1"> </span>
                    <span id="month"></span>
                    <span id="slash2"> </span>
                    <span id="year"></span>
                    <div id="timeSlot"></div>
                </div>

            </div>

        </div>

        <div class="vehicleWash">
            <div class="select-vehicle">
                <h3>Select your vehicle</h3>
                <?php
                if (sizeof($_SESSION['vehicles']) == 0) {
                    echo "<p style = 'font-size:initial;'>Please add your vehicle/s in your account page.</p>";
                    echo "<br>";
                    echo "<a style = 'font-size:initial; color:#085394;' href = '/account/'>Go to My Account</a>";
                } else {
                    echo "<div class='select-vehcile-box'>";
                    echo "<select name='vehicle' id='vehicles' onchange='getVehicle();'>";
                    $count = 0;
                    while ($count < sizeof($_SESSION['vehicles'])) {
                        echo "<option value='";
                        echo $vehicles[$count]['VID'];
                        echo "'>";
                        echo $vehicles[$count]['VID'];
                        echo "</option>";
                        $count = $count + 1;
                    }
                    echo "</select>";
                    echo "</div>";
                }
                ?>
            </div>

            <div class="wash-type">

                <h3>Select your wash package</h3>

                <form action="" method="post">
                    <?php
                    $i = 0;
                    while ($i < sizeof($_SESSION['washpackages'])) {
                        echo "<div class='wash-select-radio'>";
                        echo "<input type = 'radio' name='washType' class='washType1' value='Interior Cleaning' id='washPackage-";
                        echo $_SESSION['washpackages'][$i]['Wash_Package_ID'];
                        echo "'";
                        echo " onclick='getWashPackage(";
                        echo $i;
                        echo ")' >";
                        echo "<label for = 'washType'> ";
                        echo $_SESSION['washpackages'][$i]['Name'];
                        echo "</label>";
                        echo "</div>";
                        $i = $i + 1;
                    }
                    ?>

                </form>

            </div>
        </div>
        <div id="dd"></div>
        <div class="next-pg">
            <span class="priceBox" style="display:none;" id="priceValue"></span>
            <button class="next-button" onclick="checkDetails();">Next</button>
        </div>
    </div>


    <div class="container" id="cal1">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h3 style="color:white;">Select an available time slot <b>( Red - unavailable )</b></h3>
                    <h1 style="color:white;"></h1>
                    <p style="color:white;"></p>
                    <div id="scrollMsgMobile" style="margin-top: 5px;">
                        <h3 style="color:white;">
                            <-----Move----->
                        </h3>
                    </div>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>

            <div class="weekdays">
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Sun</div>
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Mon</div>
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Tue</div>
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Wed</div>
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Thu</div>
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Fri</div>
                <div style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Sat</div>
            </div>
            <div class="days"></div>
        </div>

    </div>
    <script>
        var pausecontent = <?php echo json_encode($_SESSION['washpackages']); ?>;
        var vehicles = <?php echo json_encode($_SESSION['vehicles']); ?>;
        var prices = <?php echo json_encode($_SESSION['servicePrice']); ?>;
        var booked = <?php echo json_encode($booked); ?>;
    </script>
    <script src="/public/js/CustomerCalendar.js"></script>
    <script src="/public/js/CustomerBookAWash.js"></script>
</body>
<script src="/public/js/ErrorMessage.js"></script>
<?php
if (isset($_SESSION['Error'])) { ?>
    <script>
        popError(<?php echo json_encode($_SESSION['Error']); ?>);
    </script>";

<?php unset($_SESSION['Error']);
}  ?>