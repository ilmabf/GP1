
function opencancel(){
  var x = document.getElementById("cancelForm");
  var y = document.getElementById("upcoming");
  // var z = document.getElementById("service-team");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
    // z.classList.add("blur");
  } else {
    x.style.display = "none";
  }
}

function closecancel(){
  var x = document.getElementById("cancelForm");
  var y = document.getElementById("upcoming");
  // var z = document.getElementById("service-team");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blur");
    // z.classList.remove("blur");
  } else {
    x.style.display = "block";
    
  }
}

function openassign(){
  var x = document.getElementById("assign");
  var y = document.getElementById("upcoming");
  // var z = document.getElementById("service-team");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
    // z.classList.add("blur");
  } 
  // else {
  //   x.style.display = "none";
  // }
}

function closeassign(){
  var x = document.getElementById("assign");
  var y = document.getElementById("upcoming");
  // var z = document.getElementById("service-team");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blur");
    // z.classList.remove("blur");
  } else {
    x.style.display = "block";
    
  }
}