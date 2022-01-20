<?php

include 'views/user/LoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Dashboard</h2>
    <!-- <?php print_r($_SESSION['bookings']);?> -->
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

    var layout1 = {
        title: 'Number of Bookings per Week on past month',
        xaxis: {
            title: 'Week'
        },
        yaxis: {
            title: 'Number of Bookings'
        }
    };

    Plotly.newPlot('myPlot1', data1, layout1);

    var data2 = [{
        // assign the key value of data1 to x-axis
        x: <?php echo json_encode(array_column($_SESSION['revenue'], 'Week')) ?>,
        y: <?php echo json_encode(array_column($_SESSION['revenue'], 'Price')) ?>,
        type: 'bar'
    }];

    var layout2 = {
        title: 'Revenue per Week on past month',
        xaxis: {
            title: 'Week'
        },
        yaxis: {
            title: 'Revenue (Rs.)'
        }
    };

    Plotly.newPlot('myPlot2', data2, layout2);

    var xArray = <?php echo json_encode(array_column($_SESSION['typeOfBookings'], 'Name')) ?>;
    var yArray = <?php echo json_encode(array_column($_SESSION['typeOfBookings'], 'Reservations')) ?>;

    var layout3 = {
        title: "Type of Bookings on the past month"
    };

    var data3 = [{
        labels: xArray,
        values: yArray,
        type: "pie"
    }];

    Plotly.newPlot('myPlot3', data3, layout3);

    var xArray2 = <?php echo json_encode(array_column($_SESSION['teamBookings'], 'Service_team_leader_ID')) ?>;
    var yArray2 = <?php echo json_encode(array_column($_SESSION['teamBookings'], 'Reservations')) ?>;

    var layout4 = {
        title: "Service Teams' bookings on the past month"
    };

    var data4 = [{
        labels: xArray2,
        values: yArray2,
        type: "pie"
    }];

    Plotly.newPlot('myPlot4', data4, layout4);
</script>