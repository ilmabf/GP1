<?php

include 'UserLoggedInHeader.php';
?>

<body onload="typeWriter()">
    <div style="min-height: 110px;"></div>

    <div>
        <div class="heading">
            <h2>Reschedule your reservation</h2>
        </div>

        <p id="sub-heading-p"></p>
    </div>

    <div class="wash-date">
        <h3>Wash Date</h3>

        <div id="closeOnClick">
            <div class="dateWash">2021 - 10 - 15</div>
        </div>
    </div>

    <div class="select-time">
        <h3>Select Time Period</h3>

        <div class="select-time-box">
            <form action="" method="post">
                <select name="time" id="time-types">
                    <option value="8 am - 10 am">8 am - 10 am</option>
                    <option value="12 pm - 2 pm">12 pm - 2 pm</option>
                    <option value="4 pm - 6 pm">4 pm - 6 pm</option>
                </select>
            </form>
        </div>
    </div>

    <div class="select-vehicle">
        <h3>Select Your Vehicle</h3>

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

        <h3>Select Your Wash Type</h3>

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

    <div class="price">
        <h3>Price</h3>
        <div class="price-display">Rs 1200</div>
    </div>

    <div class="next-pg">
        <button class="next-button"><a href="/booking/location" style="color: white;">Next</a></button>
    </div>

    <script src="/public/js/CustomerBookAWash.js"></script>

</body>