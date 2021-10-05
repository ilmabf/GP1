
<?php 
  
    include 'userLoggedInHeader.php';
    $details = $_SESSION['userDetails'];
    
?>
<div class="bgImage" style="min-height: 100%;">


<main>

<div class="bgImage" style = "min-height:100%;">
<div class="addVehicleform" id = "vehicleForm">
                <div class="forma">
                    <div class="loguser-icon"></div>
                    <h2 class="login-signupheader">Add a vehicle</h2>

                    <form action="/account/addVehicle" method="post" id="customer-signup">
                        <label for="fname">Vehicle Identification No.</label>
                        <input class="input-box" id="vin" type="text2" name="vin" required>
                        <br>
                        <label for="Model" style = "padding: 0px 132px 0px 0px;">Model</label>
                        <input class="input-box" type="text2" name="model"required>
                        <br>
                        <label for="Color" style = "padding: 0px 139px 0px 0px;">Color</label>
                        <input type = "color" required>
                        <br>
                        <label for="Vehicle Type" style = "padding: 0px 87px 0px 0px;">Vehicle Type</label>
                        <select name="serviceTeamLeader" class="Mg-Emp-Search" id="serviceTeamLeaders-types" style = "width:50%; margin-bottom: 5px;">
                            <option value="select service team leader"> </option>
                            <option value="Type A">Sedan</option>
                            <option value="Type B">SUV</option>
                            <option value="Type C">Luxury</option>
                            <option value="Type D">Van</option>
                        </select>
                        <br>
                        <label for="Manufacturer" style = "padding: 0px 80px 0px 0px;">Manufacturer</label>
                        <input class="input-box" type="text2" name="manufacturer" required>
                        <br>
                        <button id="VehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
                        <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeVehicleForm()">Cancel</button>
                    </form>

                </div>
            </div>

            <div class="addVehicleform" id = "editvehicleForm">
                <div class="forma">
                    <div class="loguser-icon"></div>
                    <h2 class="login-signupheader">Edit Vehicle - ABC 123</h2>

                    <form action="/account/editVehicle" method="post" id="customer-signup">
                    
                        <label for="Model" style = "padding: 0px 132px 0px 0px;">Model</label>
                        <input class="input-box" type="text2" name="model" autofocus placeholder="123456" required>
                        <br>
                        <label for="Color" style = "padding: 0px 139px 0px 0px;">Color</label>
                        <input type = "color" required>
                        <br>
                        <label for="Vehicle Type" style = "padding: 0px 87px 0px 0px;">Vehicle Type</label>
                        <select name="serviceTeamLeader" class="Mg-Emp-Search" id="serviceTeamLeaders-types" style = "width:50%; margin-bottom: 5px;">
                            <option value="select service team leader">SUV</option>
                            <option value="Type A">Sedan</option>
                            <option value="Type C">Luxury</option>
                            <option value="Type D">Van</option>
                        </select>
                        <br>
                        <label for="Manufacturer" style = "padding: 0px 80px 0px 0px;">Manufacturer</label>
                        <input class="input-box" type="text2" name="manufacturer" autofocus placeholder="XYZ" required>
                        <br>
                        <button id="EditVehicleFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
                        <button id="EditVehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeEditVehicleForm()">Cancel</button>
                    </form>

                </div>
            </div>

            <div class="addVehicleform" id = "editdetailsForm">
                <div class="forma">
                    <div class="loguser-icon"></div>
                    <h2 class="login-signupheader">Edit details</h2>

                    <form action="/account/editDetails" method="post" id="customer-signup">
                        <label for="fname" style = "padding: 0px 73px 0px 0px;">First Name</label>
                        <input class="input-box" id="fn" type="text2" name="fn" autofocus placeholder="<?php echo $details[0]['First_Name']?>" required>
                        <br>
                        <label for="fname" style = "padding: 0px 73px 0px 0px;">Last Name</label>
                        <input class="input-box" type="text2" name="ln" autofocus placeholder="<?php echo $details[0]['Last_Name']?>" required>
                        <br>
                        <label for="fname" style = "padding: 0px 111px 0px 0px;">Email</label>
                        <input class="input-box" type="text2" name="email" autofocus placeholder="<?php echo $details[0]['Email']?>" required>
                        <br>
                        <label for="fname" style = "padding: 0px 40px 0px 0px;">Mobile Number</label>
                        <input class="input-box" type="text2" name="mobile" autofocus placeholder="<?php echo $details[0]['Contact_Number']?>" required>
                        <br>
                        <button id="EditDetailsFormSubmitButton" class="formSubmitButton" type="submit" name="signup">Submit</button>
                        <button id="EditDetailsFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closeDetailsVehicleForm()">Cancel</button>
                    </form>

                </div>
            </div>
    <div id = "box"class = "box">
    <div class="account-box1">
        <div class = "account-prof">
            <div class="account-header">My Account</div>
            <div class="account-box2">
            <button class="btn" onclick="openDetailsVehicleForm()">Edit</button>
                <div class = "account-image">    </div>   
                <div class = "account-details" >
                    <div class = "account-name">
                        <?php echo $details[0]['First_Name']. " " .$details[0]['Last_Name'];?></div>
            
                    <div class = "account-email">
                        <?php echo $details[0]['Email']; ?></div>

                    <div class = "account-email">
                        <?php echo $details[0]['Contact_Number']; ?></div>

                </div>
      
                
            </div>    </div> <br>
        <div class = "account-det1">
            <div class="account-header2">My Vehicles</div>
            <div class="account-box3">
                <div class = "vehicle-list">
                    <select name="Vehicles" id="Customer-Vehicles">
                        <option value="select service team">ABC 123</option>
                        <option value="Team A">QRZ 000</option>
                        <option value="Team B">JQ 942</option>
                    </select>
                </div>
                <button class = "button" onclick="openVehicleForm()"> + Add </button>
            </div>

            <div class="vehicle-box">
                <button class="btn2" onclick="openEditVehicleForm()">Edit</button>
                <div class = "item1">
                    <div class = "vehicle">Model</div>
                    <div class = "vehicle-specs">
                        <?php echo "123456"; ?>
                    </div>
                </div>
                <div class = "item1">
                    <div class = "vehicle">Color</div>
                    <div class = "vehicle-specs">
                        <div class="color-box" style="background-color:#8a0b0b;"></div>
                    </div>
                </div>
                <div class = "item1">
                    <div class = "vehicle">Type</div>
                    <div class = "vehicle-specs">
                        <?php echo "SUV"; ?>
                    </div>
                </div>
                <div class = "item1">
                    <div class = "vehicle">Manufacturer</div>
                    <div class = "vehicle-specs">
                        <?php echo "XYZ"; ?>
                    </div>
                </div>
            </div><br>
            </div>
            <div class = "account-det2">
            <div class="account-header2">My Locations</div>
            <div class="account-box3">
                <div class = "vehicle-list">
                    <select name="Vehicles" id="Customer-Vehicles">
                        <option value="select service team">No 5, 1st Road, City 05</option>
                        <option value="Team A">No 12/A, 2nd Lane, City 01</option>
                    </select>
                </div>
                <button class = "button"> + Add </button>
            </div>

            <div class="map-box">
            <button class="btn3">Edit</button>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8229579296126!2d80.50619191725059!3d7.373730722101816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae341aee58e2aad%3A0xc15b721347b882fb!2sMalwathugoda%20Auto%20Service%20Station!5e0!3m2!1sen!2slk!4v1629713877312!5m2!1sen!2slk"  width = "100%" height = "100%"style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div><br>
            </div>
                
</div>
<!-- <div style="min-height: 100px;"></div> -->
</div>
</main>
</body>

<div style="min-height: 110px;"></div> 



    <!-- include 'userFooter.php'; -->

    <?php 
  
  include 'userFooter.php';
  
  
?>

<script src="/public/js/customerAccount.js"></script> 

