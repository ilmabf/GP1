<?php 
    
    include 'userLoggedInHeader.php';
?>

<body onload="typeWriter()">
    <div style="min-height: 110px;"></div>

    <div>
        <div class="heading">
            <h2>Start your Booking</h2>
        </div>

        <p id="sub-heading-p"></p>
    </div>

    <div class="wash-date">
        <h3>Wash Date</h3>

        <div id="closeOnClick">
            <button class="btncls" onclick="closeOnClickDemo()">Click to open date picker</button>
            <input type="text" id="datedemo">

        </div>
    </div>

    <div class="select-vehicle">
        <h3>Select Your Vehicle</h3>

        <div class="select-vehcile-box">
            <select name="vehicle" id="vehicle-types">
                <option value="JQ - 4323">JQ - 4323</option>
                <option value="AS - 4256">AS - 4256</option>
                <option value="BH - 8975">BH - 8975</option>
                <option value="AZ - 4623">AZ - 4623</option>
            </select>
        </div>
    </div>

    <div class="wash-type">
        <h3>Select Your Wash Type</h3>
        <div class="select-wash-type">
            <button class="button">Interior Cleaning</button>
            <button class="button">Exterior Washing & Interior Cleaning</button>
            <button class="button">Sanitization</button>
        </div>

    </div>

    <div class="price">
        <h3>Price</h3>
        <div class="price-display"></div>
    </div>

    <div class="next-pg">
        <button class="next-button"><a href="/booking/bookAWash2" style="color: white;">Next</a></button>
    </div>
 

<?php
    include 'userFooter.php';
?>

<script src="/public/js/customerBookAWash.js"></script> 
    
</body>


