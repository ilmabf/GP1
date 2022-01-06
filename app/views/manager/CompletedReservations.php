<?php
include 'views/user/LoggedInHeader.php';
$orderList = $_SESSION['completedReservations'];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Completed Jobs</h2>
    </div>

    <div class="reservation-date">
        <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

        <div id="closeClick">
            <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
            <br>
            <div style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa; display:inline;">Date :</div>
            <input id="ManagerCompletedDate" type="text" name="managerDateofCompletedBooking" class="dateBooking" style="width: 50%;">


        </div>
    </div>
    <div class="mainUpcoming">
        <div class="upcomingOrders" id="managerCompleteReservations">
            <?php
            $count = sizeof($_SESSION['completedReservations']) - 1;
            while ($count >= 0) { ?>
                <div class="sub-box1">
                    <div class="order">
                        <div class="orderitem">Order ID</div>
                        <div class="orderitem1"><?php
                                                if (strlen($orderList[$count]['Reservation_ID']) == 1) {
                                                    echo "000" . $orderList[$count]['Reservation_ID'];
                                                } else if (strlen($orderList[$count]['Reservation_ID']) == 2) {
                                                    echo "00" . $orderList[$count]['Reservation_ID'];
                                                } else if (strlen($orderList[$count]['Reservation_ID']) == 3) {
                                                    echo "0" . $orderList[$count]['Reservation_ID'];
                                                } else {
                                                    echo $orderList[$count]['Reservation_ID'];
                                                } ?></div>
                    </div>
                    <div class="order">
                        <div class="orderitem">Vecicle No</div>
                        <div class="orderitem1"><?php echo $orderList[$count]['Vehicle_ID'] ?></div>
                    </div>
                    <div class="order">
                        <div class="orderitem">Date</div>
                        <div class="orderitem1"><?php echo $orderList[$count]['Date'] ?></div>
                    </div>
                    <div class="order">
                        <div class="orderitem">Time</div>
                        <div class="orderitem1"><?php echo $orderList[$count]['Time'] ?></div>
                    </div>
                    <div class="orderView">
                        <p class="viewLink"><a href="/booking/completedOrder/<?php echo $orderList[$count]['Reservation_ID'] ?>">View
                                order</a></p>
                        <p class="team">Completed by <?php echo $orderList[$count]['Member1'] ?>'s team</p>
                    </div>
                </div>
            <?php $count = $count - 1;
            } ?>

        </div>
    </div>

    <div style="min-height: 110px;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        var orders = <?php echo json_encode($_SESSION['completedReservations']); ?>;

        $('#ManagerCompletedDate').datepicker({
            dateFormat: 'yy-mm-dd',
            onSelect: function(date) {

                document.getElementById("managerCompleteReservations").innerHTML = '';

                var i = 0;
                var list = [];

                for (i = 0; i < orders.length; i++) {
                    if (orders[i]['Date'] == date) {
                        var order = [];
                        order['Reservation_ID'] = orders[i]['Reservation_ID'];
                        order['Vehicle_ID'] = orders[i]['Vehicle_ID'];
                        order['Time'] = orders[i]['Time'];
                        order['Member1'] = orders[i]['Member1'];
                        list.push(order);
                    }
                }
                var x = document.getElementById("managerCompleteReservations");

                for (j = 0; j < list.length; j++) {

                    if (list[j]['Reservation_ID'].length == 1) {
                        var id = "000" + list[j]['Reservation_ID'];
                    } else if (list[j]['Reservation_ID'].length == 2) {
                        var id = "00" + list[j]['Reservation_ID'];
                    } else if (list[j]['Reservation_ID'].length == 3) {
                        var id = "0" + list[j]['Reservation_ID'];
                    } else var id = list[j]['Reservation_ID'];

                    x.innerHTML += "<div class='sub-box1' >" +
                        "<div class='order'>" +
                        "<div class='orderitem'>Order ID</div>" +
                        "<div class='orderitem1'>" + id + "</div>" +
                        "</div>" +
                        "<div class='order'>" +
                        "<div class='orderitem'>Vehicle No</div>" +
                        "<div class='orderitem1'>" + list[j]['Vehicle_ID'] + "</div>" +
                        "</div>" +
                        "<div class='order'>" +
                        "<div class='orderitem'>Time</div>" +
                        "<div class='orderitem1'>" + list[j]['Time'] + "</div>" +
                        "</div>" +
                        "<div class='orderView'>" +
                        "<p class='viewLink'><a href='/booking/completedOrder/" + list[j]['Reservation_ID'] +
                        "'>View order</a></p>" +
                        "<p class='team'>Completed by " + list[j]['Member1'] + "'s Team</p>" +
                        "</div>" +
                        "</div>";

                }

            }
        });
    </script>

    <!--function viewList(){

        var d = document.getElementById("ManagerCompletedDate").value;

        document.getElementById("managerCompleteReservations").innerHTML = '';

        var i = 0;
        var list = [];

        for(i=0 ; i < orders.length; i++){
            if(orders[i]['Date'] == d){
               var order =[];
               order['Reservation_ID'] = orders[i]['Reservation_ID'];
               order['Vehicle_ID'] = orders[i]['Vehicle_ID'];
               order['Time'] = orders[i]['Time'];
               order['Service_team_leader_ID'] = orders[i]['Service_team_leader_ID'];
               list.push(order);
            }           
        }
        var x = document.getElementById("managerCompleteReservations");

        for (j = 0; j < list.length; j++) {
            x.innerHTML += "<div class='sub-box1' >"+
                "<div class='order'>" +
                     "<div class='orderitem'>Order ID</div>" +
                     "<div class='orderitem1'>" + list[j]['Reservation_ID'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                    "<div class='orderitem'>Vehicle No</div>" +
                    "<div class='orderitem1'>" + list[j]['Vehicle_ID'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                     "<div class='orderitem'>Time</div>" +
                     "<div class='orderitem1'>" + list[j]['Time'] + "</div>" +
                "</div>" +
                "<div class='orderView'>" +
                    "<p class='viewLink'><a href='/booking/completedOrder/" + list[j]['Reservation_ID'] + "'>View order</a></p>" +
                    "<p class='team'>Completed by Service Team " + list[j]['Service_team_leader_ID'] + "</p>" +
                "</div>"+
           "</div>";
        }
    
    }-->