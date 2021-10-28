<div class="bgImage1">
    <?php

    include 'views/user/LoggedInHeader.php';
    $details = $_SESSION['userDetails'];
    $vehicles = $_SESSION['vehicles'];
    ?>

    <div style="min-height: 110px;"></div>


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
                <input type="color" name="color" required>
                <br>
                <label for="Vehicle Type" style="padding: 0px 87px 0px 0px;">Vehicle Type</label>
                <select name="vehicleType" class="types" id="serviceTeamLeaders-types" required>
                    <option value="">Choose a type</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="Luxury">Luxury</option>
                    <option value="Van">Van</option>
                    <option value="H-Black">H-Black</option>
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
            <h2 class="login-signupheader" id = "editVID"></h2>

            <form action="" method="post" id="editVehicleForm">

                <label for="Model" style="padding: 0px 132px 0px 0px;">Model</label>
                <input class="input-box" type="text2" name="model" autofocus placeholder="123456" id="editModel" pattern="[^'?()/><\][\\\x22,;|]+" required>
                <br>
                <label for="Color" style="padding: 0px 139px 0px 0px;">Color</label>
                <input type="color" id="editColor" name = "color" required>
                <br>
                <label for="Vehicle Type" style="padding: 0px 87px 0px 0px;">Vehicle Type</label>
                <select name="type" class="types" id="editType">
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="Luxury">Luxury</option>
                    <option value="Van">Van</option>
                    <option value="H-Black">H-Back</option>
                </select>
                <br>
                <label for="Manufacturer" style="padding: 0px 80px 0px 0px;">Manufacturer</label>
                <input class="input-box" type="text2" name="manufacturer" autofocus placeholder="XYZ" required pattern="[^'?()/><\][\\\x22,;|]+" id="editManufacturer"><br><br>
                <label for="Delete Vehicle"><a id = "deleteVehicle" href="" style="font-size: small;float: right;color: red;" >Delete Vehicle? Click Here</a></label>
                <br>
                <button id="EditVehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
                <button id="EditVehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeEditVehicleForm()">Cancel</button>
            </form>

        </div>
    </div>

    <div class="addVehicleform" id="editdetailsForm">
        <div class="forma">
            <div class="loguser-icon"></div>
            <h2 class="login-signupheader">Edit</h2>

            <form action="/account/editDetails" method="post" id="customer-signup">
                <label for="fname" style="padding: 0px 40px 0px 0px;">Mobile number</label>
                <input class="input-box" type="text2" name="mobile" autofocus placeholder="<?php echo $details[0]['Contact_Number'] ?>" required>
                <br>
                <button id="EditDetailsFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Save</button>
                <button id="EditDetailsFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeDetailsVehicleForm()">Cancel</button>
            </form>

        </div>
    </div>

    <div class="box">
        <div class="account-box1" id="mainbox">
            <div class="account-prof">
                <div class="account-header">Account Details</div>
                <div class="account-box2">
                    <div class="btn" onclick="openDetailsVehicleForm()"><i class="fas fa-pencil-alt"></i></div>
                    <div class="account-image"> </div>
                    <div class="account-details">
                        <div class="account-name"><div class="nameIcon"></div>
                            <?php echo $details[0]['First_Name'] . " " . $details[0]['Last_Name']; ?></div>

                        <div class="account-email"><div class="emailIcon"></div>
                            <?php echo $details[0]['Email'];
                            $_SESSION['rowCount']; ?></div>

                        <div class="account-email"><div class="phoneIcon"></div>
                            <?php echo $details[0]['Contact_Number']; ?></div>

                    </div>


                </div>
            </div> <br>
            <div class="account-det1">
                <div class="account-header2"><b>My Vehicles</b><div class="carIcon"></div></div>
                <div class="account-box3">
                    <div class="vehicle-list">
                        <select name="Vehicles" id="Customer-Vehicles" onchange="getVehicleDetails()">
                            <?php
                            $count  = 0;
                            while ($count < $_SESSION['rowCount']) {
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
                    <div class="btn2" onclick="openEditVehicleForm()" id="editbtn"><i class="fas fa-pencil-alt"></i></div>
                    <div id="vehicleDetails"></div>
                </div><br>
            </div>
            <div class="account-det2">
                <div class="account-header2"><b>My Locations</b><div class="locationIcon"></div></div>
                <div class="account-box3">
                    <div class="vehicle-list">
                        <select name="Vehicles" id="Customer-Vehicles">
                            <option value="select service team">No 5, 1st Road, City 05</option>
                            <option value="Team A">No 12/A, 2nd Lane, City 01</option>
                        </select>
                    </div>
                    <button class="button"> + Add </button>
                </div>

                <div class="map-box">
                    <div class="btn3"><i class="fas fa-pencil-alt"></i></div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8229579296126!2d80.50619191725059!3d7.373730722101816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae341aee58e2aad%3A0xc15b721347b882fb!2sMalwathugoda%20Auto%20Service%20Station!5e0!3m2!1sen!2slk!4v1629713877312!5m2!1sen!2slk" width="100%" height="100%" style="border:0; border-radius: 27px;" allowfullscreen="" loading="lazy"></iframe>
                </div><br>
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
            document.getElementById("vehicleColor").style.backgroundColor = pausecontent[x - 1]['Colour'];
            document.getElementById("vehicleT").innerHTML = pausecontent[x - 1]['Type'];
            document.getElementById("vehicleManufacturer").innerHTML = pausecontent[x - 1]['Manufacturer'];

            //set vehicle details on the edit form
            var vid = pausecontent[x - 1]['VID'];
            vid = vid.replace(/ /g, "_");
            console.log(vid);
            document.getElementById("editVehicleForm").action = "/account/editVehicle/"+vid;
            document.getElementById("deleteVehicle").href = "/account/deleteVehicle/"+vid;
            document.getElementById("editVID").innerHTML = "Edit Vehicle - " + pausecontent[x - 1]['VID'];
            document.getElementById("editModel").placeholder = pausecontent[x - 1]['Model'];
            document.getElementById("editColor").value = pausecontent[x - 1]['Colour'];
            document.getElementById("editType").value = pausecontent[x - 1]['Type'];
            document.getElementById("editManufacturer").placeholder = pausecontent[x - 1]['Manufacturer'];
        }
        getVehicleDetails();
    </script>