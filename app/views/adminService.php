<?php

include 'UserLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-adminManageService">
    <h2>Manage Service</h2>
</div>
<div id="service">
    <div class="serviceManage">
        <div class="serviceManageHeader">
            <h3>Service Types</h3>
        </div>
        <div class="serviceManageBox">
            <div class="typeServices" id="typeServices1" onclick="openViewServiceForm()">Interior Cleaning</div>
            <div class="typeServices" id="typeServices2" onclick="openViewServiceForm()">Exterior washing & Interior Cleaning</div>
            <div class="typeServices" id="typeServices3" onclick="openViewServiceForm()">Sanitization</div>
            <div class="typeServices addBtnService" id="addServiceTypes" onclick="openServiceForm()">+ Add</div>
        </div>
    </div>

    <div class="vehicleManage">
        <div class="vehicleManageHeader">
            <h3>Vehicle Types</h3>
        </div>
        <div class="vehicleManageBox">
            <div class="typeVehicles" id="typeVehicles1" onclick="openViewVehicleType()">H - Back</div>
            <div class="typeVehicles" id="typeVehicles2" onclick="openViewVehicleType()">Sedan</div>
            <div class="typeVehicles" id="typeVehicles3" onclick="openViewVehicleType()">Suv</div>
            <div class="typeVehicles" id="typeVehicles4" onclick="openViewVehicleType()">Van</div>
            <div class="typeVehicles addBtnVehicles" id="addNewVehicleTypess" onclick="openVehicleAddForm()">+ Add</div>
        </div>
    </div>

    <div class="priceManage">
        <div class="priceManageHeader">
            <h3>Price</h3>
        </div>
        <div class="priceManageBox">

            <div class="typesBox">
                <form action="" method="post">
                    <select name="washType" id="admin-wash-types">
                        <option value="Choose a service type">Choose a service type</option>
                        <option value="Interior Cleaning">Interior Cleaning</option>
                        <option value="Exterior washing & Interior Cleaning">Exterior washing & Interior Cleaning</option>
                        <option value="Sanitization">Sanitization</option>
                    </select>
                </form>
            </div>

            <div class="typesBox">
                <form action="" method="post">
                    <select name="vehicleType" id="admin-vehicle-types">
                        <option value="Choose a vehicle">Choose a vehicle</option>
                        <option value="H - Back">H - Back</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Suv">Suv</option>
                        <option value="Van">Van</option>
                    </select>
                </form>
            </div>

            <div class="typesBox">
                <div class="priceBox displayPrice">Rs. <?php echo "990" ?></div>
                <div class="priceBox"><button type="button" class="editPriceBtn">Edit</button></div>
            </div>

        </div>
    </div>
</div>
<div class="addVehicleform" id="viewserviceForm">
    <div class="forma">

        <h2 class="login-signupheader">Interior Cleaning</h2>

        <form action="" method="post" id="customer-signup">
            <label for="Model" style="padding: 0px 29px 0px 0px;">Description</label>
            <div class="input-box" style="display: inline-grid;">
                <textarea name="review" placeholder="The service description..." required style="height: 112px;    width: 90%;"></textarea>
            </div>
            <br>
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup" onclick="closeViewServiceForm()">Save</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" style="background-color:rgb(145,20,20); width: 33%;">Delete Service</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="viewVehicleType">
    <div class="forma">

        <h2 class="login-signupheader">Do you want to remove H - Black?</h2>

        <form action="" method="post" id="customer-signup">
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup">Yes</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeViewVehicleType()">No</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="serviceForm">
    <div class="forma">

        <h2 class="login-signupheader">Add a service</h2>

        <form action="" method="post" id="customer-signup">
            <label for="fname" style="padding: 0px 19px 0px 0px;">Service Name</label>
            <input class="input-box" id="vin" type="text2" name="vin" required>
            <br>
            <label for="Model" style="padding: 0px 29px 0px 0px;">Description</label>
            <div class="input-box" style="display: inline-grid;">
                <textarea name="review" placeholder="type here.." required style="height: 112px;    width: 90%;"></textarea>
            </div>
            <br>
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup">Submit</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeServiceForm()">Cancel</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="vehicleAddForm">
    <div class="forma">

        <h2 class="login-signupheader">Add a vehicle type</h2>

        <form action="" method="post" id="customer-signup">
            <label for="fname" style="padding: 0px 19px 0px 0px;">Name</label>
            <input class="input-box" id="vin" type="text2" name="vin" required>
            <br>
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="button" name="signup">Submit</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeVehicleAddForm()">Cancel</button>
        </form>

    </div>
</div>
<div style="min-height: 110px;"></div>

<script src="/public/js/AdminManageService.js"></script>