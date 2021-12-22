<?php
include 'views/user/LoggedInHeader.php';

$orderDetails = $_SESSION['upcomingOrder'];
$customerDetails = $_SESSION['customer'];
$vehicleDetails = $_SESSION['vehicle'];
$washPackageDetails = $_SESSION['washpackage'];
?>
<div class="bgImage">

    <div class="cancelAssignForm" id="assign" style="display:none;">


        <h2 class="login-signupheader">Do you want to assign Team 1 for this reservation?</h2>


        <button id="CloseCancelAssignButton" class="formCancelButton" type="button" name="signup" onclick="closeassign()">Close</button>
        <button id="SubmitCancelAssignButton" class="formSubmitButton" type="button" name="signup"><a href="" style="color:white;">Yes</a></button>

    </div>

    <div style="min-height: 110px;"></div>

    <div id="upcoming">
        <div class="box3">
            <div class="invoiceBorder">Order - <?php echo $orderDetails[0]['Reservation_ID'] ?></div>

            <div class="box2">

                <hr><br>
                <div class="res">
                    <div class="orderitem">Name</div>
                    <div class="orderitemx"><?php echo $customerDetails[0]['First_Name'] ?> <?php echo $customerDetails[0]['Last_Name'] ?></div>

                </div>
                <div class="res">
                    <div class="orderitem">Date</div>
                    <div class="orderitemx"><?php echo $orderDetails[0]['Date'] ?></div>

                </div>
                <div class="res">
                    <div class="orderitem">Time</div>
                    <div class="orderitemx"><?php echo $orderDetails[0]['Time'] ?></div>

                </div>

                <div class="res">
                    <div class="orderitem">Contact No</div>
                    <div class="orderitemx"><?php echo $customerDetails[0]['Contact_Number'] ?></div>


                </div><br>
                <hr><br>
                <div class="res">
                    <div class="orderitem">Vehicle Identification No.</div>
                    <div class="orderitemx"><?php echo $vehicleDetails[0]['VID'] ?></div>
                </div>
                <div class="res">
                    <div class="orderitem">Model</div>
                    <div class="orderitemx"><?php echo $vehicleDetails[0]['Model'] ?></div>
                </div>
                <div class="res">
                    <div class="orderitem">Type</div>
                    <div class="orderitemx"><?php echo $vehicleDetails[0]['Type'] ?></div>
                </div>
                <div class="res">
                    <div class="orderitem">Manufacturer</div>
                    <div class="orderitemx"><?php echo $vehicleDetails[0]['Manufacturer'] ?></div>
                </div>
                <div class="res">
                    <div class="orderitem">Color</div>
                    <div class="orderitemx" style="background-color:<?php echo $vehicleDetails[0]['Colour']; ?>; width: 26px;height: 24px;display: inline-block;border: 1px solid <?php echo $vehicleDetails[0]['Colour']; ?>;"></div>
                </div><br>
                <hr><br>
                <div class="res">
                    <div class="orderitem">Location</div>
                    <div class="orderitemx" style="font-size:12px;"><?php echo $orderDetails[0]['Address'] ?></div>
                </div>
                <div class="res">
                    <div class="orderitem">Wash Package</div>
                    <div class="orderitemx"><?php echo $washPackageDetails[0]['Name'] ?></div>

                </div>
                <hr>
                <hr>
                <div class="res">
                    <div class="orderitem">Total Price Rs.</div>
                    <div class="orderitemx"><?php echo $orderDetails[0]['Total_price'] ?>/-</div>

                </div>
                <hr>
                <hr>
            </div>

        </div>
        <div class="box4">
            <div class="reservation-buttons">
                <div class="reschedule" style="display: inline-block;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff; margin-bottom:10px">Assign a service team</h3>
                    <select name="serviceTeam" id="serviceTeam-types" style="width: 134px;">
                        <option value="Not Selected">Team 1</option>
                        <option value="Not Selected">Team 2</option>
                    </select>
                    <div class="reservation-buttons" style="display: inline;">
                        <button class="reservationButtons a8" id="cancelAssignBtn" type="button" onclick="openassign()" style="float: revert; margin-left: 10px; background-color:#1597E5; border-color: #1597E5; padding: 8px 15px;"><a>Assign Team</a></button>
                    </div>

                </div>

                <button class="reservationButtons a10" id="cancelReservationBtn" style="margin-top: 32px; padding: 8px 9px;" onclick="opencancel()"><a>Cancel Reservation</a></button>



            </div>
        </div>



    </div>
    <div class="addVehicleform" id="cancelForm" style="display:none;">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Do you want to cancel the reservation?</h2>

            <form action="" method="post" id="customer-signup">

                <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closecancel()">Close</button>
                <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup"><a href="/booking/upcoming" style="color:white;">Yes</a></button>
            </form>

        </div>
    </div>


    <div style="min-height: 110px;"></div>

    <script src="/public/js/ManagerViewUpcomingOrder.js"></script>