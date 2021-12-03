<?php

include 'views/user/LoggedInHeader.php';
$vehicles = $_SESSION['vehicles'];
?>
<!-- <div class="bgImage2"> -->
<link rel="stylesheet" href="/public/css/actors/customer/BookAWashCalendar.css" />

<body onload="typeWriter()">
    <div style="min-height: 110px;"></div>
    <div id="bookingContent">
        <div>
            <div class="heading">
                <h2 style="font-size: 30px;">Start Your Booking!</h2>
            </div>

            <p id="sub-heading-p" style="font-size: 15px;"></p>
        </div>
        <div class="dateTime">
            <div class="wash-date">
                <h3>Select a convenient date & available time slot from the calendar</h3>

                <div id="closeOnClick">
                    <div class="dateWash"><button id="wandiwashCalendar" onclick="viewCalendar();"><i class="far fa-calendar" sizes="64x64"> View</i></button></div>
                </div>
                <div id="selected">
                    <span id="day"></span>
                    <span> / </span>
                    <span id="month"></span>
                    <span> / </span>
                    <span id="year"></span>
                    <div id="timeSlot"></div>
                </div>

            </div>

        </div>

        <div class="vehicleWash">
            <div class="select-vehicle">
                <h3>Select your vehicle</h3>

                <div class="select-vehcile-box">
                    <form action="" method="post">
                        <select name="vehicle" id="vehicle-types">
                            <?php
                            $count  = 0;
                            while ($count < sizeof($_SESSION['vehicles'])) {
                                echo "<option value='";
                                echo $count + 1;
                                echo "'>";
                                echo $vehicles[$count]['VID'];
                                echo "</option>";
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
                    <div class="wash-select-radio">
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
                    </div>

                </form>

            </div>
        </div>
        <div id="dd"></div>
        <div class="next-pg">
            <span class="priceBox">Rs 1000</span>
            <button class="next-button">

                <a href="/booking/location" style="color: white;">Next</a></button>
        </div>
    </div>


    <div class="container" id="cal1" style="display:none;">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h3>Select a date & an available time <b>( Green - available )</b></h3>
                    <h1></h1>
                    <p></p>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days"></div>
        </div>
        <!-- <div class="button-calendar">
            <button class="bt2">

                <a href="/booking/details" style="color: white; text-decoration: none;">Next</a></button>

        </div> -->
    </div>

    <script src="/public/js/CustomerCalendar.js"></script>
    <script src="/public/js/CustomerBookAWash.js"></script>

</body>
<!-- </div> -->