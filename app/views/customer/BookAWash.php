<?php

include 'views/user/LoggedInHeader.php';
?>
<!-- <div class="bgImage2"> -->

<body onload="typeWriter()">
    <div style="min-height: 110px;"></div>

    <div>
        <div class="heading">
            <h2>Start Your Booking!</h2>
        </div>

        <p id="sub-heading-p"></p>
    </div>
    <div class="dateTime">
        <div class="wash-date">
            <h3>Select a convenient date & available time slot from the calendar</h3>

            <div id="closeOnClick">
                <div class="dateWash"><button id="wandiwashCalendar"><i class="far fa-calendar" sizes="64x64"> View</i></button></div>
            </div>
        </div>

    </div>

    <div class="vehicleWash">
        <div class="select-vehicle">
            <h3>Select your vehicle</h3>

            <div class="select-vehcile-box">
                <form action="" method="post">
                    <select name="vehicle" id="vehicle-types">
                        <option value="JQ - 4323">JQ - 4323</option>
                        <option value="AS - 4256">AS - 4256</option>
                        <option value="BH - 8975">BH - 8975</option>
                        <option value="AZ - 4623">AZ - 4623</option>
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

    <div class="next-pg">
        <span class="priceBox">Rs 1000</span>
        <button class="next-button">

            <a href="/booking/location" style="color: white;">Next</a></button>
    </div>

    <script src="/public/js/CustomerCalendar.js"></script>
    <script src="/public/js/CustomerBookAWash.js"></script>

</body>
<!-- </div> -->