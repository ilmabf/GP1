$("#ManagerUpcomingDate").datepicker({
  dateFormat: "yy-mm-dd",
  onSelect: function (date) {
    document.getElementById("customerUpcomingReservations").innerHTML = "";

    var i = 0;
    var list = [];

    for (i = 0; i < orders.length; i++) {
      if (orders[i]["Date"] == date) {
        var order = [];
        order["Reservation_ID"] = orders[i]["Reservation_ID"];
        order["Vehicle_ID"] = orders[i]["Vehicle_ID"];
        order["Time"] = orders[i]["Time"];
        order["Service_team_leader_ID"] = orders[i]["Service_team_leader_ID"];
        order["Date"] = orders[i]["Date"];
        list.push(order);
      }
    }
    var x = document.getElementById("customerUpcomingReservations");

    for (j = 0; j < list.length; j++) {
      console.log(list[j]["Service_team_leader_ID"]);
      if (list[j]["Service_team_leader_ID"] == null) {
        x.innerHTML +=
          "<div class='sub-box1' >" +
          "<div class='order'>" +
          "<div class='orderitem'>Vehicle No</div>" +
          "<div class='orderitem1'>" +
          list[j]["Vehicle_ID"] +
          "</div>" +
          "</div>" +
          "<div class='order'>" +
          "<div class='orderitem'>Date</div>" +
          "<div class='orderitem1'>" +
          list[j]["Date"] +
          "</div>" +
          "</div>" +
          "<div class='order'>" +
          "<div class='orderitem'>Time</div>" +
          "<div class='orderitem1'>" +
          list[j]["Time"] +
          "</div>" +
          "</div>" +
          "<div class='orderView'>" +
          "<p class='viewLink'><a href='/booking/upcomingOrder/" +
          list[j]["Reservation_ID"] +
          "'>View order</a></p>" +
          "<p class='team'>Team not assigned</p>" +
          "</div>" +
          "</div>";
      } else {
        x.innerHTML +=
          "<div class='sub-box1' >" +
          "<div class='order'>" +
          "<div class='orderitem'>Vehicle No</div>" +
          "<div class='orderitem1'>" +
          list[j]["Vehicle_ID"] +
          "</div>" +
          "</div>" +
          "<div class='order'>" +
          "<div class='orderitem'>Date</div>" +
          "<div class='orderitem1'>" +
          list[j]["Date"] +
          "</div>" +
          "</div>" +
          "<div class='order'>" +
          "<div class='orderitem'>Time</div>" +
          "<div class='orderitem1'>" +
          list[j]["Time"] +
          "</div>" +
          "</div>" +
          "<div class='orderView'>" +
          "<p class='viewLink'><a href='/booking/upcomingOrder/" +
          list[j]["Reservation_ID"] +
          "'>View order</a></p>" +
          "<p class='team'>A service team has been assigned for you</p>" +
          "</div>" +
          "</div>";
      }
    }
  },
});

function viewList() {
  var x = document.getElementById("customerUpcomingReservations");

  for (j = 0; j < orders.length; j++) {
    if (orders[j]["Service_team_leader_ID"] == null) {
      x.innerHTML +=
        "<div class='sub-box1' >" +
        "<div class='order'>" +
        "<div class='orderitem'>Vehicle No</div>" +
        "<div class='orderitem1'>" +
        orders[j]["Vehicle_ID"] +
        "</div>" +
        "</div>" +
        "<div class='order'>" +
        "<div class='orderitem'>Date</div>" +
        "<div class='orderitem1'>" +
        orders[j]["Date"] +
        "</div>" +
        "</div>" +
        "<div class='order'>" +
        "<div class='orderitem'>Time</div>" +
        "<div class='orderitem1'>" +
        orders[j]["Time"] +
        "</div>" +
        "</div>" +
        "<div class='orderView'>" +
        "<p class='viewLink'><a href='/booking/upcomingOrder/" +
        orders[j]["Reservation_ID"] +
        "'>View order</a></p>" +
        "<p class='team'>Team not assigned</p>" +
        "</div>" +
        "</div>";
    } else {
      x.innerHTML +=
        "<div class='sub-box1' >" +
        "<div class='order'>" +
        "<div class='orderitem'>Vehicle No</div>" +
        "<div class='orderitem1'>" +
        orders[j]["Vehicle_ID"] +
        "</div>" +
        "</div>" +
        "<div class='order'>" +
        "<div class='orderitem'>Date</div>" +
        "<div class='orderitem1'>" +
        orders[j]["Date"] +
        "</div>" +
        "</div>" +
        "<div class='order'>" +
        "<div class='orderitem'>Time</div>" +
        "<div class='orderitem1'>" +
        orders[j]["Time"] +
        "</div>" +
        "</div>" +
        "<div class='orderView'>" +
        "<p class='viewLink'><a href='/booking/upcomingOrder/" +
        orders[j]["Reservation_ID"] +
        "'>View order</a></p>" +
        "<p class='team'>A service team has been assigned for you</p>" +
        "</div>" +
        "</div>";
    }
  }
}
viewList();
