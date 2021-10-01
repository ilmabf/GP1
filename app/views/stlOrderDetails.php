<?php
    include 'userLoggedInHeader.php';
?>
<div style="min-height: 110px;"></div>
<div>
    <h1 class="stl-orders-h1">Order Details</h1>

    <div class="order-box-1">

        <div class="sub-box-1">

            <div class="sub-box-2">
                <div class="order-title">Customer Name</div>
                <div class="order-description">Gihan Anthony</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title">Date</div>
                <div class="order-description">2021/10/18</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title">Time</div>
                <div class="order-description">8 am - 10 am</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title" >Contact No</div>
                <div class="order-description">0775674896</div>
            </div>
        </div>
        

        <div class="sub-box-1">

            <div class="sub-box-2">
                <div class="order-title">Vehicle No</div>
                <div class="order-description">AD - 2315</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title">Model</div>
                <div class="order-description">Axio</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title">Vehicle Type</div>
                <div class="order-description">Sedan</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title">Color</div>
                <div class="order-description">Black</div>
            </div>
        </div>
        

        <div class="sub-box-1">
            <div class="sub-box-2">
                <div class="order-title" >Service Type</div>
                <div class="order-description">Interior Cleaning</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title">Price</div>
                <div class="order-description">1000</div>
            </div>
            <div class="sub-box-2">
                <div class="order-title"><a href=" ">Location</a></div> 
            </div>
        </div>
        
    </div>

    <div class="upload-box" > 
        <form action="stlImageUpload.php" method="post" enctype="multipart/form-data">
            <div class="uploadImage" > <h3 class="a1 p1">Before service:</h3>
            <input type="file" name="beforeService" id="beforeService"></div>
            <div class="uploadImage" > <h3 class="a1 p1">  &nbsp; After service:</h3>
            <input type="file" name="afterService" id="afterService"></div>
            <div class="uploadImage" ><input class="uploadImagesLink" type="submit" value="Upload Images" name="submit"></div>
        </form>
    </div>

        <div style="flex:auto" class="previous-pg">
            <button class="back-button"><a href="/stl/viewAssignedOrders" style="color: white;">Back</a></button>
        </div>

        <div style="flex:auto"  class="next-page">
            <button class="completed-button"><a href="/stl/stlHome" style="color: white;">Service Completed</a></button>
        </div>
  
 </div>
 