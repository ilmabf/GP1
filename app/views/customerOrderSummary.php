<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-order">
    <h2>Order Summary</h2>
</div>

<div class="order-box">
    <div class="order-subBox">
        <div class="orderID">
            <h3 class="a1">Order ID</h3>
            <p class="a1 p1">AAAA</p>
        </div>
        <div class="orderDate">
            <h3 class="a2">Date</h3>
            <p class="a2 p1">2021 / 10 / 20</p>
            <button class="a2"><a href="/booking/bookAWash">Change</a></button>
        </div>
        <div class="orderTime">
            <h3 class="a3">Time</h3>
            <p class="a3 p1">8 am - 10 am</p>
            <button class="a3"><a href="/booking/bookAWash">Change</a></button>
        </div>
        <div class="orderVehicle">
            <h3 class="a4">Vehicle</h3>
            <p class="a4 p1">AD - 2315</p>
            <button class="a4"><a href="/booking/bookAWash">Change</a></button>
        </div>
        <div class="orderServiceType">
            <h3 class="a5">Type</h3>
            <p class="a5 p1">Interior Cleaning</p>
            <button class="a5"><a href="/booking/bookAWash">Change</a></button>
        </div>
        <div class="orderLocation">
            <h3 class="a6">Location</h3>
            <p class="a6 p1">ABC Road Kandy</p>
            <button class="a6"><a href="/booking/bookAWash2">Change</a></button>
        </div>
        <div class="orderPrice">
            <h3 class="a7">Price Rs.</h3>
            <p class="a7 p1">1000</p>
        </div>
        <p style="color: red; font-size: 12px;">* please do the changes or cancel order before 24 hours of reservation time</p>
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
            <button class="btnCancel"><a href="/booking/customerHome">Yes</a></button>
        </div>
    </div>

</div>

<div id="confirmPopUpId" class="confirmPopUpclass">

  
    <div class="confirmPopUpContent-content">
        <span class="closeConfirm">&times;</span>
        <p>Your Order is success. Thank You!</p>
        <div class="yesConfirm">
            <button class="btnConfirm"><a href="/booking/customerHome">Retrun to Home Page</a></button>
        </div>
    </div>

</div>

<script src="/public/js/customerOrderSummary.js"></script> 


<?php
    include 'userFooter.php';
?>