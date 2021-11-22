
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


function openViewVehicleType() {
    var x = document.getElementById("viewVehicleType");
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
