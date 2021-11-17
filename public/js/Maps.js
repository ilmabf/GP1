
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}



function searchLocation() {
    var addr = document.getElementById('address');
    addr = addr.replace(/ /g, "+");
    addr = addr + ", Sri Lanka";
}

function saveLocation() {
    var address = customerAddress;
    if (document.getElementById('typedAddress').value != "") {
        address = document.getElementById('typedAddress').value;
        address = address.replace(/ /g, "_");
        address = address.replace(/\//g, "|");
    }
    Lattitude = latlng[0]['geometry']['location'].lat();
    Longitude = latlng[0]['geometry']['location'].lng();
    console.log(Lattitude);
    console.log(Longitude);
    console.log(address);
    window.location = "/account/saveAddress/" + address + "/" + Lattitude + "/" + Longitude;
}

let map;
let marker;
let geocoder;
let responseDiv;
let response;
var customerAddress = "";
var Lattitude;
var Longitude;
var latlng;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: {
            lat: 7.2905715,
            lng: 80.6337262
        },
        mapTypeControl: false,
    });
    geocoder = new google.maps.Geocoder();

    const inputText = document.createElement("input");

    inputText.id = "typedAddress";
    inputText.type = "text";
    inputText.placeholder = "Enter a location";

    const submitButton = document.createElement("input");

    submitButton.type = "button";
    submitButton.value = "Search";
    submitButton.classList.add("button", "button-primary");

    const clearButton = document.createElement("input");

    clearButton.type = "button";
    clearButton.value = "Clear";
    clearButton.classList.add("button", "button-secondary");
    response = document.createElement("pre");
    response.id = "response";
    response.innerText = "";
    responseDiv = document.createElement("div");
    responseDiv.id = "response-container";
    responseDiv.appendChild(response);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
    // map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
    marker = new google.maps.Marker({
        map,
    });
    map.addListener("click", (e) => {
        geocode({
            location: e.latLng
        });
    });
    submitButton.addEventListener("click", () =>
        geocode({
            address: inputText.value
        })
    );
    clearButton.addEventListener("click", () => {
        clear();
    });
    clear();
}

function clear() {
    marker.setMap(null);
    responseDiv.style.display = "none";
}

function geocode(request) {
    clear();
    geocoder
        .geocode(request)
        .then((result) => {
            const {
                results
            } = result;

            map.setCenter(results[0].geometry.location);
            marker.setPosition(results[0].geometry.location);
            marker.setMap(map);
            responseDiv.style.display = "block";
            response.innerText = JSON.stringify(result, null, 2);
            console.log(results);
            for (var i = 1; i < results[0]['address_components'].length; i++) {
                customerAddress += results[0]['address_components'][i]['long_name'];
                if (i != results[0]['address_components'].length - 1) {
                    customerAddress += ",";
                }
            }
            customerAddress = customerAddress.replace(/ /g, "_");
            console.log(customerAddress);
            console.log(results[0]['geometry']['location']['lat'].value);
            latlng = results;
            return results;
        })
        .catch((e) => {
            alert("Geocode was not successful for the following reason: " + e);
        });
}

