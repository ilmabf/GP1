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
  document.getElementById("link-to-go-login").style.top = "115%";
};

myInput.onblur = function () {
  document.getElementById("pwd-validate-message").style.display = "none";
  document.getElementById("link-to-go-login").style.top = "109%";
};

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
};

function validatePassword() {
  if (myInput.value != confirm_pwd.value) {
    confirm_pwd.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_pwd.setCustomValidity("");
  }
}

myInput.onchange = validatePassword;
confirm_pwd.onkeyup = validatePassword;

function checkLetter() {
  var letters = /^[A-Za-z]+$/;
  var fName = document.getElementById("signUpFirstName");
  if (!fName.value.match(letters)) {
    fName.setCustomValidity("Please input alphabet characters only");
  } else {
    fName.setCustomValidity("");
  }

  var lName = document.getElementById("signUpLastName");
  if (!lName.value.match(letters)) {
    lName.setCustomValidity("Please input alphabet characters only");
  } else {
    lName.setCustomValidity("");
  }
}

document.getElementById("signUpFirstName").value =
  getSavedValue("signUpFirstName"); // set the value to this input
document.getElementById("signUpLastName").value =
  getSavedValue("signUpLastName"); // set the value to this input
document.getElementById("signUpUsername").value =
  getSavedValue("signUpUsername");
document.getElementById("signUpEmail").value = getSavedValue("signUpEmail");
document.getElementById("signUpMobile").value = getSavedValue("signUpMobile");
/* Here you can add more inputs to set value. if it's saved */

//Save the value function - save it to localStorage as (ID, VALUE)
function saveValue(e) {
  var id = e.id; // get the sender's id to save it .
  var val = e.value; // get the value.
  localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override .
}

//get the saved value function - return the value of "v" from localStorage.
function getSavedValue(v) {
  if (!localStorage.getItem(v)) {
    return ""; // You can change this to your default value.
  }
  return localStorage.getItem(v);
}
