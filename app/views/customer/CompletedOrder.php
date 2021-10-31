<?php

include 'views/user/LoggedInHeader.php';
?>
<div class="bgImage">
    <div class="addVehicleform" id="stldetails">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Details of the team leader</h2>

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

    <div id="upcoming">

        <div class="box3">
            <div class="invoiceBorder">Invoice - 1257</div>

            <div class="box2">
            
                <hr><br>
                <div class="res">
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


                </div><br>
                <hr><br>
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

                </div>
                <hr>
                <hr>
                <span style="font-size:smaller; display: table; margin: auto; margin-top:10px;">Malwathugoda Auto Service, Kaudella, Galagedara.</span>
                <span style="font-size:smaller; display: table; margin: auto; margin-top:10px;">WandiWash</span>            
            </div>


        </div>

        <div class="service-team" style="background-color:transparent; box-shadow:none; margin:0px">


            <div class="rate1">

                <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">How was the service? Give us a rating!</h3>
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
        <script src="/public/js/CustomerViewCompletedOrder.js"></script>