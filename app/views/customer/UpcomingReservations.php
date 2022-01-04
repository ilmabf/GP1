<?php
include 'views/user/LoggedInHeader.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<div class="bgImage">
    <div style="min-height: 110px;"></div>
    <div class="heading">
        <h2>Upcoming Reservations</h2>
    </div>

    <div class="reservation-date">
        <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

        <div id="closeClick">
            <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
            <br>
            <div style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa; display:inline;">Date :</div>
            <input id="ManagerUpcomingDate" type="text" name="managerDateofUpcomingBooking" class="dateBooking"
                style="width: 50%;">

        </div>
    </div>
    <div class="mainUpcoming">
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
    <?php print_r($_SESSION['myUpcomingReservations']);?>
    <div style="min-height: 110px;"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
var orders = <?php echo json_encode(array_values($_SESSION['myUpcomingReservations'])); ?>;


$('#ManagerUpcomingDate').datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function(date) {

        document.getElementById("customerUpcomingReservations").innerHTML = '';

        var i = 0;
        var list = [];

        for (i = 0; i < orders.length; i++) {
            if (orders[i]['Date'] == date) {
                var order = [];
                order['Reservation_ID'] = orders[i]['Reservation_ID'];
                order['Vehicle_ID'] = orders[i]['Vehicle_ID'];
                order['Time'] = orders[i]['Time'];
                order['Service_team_leader_ID'] = orders[i]['Service_team_leader_ID'];
                order['Date'] = orders[i]['Date'];
                list.push(order);
            }
        }
        var x = document.getElementById("customerUpcomingReservations");

        for (j = 0; j < list.length; j++) {
            console.log(list[j]['Service_team_leader_ID']);
            if (list[j]['Service_team_leader_ID'] == null) {

                x.innerHTML += "<div class='sub-box1' >" +
                    "<div class='order'>" +
                    "<div class='orderitem'>Vehicle No</div>" +
                    "<div class='orderitem1'>" + list[j]['Vehicle_ID'] + "</div>" +
                    "</div>" +
                    "<div class='order'>" +
                    "<div class='orderitem'>Date</div>" +
                    "<div class='orderitem1'>" + list[j]['Date'] + "</div>" +
                    "</div>" +
                    "<div class='order'>" +
                    "<div class='orderitem'>Time</div>" +
                    "<div class='orderitem1'>" + list[j]['Time'] + "</div>" +
                    "</div>" +
                    "<div class='orderView'>" +
                    "<p class='viewLink'><a href='/booking/upcomingOrder/" + list[j]['Reservation_ID'] +
                    "'>View order</a></p>" +
                    "<p class='team'>Team not assigned</p>" +
                    "</div>" +
                    "</div>";
            } else {
                x.innerHTML += "<div class='sub-box1' >" +
                    "<div class='order'>" +
                    "<div class='orderitem'>Vehicle No</div>" +
                    "<div class='orderitem1'>" + list[j]['Vehicle_ID'] + "</div>" +
                    "</div>" +
                    "<div class='order'>" +
                    "<div class='orderitem'>Date</div>" +
                    "<div class='orderitem1'>" + list[j]['Date'] + "</div>" +
                    "</div>" +
                    "<div class='order'>" +
                    "<div class='orderitem'>Time</div>" +
                    "<div class='orderitem1'>" + list[j]['Time'] + "</div>" +
                    "</div>" +
                    "<div class='orderView'>" +
                    "<p class='viewLink'><a href='/booking/upcomingOrder/" + list[j]['Reservation_ID'] +
                    "'>View order</a></p>" +
                    "<p class='team'>A service team has been assigned for you</p>" +
                    "</div>" +
                    "</div>";
            }
        }

    }
});
</script>

<script>
function viewList() {
    var x = document.getElementById("customerUpcomingReservations");

    for (j = 0; j < orders.length; j++) {
        if (orders[j]['Service_team_leader_ID'] == null) {
            x.innerHTML += "<div class='sub-box1' >" +
                "<div class='order'>" +
                "<div class='orderitem'>Vehicle No</div>" +
                "<div class='orderitem1'>" + orders[j]['Vehicle_ID'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                "<div class='orderitem'>Date</div>" +
                "<div class='orderitem1'>" + orders[j]['Date'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                "<div class='orderitem'>Time</div>" +
                "<div class='orderitem1'>" + orders[j]['Time'] + "</div>" +
                "</div>" +
                "<div class='orderView'>" +
                "<p class='viewLink'><a href='/booking/upcomingOrder/" + orders[j]['Reservation_ID'] +
                "'>View order</a></p>" +
                "<p class='team'>Team not assigned</p>" +
                "</div>" +
                "</div>";
        } else {
            x.innerHTML += "<div class='sub-box1' >" +
                "<div class='order'>" +
                "<div class='orderitem'>Vehicle No</div>" +
                "<div class='orderitem1'>" + orders[j]['Vehicle_ID'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                "<div class='orderitem'>Date</div>" +
                "<div class='orderitem1'>" + orders[j]['Date'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                "<div class='orderitem'>Time</div>" +
                "<div class='orderitem1'>" + orders[j]['Time'] + "</div>" +
                "</div>" +
                "<div class='orderView'>" +
                "<p class='viewLink'><a href='/booking/upcomingOrder/" + orders[j]['Reservation_ID'] +
                "'>View order</a></p>" +
                "<p class='team'>A service team has been assigned for you</p>" +
                "</div>" +
                "</div>";
        }
    }

}
viewList();
</script>