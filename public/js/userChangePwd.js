// var myInput = document.getElementById("new-pwd");
// var letter = document.getElementById("letter");
// var capital = document.getElementById("capital");
// var number = document.getElementById("number");
// var length = document.getElementById("length");

// var new_confirm_pwd = document.getElementById("new-confirm-pwd");


// myInput.onfocus = function() {
//   document.getElementById("pwd-validate-message").style.display = "block";
//   document.getElementById("link-to-go-login").style.top = "94%";
// }


// myInput.onblur = function() {
//   document.getElementById("pwd-validate-message").style.display = "none";
//   document.getElementById("link-to-go-login").style.top = "88%";
// }


// myInput.onkeyup = function() {
  
//   var lowerCaseLetters = /[a-z]/g;

//   if(myInput.value.match(lowerCaseLetters)) {  
//     letter.classList.remove("invalid");
//     letter.classList.add("valid");
//   }else{
//     letter.classList.remove("valid");
//     letter.classList.add("invalid");
//   }
 
//   var upperCaseLetters = /[A-Z]/g;
//   if(myInput.value.match(upperCaseLetters)) {  
//     capital.classList.remove("invalid");
//     capital.classList.add("valid");
//   } else {
//     capital.classList.remove("valid");
//     capital.classList.add("invalid");
//   }

 
//   var numbers = /[0-9]/g;
//   if(myInput.value.match(numbers)) {  
//     number.classList.remove("invalid");
//     number.classList.add("valid");
//   } else {
//     number.classList.remove("valid");
//     number.classList.add("invalid");
//   }

//   if(myInput.value.length >= 8) {
//     length.classList.remove("invalid");
//     length.classList.add("valid");
//   } else {
//     length.classList.remove("valid");
//     length.classList.add("invalid");
//   }
// }

// function validatePassword(){
//   if(myInput.value != new_confirm_pwd.value) {
//     new_confirm_pwd.setCustomValidity("Passwords Don't Match");
//   } else {
//     new_confirm_pwd.setCustomValidity('');
//   }
// }

// myInput.onchange = validatePassword;
// new_confirm_pwd.onkeyup = validatePassword;

var myInput = document.getElementById("new-pwd");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

var confirm_pwd = document.getElementById("new-confirm-pwd");

var mySignupButton = document.getElementById("confirm-button");

myInput.onfocus = function () {
  document.getElementById("pwd-validate-message").style.display = "block";
}


myInput.onblur = function () {
  document.getElementById("pwd-validate-message").style.display = "none";
}


myInput.onkeyup = function () {

  var lowerCaseLetters = /[a-z]/g;

  if (myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  var upperCaseLetters = /[A-Z]/g;
  if (myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }


  var numbers = /[0-9]/g;
  if (myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  if (myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

function validatePassword() {
  if (myInput.value != confirm_pwd.value) {
    confirm_pwd.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_pwd.setCustomValidity('');
  }
}

myInput.onchange = validatePassword;
confirm_pwd.onkeyup = validatePassword;


function myFunction(x) {
    if (x.matches) { // If media query matches
      document.getElementById("new-pwd").addEventListener("click", mySignupInputResizeFunction);
    }
  }
  
function mySignupInputResizeFunction() {
    document.getElementById("pwdInput-resize").style.zIndex = "3";
    document.getElementById("pwdInput-resize").style.overflow = "visible";

}
  
var x = window.matchMedia("(max-width: 770px)")
myFunction(x) // Call listener function at run time

var ignoreClickOnMeElement = document.getElementById('pwdInput-resize');

document.addEventListener('click', function(event) {
    var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
    if (!isClickInsideElement) {
        document.getElementById("pwdInput-resize").style.zIndex = "0";
    }
});



