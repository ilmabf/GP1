<?php

include 'views/user/LoggedInHeader.php';
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
    <p style="color: red; font-size: 12px; text-align:center">* Once you confirm your order you can only
        cancel/reschedule up until 24 hours before the reservation time</p><br>
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
    </div>

    <div class="box4">
        <div class="order-buttons">
            <button class="bt" id="cancelBtn" onclick="openCancelOrder()"><a>Cancel Order</a></button>
            <button class="bt2" id="confirmBtn" onclick="makeOrder();"><a>Confirm Order</a></button>
        </div>
    </div>

    
</div>
<div class="addVehicleform" id="cancelPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Do you want to cancel your booking?</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" onclick="cancelOrderProcess();">Yes</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeCancelOrder()">No</button>
        </form>

    </div>
</div>


<script src="/public/js/CustomerOrderSummary.js"></script>
<div style="min-height: 110px;"></div>

