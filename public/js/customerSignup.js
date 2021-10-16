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

myInput.onfocus = function() {
  document.getElementById("pwd-validate-message").style.display = "block";
  document.getElementById("link-to-go-login").style.top = "97%";
}


myInput.onblur = function() {
  document.getElementById("pwd-validate-message").style.display = "none";
  document.getElementById("link-to-go-login").style.top = "91%";
}


myInput.onkeyup = function() {
  
  var lowerCaseLetters = /[a-z]/g;

  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  }else{
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
 
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

 
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

function validatePassword(){
  if(myInput.value != confirm_pwd.value) {
    confirm_pwd.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_pwd.setCustomValidity('');
  }
}

myInput.onchange = validatePassword;
confirm_pwd.onkeyup = validatePassword;

function allLetter(inputtxt)
  {
   var letters = /^[A-Za-z]+$/;
   if(inputtxt.value.match(letters))
     {
      return true;
     }
   else
     {
      inputtxt.setCustomValidity("Please input alphabet characters only");
     return false;
     }
  }


  function checkLetter(){
    var letters = /^[A-Za-z]+$/;
    var fname = document.getElementById("signUpFirstName");
    if(!fName.value.match(letters)){
      fName.setCustomValidity("Please input alphabet characters only");
    }
    else{
      fName.setCustomValidity('');
    }

    var lName = document.getElementById("signUpLastName");
    if(!lName.value.match(letters)){
      lName.setCustomValidity("Please input alphabet characters only");
    }
    else{
      lName.setCustomValidity('');
    }
  }


// if($_SESSION['verifyBox'] == 1){
//   span.onclick = function() {
//     toVerifySingupBox.style.display = "none";
//   }

//   window.onclick = function(event) {
//     if (event.target == toVerifySingupBox) {
//       toVerifySingupBox.style.display = "none";
//     }
//   }
// }

//confirm_pwd.onkeyup = validatePassword;

