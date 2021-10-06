
function openVehicleForm(){
  var x = document.getElementById("vehicleForm");
  var y = document.getElementById("mainbox");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blurAccount");
  } else {
    x.style.display = "none";
  }
}

function closeVehicleForm(){
    var x = document.getElementById("vehicleForm");
    var y = document.getElementById("mainbox");
    if (x.style.display === "block") {
      x.style.display = "none";
      y.classList.remove("blurAccount");
    } else {
      x.style.display = "block";
      
    }
  }
  
  function openEditVehicleForm(){
    var x = document.getElementById("editvehicleForm");
    var y = document.getElementById("mainbox");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.classList.add("blurAccount");
    } else {
      x.style.display = "none";
      
    }
  }

  function closeEditVehicleForm(){
    var x = document.getElementById("editvehicleForm");
    var y = document.getElementById("mainbox");
    if (x.style.display === "block") {
      x.style.display = "none";
      y.classList.remove("blurAccount");
    } else {
      x.style.display = "block";
      
    }
  }

  function openDetailsVehicleForm(){
    var x = document.getElementById("editdetailsForm");
    var y = document.getElementById("mainbox");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.classList.add("blurAccount");
    } else {
      x.style.display = "none";
    }
  }

  function closeDetailsVehicleForm(){
    var x = document.getElementById("editdetailsForm");
    var y = document.getElementById("mainbox");
    if (x.style.display === "block") {
      x.style.display = "none";
      y.classList.remove("blurAccount");
    } else {
      x.style.display = "block";
      
    }
  }


    
    document.getElementById(1).style.display = 'block';


  document.getElementById('Customer-Vehicles').onchange = function() {
    var i = 1;
    var myDiv = document.getElementById(i);
    while(myDiv) {
        myDiv.style.display = 'none';
        myDiv = document.getElementById(++i);
    }
    document.getElementById(this.value).style.display = 'block';
};