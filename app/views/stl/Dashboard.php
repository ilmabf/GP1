<?php
include 'views/user/LoggedInHeader.php';
$booking = $_SESSION['bookings'];
?>
<div style="min-height: 110px;"></div>
<div>
    <h1 class="stl-dashboard-h1">Dashboard</h1>
</div>

<div style="min-height: 50px;"></div>

<div class="stlChartsR1">

    <div id="myPlot" style="width:100%;max-width:700px"></div>

</div>

<div class="stlChartsR2">
</div>

<script>
    // put the $booking array into a javascript array
    var booking = <?php echo json_encode($booking); ?>;
    // console.log(booking);

    var data = [{
        // assign the key value of data1 to x-axis
        x: <?php echo json_encode(array_column($booking, 'Week')) ?>,
        y: <?php echo json_encode(array_column($booking, 'Reservations')) ?>,
        type: 'bar'
    }];

    var layout = {
        title: 'Number of Bookings per Week of past month',
        xaxis: {
            title: 'Week'
        },
        yaxis: {
            title: 'Number of Bookings'
        }
    };

    Plotly.newPlot('myPlot', data, layout);
</script>