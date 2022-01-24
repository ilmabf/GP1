<?php
include 'views/user/LoggedInHeader.php';

$orderDetails = $_SESSION['upcomingOrder'];
$customerDetails = $_SESSION['customer'];
$vehicleDetails = $_SESSION['vehicle'];
$washPackageDetails = $_SESSION['washpackage'];
$stlDetails = $_SESSION['stlDetails'];
$reservationCancel = $_SESSION['cancelReservation'];
$display = $_SESSION['displayReservationBtn'];
?>
<style>
    table,
    tr {
        border: hidden;
    }

    td,
    th {
        border: hidden;
    }
</style>

<div class="bgImage">
    <div class="addVehicleform" id="stldetails">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Details of the team leader</h2>

            <form action="" method="post" id="customer-signup">
                <ul>
                    <li><img src="/public/images/userIcon.jpg" style="width: 250px;"></img></li><br>
                    <li>Name - <?php echo $stlDetails[0]['First_Name'] . " " . $stlDetails[0]['Last_Name']; ?></li><br>
                    <li>Contact Number - <?php echo $stlDetails[0]['Contact_Number']; ?></li>
                    <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closestlForm()" style="float:none">Close</button>
            </form>

        </div>
    </div>

    <div class="addVehicleform" id="cancel">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Do you want to cancel the reservation?</h2>

            <form action="" method="post" id="customer-signup">
                <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closecencelForm()">Close</button>
                <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup"><a href="/booking/deleteReservation/<?php echo $orderDetails[0]['Reservation_ID'] ?>" style="color:white;">Yes</a></button>
            </form>

        </div>
    </div>

    <div style="min-height: 110px;"></div>

    <div id="upcoming">
        <p style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff; text-align:center">You can only
            cancel/reschedule up until 24 hours before the reserved time</p><br>
        <div class="box3">

            <div class="invoiceBorder">Order - <?php
                                                if (strlen($orderDetails[0]['Reservation_ID']) == 1) {
                                                    echo "000" . $orderDetails[0]['Reservation_ID'];
                                                } else if (strlen($orderDetails[0]['Reservation_ID']) == 2) {
                                                    echo "00" . $orderDetails[0]['Reservation_ID'];
                                                } else if (strlen($orderDetails[0]['Reservation_ID']) == 3) {
                                                    echo "0" . $orderDetails[0]['Reservation_ID'];
                                                } else {
                                                    echo $orderDetails[0]['Reservation_ID'];
                                                } ?></div>

            <div class="box2">
                <section class="">
                    <table class="">
                        <tbody>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Date</td>
                                <td style="text-align:left"><?php echo $orderDetails[0]['Date'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Time</td>
                                <td style="text-align:left"><?php echo $orderDetails[0]['Time'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Location</td>
                                <td style="font-size: 12px;text-align:left"><?php echo $orderDetails[0]['Address'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Service Team</td>
                                <?php
                                if ($orderDetails[0]['Service_team_leader_ID'] == "") {
                                    echo "<td style='font-size: 12px;text-align:left'>Team not yet assigned</td>";
                                } else {
                                    // echo "<td style='font-size: 12px;text-align:left'>".$orderDetails[0]['Service_team_leader_ID']."</td>";
                                    echo "<td><button class='reservationButtons a12' id='cancelAssignBtn' style='color:white; padding: 1px 3px; margin-bottom:0px' onclick='openstlForm()'><a>View Details</a></button></td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Wash Package</td>
                                <td style="text-align:left"><?php echo $washPackageDetails[0]['Name'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Service Charge Rs</td>
                                <td style="text-align:left"><?php echo $orderDetails[0]['Total_price'] ?>/-</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <hr><br>
                <!-- <div class="res">
                    <div class="orderitem">Name</div>
                    <div class="orderitemx">Gihan Anthony</div>

                </div>
                <div class="res">
                    <div class="orderitem">Date</div>
                    <div class="orderitemx">2021 / 10 / 20</div>

                </div>
                <div class="res">
                    <div class="orderitem">Time</div>
                    <div class="orderitemx">8 am - 10 am</div>

                </div>

                <div class="res">
                    <div class="orderitem">Contact No</div>
                    <div class="orderitemx">0775674896</div>


                </div><br> -->
                <!-- <hr><br>
                <div class="res">
                    <div class="orderitem">Vehicle Identification No.</div>
                    <div class="orderitemx">AD - 2315</div>
                </div><br>
                <hr><br>
                <div class="res">
                    <div class="orderitem">Service Team</div>
                    <div class="orderitemx"><button class="reservationButtons a12" id="cancelAssignBtn" style="color:white; padding: 1px 3px; margin-bottom:0px" onclick="openstlForm()"><a>View Details</a></button></div>
                </div>
                <div class="res">
                    <div class="orderitem">Location</div>
                    <div class="orderitemx"><button class="reservationButtons a12" id="cancelAssignBtn" style="color:white; padding: 1px 3px; margin-bottom:0px" onclick=""><a>View Location</a></button></div>
                </div>
                <div class="res">
                    <div class="orderitem">Wash Package</div>
                    <div class="orderitemx">Interior Cleaning</div>

                </div>
                <hr>
                <hr>
                <div class="res">
                    <div class="orderitem">Total Price Rs.</div>
                    <div class="orderitemx">1050/-</div>

                </div> -->
                <hr>
                <hr>
                <span style="font-size:smaller; display: table; margin: auto; margin-top:10px;">Malwathugoda Auto
                    Service, Kaudella, Galagedara.</span>
                <span style="font-size:smaller; display: table; margin: auto; margin-top:10px;">WandiWash</span>
            </div>


        </div>

        <?php if ($display == "true") { ?>


            <div class="box4">
                <div class="reservation-buttons">
                    <div class="reschedule" style="margin-left: 0px;">
                        <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Do you want to reschedule?</h3>
                        <button class="reservationButtons a13" id="cancelAssignBtn" style="color: white;"><a href="/booking/rescheduleDetails/<?php echo $orderDetails[0]['Reservation_ID'] ?>">Reschedule Reservation</a></button>
                    </div>
                    <button class="reservationButtons a10" style="margin-right: 0px; margin-top: 10px;" id="cancelReservationBtn" onclick="opencancelForm()"><a>Cancel Reservation</a></button>
                </div>
            </div>

        <?php } ?>

        <?php if ($display == "false") { ?>
            <div class="box4" style="display: none;">
                <div class="reservation-buttons">
                    <div class="reschedule" style="margin-left: 0px;">
                        <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Do you want to reschedule?</h3>
                        <button class="reservationButtons a13" id="cancelAssignBtn" style="color: white;"><a href="/booking/rescheduleDetails/<?php echo $orderDetails[0]['Reservation_ID'] ?>">Reschedule Reservation</a></button>
                    </div>
                    <button class="reservationButtons a10" style="margin-right: 0px; margin-top: 10px;" id="cancelReservationBtn" onclick="opencancelForm()"><a>Cancel Reservation</a></button>
                </div>
            </div>
        <?php } ?>


    </div>
    <div id="cancelReservationPopUpId" class="cancelReservationPopUpclass">


    </div>

    <div style="min-height: 110px;"></div>

    <script src="/public/js/CustomerViewUpcomingOrder.js"></script>