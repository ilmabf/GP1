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
<div id="test"></div>
<div id="msg"></div>
<div class="google-location" style="text-align:center;">
    <div id="googleMap" style="border:0; border-radius: 27px; left:25%; width:50%; height:300px;"></div>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8229579296126!2d80.50619191725059!3d7.373730722101816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae341aee58e2aad%3A0xc15b721347b882fb!2sMalwathugoda%20Auto%20Service%20Station!5e0!3m2!1sen!2slk!4v1629713877312!5m2!1sen!2slk" width="70%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
</div>

<div class="next-pg" style="margin-right: 15%;">
    <span class="priceBox2" id="priceValue"></span>
    <button class="next-button" onclick = "checkLocation();">Next</button>
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
        var i = 0;
        document.cookie = "address = " + addresses[addr - 1]['Address'] + ";  path=/";
        document.cookie = "latitude = " + addresses[addr - 1]['Latitude'] + ";  path=/";
        document.cookie = "longitude = " + addresses[addr - 1]['Longitude'] + ";  path=/";

        calcRoute(addr);


    }

    function calcRoute(addr) {
        const serviceCentre = {
            lat: 7.3732731971156165,
            lng: 80.50720042798572
        };
        const custAddress = {
            lat: parseFloat(addresses[addr - 1]['Latitude']),
            lng: parseFloat(addresses[addr - 1]['Longitude'])
        };

        let directionsService = new google.maps.DirectionsService();
        let directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map); // Existing map object displays directions

        // Create route from existing points used for markers

        const route = {
            origin: serviceCentre,
            destination: custAddress,
            travelMode: 'DRIVING'
        }

        directionsService.route(route,
            function(response, status) { // anonymous function to capture directions
                if (status !== 'OK') {
                    window.alert('Directions request failed due to ' + status);
                    return;
                } else {
                    directionsRenderer.setDirections(response); // Add route to the map
                    var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
                    if (!directionsData) {
                        window.alert('Directions request failed');
                        return;
                    } else {
                        var km = directionsData.distance.text;
                        var dur = directionsData.duration.text;
                        var kmInt = parseInt(km);
                        var additional = 0;
                        if (kmInt < 1) {
                            additional = 50;
                        } else {
                            additional = (kmInt + 1) * 50;
                        }

                        var cookieArray = document.cookie.split(";");
                        var i = 0;
                        var price;
                        for (i = 0; i < cookieArray.length; i++) {
                            cookieArray[i] = cookieArray[i].trim();
                            if (cookieArray[i].substring(0, 5) === "price") {
                                price = cookieArray[i];
                            }
                        }
                        let p = price.substring(6);

                        var totalPrice = parseInt(p) + additional;
                        document.cookie = "total = " + totalPrice + ";  path=/";
                        console.log(directionsData.distance.text);
                        document.getElementById('msg').innerHTML += " Driving distance is " + kmInt + " (" + directionsData.duration.text + ").";
                    }
                }
            });
    }
</script>
<script src="/public/js/Maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxvVN9pPMljGjWLvUGWGisQwGUUMSOHco&callback=myMap&v=weekly"></script>
<script async>
    initMap();
</script>
<script>
    var cookieArray = document.cookie.split(";");
    var i = 0;
    var price;
    for (i = 0; i < cookieArray.length; i++) {
        cookieArray[i] = cookieArray[i].trim();
        if (cookieArray[i].substring(0, 5) === "price") {
            price = cookieArray[i];
        }
    }
    let p = price.substring(6);
    document.getElementById("priceValue").innerHTML = "Rs. " + p;

    function checkLocation(){
        if(addresses.length > 0){
            window.location = "/booking/orderSummary";
        }
    }
</script>