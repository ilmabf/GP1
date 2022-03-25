
function displayPrice(){
  document.getElementById("washPackage-vehicleType-Price").innerHTML = "";
  for(var i = 0; i< pausecontent.length; i++){
    var id1 = "washPackage"+i;
    if(document.getElementById(id1).checked){
      var washPackage = pausecontent[i]['Wash_Package_ID'];
    }
  }
  for(var i = 0; i< vehicles.length; i++){
    var id1 = "VehicleTypes" + i;
    if(document.getElementById(id1).checked){
      var vehicleType = vehicles[i]['Vehicle_Type'];
    }
  }
  var price = 0;
  for (var i = 0; i < servicePrices.length; i++) {
    if ( servicePrices[i]["Wash_Package_ID"] == washPackage && servicePrices[i]["Vehicle_Type"] == vehicleType) {
      if (servicePrices[i]["Price"] != null) {
        price = servicePrices[i]["Price"];
      }
    }
  }
  if (price > 0){
    document.getElementById("washPackage-vehicleType-Price").innerHTML = "Rs. " + price;
  }
}

displayPrice();