<?php

include 'views/user/LoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Dashboard</h2>
    <!-- <?php print_r($_SESSION['bookings']); ?> -->
</div>

<div style="min-height: 50px;"></div>
<!-- <div class="managerChartsR1">
    <img src="/public/images/dashboardNoBooking.png" class="managerChart1">
    <img src="/public/images/dashboardRevenue.png" class="managerChart2">
</div> -->

<!-- <div class="managerChartsR2">
    <img src="/public/images/ManagerChart3.png" class="managerChart3">
    <img src="/public/images/ManagerChart4.png" class="managerChart4">
</div> -->

<div style="display: block;" class="managerChartsR1">

    <div id="myPlot1" class="managerChart1" style="max-width:50%;"></div>
    <div id="myPlot2" class="managerChart2" style="max-width:50%;"></div>

</div>

<div style="display: block;" class="managerChartsR2">

    <div id="myPlot3" class="managerChart3" style="max-width:50%;"></div>
    <div id="myPlot4" class="managerChart4" style="max-width:50%;"></div>

</div>

<script>
    var booking = <?php echo json_encode($_SESSION['bookings']); ?>;
    var typeOfBookings = <?php echo json_encode($_SESSION['typeOfBookings']); ?>;
    var revenue = <?php echo json_encode($_SESSION['revenue']); ?>;
    var teamBookings = <?php echo json_encode($_SESSION['teamBookings']); ?>;

    var data1 = [{
        // assign the key value of data1 to x-axis
        x: <?php echo json_encode(array_column($_SESSION['bookings'], 'Week')) ?>,
        y: <?php echo json_encode(array_column($_SESSION['bookings'], 'Reservations')) ?>,
        type: 'bar'
    }];



    var data2 = [{
        // assign the key value of data1 to x-axis
        x: <?php echo json_encode(array_column($_SESSION['revenue'], 'Week')) ?>,
        y: <?php echo json_encode(array_column($_SESSION['revenue'], 'Price')) ?>,
        type: 'bar'
    }];


    var xArray = <?php echo json_encode(array_column($_SESSION['typeOfBookings'], 'Name')) ?>;
    var yArray = <?php echo json_encode(array_column($_SESSION['typeOfBookings'], 'Reservations')) ?>;



    var xArray2 = <?php echo json_encode(array_column($_SESSION['teamBookings'], 'Service_team_leader_ID')) ?>;
    var yArray2 = <?php echo json_encode(array_column($_SESSION['teamBookings'], 'Reservations')) ?>;
</script>


<script src="/public/js/ManagerDashboard.js"></script>