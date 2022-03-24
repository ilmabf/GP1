<?php
include 'views/user/LoggedInHeader.php';
$orderList = $_SESSION['completedReservations'];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Completed Jobs: <span id='resCount'></span></h2>
    </div>



    <div class="Table-search" style="margin-bottom: 20px;">

        <div class="table-wrapper">
            <div style="display:inline-block; width: 100%;">
                <div class="Admin-EmpSearch adEmpSearch1">
                    <input type="search" class="ad-Emp-Search" id="managerSearchCompletedReservations" placeholder="Search for Customer..." title="Type in a name">
                </div>

                <div class="reservation-date" style="    margin: auto; display: inline-block;     float: right;">
                    <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

                    <div id="closeClick" style="    margin: -27px -46px 5px auto;">
                        <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
                        <br>
                        <div style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa; display:inline;">Date :</div>
                        <input id="ManagerCompletedDate" type="text" name="managerDateofCompletedBooking" class="dateBooking" style="width: 50%; border-radius: 5px;">


                    </div>
                </div>
            </div>

            <table id="completedReservationsSearch" style="margin-top: -60px;">
                <thead>
                    <tr>
                        <th data-type="text">Order ID</th>
                        <th data-type="text">Customer Name</th>
                        <th data-type="text">Vehicle No</th>
                        <th data-type="text">Date</th>
                        <th data-type="text">Time</th>
                        <th data-type="text">Team</th>
                        <th data-type="text"></th>
                    </tr>
                </thead>
                <tbody id="completedReservationTable"></tbody>
        </div>
    </div>

    <div style="min-height: 110px;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        var orders = <?php echo json_encode($_SESSION['completedReservations']); ?>;
    </script>
    <script src="/public/js/ManagerCompletedReservations.js"></script>