// Get the modal
var modal = document.getElementById("assignPopUpId");
var modal1 = document.getElementById("cancelReservationPopUpId");

// Get the button that opens the modal
var btn = document.getElementById("cancelAssignBtn");
var btn1 = document.getElementById("cancelReservationBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeCancelAssign")[0];
var span1 = document.getElementsByClassName("closeCancelReservation")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal1.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span1.onclick = function() {
    modal1.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal1) {
      modal1.style.display = "none";
    }
  }
