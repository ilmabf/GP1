<?php
include 'UserLoggedInHeader.php';
?>

<div class="bgImage">
    <div style="min-height: 110px;"></div>
    <div>
        <h1 class="stl-orders-h1">Order Details</h1>

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

            <div class="boxx">
                <div class="order">
                    <div class="orderitem">Service Type</div>
                    <p class="orderitem1">Interior Cleaning</p>
                </div>
                <div class="order">
                    <div class="orderitem">Price</div>
                    <p class="orderitem1">1000</p>
                </div>
                <div class="order">
                    <div class="orderitem"><a href="">View Location</a></div>
                </div>
            </div>
        </div>

        <div class="service-team">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="viewPhotos vp1">
                    <h3>Before service</h3>
                    <input type="file" class="imageFile" name="beforeService" id="beforeService">
                </div>
                <div class="viewPhotos vp2">
                    <h3> &nbsp; After service</h3>
                    <input type="file" class="imageFile" name="afterService" id="afterService">
                </div>
                <button class="uploadImagesLink" type="submit" value="Upload Images" name="submit">Upload Images</button>
            </form>
        </div>

        <div class="reservation-buttons">

            <button class="reservationButtons a10" style="background-color:green;" id="completeService"><a>Complete Service</a></button>
        </div>

    </div>

    <div style="min-height: 90px;"></div>