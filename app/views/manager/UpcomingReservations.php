<?php
include 'views/user/LoggedInHeader.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Upcoming Jobs: <span id = 'resCount'></span></h2>
    </div>



    <!-- <div class="mainUpcoming"> -->
    <!-- <div class="upcomingOrders" id="managerUpcomingReservations"> -->
    <!-- <?php print_r($_SESSION['upcomingReservations']); ?> -->
    <div class="Table-search" style="margin-bottom: 20px;">

        <div class="table-wrapper">
            <div style="display:inline-block; width: 100%;">
                <div class="Admin-EmpSearch adEmpSearch1">
                    <input type="search" class="ad-Emp-Search" id="managerSearchUpcomingReservations" placeholder="Search for Customer..." title="Type in a name">
                </div>
                <div class="reservation-date" style="    margin: auto; display: inline-block;     float: right;">
                    <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

                    <div id="closeClick" style="    margin: -27px -46px 5px auto;">
                        <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
                        <br>
                        <div style="color:black; display:inline;">Date :</div>
                        <input id="ManagerUpcomingDate" type="text" name="managerDateofUpcomingBooking" class="dateBooking" style="width: 50%; border-radius: 5px;">

                    </div>
                </div>
            </div>


            <table id="upcomingReservationsSearch" style="margin-top: -60px;">
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
                <tbody id="upcomingReservationTable"></tbody>
        </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->

    <div style="min-height: 110px;"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        var orders = <?php echo json_encode($_SESSION['upcomingReservations']); ?>;

        $('#ManagerUpcomingDate').datepicker({
            dateFormat: 'yy-mm-dd',
            onSelect: function(date) {

                // document.getElementById("managerUpcomingReservations").innerHTML = '';
                document.getElementById("upcomingReservationTable").innerHTML = '';
                var i = 0;
                var list = [];

                for (i = 0; i < orders.length; i++) {
                    if (orders[i]['Date'] == date) {
                        var order = [];
                        order['Reservation_ID'] = orders[i]['Reservation_ID'];
                        order['First_Name'] = orders[i]['First_Name'];
                        order['Last_Name'] = orders[i]['Last_Name'];
                        order['Vehicle_ID'] = orders[i]['Vehicle_ID'];
                        order['Date'] = orders[i]['Date'];
                        order['Time'] = orders[i]['Time'];
                        order['Service_team_leader_ID'] = orders[i]['Service_team_leader_ID'];
                        list.push(order);
                    }
                }
                // var x = document.getElementById("managerUpcomingReservations");
                var x = document.getElementById("upcomingReservationTable");

                document.getElementById('resCount').innerHTML = list.length;
                for (j = 0; j < list.length; j++) {
                    if (list[j]['Reservation_ID'].length == 1) {
                        var id = "000" + list[j]['Reservation_ID'];
                    } else if (list[j]['Reservation_ID'].length == 2) {
                        var id = "00" + list[j]['Reservation_ID'];
                    } else if (list[j]['Reservation_ID'].length == 3) {
                        var id = "0" + list[j]['Reservation_ID'];
                    } else var id = list[j]['Reservation_ID'];

                    console.log(list[j]['Service_team_leader_ID']);
                    if (list[j]['Service_team_leader_ID'] == null) {

                        x.innerHTML += "<tr>" +
                            "<td>" + id + "</td>" +
                            "<td>" + list[j]['First_Name'] + " " + list[j]['Last_Name'] + "</td>" +
                            "<td>" + list[j]['Vehicle_ID'] + "</td>" +
                            "<td>" + list[j]['Date'] + "</td>" +
                            "<td>" + list[j]['Time'] + "</td>" +
                            "<td class='team'>Team not assigned</td>" +
                            "<td class='viewLink'><a href='/booking/upcomingOrder/" + list[j]['Reservation_ID'] +
                            "'>View Order</a></td>" +
                            "</tr>";
                        console.log(x);
                        

                    } else {
                        x.innerHTML += "<tr>" +
                            "<td>" + id + "</td>" +
                            "<td>" + list[j]['First_Name'] + " " + list[j]['Last_Name'] + "</td>" +
                            "<td>" + list[j]['Vehicle_ID'] + "</td>" +
                            "<td>" + list[j]['Date'] + "</td>" +
                            "<td>" + list[j]['Time'] + "</td>" +
                            "<td class='team'>Assigned Service Team " + list[j]['Service_team_leader_ID'] + "</td>" +
                            "<td class='viewLink'><a href='/booking/upcomingOrder/" + list[j]['Reservation_ID'] +
                            "'>View Order</a></td>" +
                            "</tr>";
                            
                        console.log(x);

                    }
                }
            }
        });
    </script>

    <script>
        function viewList() {
            document.getElementById('resCount').innerHTML = orders.length;
            var x = document.getElementById("upcomingReservationTable");

            for (j = 0; j < orders.length; j++) {
                if (orders[j]['Reservation_ID'].length == 1) {
                    var id = "000" + orders[j]['Reservation_ID'];
                } else if (orders[j]['Reservation_ID'].length == 2) {
                    var id = "00" + orders[j]['Reservation_ID'];
                } else if (orders[j]['Reservation_ID'].length == 3) {
                    var id = "0" + orders[j]['Reservation_ID'];
                } else var id = orders[j]['Reservation_ID'];

                if (orders[j]['Service_team_leader_ID'] == null) {
                    x.innerHTML += "<tr>" +
                        "<td>" + id + "</td>" +
                        "<td>" + orders[j]['First_Name'] + " " + orders[j]['Last_Name'] + "</td>" +
                        "<td>" + orders[j]['Vehicle_ID'] + "</td>" +
                        "<td>" + orders[j]['Date'] + "</td>" +
                        "<td>" + orders[j]['Time'] + "</td>" +
                        "<td class='team'>Team not assigned</td>" +
                        "<td class='viewLink'><a href='/booking/upcomingOrder/" + orders[j]['Reservation_ID'] +
                        "'>View Order</a></td>" +
                        "</tr>";
                } else {
                    x.innerHTML += "<tr>" +
                        "<td>" + id + "</td>" +
                        "<td>" + orders[j]['First_Name'] + " " + orders[j]['Last_Name'] + "</td>" +
                        "<td>" + orders[j]['Vehicle_ID'] + "</td>" +
                        "<td>" + orders[j]['Date'] + "</td>" +
                        "<td>" + orders[j]['Time'] + "</td>" +
                        "<td class='team'>Assigned Service Team " + orders[j]['Service_team_leader_ID'] + "</td>" +
                        "<td class='viewLink'><a href='/booking/upcomingOrder/" + orders[j]['Reservation_ID'] +
                        "'>View Order</a></td>" +
                        "</tr>";
                }
            }

        }
        viewList();
    </script>

    <script src="/public/js/ManagerUpcomingReservations.js"></script>