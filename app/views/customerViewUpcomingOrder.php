<?php
include 'UserLoggedInHeader.php';
?>
<div class="bgImage">
    <div class="addVehicleform" id="stldetails">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Details of the team Leader</h2>

            <form action="" method="post" id="customer-signup">
                <ul>
                    <li><img src="/public/images/userIcon.jpg" style="width: 250px;"></img></li><br>
                    <li>Name - Mr. John Smith</li><br>
                    <li>Contact Number - 077 123 4567</li>
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
                <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup"><a href="/booking/upcoming" style="color:white;">Yes</a></button>
            </form>

        </div>
    </div>

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Upcoming Order</h2>
    </div>

    <div id="upcoming">
        <div class="mainUp">
            <div class="upcoming">

                <div class="boxx">

                    <div class="order">
                        <div class="orderitem">Name</div>
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
                        <p class="orderitem1">Black</p>
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
                    <div class="order">
                        <div class="orderitem"><a href="">Service Team</a></div>
                        <p class="orderitem1">
                            <button class="reservationButtons a12" id="cancelAssignBtn" style="color:white;" onclick="openstlForm()"><a>View Details</a></button>
                        </p>
                    </div>
                </div>
                <hr class="hr" style="width:100%;">
                <hr class="hr" style="width:100%;">
            </div>
        </div>

        <div class="reservation-buttons">
            <div class="reschedule">
                <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Do you want to reschedule?</h3>
                <button class="reservationButtons a13" id="cancelAssignBtn"><a href="/booking/reschedule" style="color:white;">Click here to Reschedule</a></button>
            </div>
            <button class="reservationButtons a10" id="cancelReservationBtn" onclick="opencancelForm()"><a>Cancel Reservation</a></button>
        </div>

    </div>
    <div id="cancelReservationPopUpId" class="cancelReservationPopUpclass">


    </div>

    <div style="min-height: 110px;"></div>

    <script src="/public/js/CustomerViewUpcomingOrder.js"></script>