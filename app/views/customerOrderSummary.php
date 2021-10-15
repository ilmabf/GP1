<?php

include 'UserLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-order">
    <h2>Order Summary</h2>

</div>
<div id="box3">
    <p style="color: red; font-size: 12px; text-align:center">* Once you confirm your order you can only cancel/reschedule up until 24 hours before the reservation time</p><br>
    <div class="box3">

        <div class="box2">
            <div class="res">
                <div class="orderitem">Date</div>
                <div class="orderitemx">2021 / 10 / 20</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button></div>

            </div>
            <div class="res">
                <div class="orderitem">Time</div>
                <div class="orderitemx">8 am - 10 am</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button></div>

            </div>

            <div class="res">
                <div class="orderitem">Location</div>
                <div class="orderitemx">ABC Road Kandy</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/location" style="color:white;">Change</a></button></div>

            </div>
            
            <div style = "width:100%;float: left;position: absolute;top: 43%;">
                <p>---------------------------------------------------------------------------------</p>
            </div>
            <br>
            <div class="res">

                <div class="orderitem">Vehicle</div>
                <div class="orderitemx">AD - 2315</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button></div>
            </div>

            <div class="res">
                <div class="orderitem">Wash Type</div>
                <div class="orderitemx">Interior Cleaning</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/details" style="color:white;">Change</a></button></div>

            </div>
            
            <div style = "width:100%;float: left;position: absolute;top: 73%;">
                <p>---------------------------------------------------------------------------------</p>
            </div>
            <br>
            <div class="res">
                <div class="orderitem">Wash Price Rs.</div>
                <div class="orderitemx">1000/-</div>

            </div>
            <div class="res">
                <div class="orderitem">Total Price Rs.</div>
                <div class="orderitemx">1050/-</div>

            </div>
            <div style = "width:100%;float: left;position: absolute;    top: 91%;">
                <p>---------------------------------------------------------------------------------</p>
            </div>
        </div>


    </div>


    <div class="order-buttons">
        <button class="bt" id="cancelBtn" onclick="openCancelOrder()"><a>Cancel Order</a></button>
        <button class="bt2" id="confirmBtn" onclick="openConfirmOrder()"><a>Confirm Order</a></button>
    </div>
</div>
<div class="addVehicleform" id="cancelPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Do you want to cancel your booking?</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup"><a href="/user/home" style="color:White;">Yes</a></button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeCancelOrder()">No</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="confirmPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Your order has been confirmed. Thank you!</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" style="width: 115px;"><a href="/user/home" style="color:White; ">Return Home</a></button>
        </form>

    </div>
</div>
<script src="/public/js/customerOrderSummary.js"></script>
<div style="min-height: 110px;"></div>