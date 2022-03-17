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
<script src="/public/js/CustomerRescheduleSummary.js"></script>
<div style="min-height: 110px;"></div>