// Get the modal
var modal = document.getElementById("cancelPopUpId");
var modal1 = document.getElementById("confirmPopUpId");

// Get the button that opens the modal
var btn = document.getElementById("cancelBtn");
var btn1 = document.getElementById("confirmBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeCancel")[0];
var span1 = document.getElementsByClassName("closeConfirm")[0];

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

