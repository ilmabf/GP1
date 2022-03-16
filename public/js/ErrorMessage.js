function popError(msg){
    var x = document.getElementById("errorForm");
    var y = document.getElementById("mainbox");
      x.style.display = "block";
      document.getElementById("error-msg").innerHTML = msg;
      y.classList.add("blurError");
    
}

function closeError(){
    var x = document.getElementById("errorForm");
    var y = document.getElementById("mainbox");
        document.getElementById("error-msg").innerHTML = "";
      x.style.display = "none";
      y.classList.remove("blurError");
      
  }

  