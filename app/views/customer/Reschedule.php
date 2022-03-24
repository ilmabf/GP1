<?php

include 'views/user/LoggedInHeader.php';
$vehicles = $_SESSION['vehicles'];
$booked = $_SESSION['booked'];
$rescheduleID = $_SESSION['rescheduleID'];
$reservationDetails = $_SESSION['reservationDetails'];
?>

<link rel="stylesheet" href="/public/css/actors/customer/BookAWashCalendar.css" />

<body onload="typeWriter(0)">

    <div style="min-height: 110px;"></div>
    <div id="mainContent">
        <div>
            <div class="heading">
                <h2 style="font-size: 30px;">Reschedule Your Booking!</h2>
            </div>
            <div id="xx"></div>
            <p id="sub-heading-p" style="font-size: 15px;"></p>
            <div id="completeMsg1" style="text-align:center; color:red; margin-top:10px;"></div>
        </div>
        <div class="dateTime">
            <div class="wash-date">
                <h3>Select a convenient date & available time slot from the calendar</h3>

                <div id="closeOnClick">
                    <div class="dateWash"><button id="wandiwashCalendar" onclick="viewCalendar();"><i class="far fa-calendar" sizes="64x64"> View Calendar</i></button></div>
                </div>
                <div id="selected">
                    <?php
                    $date = explode("-", $reservationDetails[0]['Date']);
                    $year = $date[0];
                    $month = $date[1];
                    $day = $date[2];
                    ?>
                    <span id="day1"><?php echo "Day: " . $day; ?></span>
                    <span id="slash11">/</span>
                    <span id="month1"><?php echo $month; ?></span>
                    <span id="slash22">/</span>
                    <span id="year1"><?php echo $year; ?></span>
                    <div id="timeSlot1"><?php echo "Time: " . $reservationDetails[0]['Time'] ?></div>
                </div>

            </div>

        </div>

        <div class="vehicleWash">
            <div class="select-vehicle">
                <h3>Select your vehicle</h3>

                <div class="select-vehcile-box">
                    <form action="" method="post">
                        <select name="vehicle" id="vehicles" onchange="getVehicle();">
                            <?php
                            $count  = 0;
                            while ($count < sizeof($_SESSION['vehicles'])) {
                                if ($reservationDetails[0]['Vehicle_ID'] === $vehicles[$count]['VID']) {
                                    echo "<option value='";
                                    echo $vehicles[$count]['VID'];
                                    echo "' selected>";
                                    echo $vehicles[$count]['VID'];
                                    echo "</option>";
                                } else {
                                    echo "<option value='";
                                    echo $vehicles[$count]['VID'];
                                    echo "'>";
                                    echo $vehicles[$count]['VID'];
                                    echo "</option>";
                                }
                                $count = $count + 1;
                            }
                            ?>
                        </select>
                    </form>
                </div>
            </div>

            <div class="wash-type">

                <h3>Select your wash package</h3>

                <form action="" method="post">
                    <?php
                    $i = 0;
                    while ($i < sizeof($_SESSION['washpackages'])) {
                        // if ($reservationDetails[0]['Wash_Package_ID'] === $_SESSION['washpackages'][$i]['Wash_Package_ID']) {
                        //     echo "<div class='wash-select-radio'>";
                        //     echo "<input type = 'radio' checked name='washType' class='washType1' value='Interior Cleaning' id='";
                        //     echo $i;
                        //     echo "'";
                        //     echo " onclick='getWashPackage(";
                        //     echo $i;
                        //     echo ")' >";
                        //     echo "<label for = 'washType'> ";
                        //     echo $_SESSION['washpackages'][$i]['Name'];
                        //     echo "</label>";
                        //     echo "</div>";
                        // } else {
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
                        // }
                        $i = $i + 1;
                    }
                    ?>
                    <!-- <div class="wash-select-radio">
                        <input type="radio" name="washType" id="interiorCleaning" class="washType1" value="Interior Cleaning" checked>
                        <label for="washType">Interior Cleaning</label>
                    </div>
                    <div class="wash-select-radio">
                        <input type="radio" name="washType" id="interior&ExteriorCleaning" class="washType1" value="Exterior Washing & Interior Cleaning">
                        <label for="washType">Exterior Washing & Interior Cleaning</label>
                    </div>
                    <div class="wash-select-radio">
                        <input type="radio" name="washType" id="interior&ExteriorCleaning" class="washType1" value="Sanitization">
                        <label for="washType">Sanitization</label>
                    </div> -->

                </form>

            </div>
        </div>
        <div id="dd"></div>
        <div class="next-pg">
            <?php
            // echo $_SESSION['servicePrice'][0]['Price'];
            // echo $reservationDetails[0]['Price'];
            // if ($reservationDetails[0]['Price'] === $_SESSION['servicePrice'][0]['Price']) {
            //     echo '<span class="priceBox" id="priceValue1">';
            //     echo "Rs. " .$reservationDetails[0]['Price'];
            //     echo "</span>";
            // } else {
            echo '<span class="priceBox" style="display:block;" id="priceValue1">';
            echo "Rs. " . $reservationDetails[0]['Price'];
            echo "</span>";
            // }
            ?>
            <button class="next-button" onclick="checkRescheduleDetails('<?php echo $rescheduleID; ?>');">Next</button>

            <!-- <a href="/booking/location" style="color: white;">Next</a></button> -->
        </div>
    </div>


    <div class="container" id="cal1" style="display:none;">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h3 style="color:white;">Select an available time slot <b>( Red - unavailable )</b></h3>
                    <h1 style="color:white;"></h1>
                    <p style="color:white;"></p>
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
        reservationDetails = <?php echo json_encode($_SESSION['reservationDetails']); ?>;
    </script>
    <script>
        booked = <?php echo json_encode($booked); ?>;
    </script>
    <script src="/public/js/CustomerCalendar.js"></script>
    <script src="/public/js/CustomerReschedule.js"></script>

    <script>
        var pausecontent = <?php echo json_encode($_SESSION['washpackages']); ?>;
        var vehicles = <?php echo json_encode($_SESSION['vehicles']); ?>;
        var prices = <?php echo json_encode($_SESSION['servicePrice']); ?>;
    </script>
</body>

<!-- </div> -->