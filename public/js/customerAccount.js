
function openVehicleForm(){
  var x = document.getElementById("vehicleForm");
  var y = document.getElementById("box");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.classList.add("blur");
  } else {
    x.style.display = "none";
  }
}

function closeVehicleForm(){
    var x = document.getElementById("vehicleForm");
    var y = document.getElementById("box");
    if (x.style.display === "block") {
      x.style.display = "none";
      y.classList.remove("blur");
    } else {
      x.style.display = "block";
      
    }
  }
  
  function openEditVehicleForm(){
    var x = document.getElementById("editvehicleForm");
    var y = document.getElementById("box");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.classList.add("blur");
    } else {
      x.style.display = "none";
      
    }
  }

  function closeEditVehicleForm(){
    var x = document.getElementById("editvehicleForm");
    var y = document.getElementById("box");
    if (x.style.display === "block") {
      x.style.display = "none";
      y.classList.remove("blur");
    } else {
      x.style.display = "block";
      
    }
  }

  function openDetailsVehicleForm(){
    var x = document.getElementById("editdetailsForm");
    var y = document.getElementById("box");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.classList.add("blur");
    } else {
      x.style.display = "none";
    }
  }

  function closeDetailsVehicleForm(){
    var x = document.getElementById("editdetailsForm");
    var y = document.getElementById("box");
    if (x.style.display === "block") {
      x.style.display = "none";
      y.classList.remove("blur");
    } else {
      x.style.display = "block";
      
    }
  }