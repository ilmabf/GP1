<?php
include 'views/user/LoggedInHeader.php';
?>

<div class="bgImage">
    <div style="min-height: 110px;"></div>
    <div>
        <div class="mainUp">
            <div class="box3">
                <div class="invoiceBorder">Order - 1257</div>

                <div class="box2">

                    <hr><br>
                    <div class="res">
                        <div class="orderitem">Name</div>
                        <div class="orderitemx">Gihan Anthony</div>

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
                    </div>
                    <div class="res">
                        <div class="orderitem">Model</div>
                        <div class="orderitemx">Axio</div>
                    </div>
                    <div class="res">
                        <div class="orderitem">Type</div>
                        <div class="orderitemx">Sedan</div>
                    </div>
                    <div class="res">
                        <div class="orderitem">Manufacturer</div>
                        <div class="orderitemx">BMW</div>
                    </div>
                    <div class="res">
                        <div class="orderitem">Color</div>
                        <div class="orderitemx" style="background-color:blue; width: 26px;height: 24px;display: inline-block;border: 1px solid #193498;"></div>
                    </div><br>
                    <hr><br>
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
                </div>


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
            <button class="uploadImagesLink" type="submit" value="Upload Images" name="submit">Complete Service</button>
        </form>
    </div>
    <!-- <div class="box4">
        <div class="reservation-buttons">

            <button class="reservationButtons a10 agg" id="completeService" style="background-color: #1597BB;"><a href="/user/home">Complete Service</a></button>
        </div>
    </div> -->
</div>