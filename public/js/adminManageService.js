
function openAddServiceForm() {
    var x = document.getElementById("serviceForm");
    var y = document.getElementById("service");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.classList.add("blur");
    } else {
        x.style.display = "none";
    }
}

function closeAddServiceForm() {
    var x = document.getElementById("serviceForm");
    var y = document.getElementById("service");
    if (x.style.display === "block") {
        x.style.display = "none";
        y.classList.remove("blur");
    } else {
        x.style.display = "block";

    }
}

function openViewServiceForm(i) {
    var x = document.getElementById("viewserviceForm");
    document.getElementById("serviceDesc").placeholder = pausecontent[i]['Description'];
    document.getElementById("ServiceName").innerHTML = pausecontent[i]['Name'];
    document.getElementById("editWashPackage").action = "/service/editWashPackage/" + pausecontent[i]['Wash_Package_ID'];
    document.getElementById("deleteServiceButton").href = "/service/deleteWashPackage/" + pausecontent[i]['Wash_Package_ID'];
    console.log(pausecontent[i]['Description']);
    var y = document.getElementById("service");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.classList.add("blur");
    } else {
        x.style.display = "none";
    }
}


function closeViewServiceForm() {
    var close = document.getElementById("viewserviceForm");
    var y = document.getElementById("service");
    close.style.display = "none";
    y.classList.remove("blur");
}


function openViewVehicleType(i) {
    var x = document.getElementById("viewVehicleType");
    document.getElementById("VehicleName").innerHTML = "Do you want to remove " + vehicles[i]['Vehicle_Type'] + "?";
    var str = vehicles[i]['Vehicle_Type'];
    str = str.replace(/ /g, "_");
    str = str.replace(/-/g, "|");
    document.getElementById("deleteVehicle").href = "/service/deleteVehicleType/" + str;
    var y = document.getElementById("service");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.classList.add("blur");
    } else {
        x.style.display = "none";
    }
}

function closeViewVehicleType() {
    var x = document.getElementById("viewVehicleType");
    var y = document.getElementById("service");
    if (x.style.display === "block") {
        x.style.display = "none";
        y.classList.remove("blur");
    } else {
        x.style.display = "block";

    }
}

function openVehicleAddForm() {
    var x = document.getElementById("vehicleAddForm");
    var y = document.getElementById("service");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.classList.add("blur");
    } else {
        x.style.display = "none";
    }
}

function closeVehicleAddForm() {
    var x = document.getElementById("vehicleAddForm");
    var y = document.getElementById("service");
    if (x.style.display === "block") {
        x.style.display = "none";
        y.classList.remove("blur");
    } else {
        x.style.display = "block";

    }
}




function HideAdd(){
    document.getElementById("add").style = "display:none;";
    document.getElementById("addPriceButton").style = "display:inline-block;";
    document.getElementById("inputAddPrice").style = "display:inline-block; border-radius: 5px; width:50%;";
    document.getElementById("inputAddPrice").placeholder = "";
}

function HideEdit(){
    document.getElementById("edit").style = "display:none;";
    document.getElementById("editPriceButton").style = "display:inline-block;";
    var price = document.getElementById("PriceValue").innerHTML;
    price = price.replace("Rs. ", "");
    document.getElementById("PriceValue").innerHTML = "Rs. ";
    document.getElementById("inputAddPrice").style = "display:inline-block; border-radius: 5px; width:50%;";
    document.getElementById("inputAddPrice").placeholder = price;
}

function addFunction(){
    var x = document.getElementById("admin-wash-types").value;
    var y = document.getElementById("admin-vehicle-types").value;
    var z = document.getElementById("inputAddPrice").value;
    window.location = "/service/addPrice/" + x + "/" + y + "/" + z;
}

