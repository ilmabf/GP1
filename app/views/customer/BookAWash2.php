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
    <!-- <div class="select-location-box">
        <form action="" method="post">
            <select name="location" id="location-types" onchange="myMap()">
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
        </form>
    </div> -->
</div>

<div id="msg"></div>
<div class="google-location" style="text-align:center;">
    <div id="googleMap" style="border:0; border-radius: 27px; left:25%; width:50%; height:300px;"></div>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8229579296126!2d80.50619191725059!3d7.373730722101816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae341aee58e2aad%3A0xc15b721347b882fb!2sMalwathugoda%20Auto%20Service%20Station!5e0!3m2!1sen!2slk!4v1629713877312!5m2!1sen!2slk" width="70%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
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
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvVN9pPMljGjWLvUGWGisQwGUUMSOHco&callback=myMap&v=weekly"> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFq7IClah9EyedO6MTv12hIzbW_Iq-Aq8&callback=myMap&v=weekly">
</script>
<script async>
    initMap();
</script>