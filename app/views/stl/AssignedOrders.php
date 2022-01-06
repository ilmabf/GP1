<?php
date_default_timezone_set("Asia/Colombo");
// echo date_default_timezone_get();

include 'views/user/LoggedInHeader.php';
$orderList = $_SESSION['todayReservations'];
?>
<div class="bgImage" style="min-height: 100%;">
    <div style="min-height: 110px;"></div>
    <div>
        <h1 class="stl-dashboard-h1">Today's Reservations</br></h1>

        <h3 style="text-align:center; margin-bottom:10px; font-size:20px"><?php echo date("Y-m-d"); ?> </h3>
        <div style="min-height: 110px;"></div>
        <div class="mainUpcoming">
            <div class="upcomingOrders">

                <?php
                $count = sizeof($_SESSION['todayReservations']) - 1;
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
                            <div class="orderitem">Time</div>
                            <div class="orderitem1"><?php echo $orderList[$count]['Time'] ?></div>
                        </div>
                        <div class="orderView">
                            <p class="viewLink"><a href="/calendar/todayOrder/<?php echo $orderList[$count]['Reservation_ID'] ?>">View
                                    order</a></p>
                        </div>
                    </div>
                <?php $count = $count - 1;
                } ?>
                <!--<div class="sub-box1">
                    <div class="order">
                        <div class="orderitem">Service</div>
                        <p class="orderitem1">Interior</p>
                    </div>
                    <div class="order">
                        <div class="orderitem">Vecicle No</div>
                        <p class="orderitem1">AD - 2234</p>
                    </div>
                    <div class="order">
                        <div class="orderitem">Time</div>
                        <p class="orderitem1">8 am - 10 am</p>
                    </div>
                    <div class="orderView">
                        <p class="viewLink"><a href="/calendar/orderDetails">View order</a></p>
                    </div>
                </div> -->

            </div>
        </div>
        <div style="min-height: 110px;"></div>