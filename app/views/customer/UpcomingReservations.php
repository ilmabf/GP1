<?php
include 'views/user/LoggedInHeader.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<div class="bgImage">
    <div style="min-height: 110px;"></div>
    <div class="heading">
        <h2>My Upcoming Reservations</h2>
    </div>

    <div class="reservation-date">
        <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

        <div id="closeClick">
            <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
            <br>
            <div style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa; display:inline;">Date :</div>
            <input id="ManagerUpcomingDate" name="managerDateofUpcomingBooking" class="dateBooking" style="width: 50%; padding: unset;
    border-radius: unset; text-align: center;">

        </div>
    </div>
    <div class="mainUpcoming" id = "box3">
        <div class="upcomingOrders" id="customerUpcomingReservations">

            <!-- <div class="sub-box1">
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
                    <p class="viewLink"><a href="/booking/upcomingOrder">View order</a></p>
                    <p class="team2">A service team has been assigned for you</p>
                </div>
            </div> -->

        </div>
    </div>
    <!-- <?php print_r($_SESSION['myUpcomingReservations']); ?> -->
    <div style="min-height: 110px;"></div>
</div>

<div class="addVehicleform" id="confirmPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Your order has been confirmed. Thank you!</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" style="width: 115px;"><a href="/booking/upcoming" style="color: white;">Return</a></button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="confirmPopUpId2">
    <div class="forma">

        <h2 class="login-signupheader">You have successfully rescheduled your booking. Thank you!</h2>

        <form action="" method="post" id="customer-signup">

            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" style="width: 115px;"><a href="/booking/upcoming" style="color: white;">Return</a></button>
        </form>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
    var orders = <?php echo json_encode(array_values($_SESSION['myUpcomingReservations'])); ?>;
</script>
<script src="/public/js/CustomerUpcomingReservations.js"></script>

<?php
if (isset($_SESSION['BookingSuccess'])) { ?>
    <script>
        openConfirmOrder();
    </script>";

<?php unset($_SESSION['BookingSuccess']);
}  ?>

<?php
if (isset($_SESSION['RescheduleSuccess'])) { ?>
    <script>
        openConfirmOrder2();
    </script>";

<?php unset($_SESSION['RescheduleSuccess']);
}  ?>
