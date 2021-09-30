<?php
    include 'userLoggedInHeader.php';
?>
<div style="min-height: 110px;"></div>
<div>
    <h1 class="stl-orders-h1">Order Details</h1>
    <div class="order-box">

        <div class="viewOrder">
            <div class="orderID">
                <h3 class="a1 p1">Order ID</h3>
                <p class="a1">AAAA</p>
            </div>
        </div>

        <div class="viewOrder">

            <div class="orderCustomer">
                <h3 class="a2 p1">Customer Name</h3>
                <p class="a2">Gihan Anthony</p>
            </div>
            <div class="orderDate">
                <h3 class="a7 p1">Date</h3>
                <p class="a7">2021/10/18</p>
            </div>
            <div class="orderTime">
                <h3 class="a7 p1">Time</h3>
                <p class="a7">8 am - 10 am</p>
            </div>
            <div class="orderCustomer">
                <h3 class="a3 p1">Contact No</h3>
                <p class="a3">0775674896</p>
            </div>
        </div>

        <div class="viewOrder">
            <div class="orderVehicle">
                <h3 class="a4 p1">Vehicle No</h3>
                <p class="a4">AD - 2315</p>
            </div>
            <div class="orderVehicle">
                <h3 class="a5 p1">Model</h3>
                <p class="a5">Axio</p>
            </div>
            <div class="orderVehicle">
                <h3 class="a6 p1">Vehicle Type</h3>
                <p class="a6">Sedan</p>
            </div>
            <div class="orderVehicle">
                <h3 class="a7 p1">Color</h3>
                <p class="a7">Black</p>
            </div>
        </div>

        <div class="viewOrder">
            <div class="orderServiceType">
                <h3 class="a7 p1">Service Type</h3>
                <p class="a7">Interior Cleaning</p>
            </div>
            <div class="orderPrice">
                <h3 class="a7 p1">Price</h3>
                <p class="a7">1000</p>
            </div>
            <div class="orderLocation">
                <h3 class="a7"><a href=" ">Location</a></h3> 
            </div>
        </div>
    </div>

    <div class="uploadImage" > 
        <form action="stlImageUpload.php" method="post" enctype="multipart/form-data">
            <div class="uploadImage" > <h3 class="a1 p1">Before service:</h3>
            <input type="file" name="beforeService" id="beforeService"></div>
            <div class="uploadImage" > <h3 class="a1 p1">  &nbsp; After service:</h3>
            <input type="file" name="afterService" id="afterService"></div>
            <div class="uploadImage" ><input class="uploadImagesLink" type="submit" value="Upload Images" name="submit"></div>
        </form>
    </div>

    <div style="flex:auto" class="prev-pg">
            <button class="previous-button"><a href="/stl/viewAssignedOrders" style="color: white;">Back</a></button>
   </div>
   <div style="flex:auto"  class="next-pg">
            <button class="next-button"><a href="/stl/stlHome" style="color: white;">Service Completed</a></button>
   </div>
  
 </div>
