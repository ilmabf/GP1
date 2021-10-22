<?php
include 'views/user/LoggedInHeader.php';
?>

<div class="bgImage">

    <div style="min-height: 110px;"></div>

    <div class="heading">
        <h2>Order - <span style="color:black;">BBBB</span></h2>
    </div>
    <div class="mainUp">
        <div class="upcoming">

            <div class="boxx">

                <div class="order">
                    <div class="orderitem">Customer Name</div>
                    <div class="orderitem1">Kamal Silva</div>
                </div>
                <div class="order">
                    <div class="orderitem">Date</div>
                    <div class="orderitem1">2021/10/03</div>
                </div>
                <div class="order">
                    <div class="orderitem">Time</div>
                    <div class="orderitem1">12 pm - 2 pm</div>
                </div>
                <div class="order">
                    <div class="orderitem">Contact No</div>
                    <div class="orderitem1">0769012345</div>
                </div>
            </div>
            <hr class="hr">
            <div class="boxx">
                <div class="order">
                    <div class="orderitem">Vehicle No</div>
                    <p class="orderitem1">CS - 1528</p>
                </div>
                <div class="order">
                    <div class="orderitem">Model</div>
                    <p class="orderitem1">Premio</p>
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
                    <p class="orderitem1">Sanitization</p>
                </div>
                <div class="order">
                    <div class="orderitem">Total Price Rs.</div>
                    <p class="orderitem1">500/-</p>
                </div>
                <div class="order">
                    <div class="orderitem">Done by</div>
                    <p class="orderitem1">Team 1</p>
                    </p>
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
            <img src="/public/images/ImageIcon.png" style="width:20%; border-radius: 8px;"></img>
        </div>
        <div class="viewPhotos vp2">
            <h3 style="color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">After Service</h3>
            <img src="/public/images/ImageIcon.png" style="width:20%; border-radius: 8px;"></img>
        </div>

    </div>

    <div style="min-height: 110px;"></div>

    <script src="/public/js/ManagerViewCompletedOrder.js"></script>