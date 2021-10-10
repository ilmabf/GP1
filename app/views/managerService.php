<?php

include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Service Details</h2>
</div>


<div class="wash-type">
    <h3>Wash Types</h3>
    <form action="" method="post">
        <div class="select-wash-type">
            <div class="wash-select-radio">
                <input type="radio" name="washType" id="interiorCleaning" class="washType1" value="Interior Cleaning" checked>
                <label for="washType">Interior Cleaning</label>
            </div>

            <div class="wash-select-radio">
                <input type="radio" name="washType" id="interior&ExteriorCleaning" class="washType1" value="Exterior Washing & Interior Cleaning">
                <label for="washType">Exterior Washing & Interior Cleaning</label>
            </div>

            <div class="wash-select-radio">
                <input type="radio" name="washType" id="interior&ExteriorCleaning" class="washType1" value="Sanitization">
                <label for="washType">Sanitization</label>
            </div>
        </div>
    </form>
</div>


<div class="vehicle-type">
    <h3>Vehicle Types</h3>

    <form action="" method="post">
        <div class="vehicle-select-radio">
            <input type="radio" name="vehicleType" id="H-Back" class="vehcileType1" value="H-Back">
            <label for="vehicleType" class="v1">H-Back</label>
        </div>

        <div class="vehicle-select-radio">
            <input type="radio" name="vehicleType" id="sedan" class="washType1" value="Sedan">
            <label for="vehicleType" class="v2">Sedan</label>
        </div>

        <div class="vehicle-select-radio">
            <input type="radio" name="vehicleType" id="suv" class="washType1" value="Suv">
            <label for="vehicleType" class="v3">Suv</label>
        </div>

        <div class="vehicle-select-radio">
            <input type="radio" name="vehicleType" id="luxury" class="washType1" value="Luxury">
            <label for="vehicleType" class="v4">Luxury</label>
        </div>

        <div class="vehicle-select-radio">
            <input type="radio" name="vehicleType" id="van" class="washType1" value="Van">
            <label for="vehicleType">Van</label>
        </div>

    </form>
</div>

<div class="price">
    <h3>Price</h3>
    <div class="price-display"> Rs 1000</div>
</div>


<script src="/public/js/managerServiceDetails.js"></script>