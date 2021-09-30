var typeService1 = document.getElementById('typeServices1');
// var typeService2 = document.getElementById('typeServices2');
// var typeService3 = document.getElementById('typeServices3');

var typeVehicle1 = document.getElementById('typeVehicles1');


var newService1 = document.getElementById('addServiceTypes');

var newVehicle1 = document.getElementById('addNewVehicleTypess');

var iClean1 = document.getElementById('interiorClean');
// var iClean2 = document.getElementById('interior-exteriorClean');
// var iClean3 = document.getElementById('sanitization');

var vNames1 = document.getElementById('vehiclesNames');

var sNames1 = document.getElementById('newServiceNames');

var newVehicles = document.getElementById('newVehicleNames');

var Ispan1 = document.getElementsByClassName("closeInteriorClean")[0];
// var Ispan2 = document.getElementsByClassName("closeIEClean")[0];
// var Ispan3 = document.getElementsByClassName("closeSClean")[0];

var Vspan1 = document.getElementsByClassName("closeVehicle")[0];

var Sspan1 = document.getElementsByClassName("closeAddService")[0];

var newVehicleSpan1 = document.getElementsByClassName("closeAddVehicle")[0];

Ispan1.onclick = function() {
    iClean1.style.display = "none";
}

// Ispan2.onclick = function() {
//     iClean2.style.display = "none";
// }

// Ispan3.onclick = function() {
//     iClean3.style.display = "none";
// }

Vspan1.onclick = function() {
    vNames1.style.display = "none";
}

Sspan1.onclick = function() {
    sNames1.style.display = "none";
}

newVehicleSpan1.onclick = function() {
    newVehicles.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == iClean1 ) {
        iClean1.style.display = "none";
    }else if(event.target == vNames1) {
        vNames1.style.display = "none";
    } else if(event.target == sNames1) {
        sNames1.style.display = "none";
    } else if(event.target == newVehicles) {
        newVehicles.style.display = "none";
    }
}

typeService1.addEventListener('click',interiorCleaning);

function interiorCleaning(){
    if (iClean1.style.display === "none") {
        iClean1.style.display = "block";


    } else {
        iClean1.style.display = "none";
    }
}

// typeService2.addEventListener('click',interiorexteriorCleaning);

// function interiorexteriorCleaning(){
//     if (iClean2.style.display === "none") {
//         iClean2.style.display = "block";


//     } else {
//         iClean2.style.display = "none";
//     }
// }

// typeService3.addEventListener('click',sanitization);

// function sanitization(){
//     if (iClean3.style.display === "none") {
//         iClean3.style.display = "block";


//     } else {
//         iClean3.style.display = "none";
//     }
// }

typeVehicle1.addEventListener('click',hBack);

function hBack(){
    if (vNames1.style.display === "none") {
        vNames1.style.display = "block";


    } else {
        vNames1.style.display = "none";
    }
}


newService1.addEventListener('click',newService);

function newService(){
    if (sNames1.style.display === "none") {
        sNames1.style.display = "block";


    } else {
        sNames1.style.display = "none";
    }
}


newVehicle1.addEventListener('click',newVehicle);

function newVehicle(){
    if (newVehicles.style.display === "none") {
        newVehicles.style.display = "block";


    } else {
        newVehicles.style.display = "none";
    }
}