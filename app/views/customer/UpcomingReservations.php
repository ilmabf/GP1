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
        <div id="closeClick">
            <br>
            <div style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa; display:inline;">Date :</div>
            <input id="ManagerUpcomingDate" name="managerDateofUpcomingBooking" class="dateBooking" style="width: 50%; padding:unset; border-radius: unset; text-align: center;">

        </div>
    </div>
    <div class="mainUpcoming" id="box3">
        <div class="upcomingOrders" id="customerUpcomingReservations">
        </div>
    </div>
    <div style="min-height: 110px;"></div>
</div>

<div class="addVehicleform" id="confirmPopUpId">
    <div class="forma">

        <h2 class="login-signupheader">Your reservation has been confirmed. Thank you!</h2>

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