$("#ManagerCompletedDate").datepicker({
  dateFormat: "yy-mm-dd",
  onSelect: function (date) {
    document.getElementById("completedReservationTable").innerHTML = "";

    var i = 0;
    var list = [];

    for (i = 0; i < orders.length; i++) {
      if (orders[i]["Date"] == date) {
        var order = [];
        order["Reservation_ID"] = orders[i]["Reservation_ID"];
        order["First_Name"] = orders[i]["First_Name"];
        order["Last_Name"] = orders[i]["Last_Name"];
        order["Vehicle_ID"] = orders[i]["Vehicle_ID"];
        order["Date"] = orders[i]["Date"];
        order["Time"] = orders[i]["Time"];
        order["Member1"] = orders[i]["Member1"];
        list.push(order);
      }
    }
    var x = document.getElementById("completedReservationTable");
    document.getElementById("resCount").innerHTML = list.length;

    for (j = 0; j < list.length; j++) {
      if (list[j]["Reservation_ID"].length == 1) {
        var id = "000" + list[j]["Reservation_ID"];
      } else if (list[j]["Reservation_ID"].length == 2) {
        var id = "00" + list[j]["Reservation_ID"];
      } else if (list[j]["Reservation_ID"].length == 3) {
        var id = "0" + list[j]["Reservation_ID"];
      } else var id = list[j]["Reservation_ID"];

      x.innerHTML +=
        "<tr>" +
        "<td>" +
        id +
        "</td>" +
        "<td>" +
        list[j]["First_Name"] +
        " " +
        list[j]["Last_Name"] +
        "</td>" +
        "<td>" +
        list[j]["Vehicle_ID"] +
        "</td>" +
        "<td>" +
        list[j]["Date"] +
        "</td>" +
        "<td>" +
        list[j]["Time"] +
        "</td>" +
        "<td class='team'>Completed by " +
        list[j]["Member1"] +
        "'s Team</td>" +
        "<td><a href='/booking/completedOrder/" +
        list[j]["Reservation_ID"] +
        "'>View Order</a></td>" +
        "</tr>";
    }
  },
});

function viewList() {
  var x = document.getElementById("completedReservationTable");
  document.getElementById("resCount").innerHTML = orders.length;
  // document.getElementById("managerCompleteReservations").innerHTML = '';

  for (j = 0; j < orders.length; j++) {
    if (orders[j]["Reservation_ID"].length == 1) {
      var id = "000" + orders[j]["Reservation_ID"];
    } else if (orders[j]["Reservation_ID"].length == 2) {
      var id = "00" + orders[j]["Reservation_ID"];
    } else if (orders[j]["Reservation_ID"].length == 3) {
      var id = "0" + orders[j]["Reservation_ID"];
    } else var id = orders[j]["Reservation_ID"];

    x.innerHTML +=
      "<tr>" +
      "<td>" +
      id +
      "</td>" +
      "<td>" +
      orders[j]["First_Name"] +
      " " +
      orders[j]["Last_Name"] +
      "</td>" +
      "<td>" +
      orders[j]["Vehicle_ID"] +
      "</td>" +
      "<td>" +
      orders[j]["Date"] +
      "</td>" +
      "<td>" +
      orders[j]["Time"] +
      "</td>" +
      "<td class='team'>Completed by " +
      orders[j]["Member1"] +
      "'s Team</td>" +
      "<td class='viewLink'><a href='/booking/completedOrder/" +
      orders[j]["Reservation_ID"] +
      "'>View Order</a></td>" +
      "</tr>";
  }
}
viewList();

const searchInputcompletedReservations = document.getElementById(
  "managerSearchCompletedReservations"
);
const tablecompletedReservations = document.getElementById(
  "completedReservationsSearch"
);
const trArraycompletedReservations = Array.prototype.slice.call(
  tablecompletedReservations.querySelectorAll("tbody tr")
);

const completedReservationsSearch = (event) => {
  const searchTermcompletedReservations = event.target.value.toLowerCase();
  trArraycompletedReservations.forEach((rowcompletedReservations) => {
    rowcompletedReservations.classList.add("hidden");
    const tdArraycompletedReservations = Array.prototype.slice.call(
      rowcompletedReservations.getElementsByTagName("td")
    );
    tdArraycompletedReservations.forEach((cellcompletedReservations) => {
      if (
        cellcompletedReservations.innerText
          .toLowerCase()
          .indexOf(searchTermcompletedReservations) > -1
      ) {
        rowcompletedReservations.classList.remove("hidden");
      }
    });
  });
};

searchInputcompletedReservations.addEventListener(
  "keyup",
  completedReservationsSearch,
  false
);
