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
  var z = document.getElementById("bookingContent");
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
function checkRescheduleDetails(orderID) {
  var slash = document.getElementById("slash11").innerHTML;
  var price = document.getElementById("priceValue1").innerHTML;
  if (slash != "/" || price == "") {
    document.getElementById("completeMsg1").innerHTML =
      "Please make sure the details are complete";
  } else {
    var date = document.getElementById("day1").innerHTML.substring(5);
    // console.log(date.substring(5));
    var month = document.getElementById("month1").innerHTML;
    var year = document.getElementById("year1").innerHTML;
    var time = document.getElementById("timeSlot1").innerHTML.substring(6);

    document.cookie = "day = " + date + ";path=/";
    document.cookie = "month = " + month + ";path=/";
    document.cookie = "year = " + year + ";path=/";
    document.cookie = "time = " + time + ";path=/";

    window.location = "/booking/rescheduleLocation/" + orderID;
  }
}

//set reschedule cookies
function insertCookie() {
  document.getElementById("vehicles").value = reservationDetails[0]["Vehicle_ID"];
  document.cookie = "vehicle =" + document.getElementById("vehicles").value + "; path=/";
  var washPackage = reservationDetails[0]["Wash_Package_ID"];
  washPackage = "washPackage-" + washPackage;
  document.getElementById(washPackage).checked = true;
//   document.getElementById("xx").innerHTML = document.cookie;
}

function checkRescheduleDetails(orderID) {
    var slash = document.getElementById("slash11").innerHTML;
    var price = document.getElementById("priceValue1").innerHTML;
    if (slash != "/" || price == "") {
      document.getElementById("completeMsg1").innerHTML =
        "Please make sure the details are complete";
    } else {
      var date = document.getElementById("day1").innerHTML.substring(5);
      // console.log(date.substring(5));
      var month = document.getElementById("month1").innerHTML;
      var year = document.getElementById("year1").innerHTML;
      var time = document.getElementById("timeSlot1").innerHTML.substring(6);
  
      document.cookie = "day = " + date + ";path=/";
      document.cookie = "month = " + month + ";path=/";
      document.cookie = "year = " + year + ";path=/";
      document.cookie = "time = " + time + ";path=/";
  
      window.location = "/booking/rescheduleLocation/" + orderID;
    }
  }