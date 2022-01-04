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
