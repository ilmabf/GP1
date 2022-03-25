<?php

include 'views/user/LoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-location">
    <h2>Select Your Location</h2>
</div>

<div class="select-location">

    <?php
    if (sizeof($_SESSION['address']) == 0) {
        echo "Please add your location/s in your account page.";
        echo "<br>";
        echo "<a style = 'font-size:initial; color:#085394;' href = '/account/'>Go to My Account</a>";
    } else {
        echo "<div class='select-location-box'>";
        echo "<form action='' method='post'>";
        echo "<select name='location' id='location-types' onchange='myMap()'>";
        $i = 0;
        while ($i < sizeof($_SESSION['address'])) {
            echo "<option value='";
            echo $i + 1;
            echo "'>";
            echo $_SESSION['address'][$i]['Address'];
            echo "</option>";
            $i = $i + 1;
        }
        echo "</select>";
        echo "</form>";
        echo "</div>";
    }
    ?>
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
</div>

<div id="msg"></div>
<div class="google-location" style="text-align:center;">
    <div id="googleMap" style="border:0; border-radius: 27px; left:15%; width:70%; height:300px;"></div>
</div>

<div class="next-pg" style="margin-right: 15%;">
    <span class="priceBox2" id="priceValue"></span>
    <button class="next-button" onclick="checkLocation();">Next</button>
</div>
<div style="min-height: 20px;"></div>
<script>
    var addresses = <?php echo json_encode($_SESSION['address']); ?>;
</script>
<script src="/public/js/Maps.js"></script>
<script src="/public/js/CustomerBookAWash2.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFq7IClah9EyedO6MTv12hIzbW_Iq-Aq8&callback=myMap&v=weekly">
</script>
<script async>
    initMap();
</script>