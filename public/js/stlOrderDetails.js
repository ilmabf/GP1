

        function myMap() {
            var lat = orderDetails[0]['Latitude'];
            var lng = orderDetails[0]['Longitude'];

            var mapProp = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 15,
            };

            var map2 = new google.maps.Map(document.getElementById("map"), mapProp);
            marker = new google.maps.Marker({
                map2,
            });
            latlng = new google.maps.LatLng(lat, lng);
            marker.setPosition(latlng);
            marker.setMap(map2);

        }

function openMap2() {
    var x = document.getElementById("googleMapbox");
    var z = document.getElementById("mapControl");
    var y = document.getElementById("mainbox");
    if (x.style.display === "none") {
        x.style.display = "block";
        z.style.display = "block";
        y.classList.add("blur");
    } else {
        x.style.display = "none";
    }
}

function closeMap2() {
    var x = document.getElementById("googleMapbox");
    var z = document.getElementById("mapControl");
    var y = document.getElementById("mainbox");
    if (x.style.display === "block") {
        x.style.display = "none";
        z.style.display = "none";
        y.classList.remove("blur");
    } else {
        x.style.display = "block";
    }
}