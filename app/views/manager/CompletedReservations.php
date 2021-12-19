<?php
include 'views/user/LoggedInHeader.php';

?>

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Completed Reservations</h2>
    </div>

    <div class="reservation-date">
        <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

        <div id="closeClick">
            <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
            <br>
            <h3 style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa;">Reservations on :</h3>
            <input type="date" value="date" name="managerDateofCompletedBooking" class="dateBooking" onclick="viewList()" id="ManagerCompletedDate">

        </div>
    </div>
    <div class="mainUpcoming">
        <div class="upcomingOrders" id="managerCompleteReservations">
            <!--<div class="sub-box1" >
                <div class="order">
                    <div class="orderitem">Order ID</div>
                    <div class="orderitem1">1257</div>
                </div>
                <div class="order">
                    <div class="orderitem">Vecicle No</div>
                    <div class="orderitem1">AD - 2234</div>
                </div>
                <div class="order">
                    <div class="orderitem">Time</div>
                    <div class="orderitem1">8 am - 10 am</div>
                </div>
                <div class="orderView">
                    <p class="viewLink"><a href="/booking/completedOrder">View order</a></p>
                    <p class="team">Completed by Service Team 1</p>
                </div>
            </div>-->
          
        </div>
    </div>
    <div style="min-height: 110px;"></div>

    <script>

    var orders = <?php echo json_encode($_SESSION['completedReservations']); ?>;

    function viewList(){

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
    
    }
    </script>