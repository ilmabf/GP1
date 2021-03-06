<?php

include 'views/user/LoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-adminManageService">
    <h2>Manage Services</h2>
</div>
<div id="manageService">
    <div id="service" style="display: flex;">
        <div class="serviceManage">

            <div class="serviceManageBox">
                <div class="serviceManageHeader">
                    <h3>Service Types</h3>
                </div>
                <?php
                $i = 0;
                while ($i < sizeof($_SESSION['washpackages'])) {
                    echo "<div class='typeServices' id='typeServices";
                    echo $i;
                    echo "'";
                    echo " onclick='openViewServiceForm(";
                    echo $i;
                    echo ")' >";
                    echo $_SESSION['washpackages'][$i]['Name'];
                    echo "</div>";
                    $i = $i + 1;
                }
                ?>
                <div class="typeServices addBtnService" id="addServiceTypes" onclick="openAddServiceForm()">+ Add</div>
            </div>
        </div>

        <div class="vehicleManage">

            <div class="vehicleManageBox">
                <div class="vehicleManageHeader">
                    <h3 style="color: #193498;">Vehicle Types</h3>
                </div>
                <?php
                $i = 0;
                while ($i < sizeof($_SESSION['vehicleTypes'])) {
                    echo "<div class='typeVehicles' id='typeVehicles";
                    echo $i;
                    echo "'";
                    echo " onclick='openViewVehicleType(";
                    echo $i;
                    echo ")' ><span>";
                    echo $_SESSION['vehicleTypes'][$i]['Vehicle_Type'];
                    echo "</span></div>";
                    $i = $i + 1;
                }
                ?>
                <div class="typeVehicles2 addBtnVehicles" id="addNewVehicleTypess" onclick="openVehicleAddForm()">+ Add</div>
            </div>
        </div>


    </div>

    <div class="priceManage" style="text-align: center;">
        <div class="priceManageHeader">
            <h3>Wash Price</h3>
        </div>
        <div class="priceManageBox">

            <div class="typesBox">
                <form action="" method="post">
                    <select name="washType" id="admin-wash-types" onchange="Price()">
                        <?php
                        $i = 0;
                        ?>
                        <option>Select Wash Type</option>
                        <?php
                        while ($i < sizeof($_SESSION['washpackages'])) {
                            echo "<option value='";
                            echo $_SESSION['washpackages'][$i]['Wash_Package_ID'];
                            echo "'>";
                            echo $_SESSION['washpackages'][$i]['Name'];
                            echo "</option>";
                            $i = $i + 1;
                        }
                        ?>
                    </select>
                </form>
            </div>

            <div class="typesBox">
                <form action="" method="post">
                    <select name="vehicleType" id="admin-vehicle-types" onchange="Price()">
                        <?php
                        $i = 0;
                        ?>
                        <option>Select Vehicle Type</option>
                        <?php
                        while ($i < sizeof($_SESSION['vehicleTypes'])) {
                            echo "<option value='";
                            echo $_SESSION['vehicleTypes'][$i]['Vehicle_Type'];
                            echo "'>";
                            echo $_SESSION['vehicleTypes'][$i]['Vehicle_Type'];
                            echo "</option>";
                            $i = $i + 1;
                        }
                        ?>
                    </select>
                </form>
            </div>

            <div class="typesBox">
                <div class="" id="PriceValue" style="display: inline-block; margin-right: 20px;"></div>
                <div class="AdminpriceBox" id="add" style="display:none;"><button type="button" class="editPriceBtn" onclick="HideAdd();">Add Price</button></div>
                <div class="AdminpriceBox" id="edit" style="display:none;"><button type="button" class="editPriceBtn" onclick="HideEdit();">Edit Price</button></div>
                <input class="AdminpriceBox" style="display:none; " id="inputAddPrice"></input>
                <div class="AdminpriceBox" style="display:none;" id="addPriceButton"><button type="button" class="editPriceBtn" onclick="addFunction();">Submit</button></div>
                <div class="AdminpriceBox" style="display:none;" id="editPriceButton"><button type="button" class="editPriceBtn" onclick="addFunction();">Submit</button></div>
            </div>

        </div>
    </div>
</div>

<div class="addVehicleform" id="viewserviceForm">
    <span type="button" class="close_washType" style="float:right; cursor:pointer;" onclick="closeViewServiceForm()">&#10006</span>
    <h2 class="login-signupheader" id="ServiceName"></h2>

    <form action="" method="post" id="editWashPackage">
        <label for="Model" style="padding: 0px 29px 0px 0px;">Description</label>
        <div class="input-box" style="display: inline-grid;">
            <textarea name="description" placeholder="" id="serviceDesc" required style="height: 112px;    width: 90%;"></textarea>
        </div>
        <br>
        <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Save</button>
        <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" style="background-color:rgb(145,20,20); width: 33%;"><a id="deleteServiceButton" href="" style="color:white;">Delete Service</a></button>
    </form>
</div>

<div class="addVehicleform" id="viewVehicleType">
    <h2 class="login-signupheader" id="VehicleName"></h2>

    <form action="" method="post" id="customer-signup">
        <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup"><a id="deleteVehicle" href="" style="color:white;">Yes</a></button>
        <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeViewVehicleType()">No</button>
    </form>
</div>

<div class="addVehicleform" id="serviceForm">
    <h2 class="login-signupheader">Add a service</h2>
    <form action="/service/addWashPackage" method="post" id="customer-signup">
        <label for="fname" style="padding: 0px 19px 0px 0px;">Service Name</label>
        <input class="input-box" id="vin" type="text2" name="washpackagename" style="padding:8px;" required>
        <br>
        <label for="Model" style="padding: 0px 29px 0px 0px;">Description</label>
        <div class="input-box" style="display: inline-grid;">
            <textarea name="description" placeholder="type here.." required style="height: 112px;    width: 90%;" required></textarea>
        </div>
        <br>
        <button id="AddServiceSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
        <button id="AddServiceCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeAddServiceForm()">Cancel</button>
    </form>
</div>

<div class="addVehicleform" id="vehicleAddForm">
    <h2 class="login-signupheader">Add a vehicle type</h2>
    <form action="/service/addVehicleType" method="post" id="customer-signup">
        <label for="fname" style="padding: 0px 19px 0px 0px;">Name</label>
        <input class="input-box" id="vin" type="text2" name="vehicleName" required>
        <br>
        <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
        <button id="VehicleFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeVehicleAddForm()">Cancel</button>
    </form>
</div>

<div style="min-height: 110px;"></div>


<script>
    var pausecontent = <?php echo json_encode($_SESSION['washpackages']); ?>;
    var vehicles = <?php echo json_encode($_SESSION['vehicleTypes']); ?>;
    var servicePrices = <?php echo json_encode($_SESSION['servicePrice']); ?>;
</script>

<script src="/public/js/AdminManageService.js"></script>