function myFunction(x) {
    if (x.matches) { // If media query matches
      document.getElementById("userEnterMail").addEventListener("click", mySignupInputResizeFunction);
    }
  }
  
  function mySignupInputResizeFunction() {
      document.getElementById("forgotPwd-resizing").style.zIndex = "3";
      document.getElementById("forgotPwd-resizing").style.top = "80%";
  }
  
  var x = window.matchMedia("(max-width: 770px)")
  myFunction(x) // Call listener function at run time
  
  var ignoreClickOnMeElement = document.getElementById('forgotPwd-resizing');
  
  document.addEventListener('click', function(event) {
      var isClickInsideElement = ignoreClickOnMeElement.contains(event.target);
      if (!isClickInsideElement) {
          document.getElementById("forgotPwd-resizing").style.zIndex = "0";
          document.getElementById("forgotPwd-resizing").style.top = "55%";
      }
  });
  