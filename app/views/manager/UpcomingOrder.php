<?php
include 'views/user/LoggedInHeader.php';

$orderDetails = $_SESSION['upcomingOrder'];
$customerDetails = $_SESSION['customer'];
$vehicleDetails = $_SESSION['vehicle'];
$washPackageDetails = $_SESSION['washpackage'];
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

    <div class="cancelAssignForm" id="assign" style="display:none;">


        <h2 id="assignMsg" class="login-signupheader"></h2>


        <button id="CloseCancelAssignButton" class="formCancelButton" type="button" name="signup" onclick="closeassign()">Close</button>
        <button id="SubmitCancelAssignButton" class="formSubmitButton" type="button" name="signup" onclick="assignTeam()">Yes</button>

    </div>

    <div class="cancelAssignForm" id="changeAssign" style="display:none;">


        <h2 id="assignMsg2" class="login-signupheader"></h2>


        <button id="CloseCancelAssignButton" class="formCancelButton" type="button" name="signup" onclick="closeChangeAssign()">Close</button>
        <button id="SubmitCancelAssignButton" class="formSubmitButton" type="button" name="signup" onclick="assignTeam()">Yes</button>

    </div>

    <div style="min-height: 110px;"></div>

    <div id="upcoming">
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
                                <td style="text-align:left; color:#193498; font-weight:bold">Name</td>
                                <td style="text-align:left"><?php echo $customerDetails[0]['First_Name'] ?>
                                    <?php echo $customerDetails[0]['Last_Name'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Date</td>
                                <td style="text-align:left"><?php echo $orderDetails[0]['Date'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Time</td>
                                <td style="text-align:left"><?php echo $orderDetails[0]['Time'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Contact No</td>
                                <td style="text-align:left"><?php echo $customerDetails[0]['Contact_Number'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Vehicle Identification No.
                                </td>
                                <td style="text-align:left"><?php echo $vehicleDetails[0]['VID'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Model</td>
                                <td style="text-align:left"><?php echo $vehicleDetails[0]['Model'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Type</td>
                                <td style="text-align:left"><?php echo $vehicleDetails[0]['Type'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Manufacturer</td>
                                <td style="text-align:left"><?php echo $vehicleDetails[0]['Manufacturer'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Color</td>
                                <td style="text-align:left"><?php echo $vehicleDetails[0]['Colour'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Location</td>
                                <td style="font-size: 12px;text-align:left"><?php echo $orderDetails[0]['Address'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Wash Package</td>
                                <td style="text-align:left"><?php echo $washPackageDetails[0]['Name'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Service Charge Rs</td>
                                <td style="text-align:left"><?php echo $orderDetails[0]['Total_price'] ?>/-</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <hr><br>
                <hr>
                <hr>
            </div>

        </div>
        <div class="box4">
            <div class="reservation-buttons">
                <div class="reschedule" style="display: inline-block;">
                    <?php
                    if ($orderDetails[0]['Service_team_leader_ID'] == "") {
                        echo "<h3 style='color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff; margin-bottom:10px'>Assign a service team</h3>";
                    } else {
                        echo "<h3 style='color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff; margin-bottom:10px'>Assigned Service Team : Team " . $orderDetails[0]['Service_team_leader_ID'] . "</h3>";
                    }
                    ?>
                    <select name="serviceTeam" id="serviceTeam-types" style="width: 134px;">
                        <?php
                        for ($i = 0; $i < sizeof($_SESSION['teams']); $i++) {
                            echo "<option value = '";
                            echo $_SESSION['teams'][$i]['team'];
                            echo "'>";
                            echo "Team " . $_SESSION['teams'][$i]['team'];
                            echo "</option>";
                        }
                        ?>
                    </select>
                    <div class="reservation-buttons" style="display: inline;">
                        <?php
                        if ($orderDetails[0]['Service_team_leader_ID'] == "") {
                            echo "<button class='reservationButtons a8' id='cancelAssignBtn' type='button' onclick='openassign(document.getElementById(`serviceTeam-types`).value)' style='float: revert; margin-left: 10px; background-color:#1597E5; border-color: #1597E5; padding: 8px 15px;'><a>Assign Team</a></button>";
                        } else {
                            echo "<button class='reservationButtons a8' id='cancelAssignBtn' type='button' onclick='openassign(document.getElementById(`serviceTeam-types`).value)' style='float: revert; margin-left: 10px; background-color:#1597E5; border-color: #1597E5; padding: 8px 15px;'><a>Change Team</a></button>";
                        }
                        ?>
                    </div>

                </div>


                <?php if ($display == "false") { ?>

                    <button class="reservationButtons a10" id="cancelReservationBtn" style="margin-top: 32px; padding: 8px 9px; display:none;" onclick="opencancel()"><a>Cancel
                            Reservation</a></button>
                <?php } ?>

                <?php if ($display == "true") { ?>
                    <button class="reservationButtons a10" id="cancelReservationBtn" style="margin-top: 32px; padding: 8px 9px;" onclick="opencancel()"><a>Cancel
                            Reservation</a></button>
                <?php } ?>



            </div>
        </div>



    </div>
    <div class="addVehicleform" id="cancelForm" style="display:none;">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Do you want to cancel the reservation?</h2>

            <form action="" method="post" id="customer-signup">

                <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closecancel()">Close</button>
                <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup"><a href="/booking/deleteReservation/<?php echo $orderDetails[0]['Reservation_ID'] ?>" style="color:white;">Yes</a></button>
            </form>

        </div>
    </div>


    <div style="min-height: 110px;"></div>

    <script src="/public/js/ManagerViewUpcomingOrder.js"></script>
    <script>
        var pausecontent = <?php echo json_encode($orderDetails); ?>;

        function assignTeam() {
            var resID = pausecontent[0]['Reservation_ID'];
            var id = document.getElementById("serviceTeam-types").value;
            window.location = "/booking/assignTeam/" + id + "/" + resID;
        }
    </script>