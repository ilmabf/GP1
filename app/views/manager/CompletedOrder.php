<?php
include 'views/user/LoggedInHeader.php';
$orderDetails = $_SESSION['completedOrder'];
$customerDetails = $_SESSION['customer'];
$vehicleDetails = $_SESSION['vehicle'];
$washPackageDetails = $_SESSION['washpackage'];
$images = $_SESSION['images'];
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

    <div style="min-height: 110px;"></div>
    <div>
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
                                <td style="text-align:left; color:#193498; font-weight:bold">Completed by</td>
                                <td style="font-size: 12px;text-align:left">
                                    <?php echo $orderDetails[0]['Member1'] . "<br />" . $orderDetails[0]['Member2'] . "<br />" . $orderDetails[0]['Member3'] . "<br />" .  $orderDetails[0]['Member4'] ?>
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
    </div>
    <div class="service-team" style="background-color:transparent; box-shadow:none;">
        <div class="rate1">
            <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Rating of the service</h3>
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

        <div class="viewPhotos vp1">
            <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Before Service</h3>
            <img src="data:image/ . $type . ;base64, <?php echo base64_encode($images[0]['Picture_before']); ?>"
                style="width:30%; border-radius: 8px;"></img>

            <div class="viewPhotos vp2">
                <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">After Service</h3>
                <img src="data:image/ . $type . ;base64, <?php echo base64_encode($images[0]['Picture_after']); ?>"
                    style="width:30%; border-radius: 8px;"></img>
            </div>

        </div>

        <div style="min-height: 110px;"></div>

        <!--<script src="/public/js/ManagerViewCompletedOrder.js"></script>-->
        <script>
        var orderDetails = <?php echo json_encode($_SESSION['completedOrder']); ?>;
        var ratingLevel = order_details[0]['Rating'];

        const ratingStars = [...document.getElementsByClassName("rating__star")];

        function executeRating(stars) {
            const starClassActive = "rating__star fas fa-star";
            const starClassInactive = "rating__star far fa-star";
            const starsLength = stars.length;

            for (j = 0; j < ratingLevel; j++) {
                stars[j].className = starClassActive;
            }

        }
        executeRating(ratingStars);
        </script>