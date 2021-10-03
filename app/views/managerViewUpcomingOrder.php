<div class="bgImage">
<?php 
    include 'userLoggedInHeader.php';
?>

<div class="cancelAssignForm" id = "assign">
    <div class="forma">
        <div class="loguser-icon"></div>
        <h2 class="login-signupheader">Do you want to cancel the assignment?</h2>

        <form action="" method="post" id="customer-signup">
            <button id="CloseCancelAssignButton" class="formCancelButton" type="submit" name="signup" onclick="closeassign()">Close</button>
            <button id="SubmitCancelAssignButton" class="formSubmitButton" type="submit" name="signup"><a href="/booking/upcoming" style = "color:white;">Yes</a></button>
        </form>

    </div>
</div>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Upcoming Order -  <span style="color:black;">AAAA</span></h2>
</div>


<div id = "upcoming">
<div class="upcoming">
    <!-- <div class="order-subBox"> -->

        <div class="boxx">

            <div class="order">
                <div class="orderitem">Customer Name</div>
                <div class="orderitem1">Gihan Anthony</div>
            </div>
            <div class="order">
                <div class="orderitem">Date</div>
                <div class="orderitem1">2021/10/18</div>
            </div>
            <div class="order">
                <div class="orderitem">Time</div>
                <div class="orderitem1">8 am - 10 am</div>
            </div>
            <div class="order">
                <div class="orderitem">Contact No</div>
                <div class="orderitem1">0775674896</div>
            </div>
        </div>

        <div class="boxx">
            <div class="order">
                <div class="orderitem">Vehicle No</div>
                <p class="orderitem1">AD - 2315</p>
            </div>
            <div class="order">
                <div class="orderitem">Model</div>
                <p class="orderitem1">Axio</p>
            </div>
            <div class="order">
                <div class="orderitem">Vehicle Type</div>
                <p class="orderitem1">Sedan</p>
            </div>
            <div class="order">
                <div class="orderitem">Color</div>
                <p class="orderitem1">Black</p>
            </div>
        </div>

        <div class="boxx">
            <div class="order">
                <div class="orderitem">Service Type</div>
                <p class="orderitem1">Interior Cleaning</p>
            </div>
            <div class="order">
                <div class="orderitem">Price</div>
                <p class="orderitem1">1000</p>
            </div>
            <div class="order">
                <div class="orderitem"><a href="">View Location</a></div>
            </div>
        </div>
    <!-- </div> -->
</div>

<form action="" method="post">
<div class="service-team">
    <h3>Service Team</h3>

    <div class="service-team-box">

            <select name="serviceTeam" id="serviceTeam-types">
                <option value="Not Selected">Team A</option>
            </select>
            <div class="reservation-buttons">
        <button class="reservationButtons a8" type="button" id="cancelAssignBtn" onclick="openassign()"><a>Cancel Assign</a></button>
    </div>
        
        
    </div>
    
    
</div>
</form>

<div class="reservation-buttons">
       
        <button class="reservationButtons a10" id="cancelReservationBtn" onclick="opencancel()"><a>Cancel Reservation</a></button>
</div>

</div>
<div class="addVehicleform" id = "cancelForm">
    <div class="forma">
        <div class="loguser-icon"></div>
        <h2 class="login-signupheader">Do you want to cancel the reservation?</h2>

        <form action="" method="post" id="customer-signup">
            <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closecancel()">Close</button>
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup"><a href="/booking/upcoming" style = "color:white;">Yes</a></button>
        </form>

    </div>
</div>


<div style="min-height: 110px;"></div>

<script src="/public/js/managerViewUpcomingOrder.js"></script> 