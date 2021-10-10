<?php
include 'userLoggedInHeader.php';
?>

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Upcoming Reservations</h2>
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
                <div class="orderitem">Order ID</div>
                <p class="orderitem1">AAAA</p>
            </div>
            <div class="order">
                <div class="orderitem">Vecicle No</div>
                <p class="orderitem1">AD - 2234</p>
            </div>
            <div class="order">
                <div class="orderitem">Time</div>
                <p class="orderitem1">8 am - 10 am</p>
            </div>
            <div class="orderView">
                <p class="viewLink"><a href="/booking/upcomingOrder">View order</a></p>
                <p class="team2">Assigned Service Team A</p>
            </div>
        </div>

        <div class="sub-box1">
            <div class="order">
                <div class="orderitem">Order ID</div>
                <p class="orderitem1">BBBB</p>
            </div>
            <div class="order">
                <div class="orderitem">Vecicle No</div>
                <p class="orderitem1">XZ - 2874</p>
            </div>
            <div class="order">
                <div class="orderitem">Time</div>
                <p class="orderitem1">10 am - 12 pm</p>
            </div>
            <div class="orderView">
                <p class="viewLink"><a href="/booking/upcomingOrder">View order</a></p>
                <p class="team">Not Assigned</p>
            </div>
        </div>

        <div class="sub-box1">
            <div class="order">
                <div class="orderitem">Order ID</div>
                <p class="orderitem1">CCCC</p>
            </div>
            <div class="order">
                <div class="orderitem">Vecicle No</div>
                <p class="orderitem1">AR - 1142</p>
            </div>
            <div class="order">
                <div class="orderitem">Time</div>
                <p class="orderitem1">2 pm - 4 pm</p>
            </div>
            <div class="orderView">
                <p class="viewLink"><a href="/booking/upcomingOrder">View order</a></p>
                <p class="team">Not Assigned</p>
            </div>
        </div>

    </div>

    <div style="min-height: 110px;"></div>