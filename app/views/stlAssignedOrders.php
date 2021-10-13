<?php
include 'UserLoggedInHeader.php';
?>
<div class="bgImage" style="min-height: 100%;">
    <div style="min-height: 110px;"></div>
    <div>
        <h1 class="stl-dashboard-h1">Today's Reservations</br></h1>

        <h3 style="text-align:center;"><?php echo date("Y-m-d"); ?> </h3>


        <div class="upcomingOrders">

            <div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Service</div>
                    <p class="orderitem1">Interior</p>
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
                    <p class="viewLink"><a href="/calendar/orderDetails">View order</a></p>
                </div>
            </div>

            <div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Service</div>
                    <p class="orderitem1">Exterior</p>
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
                    <p class="viewLink"><a href="/calendar/orderDetails">View order</a></p>
                </div>
            </div>

            <div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Service</div>
                    <p class="orderitem1">Sanitization</p>
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
                    <p class="viewLink"><a href="/calendar/orderDetails">View order</a></p>
                </div>
            </div>

        </div>

        <div style="min-height: 110px;"></div>