<?php

include 'views/user/LoggedInHeader.php';
$orderDetails = $_SESSION['completedOrder'];
$customerDetails = $_SESSION['customer'];
$washPackageDetails = $_SESSION['washpackage'];
$stl = $_SESSION['completedSTL']
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
                    <li><img src="<?php echo '/public/images/' . $stl[0]['file_name']; ?>" style="width: 250px;"></img></li><br>
                    <li>Name - Mr. <?php echo $stl[0]['First_Name'] ?> <?php echo $stl[0]['Last_Name'] ?> </li><br>
                    <li>Contact Number -<?php echo $stl[0]['Contact_Number'] ?></li>
                    <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closestlForm()" style="float:none">Close</button>
            </form>

        </div>
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
                                                }
                                                ?></div>

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
                                <td style="text-align:left"><?php echo $orderDetails[0]['Vehicle_ID'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Service team leader</td>
                                <td style="text-align:left"><button class="reservationButtons a12" id="cancelAssignBtn" style="color:white; padding: 1px 3px; margin-bottom:0px" onclick="openstlForm()"><a>View Details</a></button></td>
                            </tr>
                            <tr>
                                <td style="text-align:left; color:#193498; font-weight:bold">Team members</td>
                                <td style="font-size: 12px;text-align:left">
                                    <?php echo $orderDetails[0]['Member1'] . "<br />" . $orderDetails[0]['Member2'] . "<br />" . $orderDetails[0]['Member3'] . "<br />" .  $orderDetails[0]['Member4'] ?>
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
                    </table>
                </section>
                <hr>
                <hr>

                <span style="font-size:smaller; display: table; margin: auto; margin-top:10px;">Malwathugoda Auto Service, Kaudella, Galagedara.</span>
                <span style="font-size:smaller; display: table; margin: auto; margin-top:10px;">WandiWash</span>
            </div>

        </div>

        <div class="service-team" style="background-color:transparent; box-shadow:none; margin:0px">


            <div class="rate1" id="displayedSentence">

                <!--<h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">How was the service? Give us a
                    rating!</h3>-->
            </div>
            <div class="rate1 stars1" id="RateUs">
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
                <i class="rating__star far fa-star"></i>
            </div>

            <div class="rate2 stars2">

                <form action="/booking/rateService/<?php echo $orderDetails[0]['Reservation_ID'] ?>" method="post" style="display:inline-block;">
                    <input type="hidden" id="textF" value="0" name="rateStars">
                    <button class="uploadImagesLink" type="submit" value="submit rate" id="rateSubmitBut" style="display:none;">Submit</button>
                </form>
            </div>


        </div>

        <div style="min-height: 110px;"></div>
        <script>
            var orderDetails = <?php echo json_encode($_SESSION['completedOrder']); ?>;
        </script>
        <script src="/public/js/CustomerViewUpcomingOrder.js"></script>
        <!--<script src="/public/js/CustomerViewCompletedOrder.js"></script>-->