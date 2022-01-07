function openstlForm() {
  var x = document.getElementById("stldetails");
  var y = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
  } else {
    x.style.display = "none";
  }
}

function closestlForm() {
  var x = document.getElementById("stldetails");
  var y = document.getElementById("upcoming");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blur");
  } else {
    x.style.display = "block";
  }
}

function opencancelForm() {
  var x = document.getElementById("cancel");
  var y = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
  } else {
    x.style.display = "none";
  }
}

function closecencelForm() {
  var x = document.getElementById("cancel");
  var y = document.getElementById("upcoming");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blur");
  } else {
    x.style.display = "block";
  }
}

// function rescheduleReservation(orderID, date) {
//   // check the difference between date and today date is greater than 24 hours
//   var today = new Date();
//   var date1 = new Date(date);
//   var diff = date1.getTime() - today.getTime();
//   var diffDays = Math.ceil(diff / (1000 * 3600 * 24));
//   if (diffDays > 1) {
//     window.location = "/booking/rescheduleDetails/" + orderID;
//   } else {
//     alert("You can't reschedule the reservation for less than 24 hours");
//   }
// }
