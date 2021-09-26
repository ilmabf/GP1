<?php 
  
    include 'userLoggedInHeader.php';
    $details = $_SESSION['userDetails'];
?>

<main>
    <div id = "container">
    <div class="account-box1">
            <div class="account-header">My Account</div>
            <div class="account-box2">
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
            </div>

</div>
</div>

</main>

<?php 
    include 'userFooter.php';
?>



</html>
