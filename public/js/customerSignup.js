var myInput = document.getElementById("signup-pwd");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

var confirm_pwd = document.getElementById("signup-confirm-pwd");

var signupVerify = document.getElementById("signupVerify");
var mySignupButton = document.getElementById("mySignupButton");
var span = document.getElementsByClassName("close-signupVerifyMessage")[0];

var fName = document.getElementById("signUpFirstName");
var lName = document.getElementById("signUpLastName");

myInput.onfocus = function () {
  document.getElementById("pwd-validate-message").style.display = "block";
  document.getElementById("link-to-go-login").style.top = "97%";
}


myInput.onblur = function () {
  document.getElementById("pwd-validate-message").style.display = "none";
  document.getElementById("link-to-go-login").style.top = "91%";
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

function checkLetter() {
  var letters = /^[A-Za-z]+$/;
  var fName = document.getElementById("signUpFirstName");
  if (!fName.value.match(letters)) {
    fName.setCustomValidity("Please input alphabet characters only");
  }
  else {
    fName.setCustomValidity('');
  }

  var lName = document.getElementById("signUpLastName");
  if (!lName.value.match(letters)) {
    lName.setCustomValidity("Please input alphabet characters only");
  }
  else {
    lName.setCustomValidity('');
  }
}

function myFunction(x) {
  if (x.matches) { // If media query matches
    document.getElementById("signUpFirstName").addEventListener("click", mySignupInputResizeFunction);
    document.getElementById("signUpLastName").addEventListener("click", mySignupInputResizeFunction);
    document.getElementById("signUpUserName").addEventListener("click", mySignupInputResizeFunction);
    document.getElementById("signUpEmailAdd").addEventListener("click", mySignupInputResizeFunction);
    document.getElementById("signUpMobile").addEventListener("click", mySignupInputResizeFunction);
    document.getElementById("signup-pwd").addEventListener("click", mySignupInputResizeFunction);
    document.getElementById("signup-confirm-pwd").addEventListener("click", mySignupInputResizeFunction);
  }
}

function mySignupInputResizeFunction() {
    document.getElementById("signup-resizing").style.zIndex = "3";
}

var x = window.matchMedia("(max-width: 770px)")
myFunction(x) // Call listener function at run time

var ignoreClickOnMeElement = document.getElementById('signup-resizing');

document.addEventListener('click', function(event) {
    var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
    if (!isClickInsideElement) {
        document.getElementById("signup-resizing").style.zIndex = "0";
    }
});


