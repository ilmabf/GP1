<?php

include 'views/user/LoggedInHeader.php';
$vehicles = $_SESSION['vehicles'];
$booked = $_SESSION['booked'];
?>

<link rel="stylesheet" href="/public/css/actors/customer/BookAWashCalendar.css" />

<body onload="typeWriter(0)">

    <div style="min-height: 110px;"></div>
    <div id="bookingContent" >
        <div>
            <div class="heading">
                <h2 style="font-size: 30px;">Start Your Booking!</h2>
            </div>
            <!-- <div id="xx"></div> -->
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
                <!-- <?php print_r($booked); ?> -->
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

                <!-- <div class="select-vehcile-box">
                    <form action="" method="post">
                        <select name="vehicle" id="vehicles" onchange="getVehicle();">
                            <?php
                            $count  = 0;
                            while ($count < sizeof($_SESSION['vehicles'])) {
                                echo "<option value='";
                                echo $vehicles[$count]['VID'];
                                echo "' onclick = 'clearWashPackage();'>";
                                echo $vehicles[$count]['VID'];
                                echo "</option>";
                                $count = $count + 1;
                            }
                            ?>
                        </select>
                    </form>
                </div> -->
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
            <span class="priceBox" style="display:none;" id="priceValue"></span>
            <button class="next-button" onclick="checkDetails();">Next</button>

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

    <script src="/public/js/CustomerCalendar.js"></script>
    <script src="/public/js/CustomerBookAWash.js"></script>
    <script type="text/javascript">
        const date = new Date();
        var h, i, j, z, a, flag1, flag2;

        flag1 = 0;
        flag2 = 0;

        var months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];

        const renderCalendar = () => {
            date.setDate(1);

            const monthDays = document.querySelector(".days");

            const lastDay = new Date(
                date.getFullYear(),
                date.getMonth() + 1,
                0
            ).getDate();

            const prevLastDay = new Date(
                date.getFullYear(),
                date.getMonth(),
                0
            ).getDate();

            const firstDayIndex = date.getDay();

            const lastDayIndex = new Date(
                date.getFullYear(),
                date.getMonth() + 1,
                0
            ).getDay();

            const nextDays = 7 - lastDayIndex - 1;

            document.querySelector(".date h1").innerHTML = months[date.getMonth()];

            document.querySelector(".date p").innerHTML = new Date().toDateString();

            var days = "";

            for (var x = firstDayIndex; x > 0; x--) {
                h = prevLastDay - x + 1;
                days += `<div class="prev-date">
                
              </div>`;

            }

            var month = ("0" + (date.getMonth() + 1)).slice(-2);
            var monthStr = month.toString();

            var booked = <?php echo json_encode($booked); ?>;

            var timeSlotsArr = ["08-10 A.M.", "10-12 A.M.", "12-14 P.M.", "14-16 P.M.", "16-18 P.M."];

            for (i = 1; i <= lastDay; i++) {
                flag1 = 0;
                flag2 = 0;
                if (
                    i === new Date().getDate() &&
                    date.getMonth() === new Date().getMonth()
                ) {
                    days +=
                        `<div class="today"><span class="today-1" style = "color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">${i}</span><br>`;
                    flag1 = 0;
                    flag2 = 0;
                    for (a = 1; a <= 5; a++) {
                        flag1 = 0;
                        for (var key in booked) {
                            console.log(booked[key]);
                            // split the key by '-'
                            var keyArr = key.split("-");
                            // turn the keyArr values to string
                            if (keyArr[0] === date.getFullYear().toString() && keyArr[1] === monthStr && keyArr[2] === ("0" + (i)).slice(-2).toString() &&
                                timeSlotsArr[a - 1] === booked[key]) {
                                days +=
                                    `
                                            <span class="time-red" id = "slot1" onclick="getTimeAndDate(` +
                                    i +
                                    `,` +
                                    month +
                                    `,` +
                                    date.getFullYear() +
                                    `, booked)">${booked[key]}</span>`;
                                flag1 = 1;

                            }
                        }

                        if (flag1 == 0) {
                            days +=
                                `
                                            <span class="time-green" id = "slot1" onclick="getTimeAndDate(` +
                                i +
                                `,` +
                                month +
                                `,` +
                                date.getFullYear() +
                                `, ` + a + `)">${timeSlotsArr[a - 1]}</span>`;

                        }
                    }
                    days += `</div>`;

                } else {
                    days +=
                        `<div><span class="today-2" style = "color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">${i}</span><br>`;
                    for (a = 1; a <= 5; a++) {
                        flag2 = 0;
                        // days += `<div>`;
                        for (var key in booked) {
                            // split the key by '-'
                            var keyArr = key.split("-");
                            // turn the keyArr values to string

                            if (keyArr[0] === date.getFullYear().toString() && keyArr[1] === monthStr && keyArr[2] === ("0" + (i)).slice(-2).toString() && timeSlotsArr[a - 1] === booked[key]) {
                                days +=
                                    `
                                            <span class="time-red" id = "slot1" onclick="getTimeAndDate(` +
                                    i +
                                    `,` +
                                    month +
                                    `,` +
                                    date.getFullYear() +
                                    `, booked)">${booked[key]}</span>`;

                                flag2 = 1;
                            }
                        }

                        if (flag2 == 0) {
                            // console.log(timeSlotsArr[a-1])
                            days +=
                                `
                                            <span class="time-green" id = "slot1" onclick="getTimeAndDate(` +
                                i +
                                `,` +
                                month +
                                `,` +
                                date.getFullYear() +
                                `, ` + a + `)">${timeSlotsArr[a - 1]}</span>`;
                        }
                    }
                    days += `</div>`;
                }
            }

            for (j = 1; j <= nextDays; j++) {
                days += `<div class="next-date">
                
            </div>`;
                // days += timeSlotsHTML;
                monthDays.innerHTML = days;
            }
        };

        document.querySelector(".prev").addEventListener("click", () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });

        document.querySelector(".next").addEventListener("click", () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();

        // get time and date
        function getTimeAndDate(date, month, year, t) {

            if (t != "booked") {
                var time;
                if (t == 1) {
                    time = "08-10 A.M.";
                } else if (t == 2) {
                    time = "10-12 A.M.";
                } else if (t == 3) {
                    time = "12-14 P.M.";
                } else if (t == 4) {
                    time = "14-16 P.M.";
                } else if (t == 5) {
                    time = "16-18 P.M.";
                }
                // Check if date is today. If so , check time. 
                var today = new Date();
                var selectedDate = year + "-" + month + "-" + date;
                // if (
                //     date == today.getDate() &&
                //     month == today.getMonth() + 1 &&
                //     year == today.getFullYear()
                // ) {
                //     console.log(today.getTimezoneOffset());
                //     var localTime = today.toLocaleTimeString('en-GB');
                //     var localTimeArray = localTime.split(":");
                //     var selectedTimeArray = time.split("-");
                //     if (parseInt(selectedTimeArray[0]) > parseInt(localTimeArray[0])) {
                //         document.getElementById("day").innerHTML = date;
                //         document.getElementById("month").innerHTML = month;
                //         document.getElementById("year").innerHTML = year;
                //         document.getElementById("timeSlot").innerHTML = time;

                //         document.cookie = "day = " + date + ";  path=/";
                //         document.cookie = "month = " + month + ";  path=/";
                //         document.cookie = "year = " + year + ";  path=/";
                //         document.cookie = "time = " + time + ";  path=/";

                //         document.getElementById("cal1").style = "display:none;";
                //         var z = document.getElementById("bookingContent");
                //         z.classList.remove("blurCalendar");
                //     }
                // } else {
                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                const mm = monthNames[today.getMonth()];
                const dd = String(today.getDate()).padStart(2, '0');
                const yyyy = today.getFullYear();
                var todayDate = today.getFullYear() + "-" + parseInt(today.getMonth() + 1) + "-" + today.getDate();

                var d1 = Date.parse(todayDate);
                var d2 = Date.parse(selectedDate);
                if (d2 > d1 && t != "booked") {
                    //display selected date
                    document.getElementById("day").innerHTML = "Date: " + date;
                    document.getElementById("month").innerHTML = month;
                    document.getElementById("year").innerHTML = year;
                    document.getElementById("timeSlot").innerHTML = "Time: " + time;
                    document.getElementById("slash1").innerHTML = "/";
                    document.getElementById("slash2").innerHTML = "/";

                    document.cookie = "day = " + date + ";path=/";
                    document.cookie = "month = " + month + ";path=/";
                    document.cookie = "year = " + year + ";path=/";
                    document.cookie = "time = " + time + ";path=/";

                    document.getElementById("cal1").style = "display:none;";
                    var z = document.getElementById("bookingContent");
                    z.classList.remove("blurCalendar");
                }
                // }
            }

        }
    </script>

<!-- set price and washpackage cookies  -->
    <script>
        var pausecontent = <?php echo json_encode($_SESSION['washpackages']); ?>;
        var vehicles = <?php echo json_encode($_SESSION['vehicles']); ?>;
        var prices = <?php echo json_encode($_SESSION['servicePrice']); ?>;
        // document.getElementById("priceValue").innerHTML = "";

        function getType(x) {
            var i = 0;
            var type = "";
            for (i = 0; i < vehicles.length; i++) {
                if (vehicles[i]['VID'] == x) {
                    type = vehicles[i]['Type'];
                }
            }
            return type;
        }

        function getWashPackage(n) {
            // document.getElementById("washPackage-" + n).checked = true;
            document.cookie = "washPackage = " + pausecontent[n]['Wash_Package_ID'] + ";  path=/";
            document.cookie = "washPackageName = " + pausecontent[n]['Name'] + ";  path=/";
            var x = document.getElementById("vehicles").value;
            var vehicleType = getType(x);
            var washPackage = pausecontent[n]['Wash_Package_ID'];
            var price = getPrice(vehicleType, washPackage);
            document.getElementById("priceValue").innerHTML = "Rs. " + price;
            document.getElementById("priceValue").style = "display:block;";
            document.cookie = "price = " + price + ";path=/";
        }

        function getPrice(type, package) {
            var i = 0;
            for (i = 0; i < prices.length; i++) {
                if (prices[i][0] == package && prices[i][1] == type) {
                    return prices[i][2];
                }
            }
        }
    </script>

<!-- Include price and washpackage cookies if there are any -->
    <!-- <script>
        var cookieArray = document.cookie.split(";");
        var i = 0;
        var price;
        var washp;
        for (i = 0; i < cookieArray.length; i++) {
            cookieArray[i] = cookieArray[i].trim();
            if (cookieArray[i].substring(0, 5) === "price") {
                price = cookieArray[i];
                let p = price.substring(6);
                document.getElementById("priceValue").innerHTML = "Rs. " + p;
                break;
            }

        }
        for (i = 0; i < cookieArray.length; i++) {
            if (cookieArray[i].substring(0, 11) === "washPackage") {
                washp = cookieArray[i];
                let w = washp.substring(12);
                w = "washPackage-" + w;
                document.getElementById(w).checked = true;
                break;
            }
        }
    </script> -->

</body>

<!-- </div> -->