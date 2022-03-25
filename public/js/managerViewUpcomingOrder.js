
function opencancel(){
  var x = document.getElementById("cancelForm");
  var y = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
  } else {
    x.style.display = "none";
  }
}

function closecancel(){
  var x = document.getElementById("cancelForm");
  var y = document.getElementById("upcoming");
  if (x.style.display === "block") {
    x.style.display = "block";
    y.classList.remove("blur");
  } else {
    x.style.display = "block";
    
  }
}

function openassign(n){
  document.getElementById("assignMsg").innerHTML = "Do you want to assign Team " + n + " for this reservation?";
  var x = document.getElementById("assign");
  var y = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
  } 
  else {
    x.style.display = "none";
  }
}

function closeassign(){
  var x = document.getElementById("assign");
  var y = document.getElementById("upcoming");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blur");
  } else {
    x.style.display = "block";
    
  }
}

function changeAssign(n){
  document.getElementById("assignMsg2").innerHTML = "Do you want to change currently assigned team to Team " + n + " for this reservation?";
  var x = document.getElementById("changeAssign");
  var y = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
  } 
  else {
    x.style.display = "none";
  }
}

function closeChangeAssign(){
  var x = document.getElementById("changeAssign");
  var y = document.getElementById("upcoming");
  if (x.style.display === "block") {
    x.style.display = "none";
    y.classList.remove("blur");
  } else {
    x.style.display = "block";
    
  }
}
