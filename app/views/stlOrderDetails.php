<?php
include 'UserLoggedInHeader.php';
?>

<div class="bgImage">
    <div style="min-height: 110px;"></div>
    <div>
        <h1 class="stl-orders-h1">Order Details</h1>
        <div class="mainUp">
            <div class="upcoming">

                <div class="boxx">

                    <div class="order">
                        <div class="orderitem">Customer Name</div>
                        <div class="orderitem1">Gihan Anthony</div>
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
        <div class="service-team" style = "background-color:transparent; box-shadow:none;">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="viewPhotos vp1" style = "color:white;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">Before service</h3>
                    <input type="file" class="imageFile" name="beforeService" id="beforeService" style = "border: 2px solid white;">
                </div>
                <div class="viewPhotos vp2" style = "color:white;">
                    <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;"> &nbsp; After service</h3>
                    <input type="file" class="imageFile" name="afterService" id="afterService" style = "border: 2px solid white;">
                </div>
                <button class="uploadImagesLink" type="submit" value="Upload Images" name="submit">Upload Images</button>
            </form>
        </div>

        <div class="reservation-buttons">

            <button class="reservationButtons a10 agg" id="completeService"><a href=/booking/completedOrder">Complete Service</a></button>
        </div>

    </div>

    <div style="min-height: 90px;"></div>