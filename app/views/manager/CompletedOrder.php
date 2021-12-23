<?php
include 'views/user/LoggedInHeader.php';
    $orderDetails = $_SESSION['completedOrder'];
    $customerDetails = $_SESSION['customer'];
    $vehicleDetails = $_SESSION['vehicle'];
    $washPackageDetails = $_SESSION['washpackage'];
    $images = $_SESSION['images'] ;
?>

<div class="bgImage">

    <div style="min-height: 110px;"></div>
    <div class="mainUp">
    <div class="box3">
            <div class="invoiceBorder">Order - <?php echo $orderDetails[0]['Reservation_ID'] ?></div>

            <div class="box2">

                <hr><br>
                <div class="res">
                    <div class="orderitem">Name</div>
                    <div class="orderitemx"><?php echo $customerDetails[0]['First_Name'] ?> <?php echo $customerDetails[0]['Last_Name'] ?></div>

                </div>
                <div class="res">
                    <div class="orderitem">Date</div>
                    <div class="orderitemx"><?php echo $orderDetails[0]['Date'] ?></div>

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
                    <div class="orderitem" >Address</div>
                    <div class="orderitemx" style="font-size:12px;"><?php echo $orderDetails[0]['Address'] ?></div>

                </div>
                <div class="res">
                    <div class="orderitem">Location</div>
                    <div class="orderitemx"><button class="reservationButtons a12" id="cancelAssignBtn" style="color:white; padding: 1px 3px; margin-bottom:0px" onclick=""><a>View Location</a></button></div>
                </div>
                <div class="res">
                    <div class="orderitem">Completed by</div>
                    <div class="orderitemx">Service Team <?php echo $orderDetails[0]['Service_team_leader_ID'] ?></div>
                </div>
                <div class="res">
                    <div class="orderitem">Wash Package</div>
                    <div class="orderitemx"><?php echo $washPackageDetails[0]['Name'] ?></div>

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
    <div class="service-team" style = "background-color:transparent; box-shadow:none;">
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
            <img src= "data:image/ . $type . ;base64, <?php echo base64_encode($images[0]['Picture_before']); ?>" style="width:30%; border-radius: 8px;"></img>

        <div class="viewPhotos vp2">
            <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">After Service</h3>
            <img src= "data:image/ . $type . ;base64, <?php echo base64_encode($images[0]['Picture_after']); ?>" style="width:30%; border-radius: 8px;"></img>
        </div>

    </div>

    <div style="min-height: 110px;"></div>

    <script src="/public/js/ManagerViewCompletedOrder.js"></script>