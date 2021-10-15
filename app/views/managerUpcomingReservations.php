<?php
include 'UserLoggedInHeader.php';
?>

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Upcoming Reservations</h2>
    </div>

    <div class="reservation-date">
        <h3 style="text-align: center; color:#085394;">Pick a date</h3>

        <div id="closeClick">
            <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br>
            <br>
            <p style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa;">Reservations on: <?php echo date("Y:m:d"); ?> </p>

        </div>
    </div>
    <div class="mainUpcoming">
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
                    <p class="team2">Assigned - Service Team 1</p>
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
                    <p class="team">Team not assigned</p>
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
                    <p class="team">Team not assigned</p>
                </div>
            </div>

        </div>
    </div>
    <div style="min-height: 110px;"></div>