<?php
include 'views/user/LoggedInHeader.php';
$orderDetails = $_SESSION['todayOrder'];
$customerDetails = $_SESSION['customer'];
$vehicleDetails = $_SESSION['vehicle'];
$washPackageDetails = $_SESSION['washpackage'];
?>

<div class="bgImage">

    <div class="map" id="googleMapbox">
        <h2 class="login-signupheader"><b>Customer location</b></h2>
        <div id="map"></div>
        <div id="mapControl">
            <button id="AddLocationButton" class="formSubmitButton" type="submit" name="signup" onclick = "closeMap2();">Close</button>
        </div>
    </div>

    <div style="min-height: 110px;"></div>
    <div>
        <div class="mainUp" id="mainbox">
            <div class="box3">
                <div class="invoiceBorder">Order - <?php echo $orderDetails[0]['Reservation_ID'] ?></div>

                <div class="box2">

                    <hr><br>

                    <div class="res">
                        <div class="orderitem">Name</div>
                        <div class="orderitemx"><?php echo $customerDetails[0]['First_Name'] ?> <?php echo $customerDetails[0]['Last_Name'] ?></div>

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
                        <div class="orderitemx"> <?php echo $vehicleDetails[0]['Colour']; ?> </div>
                    </div><br>
                    <hr><br>
                    <div class="res">
                        <div class="orderitem">Wash Package</div>
                        <div class="orderitemx"><?php echo $washPackageDetails[0]['Name'] ?></div>

                    </div>
                    <div class="res">
                        <div class="orderitem">Address</div>
                        <div class="orderitemx" style="font-size:12px;"><?php echo $orderDetails[0]['Address'] ?></div>

                    </div>

                    <div class="res">
                        <div class="orderitem">Location</div>
                        <div class="orderitemx"><button class="reservationButtons a15" id="cancelAssignBtn" style="padding: 1px 3px; margin-bottom:0px" onclick="openMap2();">View Location</button></div>
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
        </div>
        <div class="service-team" style="background-color:transparent; box-shadow:none;">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="viewPhotos vp1" style="color:white;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Before service</h3>
                    <input type="file" class="imageFile" name="beforeService" id="beforeService" style="border: 2px solid white;" required>
                </div>
                <div class="viewPhotos vp2" style="color:white;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;"> &nbsp; After service</h3>
                    <input type="file" class="imageFile" name="afterService" id="afterService" style="border: 2px solid white;" required>
                </div>
                <button class="uploadImagesLink" type="submit" value="Upload Images" name="submit" id="completeService">Complete Service</button>
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
        var submitImages = document.getElementById("completeService");
        var before = document.getElementById("beforeService");
        var before = document.getElementById("afterService");
    </script>

    <script>
        var orderDetails = <?php echo json_encode($orderDetails); ?>;

        function myMap() {
            var lat = orderDetails[0]['Latitude'];
            var lng = orderDetails[0]['Longitude'];

            var mapProp = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 15,
            };

            var map2 = new google.maps.Map(document.getElementById("map"), mapProp);
            marker = new google.maps.Marker({
                map2,
            });
            latlng = new google.maps.LatLng(lat, lng);
            marker.setPosition(latlng);
            marker.setMap(map2);

        }
    </script>

    <script src="/public/js/stlOrderDetails.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvVN9pPMljGjWLvUGWGisQwGUUMSOHco&callback=myMap&v=weekly"></script>