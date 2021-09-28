<?php 
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Upcoming Order</h2>
</div>

<div class="order-box3">
    <!-- <div class="order-subBox"> -->
        <div class="orderID">
            <h3 class="a1 p1">Order ID</h3>
            <p class="a1">AAAA</p>
        </div>

        <div class="viewCompleteOrder">

            <div class="orderDate">
                <h3 class="a2 p1">Customer Name</h3>
                <p class="a2">Gihan Anthony</p>
            </div>
            <div class="orderPrice">
                <h3 class="a7 p1">Date</h3>
                <p class="a7">2021/10/18</p>
            </div>
            <div class="orderPrice">
                <h3 class="a7 p1">Time</h3>
                <p class="a7">8 am - 10 am</p>
            </div>
            <div class="orderTime">
                <h3 class="a3 p1">Contact No</h3>
                <p class="a3">0775674896</p>
            </div>
        </div>

        <div class="viewCompleteOrder">
            <div class="orderVehicle">
                <h3 class="a4 p1">Vehicle No</h3>
                <p class="a4">AD - 2315</p>
            </div>
            <div class="orderServiceType">
                <h3 class="a5 p1">Model</h3>
                <p class="a5">Axio</p>
            </div>
            <div class="orderLocation">
                <h3 class="a6 p1">Vehicle Type</h3>
                <p class="a6">Sedan</p>
            </div>
            <div class="orderPrice">
                <h3 class="a7 p1">Color</h3>
                <p class="a7">Black</p>
            </div>
        </div>

        <div class="viewCompleteOrder">
            <div class="orderPrice">
                <h3 class="a7 p1">Service Type</h3>
                <p class="a7">Interior Cleaning</p>
            </div>
            <div class="orderPrice">
                <h3 class="a7 p1">Price</h3>
                <p class="a7">1000</p>
            </div>
            <div class="orderPrice">
                <h3 class="a7"><a href="">Location</a></h3>
            </div>
        </div>
    <!-- </div> -->
</div>


<div class="service-team">
    <h3>Assign  a Service Team</h3>

    <div class="service-team-box">
        <form action="" method="post">
            <select name="serviceTeam" id="serviceTeam-types">
                <option value="Not Selected">Not Selected</option>
                <option value="Team A">Team A</option>
                <option value="Team B">Team B</option>
            </select>
        </form>
    </div>
</div>

<div class="reservation-buttons">
        <button class="reservationButtons a8" id="cancelAssignBtn"><a>Cancel Assign</a></button>
        <button class="reservationButtons a10" id="cancelReservationBtn"><a>Cancel Reservation</a></button>
</div>

<div id="assignPopUpId" class="assignPopUpclass">

  <!-- Modal content -->
    <div class="assignPopUpContent-content">
        <span class="closeCancelAssign">&times;</span>
        <p>Do you need to Cancel Assign ?</p>
        <div class="yesCancelAssign">
            <button class="btnCancelAssign"><a href="/manager/viewUpcomingOrder">Yes</a></button>
        </div>
    </div>

</div>

<div id="cancelReservationPopUpId" class="cancelReservationPopUpclass">

  
    <div class="cancelReservationPopUpContent-content">
        <span class="closeCancelReservation">&times;</span>
        <p>Do you need to Cancel Reservation ?</p>
        <div class="yesCancelReservation">
            <button class="btnCancelReservation"><a href="/manager/viewUpcomingOrder">Yes</a></button>
        </div>
    </div>

</div>

<div style="min-height: 110px;"></div>

<script src="/public/js/managerViewUpcomingOrder.js"></script> 