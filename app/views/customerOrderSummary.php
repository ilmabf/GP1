<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-order">
    <h2>Order Summary</h2>
    
</div>
<div  id = "box3">
<p style="color: red; font-size: 12px; text-align:center">* please do the changes or cancel order before 24 hours of reservation time</p>
<div class="box3">
        
        <div class="box2">
            <div class="res">
                <div class="orderitem">Date</div>
                <div class="orderitemx">2021 / 10 / 20</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/bookAWash" style="color:white;">Change</a></button></div>
                
            </div>
            <div class="res">
                <div class="orderitem">Time</div>
                <div class="orderitemx">8 am - 10 am</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/bookAWash" style="color:white;">Change</a></button></div>
                
            </div>

            <div class="res">
                <div class="orderitem">Location</div>
                <div class="orderitemx">ABC Road Kandy</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/bookAWash" style="color:white;">Change</a></button></div>
                
            </div>

            <div class="res">
                <div class="orderitem">Vehicle</div>
                <div class="orderitemx">AD - 2315</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/bookAWash" style="color:white;">Change</a></button></div>
            </div> 

            <div class="res">
                <div class="orderitem">Type</div>
                <div class="orderitemx">Interior Cleaning</div>
                <div class="orderitem2"><button class="changebutton"><a href="/booking/bookAWash" style="color:white;">Change</a></button></div>
                
            </div>

            <div class="res">
                <div class="orderitem">Total Price Rs.</div>
                <div class="orderitemx">1000/-</div>
                
            </div>
        </div>

        
    </div>


<div class="order-buttons">
    <button class="orderButtons a8 a81" id="cancelBtn" onclick = "openCancelOrder()"><a>Cancel Order</a></button>
    <button class="orderButtons a9" id="confirmBtn" onclick = "openConfirmOrder()"><a>Confirm Order</a></button>
</div>
</div>
<!-- <div id="cancelPopUpId" class="cancelPopUpclass">

  Modal content
    <div class="cancelPopUpContent-content">
        <span class="closeCancel">&times;</span>
        <p>Do you need to Cancel your Booking ?</p>
        <div class="yesCancel">
            <button class="btnCancel"><a href="/user/home">Yes</a></button>
        </div>
    </div>

</div> -->
<!-- 
<div id="confirmPopUpId" class="confirmPopUpclass">

  
    <div class="confirmPopUpContent-content">
        <span class="closeConfirm">&times;</span>
        <p>Your Order is success. Thank You!</p>
        <div class="yesConfirm">
            <button class="btnConfirm"><a href="/user/home">Return to Home Page</a></button>
        </div>
    </div>

</div> -->

<div class="addVehicleform" id = "cancelPopUpId">
    <div class="forma">
        
        <h2 class="login-signupheader">Do you want to cancel your booking?</h2>

        <form action="" method="post" id="customer-signup">
            
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup"><a href="/user/home" style = "color:White;">Yes</a></button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick = "closeCancelOrder()">No</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id = "confirmPopUpId">
    <div class="forma">
        
        <h2 class="login-signupheader">Your order has been confirmed. Thank you!</h2>

        <form action="" method="post" id="customer-signup">
            
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" style = "width: 115px;"><a href="/user/home" style = "color:White; ">Return Home</a></button>
        </form>

    </div>
</div>
<script src="/public/js/customerOrderSummary.js"></script> 
<div style="min-height: 110px;"></div>

<?php
    include 'userFooter.php';
?>