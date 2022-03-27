
// set price and washpackage cookies

function getType(x) {
  var i = 0;
  var type = "";
  for (i = 0; i < vehicles.length; i++) {
    if (vehicles[i]["VID"] == x) {
      type = vehicles[i]["Type"];
    }
  }
  return type;
}

function getWashPackage(n) {
  document.cookie =
    "washPackage = " + pausecontent[n]["Wash_Package_ID"] + ";  path=/";
  document.cookie =
    "washPackageName = " + pausecontent[n]["Name"] + ";  path=/";
  var x = document.getElementById("vehicles").value;
  var vehicleType = getType(x);
  var washPackage = pausecontent[n]["Wash_Package_ID"];
  var price = getPrice(vehicleType, washPackage);
  document.getElementById("priceValue").innerHTML = "Rs. " + price;
  document.getElementById("priceValue").style = "display:block;";
  document.cookie = "price = " + price + ";path=/";
}

function getPrice(type, package) {
  var i = 0;
  for (i = 0; i < prices.length; i++) {
    if (prices[i][0] == package && prices[i][1] == type) {
      return prices[i][2];
    }
  }
}
var i = 0;
var txt =
  "Pick a date, time & location. WandiWash is ready to wash your vehicle! We are Eco Friendly!";
var speed = 50;

function typeWriter(n) {
  if (n < txt.length) {
    document.getElementById("sub-heading-p").innerHTML += txt.charAt(n);
    n++;
    setTimeout(typeWriter(n), speed);
  }
}
function viewCalendar() {
  document.getElementById("cal1").style = "display:block;";
  var z = document.getElementById("mainbox");
  z.classList.add("blurCalendar");
}

//set vehicle cookie
function getVehicle() {
  for (i = 0; i < pausecontent.length; i++) {
    w = "washPackage-" + pausecontent[i]["Wash_Package_ID"];
    document.getElementById(w).checked = false;
    document.getElementById("priceValue").innerHTML = "";
  }
  var x = document.getElementById("vehicles").value;
  document.cookie = "vehicle =" + x + "; path=/";
}
insertCookie();

//check if date, price and vehicle details are complete
function checkDetails() {
  var slash = document.getElementById("slash1").innerHTML;
  var price = document.getElementById("priceValue").innerHTML;
  if (slash != "/" || price == "") {
    popError("Please make sure the details are complete");
  } else {
    var x = document.getElementById("vehicles").value;
    document.cookie = "vehicle =" + x + "; path=/";
    window.location = "/booking/location";
  }
}

//set cookies
function insertCookie() {
  var cookieArray = document.cookie.split(";");
  var i = 0;
  for (i = 0; i < cookieArray.length; i++) {
    cookieArray[i] = cookieArray[i].trim();
    if (cookieArray[i].substring(0, 3) === "day") {
      var date = cookieArray[i].substring(4);
      document.getElementById("day").innerHTML = date;
      document.getElementById("slash1").innerHTML = "/";
      document.getElementById("slash2").innerHTML = "/";
    } else if (cookieArray[i].substring(0, 5) === "month") {
      var month = cookieArray[i].substring(6);
      document.getElementById("month").innerHTML = month;
    } else if (cookieArray[i].substring(0, 4) === "year") {
      var year = cookieArray[i].substring(5);
      document.getElementById("year").innerHTML = year;
    } else if (cookieArray[i].substring(0, 4) === "time") {
      var time = cookieArray[i].substring(5);
      document.getElementById("timeSlot").innerHTML = time;
    } else if (cookieArray[i].substring(0, 7) === "vehicle") {
      var vehicle = cookieArray[i].substring(8);
      document.getElementById("vehicles").value = vehicle;
      document.cookie = "vehicle =" + vehicle + "; path=/";
    } else if (cookieArray[i].substring(0, 15) === "washPackageName") {
      var washPackageName = cookieArray[i].substring(16);
    } else if (cookieArray[i].substring(0, 11) === "washPackage") {
      var washPackage = cookieArray[i].substring(12);
      washPackage = "washPackage-" + washPackage;
      document.getElementById(washPackage).checked = true;
    } else if (cookieArray[i].substring(0, 5) === "price") {
      var price = cookieArray[i].substring(6);
      document.getElementById("priceValue").style = "display:block;";
      document.getElementById("priceValue").innerHTML = "Rs. " + price;
    }
  }
}
