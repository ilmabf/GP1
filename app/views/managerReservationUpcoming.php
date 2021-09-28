<?php 
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Upcoming Reservations</h2>
</div>

<div class="reservation-date">
    <h3>Date</h3>

    <div id="closeClick">
        <button class="btnclss" onclick="closeOnClickDemo()">Click to open date picker</button>
        <input type="text" id="date">

    </div>
</div>

<div class="upcomingOrders">
    <h3>Upcoming Orders</h3>
    <div class="sub-box1">
        <div class="orderID">
            <h3 class="a1">Order ID</h3>
            <p class="a1 p1">AAAA</p>
        </div>
        <div class="vehicleNo">
            <h3 class="a2">Vecicle No</h3>
            <p class="a2 p1">AD - 2234</p>
        </div>
        <div class="orderTime">
            <h3 class="a3">Time</h3>
            <p class="a3 p1">8 am - 10 am</p>
        </div>
        <div class="orderView">
            <p class="viewLink"><a href="/manager/viewUpcomingOrder">View order</a></p>
            <p class="team">Assigned Service Team A</p>
        </div>
    </div>

    <div class="sub-box1">
        <div class="orderID">
            <h3 class="a1">Order ID</h3>
            <p class="a1 p1">BBBB</p>
        </div>
        <div class="vehicleNo">
            <h3 class="a2">Vecicle No</h3>
            <p class="a2 p1">XZ - 2874</p>
        </div>
        <div class="orderTime">
            <h3 class="a3">Time</h3>
            <p class="a3 p1">10 am - 12 pm</p>
        </div>
        <div class="orderView">
            <p class="viewLink"><a href="/manager/viewUpcomingOrder">View order</a></p>
            <p class="team">Not Assigned</p>
        </div>
    </div>

    <div class="sub-box1">
        <div class="orderID">
            <h3 class="a1">Order ID</h3>
            <p class="a1 p1">CCCC</p>
        </div>
        <div class="vehicleNo">
            <h3 class="a2">Vecicle No</h3>
            <p class="a2 p1">AR - 1142</p>
        </div>
        <div class="orderTime">
            <h3 class="a3">Time</h3>
            <p class="a3 p1">2 pm - 4 pm</p>
        </div>
        <div class="orderView">
            <p class="viewLink"><a href="/manager/viewUpcomingOrder">View order</a></p>
            <p class="team">Not Assigned</p>
        </div>
    </div>

</div>

<div style="min-height: 110px;"></div>