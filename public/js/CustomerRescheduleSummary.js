let x = document.cookie
    document.getElementById("test").innerHTML = x;

    var cookieArray = document.cookie.split(";");
    var i = 0;
    for (i = 0; i < cookieArray.length; i++) {
        cookieArray[i] = cookieArray[i].trim();
        if (cookieArray[i].substring(0, 3) === "day") {
            var date = cookieArray[i].substring(4);
        }
        if (cookieArray[i].substring(0, 5) === "month") {
            var month = cookieArray[i].substring(6);
        }
        if (cookieArray[i].substring(0, 4) === "year") {
            var year = cookieArray[i].substring(5);
        }
        if (cookieArray[i].substring(0, 4) === "time") {
            var time = cookieArray[i].substring(5);
        }
        if (cookieArray[i].substring(0, 7) === "address") {
            var address = cookieArray[i].substring(8);
        }
        if (cookieArray[i].substring(0, 7) === "vehicle") {
            var vehicle = cookieArray[i].substring(8);
        }
        if (cookieArray[i].substring(0, 15) === "washPackageName") {
            var washPackage = cookieArray[i].substring(16);
        }
        if (cookieArray[i].substring(0, 5) === "price") {
            var price = cookieArray[i].substring(6);
        }
        if (cookieArray[i].substring(0, 5) === "total") {
            var total = cookieArray[i].substring(6);
        }
    }
    //let p = price.substring(6);
    document.getElementById("date").innerHTML = year + " / " + month + "/ " + date;
    document.getElementById("time").innerHTML = time;
    document.getElementById("address").innerHTML = address;
    document.getElementById("vehicle").innerHTML = vehicle;
    document.getElementById("washPackage").innerHTML = washPackage;
    document.getElementById("price").innerHTML = "Rs. " + price + ".00";
    document.getElementById("total").innerHTML = "Rs. " + total + ".00";

    function deleteCookie() {
        document.cookie = "day=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "month=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "year=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "washPackage=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "washPackageName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "price=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "total=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "address=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "latitude=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "longitude=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "time=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "vehicle=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    function rescheduleOrder(orderID) {

        var parameters = document.cookie;
        //delete cookies
        parameters = parameters.replace(/ /g, "_");
        parameters = parameters.replace('\/', "|");
        deleteCookie();
        window.location = "/booking/updateReservation/" + parameters + "/" + orderID;
    }

    function cancelOrderProcess(orderID) {

        //delete cookies

        deleteCookie();
        window.location = "/booking/upcomingOrder/" + orderID;
    }