<?php
include 'views/user/LoggedInHeader.php';
$booking = $_SESSION['bookings'];
$typeOfBookings = $_SESSION['typeOfBookings'];
?>
<div style="min-height: 110px;"></div>
<div>
    <h1 class="stl-dashboard-h1">Dashboard</h1>
    <?php print_r($_SESSION['typeOfBookings']); ?>
</div>

<div style="min-height: 50px;"></div>

<div style="display: block;" class="stlChartsR1">

    <div id="myPlot1" style="max-width:50%;"></div>
    <div id="myPlot2" style="max-width:50%;"></div>

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

    var xArray = <?php echo json_encode(array_column($typeOfBookings, 'Name')) ?>;
    var yArray = <?php echo json_encode(array_column($typeOfBookings, 'Reservations')) ?>;

    var layout2 = {
        title: "Number of Bookings per Wash Package on past month"
    };

    var data2 = [{
        labels: xArray,
        values: yArray,
        type: "pie"
    }];

    Plotly.newPlot('myPlot2', data2, layout2);
</script>