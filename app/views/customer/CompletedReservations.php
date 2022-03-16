<?php
include 'views/user/LoggedInHeader.php';
$orderList = $_SESSION['customerCompletedReservations'];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<div class="bgImage">
    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>My Previous Reservations</h2>
    </div>

    <div class="reservation-date">
        <!-- <h3 style="text-align: center; color:#085394;">Pick a date</h3> -->

        <div id="closeClick">
            <!-- <button class="btnclss" onclick="closeOnClickDemo()">Click to open calendar</button><br> -->
            <br>
            <div style="color:white; text-shadow:1px 1px 4px #000000, 1px 1px 4px #0000fa; display:inline;">Date :</div>
            <!-- <input type="text" value="date" name="customerDateofPastBooking" class="dateBooking"
                id="CustomerCompletedDate"> -->
            <input id="CustomerCompletedDate" name="customerDateofPastBooking" class="dateBooking" style="width: 50%;">
        </div>
    </div>
    <div class="mainUpcoming">
        <div class="upcomingOrders" id="customerCompletedReservations">
            <?php
            $count = sizeof($_SESSION['customerCompletedReservations']) - 1;
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
                                                }
                                                ?>
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
                                    invoice</a></p>
                        </div>
                    </div>
                </div>

            <?php $count = $count - 1;
            } ?>

            <!--<div class="sub-box1">
                <div class="order">
                    <div class="orderitem">Vehicle No</div>
                    <p class="orderitem1">AD - 2234</p>
                </div>
                <div class="order">
                    <div class="orderitem">Date</div>
                    <p class="orderitem1">2021/11/18</p>
                </div>
                <div class="order">
                    <div class="orderitem">Time</div>
                    <p class="orderitem1">2 pm - 4 pm</p>
                </div>
                <div class="orderView">
                    <p class="viewLink"><a href="/booking/CompletedOrder">View Invoice</a></p>
                </div>
            </div>-->

        </div>
    </div>
    <div style="min-height: 110px;"></div>

</div>
<script>
    var orders = <?php echo json_encode($_SESSION['customerCompletedReservations']); ?>;
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="/public/js/CustomerCompletedReservations.js"></script>