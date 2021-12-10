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
  z.classList.add("blurAccount");
}

function getVehicle() {
  var x = document.getElementById("vehicles").value;
  document.cookie = "vehicle =" + x + "; path=/";
}

getVehicle();
