var ratingLevel = orderDetails[0]["Rating"];

var ratingStars = [...document.getElementsByClassName("rating__star")];

function executeRating(stars) {
  const starClassActive = "rating__star fas fa-star";
  const starClassInactive = "rating__star far fa-star";
  const starsLength = stars.length;

  if (ratingLevel == null) {
    document.getElementById("rateSubmitBut").style.display = "block";
    var x = document.getElementById("displayedSentence");
    x.innerHTML +=
      "<h3 style='color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;'>" +
      "How was the service? Give us a rating!" +
      "</h3>";
    let i;
    // stars[1].className = starClassActive
    // stars[2].className = starClassActive
    // stars[3].className = starClassActive
    //stars[0].className = starClassActive

    stars.map((star) => {
      star.onclick = () => {
        i = stars.indexOf(star);

        document.getElementById("textF").value = i + 1;
        if (star.className === starClassInactive) {
          for (i; i >= 0; --i) stars[i].className = starClassActive;
        } else {
          for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
        }
      };
    });
  } else {
    var x = document.getElementById("displayedSentence");
    x.innerHTML +=
      "<h3 style='color:white; text-shadow:0 0 3px #000000, 0 0 5px #0000ff;'>" +
      "Thank you for your valuable rating!" +
      "</h3>";
    for (j = 0; j < ratingLevel; j++) {
      stars[j].className = starClassActive;
    }
  }
}
executeRating(ratingStars);


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
