<link rel="stylesheet" href="/public/css/actors/customer/Map.css">

<div class="bgImage1">
    <?php

    include 'views/user/LoggedInHeader.php';
    $details = $_SESSION['userDetails'];
    $vehicles = $_SESSION['vehicles'];
    ?>

    <div style="min-height: 110px;"></div>
    <div class="map" id="googleMapbox">
        <h2 class="login-signupheader"><b>Add a location</b></h2>
        <div id="map"></div>
        <div id="mapControl">
            <button id="AddLocationButton" class="formSubmitButton" type="submit" name="signup" onclick="saveLocation()">Add</button>
            <button id="CloseMapButton" class="formCancelButton" type="submit" name="signup" onclick="closeMap()">Cancel</button>
        </div>
    </div>
</div>

<div class="addVehicleform" id="vehicleForm">
    <div class="forma">
        <div class="loguser-icon"></div>
        <h2 class="login-signupheader"><b>Add a vehicle</b></h2>

        <form action="/account/addVehicle" method="post" id="customer-signup">
            <label for="fname">Vehicle Identification No.</label>
            <input class="input-box" id="vin" type="text2" name="vin" maxlength="50" automatic placeholder="Eg:- KP 8717" pattern="[^'?()/><\][\\\x22,;|]+" required>
            <br>
            <label for="Model" style="padding: 0px 132px 0px 0px;">Model</label>
            <input class="input-box" type="text2" name="model" maxlength="50" automatic placeholder="Eg:- Aqua" pattern="[^'?()/><\][\\\x22,;|]+" required>
            <br>
            <label for="Color" style="padding: 0px 139px 0px 0px;">Color</label>
            <!-- <input type="color" name="color" required> -->
            <select name="color" class="myColorTypes" id="editMyColor" style="margin: 10px 0px;     width: 50%;">
                <option value="Silver">Silver</option>
                <option value="White">White</option>
                <option value="Blue">Blue</option>
                <option value="Green">Green</option>
                <option value="Beige">Beige</option>
                <option value="Yellow">Yellow</option>
                <option value="Orange">Orange</option>
                <option value="Brown">Brown</option>
                <option value="Pink">Pink</option>
                <option value="Purple">Purple</option>
                <option value="Red">Red</option>
            </select>
            <br>
            <label for="Vehicle Type" style="padding: 0px 87px 0px 0px;">Vehicle Type</label>
            <select name="vehicleType" class="types" id="serviceTeamLeaders-types" required>
                <option value="">Choose a type</option>
                <option value="H-Back">H-Back</option>
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Luxury">Luxury</option>
                <option value="Van">Van</option>
            </select>
            <br>
            <label for="Manufacturer" style="padding: 0px 80px 0px 0px;">Manufacturer</label>
            <input class="input-box" type="text2" name="manufacturer" maxlength="50" automatic placeholder="Eg:- Toyota" pattern="[^'?()/><\][\\\x22,;|]+" required>
            <br>
            <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeVehicleForm()">Cancel</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="editvehicleForm">
    <div class="forma">
        <div class="loguser-icon"></div>
        <h2 class="login-signupheader" id="editVID"></h2>

        <form action="" method="post" id="editVehicleForm">

            <label for="Model" style="padding: 0px 132px 0px 0px;">Model</label>
            <input class="input-box" type="text2" name="model" autofocus placeholder="123456" id="editModel" pattern="[^'?()/><\][\\\x22,;|]+" required>
            <br>
            <label for="Color" style="padding: 0px 139px 0px 0px;">Color</label>
            <!-- <input type="color" id="editColor" name="color" required> -->
            <select name="color" class="colorTypes" id="editColor" style="margin: 10px 0px;     width: 50%;">
                <option value="Silver">Silver</option>
                <option value="White">White</option>
                <option value="Blue">Blue</option>
                <option value="Green">Green</option>
                <option value="Beige">Beige</option>
                <option value="Yellow">Yellow</option>
                <option value="Orange">Orange</option>
                <option value="Brown">Brown</option>
                <option value="Pink">Pink</option>
                <option value="Purple">Purple</option>
                <option value="Red">Red</option>
            </select>
            <br>
            <label for="Vehicle Type" style="padding: 0px 87px 0px 0px;">Vehicle Type</label>
            <select name="type" class="types" id="editType">
                <option value="H-Back">H-Back</option>
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Luxury">Luxury</option>
                <option value="Van">Van</option>
            </select>
            <br>
            <label for="Manufacturer" style="padding: 0px 80px 0px 0px;">Manufacturer</label>
            <input class="input-box" type="text2" name="manufacturer" autofocus placeholder="XYZ" required pattern="[^'?()/><\][\\\x22,;|]+" id="editManufacturer"><br><br>
            <label for="Delete Vehicle"><a id="deleteVehicle" href="" style="font-size: small;float: right;color: red;">Delete Vehicle? Click Here</a></label>
            <br>
            <button id="EditVehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
            <button id="EditVehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeEditVehicleForm()">Cancel</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="editdetailsForm">
    <div class="forma">
        <div class="loguser-icon"></div>
        <h2 class="login-signupheader">Update your mobile</h2>
        <form action="/account/editMobile" method="post" id="customer-mob">
            <label for="fname" style="padding: 0px 40px 0px 0px;">Mobile number</label>
            <input class="input-box" type="text2" pattern="[0-9]{10}" name="mobile" autofocus placeholder="<?php echo $details[0]['Contact_Number'] ?>" required>
            <br>
            <button id="EditDetailsFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Update</button>
            <button id="EditDetailsFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeDetailsVehicleForm()">Cancel</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="deleteAccountForm">
    <div class="forma">
        <div class="loguser-icon"></div>
        <h2 class="login-signupheader">Do you want to delete your account?</h2>
        <form action="/account/deleteAccount" method="post" id="customer-mob">
            <button id="EditDetailsFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Yes</button>
            <button id="EditDetailsFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeDeleteAccount()">No</button>
        </form>

    </div>
</div>

<div class="addVehicleform" id="deleteAddressForm" style="min-width: 300px;">
    <div class="forma">
        <h2 class="login-signupheader">Delete Location?</h2>
        <form action="" method="post" id="delete-Address-Form"><br>
            <button id="EditDetailsFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Delete</button>
            <button id="EditDetailsFormCloseButton" class="formCancelButton" type="button" name="signup" onclick="closeDeleteAddress()">Cancel</button>
        </form>
    </div>
</div>

<div class="box">
    <div class="account-box1" id="mainbox">
        <div class="account-prof">
            <div class="account-header">Account Details</div>
            <div class="account-box2">
                <div class="account-image"> </div>
                <div class="account-details">
                    <div class="account-name">
                        <div class="nameIcon"></div>
                        <?php echo $details[0]['First_Name'] . " " . $details[0]['Last_Name']; ?>
                    </div>

                    <div class="account-email">
                        <div class="emailIcon"></div>
                        <?php echo $details[0]['Email'];
                        $_SESSION['rowCount']; ?>
                    </div>

                    <div class="account-email">
                        <div class="phoneIcon"></div>
                        <?php echo $details[0]['Contact_Number']; ?>
                        <div class="btn" onclick="openDetailsVehicleForm()"><i class="fas fa-pencil-alt"></i></div>
                        
                    </div>
                    <!-- existing mobile number error message -->
                    <p style="font-size: x-small; color:red;"><?php echo $_SESSION['MobileError']; $_SESSION['MobileError'] = "";?></p>
                </div>


            </div>
        </div> <br>
        <div class="account-det1" style="width: 250px;">
            <div class="account-header2"><b>My Vehicles</b>
                <div class="carIcon"></div>
            </div>
            <div class="account-box3">
                <div class="vehicle-list">
                    <select name="Vehicles" id="Customer-Vehicles" onchange="getVehicleDetails()">
                        <?php
                        $count  = 0;
                        while ($count < sizeof($_SESSION['vehicles'])) {
                            echo "<option value='";
                            echo $count + 1;
                            echo "'>";
                            echo $vehicles[$count]['VID'];
                            echo "</option>";
                            $count = $count + 1;
                        }
                        ?>
                    </select>
                </div>
                <button class="button" onclick="openVehicleForm()"> + Add </button>
            </div>

            <div class="vehicle-box">
                <div class="btn2" onclick="openEditVehicleForm()" id="editbtn"></div>
                <div id="vehicleDetails"></div>
                <?php if (count($vehicles) > 0) { ?>
                    <span style="font-size: small;text-align: center;">
                        <p style="font-size: larger;"><a style="color: red;" href="/booking/details">Proceed to booking!</a>
                        </p>
                    </span>
                <?php } ?>
            </div><br>

        </div>
        <div class="account-det2" style="    width: 250px;">
            <div class="account-header2"><b>My Locations</b>
                <div class="locationIcon"></div>
            </div>
            <div class="account-box3">
                <div class="vehicle-list">
                    <select name="Address" id="Customer-Address" onchange="myMap()">
                        <?php
                        $i = 0;
                        while ($i < sizeof($_SESSION['address'])) {
                            echo "<option value='";
                            echo $i + 1;
                            echo "'>";
                            echo $_SESSION['address'][$i]['Address'];
                            echo "</option>";
                            $i = $i + 1;
                        }
                        ?>
                    </select>
                </div>
                <button class="button" onclick="openMap()"> + Add </button>
            </div>

            <div class="map-box">
                <div class="btn3" id="editMapBtn" onclick="openDeleteAddress()" style="z-index:10;">
                </div>
                <div id="googleMap" style="border:0; border-radius: 27px; width:100%;height:100%; ">
                </div>
            </div><br>
            <p style="float:right; font-size:smaller; color:red; cursor:pointer;" onclick="openDeleteAccount();">Delete Account</p>
        </div>
    </div>
</div>
<script src="/public/js/CustomerAccount.js"></script>
<script>
    var pausecontent = <?php echo json_encode($vehicles); ?>;

    function getVehicleDetails() {
        var x = document.getElementById("Customer-Vehicles").value;
        //set vehicle details on the vehicle box
        document.getElementById("vehicleModel").innerHTML = pausecontent[x - 1]['Model'];
        document.getElementById("vehicleColor").innerHTML = pausecontent[x - 1]['Colour'];
        document.getElementById("vehicleT").innerHTML = pausecontent[x - 1]['Type'];
        document.getElementById("vehicleManufacturer").innerHTML = pausecontent[x - 1]['Manufacturer'];

        //set vehicle details on the edit form
        var vid = pausecontent[x - 1]['VID'];
        vid = vid.replace(/ /g, "_");
        document.getElementById("editVehicleForm").action = "/account/editVehicle/" + vid;
        document.getElementById("deleteVehicle").href = "/account/deleteVehicle/" + vid;
        document.getElementById("editVID").innerHTML = "Edit Vehicle - " + pausecontent[x - 1]['VID'];
        document.getElementById("editModel").placeholder = pausecontent[x - 1]['Model'];
        document.getElementById("editColor").value = pausecontent[x - 1]['Colour'];
        document.getElementById("editType").value = pausecontent[x - 1]['Type'];
        document.getElementById("editManufacturer").placeholder = pausecontent[x - 1]['Manufacturer'];
    }


    var addresses = <?php echo json_encode($_SESSION['address']); ?>;

    function myMap() {
        // var lat = 7.2905715;
        // var lng = 80.6337262;
        if (addresses.length > 0) {
            var x = document.getElementById("Customer-Address").value;
            lat = addresses[x - 1]['Latitude'];
            lng = addresses[x - 1]['Longitude'];

            var mapProp = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 10,
            };

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            marker = new google.maps.Marker({
                map,
            });
            latlng = new google.maps.LatLng(lat, lng);
            marker.setPosition(latlng);
            document.getElementById("editMapBtn").innerHTML = "<a><i class='fas fa-pencil-alt'</i></a>";
        } else {
            document.getElementById("googleMap").style =
                "background-color: whitesmoke; margin-top: 5px; text-align:center; width: 100% ; height: 100% ; border-radius:27px;  line-height: 230px;";
            document.getElementById("googleMap").innerHTML = "Add your locations here";

        }
        // marker.setMap(map);
    }
</script>
<!-- <script src="/public/js/Maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvVN9pPMljGjWLvUGWGisQwGUUMSOHco&callback=myMap&v=weekly">
</script>
<script async>
    initMap();
</script> -->

<script>
    //if there are vehicles display details. Else display message to add vehicles.
    function checkVehicleBox() {
        if (pausecontent.length == 0) {
            var myDiv = document.getElementById("vehicleDetails");
            myDiv.outerHTML =
                "<div id = 'vehicleDetails' style = 'text-align:center; margin-top:5px; line-height: 175px;'> Add your vehicles here </div>";
        } else {
            document.getElementById("editbtn").innerHTML = "<a><i class='fas fa-pencil-alt'</i></a>";
            display();
            getVehicleDetails();
        }
    }

    checkVehicleBox();
</script>
