


function openMap2() {
    var x = document.getElementById("googleMapbox");
    var z = document.getElementById("mapControl");
    var y = document.getElementById("mainbox");
    if (x.style.display === "none") {
        x.style.display = "block";
        z.style.display = "block";
        y.classList.add("blur");
    } else {
        x.style.display = "none";
    }
}

function closeMap2() {
    var x = document.getElementById("googleMapbox");
    var z = document.getElementById("mapControl");
    var y = document.getElementById("mainbox");
    if (x.style.display === "block") {
        x.style.display = "none";
        z.style.display = "none";
        y.classList.remove("blur");
    } else {
        x.style.display = "block";
    }
}