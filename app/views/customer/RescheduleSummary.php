<?php

include 'views/user/LoggedInHeader.php';
$rescheduleID = $_SESSION['rescheduleID'];
?>
<style>
    table,
    tr {
        border: hidden;
    }

    td,
    th {
        border: hidden;
    }
</style>
<div style="min-height: 110px;"></div>

<div class="heading-order">
    <h2>Order Summary</h2>

</div>
<div id="box3">
    <p style="color: red; font-size: 12px; text-align:center">* Once you confirm your order you can only cancel/reschedule up until 24 hours before the reservation time</p><br>
    <div class="box3">
        <section class="">
            <table class="">
                <tbody>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Date</td>
                        <td style="text-align:left; color:#193498; " id="date"></td>
                        <td>
                            <button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Time</td>
                        <td style="text-align:left; color:#193498; " id="time"></td>
                        <td>
                            <button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Location</td>
                        <td style="text-align:left; color:#193498;  font-size: small;" id="address">
                        </td>
                        <td>
                            <button class="changebutton"><a href="/booking/location" style="color:white;">Change</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Vehicle</td>
                        <td style="text-align:left; color:#193498; " id="vehicle">
                        </td>
                        <td>
                            <button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Wash Type</td>
                        <td style="text-align:left; color:#193498;  " id="washPackage">
                        </td>
                        <td>
                            <button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Wash Price</td>
                        <td style=" color:#193498;  " id="price">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left; color:#193498; font-weight:bold">Service Charge</td>
                        <td style=" color:#193498; " id="total">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- <div class="boxOrderSum">
            <div class="res">
                <div class="orderitem">Date</div>
                <div class="orderitemx" id="date">2021 / 10 / 20</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/rescheduleDetails/<?php echo $rescheduleID; ?>" style="color:white;">Change</a></button></div>

            </div>
            <div class="res">
                <div class="orderitem" style="margin-right: 0px;">Time</div>
                <div class="orderitemx" id="time">8 am - 10 am</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/rescheduleDetails/<?php echo $rescheduleID; ?>" style="color:white;">Change</a></button></div>

            </div>

            <div class="res">
                <div class="orderitem" style="margin-right: 0px;">Location</div>
                <div class="orderitemx" id="address" style="font-size: small;">ABC Road Kandy</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/rescheduleLocation/<?php echo $rescheduleID; ?>" style="color:white;">Change</a></button></div>

            </div>

            <div style="width:100%;float: left;position: absolute;top: 43%;">
                <p>---------------------------------------------------------------------------------</p>
            </div>
            <br>
            <div class="res">

                <div class="orderitem">Vehicle</div>
                <div class="orderitemx" id="vehicle">AD - 2315</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/rescheduleDetails/<?php echo $rescheduleID; ?>" style="color:white;">Change</a></button></div>
            </div>

            <div class="res">
                <div class="orderitem">Wash Type</div>
                <div class="orderitemx" id="washPackage">Interior Cleaning</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/rescheduleDetails/<?php echo $rescheduleID; ?>s" style="color:white;">Change</a></button></div>

            </div>

            <div style="width:100%;float: left;position: absolute;top: 73%;">
                <p>---------------------------------------------------------------------------------</p>
            </div>
            <br>
            <div class="res">
                <div class="orderitem">Wash Price Rs.</div>
                <div class="orderitemx" id="price">1000/-</div>

            </div>
            <div class="res">
                <div class="orderitem">Total Price Rs.</div>
                <div class="orderitemx" id="total">1050/-</div>

            </div>
            <div style="width:100%;float: left;position: absolute;    top: 91%;">
                <p>---------------------------------------------------------------------------------</p>
            </div>
        </div> -->


    </div>

    <div class="box4">
        <div class="order-buttons">
            <button class="bt" id="cancelBtn" onclick="openCancelOrder()"><a>Cancel</a></button>
            <button class="bt2" id="confirmBtn" onclick="openConfirmOrder()"><a>Reschedule Order</a></button>
        </div>
    </div>

    <div id="test"></div>
</div>
<div class="addVehicleform" id="cancelPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Do you want to cancel your reschedule?</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" onclick="cancelOrderProcess('<?php echo $rescheduleID; ?>');">Yes</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeCancelOrder()">No</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="confirmPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Your reschedule has been confirmed. Thank you!</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" onclick="rescheduleOrder('<?php echo $rescheduleID; ?>');" class="formSubmitButton" type="button" name="signup" style="width: 115px;">Return Home</button>
        </form>

    </div>
</div>
<script src="/public/js/CustomerOrderSummary.js"></script>
<div style="min-height: 110px;"></div>
<script>
    let x = document.cookie
    document.getElementById("test").innerHTML = x;

    var cookieArray = document.cookie.split(";");
    var i = 0;
    for (i = 0; i < cookieArray.length; i++) {
        cookieArray[i] = cookieArray[i].trim();
        if (cookieArray[i].substring(0, 3) === "day") {
            var date = cookieArray[i].substring(4);
        }
        if (cookieArray[i].substring(0, 5) === "month") {
            var month = cookieArray[i].substring(6);
        }
        if (cookieArray[i].substring(0, 4) === "year") {
            var year = cookieArray[i].substring(5);
        }
        if (cookieArray[i].substring(0, 4) === "time") {
            var time = cookieArray[i].substring(5);
        }
        if (cookieArray[i].substring(0, 7) === "address") {
            var address = cookieArray[i].substring(8);
        }
        if (cookieArray[i].substring(0, 7) === "vehicle") {
            var vehicle = cookieArray[i].substring(8);
        }
        if (cookieArray[i].substring(0, 15) === "washPackageName") {
            var washPackage = cookieArray[i].substring(16);
        }
        if (cookieArray[i].substring(0, 5) === "price") {
            var price = cookieArray[i].substring(6);
        }
        if (cookieArray[i].substring(0, 5) === "total") {
            var total = cookieArray[i].substring(6);
        }
    }
    //let p = price.substring(6);
    document.getElementById("date").innerHTML = year + " / " + month + "/ " + date;
    document.getElementById("time").innerHTML = time;
    document.getElementById("address").innerHTML = address;
    document.getElementById("vehicle").innerHTML = vehicle;
    document.getElementById("washPackage").innerHTML = washPackage;
    document.getElementById("price").innerHTML = "Rs. " + price + ".00";
    document.getElementById("total").innerHTML = "Rs. " + total + ".00";

    function deleteCookie() {
        document.cookie = "day=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "month=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "year=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "washPackage=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "washPackageName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "price=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "total=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "address=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "latitude=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "longitude=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "time=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "vehicle=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    function rescheduleOrder(orderID) {

        var parameters = document.cookie;
        //delete cookies
        parameters = parameters.replace(/ /g, "_");
        parameters = parameters.replace('\/', "|");
        deleteCookie();
        window.location = "/booking/updateReservation/" + parameters + "/" + orderID;
    }

    function cancelOrderProcess(orderID) {

        //delete cookies

        deleteCookie();
        window.location = "/booking/upcomingOrder/" + orderID;
    }
</script>