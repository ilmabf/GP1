<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-adminManageService">
    <h2>Manage Service</h2>
</div>

<div class="serviceManage">
    <div class="serviceManageHeader"> <h3>Service Types</h3> </div>
    <div class="serviceManageBox">
        <div class="typeServices" id="typeServices1">Interior Cleaning</div>
        <div class="typeServices" id="typeServices2">Exterior washing & Interior Cleaning</div>
        <div class="typeServices" id="typeServices3">Sanitization</div>
        <div class="typeServices addBtnService" id="addServiceTypes">+ Add</div>
    </div>
</div>

<div class="vehicleManage">
    <div class="vehicleManageHeader"> <h3>Vehicle Types</h3> </div>
    <div class="vehicleManageBox">
        <div class="typeVehicles" id="typeVehicles1">H - Back</div>
        <div class="typeVehicles" id="typeVehicles2">Sedan</div>
        <div class="typeVehicles" id="typeVehicles3">Suv</div>
        <div class="typeVehicles" id="typeVehicles4">Van</div>
        <div class="typeVehicles addBtnVehicles" id="addNewVehicleTypess">+ Add</div>
    </div>
</div>

<div class="priceManage">
    <div class="priceManageHeader"> <h3>Price</h3> </div>
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

<div id="interiorClean" class="manageInteriorClean">
    <div class="iClean">
        <span class="closeInteriorClean">&times;</span>
        <h3 class="interiorClean-content">Interior Cleaning</h3>
        <p class="interiorClean-content"><?php echo "Description"?></p>
        <div class="deleteIClean">
            <button type="button" class="btnDeleteInteriorCleaning">Delete Wash Service</button>
        </div>
    </div>
</div>

<!-- <div id="interior-exteriorClean" class="manageInteriorClean">
    <div class="iClean">
        <span class="closeIEClean">&times;</span>
        <h3 class="interiorClean-content">Exterior washing & Interior Cleaning</h3>
        <p class="interiorClean-content"><?php echo "Description"?></p>
        <div class="deleteIClean">
            <button type="button" class="btnDeleteInteriorCleaning">Delete Wash Service</button>
        </div>
    </div>
</div>

<div id="sanitization" class="manageInteriorClean">
    <div class="iClean">
        <span class="closeSClean">&times;</span>
        <h3 class="interiorClean-content">Sanitization</h3>
        <p class="interiorClean-content"></p>
        <div class="deleteIClean">
            <button type="button" class="btnDeleteInteriorCleaning">Delete Wash Service</button>
        </div>
    </div>
</div> -->

<div id="vehiclesNames" class="manageVehicles">
    <div class="vehicleManagment">
        <span class="closeVehicle">&times;</span>
        <h3 class="vehicles-content">H - Back</h3>
        <p class="vehicles-content"><?php echo "Description"?></p>
        <div class="deleteVehicle">
            <button type="button" class="btnDeleteVehicle">Delete Vechicle Type</button>
        </div>
    </div>
</div>


<div id="newServiceNames" class="addNewServices">
    <div class="addNewServicesBox">
        <span class="closeAddService">&times;</span>
        <h3 class="addNewService-content">Add Service</h3>
        <div class="addNewService-content addNewServiceInput">
            <form action="" method="POST" id="addServiceTypeForm">
                <input type="text" name="newServiceName" id="newServiceTypeName" placeholder="Enter service name">
                <input type="text" name="newServiceDescription" id="newServiceTypeDescription" placeholder="Enter service description">
            </form>
        </div>

        <div class="cancelAddNewServices">
            <button type="button" form="addServiceTypeForm" class="btnAddNewService" value="Done">Add Service</button>
            <button type="button" class="btnCancelAddService">Cancel</button>
        </div>
    </div>
</div>


<div id="newVehicleNames" class="addNewVehicles">
    <div class="addNewVehicleBox">
        <span class="closeAddVehicle">&times;</span>
        <h3 class="addNewVehicle-content">Add Vehicle Type</h3>
        <div class="addNewVehicle-content addNewVehicleInput">
            <form action="" method="POST" id="addVehicleTypeForm">
                <input type="text" name="newVehicleName" id="newVehicleTypeName" placeholder="Enter vehicle type name">
                <!-- <input type="text" name="newServiceDescription" id="newServiceTypeDescription" placeholder="Enter service description"> -->
            </form>
        </div>

        <div class="cancelAddNewVehicles">
            <button type="button" form="addVehicleTypeForm" class="btnAddNewVehicle" value="Done">Add vehicle type</button>
            <button type="button" class="btnCancelAddVehicle">Cancel</button>
        </div>
    </div>
</div>


<div style="min-height: 110px;"></div>

<script src="/public/js/adminManageService.js"></script> 
