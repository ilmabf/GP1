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

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Invoice - <span style="color:black;">1257</span></h2>
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
        <div class="service-team">


            <div class="rate1">

                <h3>How was the service? Give us a rating!</h3>
            </div>
            <div class="rate1 stars1">
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
            </div>

            <div class="rate2 stars2">

            </div>


        </div>

        <div style="min-height: 110px;"></div>

        <script src="/public/js/CustomerViewUpcomingOrder.js"></script>
        <script src="/public/js/ManagerViewCompletedOrder.js"></script>