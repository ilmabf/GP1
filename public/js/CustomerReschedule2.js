let x = document.cookie;

function myMap() {
  var lat = 7.2905715;
  var lng = 80.6337262;
  if (addresses.length > 0) {
    var x = document.getElementById("location-types").value;
    lat = addresses[x - 1]["Latitude"];
    lng = addresses[x - 1]["Longitude"];
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
  document.cookie = "address = " + addresses[addr - 1]["Address"] + ";path=/";
  document.cookie = "latitude = " + addresses[addr - 1]["Latitude"] + ";path=/";
  document.cookie =
    "longitude = " + addresses[addr - 1]["Longitude"] + ";path=/";

  calcRoute(addr);
}

function calcRoute(addr) {
  const serviceCentre = {
    lat: 7.3732731971156165,
    lng: 80.50720042798572,
  };
  const custAddress = {
    lat: parseFloat(addresses[addr - 1]["Latitude"]),
    lng: parseFloat(addresses[addr - 1]["Longitude"]),
  };

  let directionsService = new google.maps.DirectionsService();
  let directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map); // Existing map object displays directions

  // Create route from existing points used for markers

  const route = {
    origin: serviceCentre,
    destination: custAddress,
    travelMode: "DRIVING",
  };

  directionsService.route(route, function (response, status) {
    // anonymous function to capture directions
    if (status !== "OK") {
      window.alert("Directions request failed due to " + status);
      return;
    } else {
      directionsRenderer.setDirections(response); // Add route to the map
      var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
      if (!directionsData) {
        window.alert("Directions request failed");
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
        document.cookie = "total = " + totalPrice + ";path=/";
        console.log(directionsData.distance.text);
        
      }
    }
  });
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
document.getElementById("priceValue").innerHTML = "Rs. " + p;

function checkRescheduleLocation(rescheduleID) {
  if (addresses.length > 0) {
    window.location = "/booking/orderRescheduleSummary/" + rescheduleID + "/";
  }
}
