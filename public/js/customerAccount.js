
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
    "<div class = 'vehicle-specs'>" +
    "<div class='color-box' id = 'vehicleColor'" +
    "></div></div>" +
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

display();


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

