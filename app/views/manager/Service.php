<?php

include 'views/user/LoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Service Details</h2>
</div>

<div style="display: flex;">
    <div class="wash-type" style="flex: 1;">
        <h3 style="    text-align: center;">Wash Types</h3>
        <form action="" method="post" style="text-align:center;">
            <div class="select-wash-type" style="    display: grid;">
                <?php
                $i = 0;
                while ($i < sizeof($_SESSION['washpackages'])) {
                    echo "<div class='vehicle-select-radio' style = 'text-align: left;'>";
                    echo "<input type='radio' name='washType' id='";
                    echo "washPackage" . $i;
                    echo "' class='washType1' value='";
                    echo $_SESSION['washpackages'][$i]['Name'];
                    echo "' onclick = 'displayPrice();'> ";
                    echo "<label for='washType'>";
                    echo " " . $_SESSION['washpackages'][$i]['Name'];
                    echo "</label>";
                    echo "</div>";
                    $i = $i + 1;
                }
                ?>
            </div>
        </form>
    </div>


    <div class="vehicle-type" style="flex: 1;">
        <h3 style="    text-align: center;">Vehicle Types</h3>

        <form action="" method="post" style="    display: grid;text-align: left;">
            <?php
            $i = 0;
            while ($i < sizeof($_SESSION['vehicleTypes'])) {
                echo "<div class='vehicle-select-radio' style = 'text-align: left;'>";
                echo "<input type='radio' name='vehicleType' id='";
                echo "VehicleTypes" . $i;
                echo "' class='washType1' value='";
                echo $_SESSION['vehicleTypes'][$i]['Vehicle_Type'];
                echo "' onclick = 'displayPrice();'> ";
                echo "<label for='vehicleType'>";
                echo " " . $_SESSION['vehicleTypes'][$i]['Vehicle_Type'];
                echo "</label>";
                echo "</div>";
                $i = $i + 1;
            }
            ?>

        </form>
    </div>
</div>


<div class="price">
    <h3 style="    text-align: center;">Wash Price</h3>
    <div class="price-display" id="washPackage-vehicleType-Price"></div>
</div>

<script>
    var pausecontent = <?php echo json_encode($_SESSION['washpackages']); ?>;
    var vehicles = <?php echo json_encode($_SESSION['vehicleTypes']); ?>;
    var servicePrices = <?php echo json_encode($_SESSION['servicePrice']); ?>;
</script>
<script src="/public/js/ManagerServiceDetails.js"></script>