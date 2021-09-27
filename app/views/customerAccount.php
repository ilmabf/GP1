<?php 
  
    include 'userLoggedInHeader.php';
    $details = $_SESSION['userDetails'];
?>

<main>
    <div id = "container">
    <div class="account-box1">
            <div class="account-header">My Account</div>
            <div class="account-box2">
            <button class="btn">Edit</button>
                <div class = "account-image">    </div>   
                <div class = "account-details" >
                    <div class = "account-name">
                        <?php echo $details[0]['First_Name']. " " .$details[0]['Last_Name'];?></div>
            
                    <div class = "account-email">
                        <?php echo $details[0]['Email']; ?></div>

                    <div class = "account-email">
                        <?php echo $details[0]['Contact_Number']; ?></div>

                </div>
            
                
            </div><br>
            <div class="account-header2">My Vehicles</div>
            <div class="account-box3">
                <div class = "vehicle-list">
                    <select name="Vehicles" id="Customer-Vehicles">
                        <option value="select service team">ABC 123</option>
                        <option value="Team A">QRZ 000</option>
                        <option value="Team B">JQ 942</option>
                    </select>
                </div>
                <button class = "button"> + Add </button>
            </div>

            <div class="vehicle-box">
            <button class="btn2" onclick="openVehicleForm()">Edit</button>
                <div class = "item1">
                    <div class = "vehicle">Model</div>
                    <div class = "vehicle-specs">
                        <?php echo "123456"; ?>
                    </div>
                </div>
                <div class = "item1">
                <div class = "vehicle">Color</div>
                <div class = "vehicle-specs">
                    <?php echo "Blue"; ?>
                </div>
                </div>
                <div class = "item1">
                <div class = "vehicle">Type</div>
                <div class = "vehicle-specs">
                    <?php echo "Car"; ?>
                </div>
                </div>
            </div><br>
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

</main>
<div style = "min-height: 400px"></div>
<?php 
    include 'userFooter.php';
?>



</html>
