<?php
include 'UserLoggedInHeader.php';
?>

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Completed Reservations</h2>
    </div>

    <div class="reservation-date">
        <h3 style="text-align: center; color:#085394;">Pick a date</h3>

        <div id="closeClick">
            <button class="btnclss" onclick="closeOnClickDemo()">Click to open date picker</button>
            <input type="text3" id="date">

        </div>
    </div>
    <div class="mainUpcoming">
        <div class="upcomingOrders">
            <div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Order ID</div>
                    <div class="orderitem1">AAAA</div>
                </div>
                <div class="order">
                    <div class="orderitem">Vecicle No</div>
                    <div class="orderitem1">AD - 2234</div>
                </div>
                <div class="order">
                    <div class="orderitem">Time</div>
                    <div class="orderitem1">8 am - 10 am</div>
                </div>
                <div class="orderView">
                    <p class="viewLink"><a href="/booking/completedOrder">View order</a></p>
                    <p class="team">Completed by Service Team A</p>
                </div>
            </div>

            <div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Order ID</div>
                    <div class="orderitem1">BBBB</div>
                </div>
                <div class="order">
                    <div class="orderitem">Vecicle No</div>
                    <div class="orderitem1">XZ - 2874</div>
                </div>
                <div class="order">
                    <div class="orderitem">Time</div>
                    <div class="orderitem1">10 am - 12 pm</div>
                </div>
                <div class="orderView">
                    <p class="viewLink"><a href="/booking/completedOrder">View order</a></p>
                    <p class="team">Completed by Service Team B</p>
                </div>
            </div>

            <div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Order ID</div>
                    <p class="orderitem1">AAAA</p>
                </div>
                <div class="order">
                    <div class="orderitem">Vecicle No</div>
                    <div class="orderitem1">AD - 2234</div>
                </div>
                <div class="order">
                    <div class="orderitem">Time</div>
                    <div class="orderitem1">8 am - 10 am</div>
                </div>
                <div class="orderView">
                    <p class="viewLink"><a href="/booking/completedOrder">View order</a></p>
                    <p class="team">Completed by Service Team A</p>
                </div>
            </div>
        </div>
    </div>
    <div style="min-height: 110px;"></div>