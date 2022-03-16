const date = new Date();
var h, i, j, z, a, flag1, flag2;

flag1 = 0;
flag2 = 0;

var months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

  var days = "";

  for (var x = firstDayIndex; x > 0; x--) {
    h = prevLastDay - x + 1;
    days += `<div class="prev-date">
                
              </div>`;
  }

  var month = ("0" + (date.getMonth() + 1)).slice(-2);
  var monthStr = month.toString();

  var timeSlotsArr = [
    "08-10 A.M.",
    "10-12 A.M.",
    "12-14 P.M.",
    "14-16 P.M.",
    "16-18 P.M.",
  ];

  for (i = 1; i <= lastDay; i++) {
    flag1 = 0;
    flag2 = 0;
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today"><span class="today-1" style = "color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">${i}</span><br>`;
      flag1 = 0;
      flag2 = 0;
      for (a = 1; a <= 5; a++) {
        flag1 = 0;
        for (var key in booked) {
          console.log(booked[key]);
          // split the key by '-'
          var keyArr = key.split("-");
          // turn the keyArr values to string
          if (
            keyArr[0] === date.getFullYear().toString() &&
            keyArr[1] === monthStr &&
            keyArr[2] === ("0" + i).slice(-2).toString() &&
            timeSlotsArr[a - 1] === booked[key]
          ) {
            days +=
              `
                                            <span class="time-red" id = "slot1" onclick="getTimeAndDate(` +
              i +
              `,` +
              month +
              `,` +
              date.getFullYear() +
              `, booked)">${booked[key]}</span>`;
            flag1 = 1;
          }
        }

        if (flag1 == 0) {
          days +=
            `
                                            <span class="time-green" id = "slot1" onclick="getTimeAndDate(` +
            i +
            `,` +
            month +
            `,` +
            date.getFullYear() +
            `, ` +
            a +
            `)">${timeSlotsArr[a - 1]}</span>`;
        }
      }
      days += `</div>`;
    } else {
      days += `<div><span class="today-2" style = "color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;">${i}</span><br>`;
      for (a = 1; a <= 5; a++) {
        flag2 = 0;
        // days += `<div>`;
        for (var key in booked) {
          // split the key by '-'
          var keyArr = key.split("-");
          // turn the keyArr values to string

          if (
            keyArr[0] === date.getFullYear().toString() &&
            keyArr[1] === monthStr &&
            keyArr[2] === ("0" + i).slice(-2).toString() &&
            timeSlotsArr[a - 1] === booked[key]
          ) {
            days +=
              `
                                            <span class="time-red" id = "slot1" onclick="getTimeAndDate(` +
              i +
              `,` +
              month +
              `,` +
              date.getFullYear() +
              `, booked)">${booked[key]}</span>`;

            flag2 = 1;
          }
        }

        if (flag2 == 0) {
          // console.log(timeSlotsArr[a-1])
          days +=
            `
                                            <span class="time-green" id = "slot1" onclick="getTimeAndDate(` +
            i +
            `,` +
            month +
            `,` +
            date.getFullYear() +
            `, ` +
            a +
            `)">${timeSlotsArr[a - 1]}</span>`;
        }
      }
      days += `</div>`;
    }
  }

  for (j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">
                
            </div>`;
    // days += timeSlotsHTML;
    monthDays.innerHTML = days;
  }
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

renderCalendar();

// get time and date
function getTimeAndDate(date, month, year, t) {
  if (t != "booked") {
    var time;
    if (t == 1) {
      time = "08-10 A.M.";
    } else if (t == 2) {
      time = "10-12 A.M.";
    } else if (t == 3) {
      time = "12-14 P.M.";
    } else if (t == 4) {
      time = "14-16 P.M.";
    } else if (t == 5) {
      time = "16-18 P.M.";
    }
    // Check if date is today. If so , check time.
    var today = new Date();
    var selectedDate = year + "-" + month + "-" + date;
    // if (
    //     date == today.getDate() &&
    //     month == today.getMonth() + 1 &&
    //     year == today.getFullYear()
    // ) {
    //     console.log(today.getTimezoneOffset());
    //     var localTime = today.toLocaleTimeString('en-GB');
    //     var localTimeArray = localTime.split(":");
    //     var selectedTimeArray = time.split("-");
    //     if (parseInt(selectedTimeArray[0]) > parseInt(localTimeArray[0])) {
    //         document.getElementById("day").innerHTML = date;
    //         document.getElementById("month").innerHTML = month;
    //         document.getElementById("year").innerHTML = year;
    //         document.getElementById("timeSlot").innerHTML = time;

    //         document.cookie = "day = " + date + ";  path=/";
    //         document.cookie = "month = " + month + ";  path=/";
    //         document.cookie = "year = " + year + ";  path=/";
    //         document.cookie = "time = " + time + ";  path=/";

    //         document.getElementById("cal1").style = "display:none;";
    //         var z = document.getElementById("bookingContent");
    //         z.classList.remove("blurCalendar");
    //     }
    // } else {
    const monthNames = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    const mm = monthNames[today.getMonth()];
    const dd = String(today.getDate()).padStart(2, "0");
    const yyyy = today.getFullYear();
    var todayDate =
      today.getFullYear() +
      "-" +
      parseInt(today.getMonth() + 1) +
      "-" +
      today.getDate();

    var d1 = Date.parse(todayDate);
    var d2 = Date.parse(selectedDate);
    if (d2 > d1 && t != "booked") {
      //display selected date
      document.getElementById("day").innerHTML = "Date: " + date;
      document.getElementById("month").innerHTML = month;
      document.getElementById("year").innerHTML = year;
      document.getElementById("timeSlot").innerHTML = "Time: " + time;
      document.getElementById("slash1").innerHTML = "/";
      document.getElementById("slash2").innerHTML = "/";

      document.cookie = "day = " + date + ";path=/";
      document.cookie = "month = " + month + ";path=/";
      document.cookie = "year = " + year + ";path=/";
      document.cookie = "time = " + time + ";path=/";

      document.getElementById("cal1").style = "display:none;";
      var z = document.getElementById("bookingContent");
      z.classList.remove("blurCalendar");
    }
    // }
  }
}

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
  // document.getElementById("washPackage-" + n).checked = true;
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
// getVehicle();

//check if date, price and vehicle details are complete
function checkDetails() {
  var slash = document.getElementById("slash1").innerHTML;
  var price = document.getElementById("priceValue").innerHTML;
  if (slash != "/" || price == "") {
    document.getElementById("completeMsg").innerHTML =
      "Please make sure the details are complete";
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
  // document.getElementById("xx").innerHTML = document.cookie;
}
