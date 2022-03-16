<?php
include 'views/user/LoggedInHeader.php';
$orderDetails = $_SESSION['todayOrder'];
$customerDetails = $_SESSION['customer'];
$vehicleDetails = $_SESSION['vehicle'];
$washPackageDetails = $_SESSION['washpackage'];
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

    <div class="map" id="googleMapbox">
        <h2 class="login-signupheader"><b>Customer location</b></h2>
        <div id="map"></div>
        <div id="mapControl">
            <button id="AddLocationButton" class="formSubmitButton" type="submit" name="signup" onclick="closeMap2();">Close</button>
        </div>
    </div>

    <div style="min-height: 110px;"></div>
    <div>
        <div class="mainUp" id="mainbox">
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
                                    <td style="text-align:left; color:#193498; font-weight:bold">Vehicle Identification
                                        No.</td>
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
                                    <td style="text-align:left; color:#193498; font-weight:bold">Address</td>
                                    <td style="font-size: 12px;text-align:left">
                                        <?php echo $orderDetails[0]['Address'] ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left; color:#193498; font-weight:bold">Location</td>
                                    <td style="font-size: 12px;text-align:left"><button class="reservationButtons a15" id="cancelAssignBtn" style="padding: 1px 3px; margin-bottom:0px" onclick="openMap2();">View Location</button></td>
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

            <form action="/calendar/completeService/<?php echo $orderDetails[0]['Reservation_ID'] ?>" method="post" enctype="multipart/form-data">
                <div class="viewPhotos vp1" style="color:white;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Before service</h3>
                    <input type="file" accept="image/*" class="imageFile" name="beforeServiceImage" id="beforeService" style="border: 2px solid white;" required>
                </div>
                <div class="viewPhotos vp2" style="color:white;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;"> &nbsp; After service</h3>
                    <input type="file" accept="image/*" class="imageFile" name="afterServiceImage" id="afterService" style="border: 2px solid white;" required>
                </div>

                <button class="uploadImagesLink" type="submit" value="Upload Images" name="submit" id="completeService">Complete Service</button>
                <!--<button class="uploadImagesLink" type="submit" value="Upload Images" name="submit" id="completeService"><a href = "/calendar/completeService/<?php echo $orderDetails[0]['Reservation_ID'] ?>"style = "color:white;">Complete Service</a></button>-->

            </form>
        </div>
        <!-- <div class="box4">
        <div class="reservation-buttons">

            <button class="reservationButtons a10 agg" id="completeService" style="background-color: #1597BB;"><a href="/user/home">Complete Service</a></button>
        </div>
    </div> -->
    </div>
    <!-- <div class="map" id="googleMapbox"> -->

    <script>
        var orderDetails = <?php echo json_encode($orderDetails); ?>;
    </script>

    <script src="/public/js/stlOrderDetails.js"></script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvVN9pPMljGjWLvUGWGisQwGUUMSOHco&callback=myMap&v=weekly"> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFq7IClah9EyedO6MTv12hIzbW_Iq-Aq8&callback=myMap&v=weekly">
    </script>