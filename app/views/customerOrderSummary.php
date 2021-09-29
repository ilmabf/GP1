<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-order">
    <h2>Order Summary</h2>
    
</div>
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
</div>

<div class="order-buttons">
    <button class="orderButtons a8" id="cancelBtn"><a>Cancel Order</a></button>
    <button class="orderButtons a9" id="confirmBtn"><a>Confirm Order</a></button>
</div>

<div id="cancelPopUpId" class="cancelPopUpclass">

  <!-- Modal content -->
    <div class="cancelPopUpContent-content">
        <span class="closeCancel">&times;</span>
        <p>Do you need to Cancel your Booking ?</p>
        <div class="yesCancel">
            <button class="btnCancel"><a href="/user/home">Yes</a></button>
        </div>
    </div>

</div>

<div id="confirmPopUpId" class="confirmPopUpclass">

  
    <div class="confirmPopUpContent-content">
        <span class="closeConfirm">&times;</span>
        <p>Your Order is success. Thank You!</p>
        <div class="yesConfirm">
            <button class="btnConfirm"><a href="/user/home">Return to Home Page</a></button>
        </div>
    </div>

</div>

<script src="/public/js/customerOrderSummary.js"></script> 


<?php
    include 'userFooter.php';
?>