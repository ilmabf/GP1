function getVehicleDetails() {
  var x = document.getElementById("Customer-Vehicles").value;
  //set vehicle details on the vehicle box
  document.getElementById("vehicleModel").innerHTML = pausecontent[x - 1]['Model'];
  document.getElementById("vehicleColor").innerHTML = pausecontent[x - 1]['Colour'];
  document.getElementById("vehicleT").innerHTML = pausecontent[x - 1]['Type'];
  document.getElementById("vehicleManufacturer").innerHTML = pausecontent[x - 1]['Manufacturer'];

  //set vehicle details on the edit form
  var vid = pausecontent[x - 1]['VID'];
  vid = vid.replace(/ /g, "_");
  document.getElementById("editVehicleForm").action = "/account/editVehicle/" + vid;
  document.getElementById("deleteVehicle").href = "/account/deleteVehicle/" + vid;
  document.getElementById("editVID").innerHTML = "Edit Vehicle - " + pausecontent[x - 1]['VID'];
  document.getElementById("editModel").placeholder = pausecontent[x - 1]['Model'];
  document.getElementById("editColor").value = pausecontent[x - 1]['Colour'];
  document.getElementById("editType").value = pausecontent[x - 1]['Type'];
  document.getElementById("editManufacturer").placeholder = pausecontent[x - 1]['Manufacturer'];
}

//if there are vehicles display details. Else display message to add vehicles.
function checkVehicleBox() {
  if (pausecontent.length == 0) {
      var myDiv = document.getElementById("vehicleDetails");
      myDiv.outerHTML =
          "<div id = 'vehicleDetails' style = 'text-align:center; margin-top:5px; line-height: 175px;'> Add your vehicles here </div>";
  } else {
      document.getElementById("editbtn").innerHTML = "<a><i class='fas fa-pencil-alt'</i></a>";
      display();
      getVehicleDetails();
  }
}

checkVehicleBox();
function myMap() {
  // var lat = 7.2905715;
  // var lng = 80.6337262;
  if (addresses.length > 0) {
      var x = document.getElementById("Customer-Address").value;
      lat = addresses[x - 1]['Latitude'];
      lng = addresses[x - 1]['Longitude'];

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
      document.getElementById("editMapBtn").innerHTML = "<a><i class='fas fa-pencil-alt'</i></a>";
  } else {
      document.getElementById("googleMap").style =
          "background-color: whitesmoke; margin-top: 5px; text-align:center; width: 100% ; height: 100% ; border-radius:27px;  line-height: 230px;";
      document.getElementById("googleMap").innerHTML = "Add your locations here";

  }
  // marker.setMap(map);
}

function openVehicleForm() {
  var x = document.getElementById("vehicleForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";
  }
}

function closeVehicleForm() {
  var x = document.getElementById("vehicleForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blurAccount");
  } else {
    x.style.display = "block";

  }
}

function openEditVehicleForm() {

  var x = document.getElementById("editvehicleForm");
  var y = document.getElementById("mainbox");
  var val = document.getElementById("Customer-Vehicles");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";

  }

}

function closeEditVehicleForm() {
  var x = document.getElementById("editvehicleForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blurAccount");
  } else {
    x.style.display = "block";

  }
}

function openDetailsVehicleForm() {
  var x = document.getElementById("editdetailsForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";
  }
}

function closeDetailsVehicleForm() {
  var x = document.getElementById("editdetailsForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blurAccount");
  } else {
    x.style.display = "block";

  }
}

function display() {
  var myDiv = document.getElementById("vehicleDetails");
  myDiv.outerHTML = "<div id = 'vehicleDetails'><div class = 'item1'>" +
    "<div class = 'vehicle'>Model</div>" +
    "<div class = 'vehicle-specs' id = 'vehicleModel'>" +
    "</div> </div>" +
    "</div>" +

    "<div class = 'item1'>" +
    "<div class = 'vehicle'>Color</div>" +
    "<div class = 'vehicle-specs' id = 'vehicleColor'>" +
    "</div>" +
    "</div>" +

    "<div class = 'item1'>" +
    "<div class = 'vehicle'>Type</div>" +
    "<div class = 'vehicle-specs' id = 'vehicleT'>" +
    "</div>" +
    "</div>" +

    "<div class = 'item1'>" +
    "<div class = 'vehicle'>Manufacturer</div>" +
    "<div class = 'vehicle-specs' id = 'vehicleManufacturer'>" +
    "</div>" +
    "</div>" +
    "</div>";
}



function openMap() {
  var x = document.getElementById("googleMapbox");
  var z = document.getElementById("mapControl");
  var y = document.getElementById("mainbox");
  if (x.style.display === "none") {
    x.style.display = "block";
    z.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";
  }
}

function closeMap() {
  var x = document.getElementById("googleMapbox");
  var z = document.getElementById("mapControl");
  var y = document.getElementById("mainbox");
  if (x.style.display === "block") {
    x.style.display = "none";
    z.style.display = "none";
    y.classList.remove("blurAccount");
  } else {
    x.style.display = "block";
    z.style.display = "block";
  }
}

function openDeleteAddress() {

  var x = document.getElementById("deleteAddressForm");
  var y = document.getElementById("mainbox");
  var val = document.getElementById("delete-Address-Form");
  var selection = document.getElementById("Customer-Address").value;
  // var address = addresses[selection - 1]['Address'];
  // address = address.replace(/ /g, "_");
  // address = address.replace(/\//g, "|");
  // console.log(address);
  // val.action = "/account/deleteAddress/" + address;
  val.action = "/account/deleteAddress/" + addresses[selection - 1]['Latitude'] + "/" + addresses[selection - 1]['Longitude'];
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";

  }

}

function closeDeleteAddress() {
  var x = document.getElementById("deleteAddressForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blurAccount");
  } else {
    x.style.display = "block";

  }
}

function openDeleteAccount() {

  var x = document.getElementById("deleteAccountForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";

  }

}

function closeDeleteAccount() {
  var x = document.getElementById("deleteAccountForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blurAccount");
  } else {
    x.style.display = "block";

  }
}