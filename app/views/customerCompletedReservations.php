<?php 
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2 >Past Reservations</h2>
</div>

<div class="reservation-date">
    <h3 style="text-align: center; color:#085394;">Pick a date</h3>

    <div id="closeClick">
        <button class="btnclss" onclick="closeOnClickDemo()">Click to open date picker</button>
        <input type="text3" id="date">

    </div>
</div>
<!-- <h2  style="text-align: center; color:#085394;">My Reservations</h3> -->
<div class="upcomingOrders">
    
    <div class="sub-box1">
        <div class="order">
            <div class="orderitem">Vehicle No</div>
            <p class="orderitem1">AD - 2234</p>
        </div>
        <div class="order">
            <div class="orderitem">Date</div>
            <p class="orderitem1">2021/10/18</p>
        </div>
        <div class="order">
            <div class="orderitem">Time</div>
            <p class="orderitem1">8 am - 10 am</p>
        </div>
        <div class="orderView">
            <p class="viewLink"><a href="/booking/CompletedOrder">View Invoice</a></p>
        </div>
    </div>

    <div class="sub-box1">
        <div class="order">
            <div class="orderitem">Vehicle No</div>
            <p class="orderitem1">AD - 2234</p>
        </div>
        <div class="order">
            <div class="orderitem">Date</div>
            <p class="orderitem1">2021/10/30</p>
        </div>
        <div class="order">
            <div class="orderitem">Time</div>
            <p class="orderitem1">10 am - 12 pm</p>
        </div>
        <div class="orderView">
            <p class="viewLink"><a href="/booking/CompletedOrder">View Invoice</a></p>
        </div>
    </div>

    <div class="sub-box1">
        <div class="order">
            <div class="orderitem">Vehicle No</div>
            <p class="orderitem1">AD - 2234</p>
        </div>
        <div class="order">
            <div class="orderitem">Date</div>
            <p class="orderitem1">2021/11/18</p>
        </div>
        <div class="order">
            <div class="orderitem">Time</div>
            <p class="orderitem1">2 pm - 4 pm</p>
        </div>
        <div class="orderView">
            <p class="viewLink"><a href="/booking/CompletedOrder">View Invoice</a></p>
        </div>
    </div>

</div>

<div style="min-height: 110px;"></div>