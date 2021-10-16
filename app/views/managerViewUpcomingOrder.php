<?php
include 'UserLoggedInHeader.php';
?>
<div class="bgImage">

    <div class="cancelAssignForm" id="assign" style="display:none;">


        <h2 class="login-signupheader">Do you want to assign Team 1 for this reservation?</h2>


        <button id="CloseCancelAssignButton" class="formCancelButton" type="button" name="signup" onclick="closeassign()">Close</button>
        <button id="SubmitCancelAssignButton" class="formSubmitButton" type="button" name="signup"><a href="" style="color:white;">Yes</a></button>

    </div>

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Upcoming Order - <span style="color:black;">AAAA</span></h2>
    </div>


    <div id="upcoming">
        <div class="mainUp">
            <div class="upcoming">

                <div class="boxx">

                    <div class="order">
                        <div class="orderitem">Customer Name</div>
                        <div class="orderitem1">Gihan Anthony</div>
                    </div>
                    <div class="order">
                        <div class="orderitem">Date</div>
                        <div class="orderitem1">2021/10/18</div>
                    </div>
                    <div class="order">
                        <div class="orderitem">Time</div>
                        <div class="orderitem1">8 am - 10 am</div>
                    </div>
                    <div class="order">
                        <div class="orderitem">Contact No</div>
                        <div class="orderitem1">0775674896</div>
                    </div>
                </div>
                <hr class="hr">
                <div class="boxx">
                    <div class="order">
                        <div class="orderitem">Vehicle No</div>
                        <p class="orderitem1">AD - 2315</p>
                    </div>
                    <div class="order">
                        <div class="orderitem">Model</div>
                        <p class="orderitem1">Axio</p>
                    </div>
                    <div class="order">
                        <div class="orderitem">Vehicle Type</div>
                        <p class="orderitem1">Sedan</p>
                    </div>
                    <div class="order">
                        <div class="orderitem">Color</div>
                        <div class="orderitem1 " style="background-color:blue; width: 26px;height: 24px;display: inline-block;border: 1px solid #193498;"></div>
                    </div>
                </div>
                <hr class="hr">
                <div class="boxx">
                    <div class="order">
                        <div class="orderitem">Service Type</div>
                        <p class="orderitem1">Interior Cleaning</p>
                    </div>
                    <div class="order">
                        <div class="orderitem">Total Price Rs.</div>
                        <p class="orderitem1">1000/-</p>
                    </div>
                    <div class="order">
                        <div class="orderitem"><a href="">View Location</a></div>
                    </div>
                </div>
                <hr class="hr" style="width:100%;">
                <hr class="hr" style="width:100%;">
            </div>
        </div>
        <div class="reservation-buttons">
            <div class="reschedule" style = "display: inline-block;">
                <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff; margin-bottom:10px">Assign a service team</h3>
                <select name="serviceTeam" id="serviceTeam-types" style = "width: 134px;">
                    <option value="Not Selected">Team 1</option>
                    <option value="Not Selected">Team 2</option>
                </select>
                <div class="reservation-buttons" style = "display: inline;">
                    <button class="reservationButtons a8" id="cancelAssignBtn" type="button" onclick="openassign()" style = "float: revert; margin-left: 10px; background-color:#1597E5; border-color: #1597E5;"><a>Assign Team</a></button>
                </div>


            </div>



            <button class="reservationButtons a10" id="cancelReservationBtn" style = "margin-top: 32px;" onclick="opencancel()"><a>Cancel Reservation</a></button>



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