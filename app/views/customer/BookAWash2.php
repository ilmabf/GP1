<?php

include 'views/user/LoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading-location">
    <h2>Select Your Location</h2>
</div>

<div class="select-location">

    <div class="select-location-box">
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
    </div>
</div>
<div id="test"></div>
<div class="google-location" style="text-align:center;">
    <div id="googleMap" style="border:0; border-radius: 27px; left:25%; width:50%; height:300px;"></div>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8229579296126!2d80.50619191725059!3d7.373730722101816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae341aee58e2aad%3A0xc15b721347b882fb!2sMalwathugoda%20Auto%20Service%20Station!5e0!3m2!1sen!2slk!4v1629713877312!5m2!1sen!2slk" width="70%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
</div>

<div class="next-pg" style="margin-right: 15%;">
    <span class="priceBox2">Rs 1000</span>
    <button class="next-button"><a href="/booking/orderSummary" style="color: white; ">Next</a></button>
</div>
<div style="min-height: 20px;"></div>
<script>
    let x = document.cookie
    document.getElementById("test").innerHTML = x;

    var addresses = <?php echo json_encode($_SESSION['address']); ?>;

    function myMap() {
        var lat = 7.2905715;
        var lng = 80.6337262;
        if (addresses.length > 0) {
            var x = document.getElementById("location-types").value;
            lat = addresses[x - 1]['Latitude'];
            lng = addresses[x - 1]['Longitude'];
        }
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
        // marker.setMap(map);
        var addr = document.getElementById("location-types").value;
        document.cookie = "address = " + addresses[addr-1]['Address'] + ";  path=/";
    }
</script>
<script src="/public/js/Maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvVN9pPMljGjWLvUGWGisQwGUUMSOHco&callback=myMap&v=weekly"></script>
<script async>
    initMap();


</script>