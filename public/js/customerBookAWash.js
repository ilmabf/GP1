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

// const btnsTip = document.querySelectorAll(".input");
// let activeBtn = null;

// btnsTip.forEach((btnTip) => {
//   btnTip.addEventListener("click", (e) => {
//     e.currentTarget.classList.add("active");

//     if ((activeBtn != null && activeBtn != e.currentTarget)) {
//       activeBtn.classList.remove("active");
//     }

//     activeBtn = e.currentTarget;
//   });
// });

function viewCalendar() {
  document.getElementById("cal1").style = "display:block;";
  var z = document.getElementById("bookingContent");
  z.classList.add("blurCalendar");
}

function getVehicle() {
  var x = document.getElementById("vehicles").value;
  document.cookie = "vehicle =" + x + "; path=/";
}
insertCookie();
getVehicle();

//check if date, price and vehicle details are complete
function checkDetails() {
  var slash = document.getElementById("slash1").innerHTML;
  var price = document.getElementById("priceValue").innerHTML;
  if (slash != "/" || price == "") {
    document.getElementById("completeMsg").innerHTML =
      "Please make sure the details are complete";
  } else {
    window.location = "/booking/location";
  }
}

function checkRescheduleDetails(orderID) {
  var slash = document.getElementById("slash11").innerHTML;
  var price = document.getElementById("priceValue1").innerHTML;
  if (slash != "/" || price == "") {
    document.getElementById("completeMsg1").innerHTML =
      "Please make sure the details are complete";
  } else {
    window.location = "/booking/rescheduleLocation/" + orderID;
  }
}

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
    }
    if (cookieArray[i].substring(0, 5) === "month") {
      var month = cookieArray[i].substring(6);
      document.getElementById("month").innerHTML = month;
    }
    if (cookieArray[i].substring(0, 4) === "year") {
      var year = cookieArray[i].substring(5);
      document.getElementById("year").innerHTML = year;
    }
    if (cookieArray[i].substring(0, 4) === "time") {
      var time = cookieArray[i].substring(5);
      document.getElementById("timeSlot").innerHTML = time;
    }
    if (cookieArray[i].substring(0, 7) === "vehicle") {
      var vehicle = cookieArray[i].substring(8);
      document.getElementById("vehicles").value = vehicle;
      document.cookie = "vehicle =" + vehicle + "; path=/";
    }
    if (cookieArray[i].substring(0, 15) === "washPackageName") {
      var washPackage = cookieArray[i].substring(16);
    }
    if (cookieArray[i].substring(0, 5) === "price") {
      var price = cookieArray[i].substring(6);
      document.getElementById("priceValue").style = "display:block;";
      document.getElementById("priceValue").innerHTML = "Rs. " + price;
    }
  }
  document.getElementById("xx").innerHTML = document.cookie;
}
