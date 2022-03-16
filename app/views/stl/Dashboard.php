<?php
include 'views/user/LoggedInHeader.php';
$booking = $_SESSION['bookings'];
$typeOfBookings = $_SESSION['typeOfBookings'];
?>
<div style="min-height: 110px;"></div>
<div>
    <h1 class="stl-dashboard-h1">Dashboard</h1>
    <!-- <?php print_r($_SESSION['typeOfBookings']); ?> -->
</div>

<div style="min-height: 50px;"></div>

<div style="display: block; text-align:center;" class="stlChartsR1">

    <div id="myPlot1" class="managerChart1" style="max-width:50%;"></div>
    <div id="myPlot2" class="managerChart2" style="max-width:50%;"></div>

</div>

<div class="stlChartsR2">
</div>

<script>
    // put the $booking array into a javascript array
    var booking = <?php echo json_encode($booking); ?>;
    var typeOfBookings = <?php echo json_encode($typeOfBookings); ?>;
    // console.log(booking);

    var data1 = [{
        // assign the key value of data1 to x-axis
        x: <?php echo json_encode(array_column($booking, 'Week')) ?>,
        y: <?php echo json_encode(array_column($booking, 'Reservations')) ?>,
        type: 'bar'
    }];

    

    var xArray = <?php echo json_encode(array_column($typeOfBookings, 'Name')) ?>;
    var yArray = <?php echo json_encode(array_column($typeOfBookings, 'Reservations')) ?>;

    
</script>

<script src = "/public/js/StlDashboard.js"></script>