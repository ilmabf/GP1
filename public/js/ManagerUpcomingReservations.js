$('#ManagerUpcomingDate').datepicker({
  dateFormat: 'yy-mm-dd',
  onSelect: function(date) {

      document.getElementById("upcomingReservationTable").innerHTML = '';
      var i = 0;
      var list = [];

      for (i = 0; i < orders.length; i++) {
          if (orders[i]['Date'] == date) {
              var order = [];
              order['Reservation_ID'] = orders[i]['Reservation_ID'];
              order['First_Name'] = orders[i]['First_Name'];
              order['Last_Name'] = orders[i]['Last_Name'];
              order['Vehicle_ID'] = orders[i]['Vehicle_ID'];
              order['Date'] = orders[i]['Date'];
              order['Time'] = orders[i]['Time'];
              order['Service_team_leader_ID'] = orders[i]['Service_team_leader_ID'];
              list.push(order);
          }
      }
      var x = document.getElementById("upcomingReservationTable");

      document.getElementById('resCount').innerHTML = list.length;
      for (j = 0; j < list.length; j++) {
          if (list[j]['Reservation_ID'].length == 1) {
              var id = "000" + list[j]['Reservation_ID'];
          } else if (list[j]['Reservation_ID'].length == 2) {
              var id = "00" + list[j]['Reservation_ID'];
          } else if (list[j]['Reservation_ID'].length == 3) {
              var id = "0" + list[j]['Reservation_ID'];
          } else var id = list[j]['Reservation_ID'];

          console.log(list[j]['Service_team_leader_ID']);
          if (list[j]['Service_team_leader_ID'] == null) {

              x.innerHTML += "<tr>" +
                  "<td>" + id + "</td>" +
                  "<td>" + list[j]['First_Name'] + " " + list[j]['Last_Name'] + "</td>" +
                  "<td>" + list[j]['Vehicle_ID'] + "</td>" +
                  "<td>" + list[j]['Date'] + "</td>" +
                  "<td>" + list[j]['Time'] + "</td>" +
                  "<td class='team'>Team not assigned</td>" +
                  "<td class='viewLink'><a href='/booking/upcomingOrder/" + list[j]['Reservation_ID'] +
                  "'>View Order</a></td>" +
                  "</tr>";
              console.log(x);


          } else {
              x.innerHTML += "<tr>" +
                  "<td>" + id + "</td>" +
                  "<td>" + list[j]['First_Name'] + " " + list[j]['Last_Name'] + "</td>" +
                  "<td>" + list[j]['Vehicle_ID'] + "</td>" +
                  "<td>" + list[j]['Date'] + "</td>" +
                  "<td>" + list[j]['Time'] + "</td>" +
                  "<td class='team'>Assigned Service Team " + list[j]['Service_team_leader_ID'] + "</td>" +
                  "<td class='viewLink'><a href='/booking/upcomingOrder/" + list[j]['Reservation_ID'] +
                  "'>View Order</a></td>" +
                  "</tr>";

              console.log(x);

          }
      }
  }
});

function viewList() {
  document.getElementById('resCount').innerHTML = orders.length;
  var x = document.getElementById("upcomingReservationTable");

  for (j = 0; j < orders.length; j++) {
      if (orders[j]['Reservation_ID'].length == 1) {
          var id = "000" + orders[j]['Reservation_ID'];
      } else if (orders[j]['Reservation_ID'].length == 2) {
          var id = "00" + orders[j]['Reservation_ID'];
      } else if (orders[j]['Reservation_ID'].length == 3) {
          var id = "0" + orders[j]['Reservation_ID'];
      } else var id = orders[j]['Reservation_ID'];

      if (orders[j]['Service_team_leader_ID'] == null) {
          x.innerHTML += "<tr>" +
              "<td>" + id + "</td>" +
              "<td>" + orders[j]['First_Name'] + " " + orders[j]['Last_Name'] + "</td>" +
              "<td>" + orders[j]['Vehicle_ID'] + "</td>" +
              "<td>" + orders[j]['Date'] + "</td>" +
              "<td>" + orders[j]['Time'] + "</td>" +
              "<td class='team'>Team not assigned</td>" +
              "<td class='viewLink'><a href='/booking/upcomingOrder/" + orders[j]['Reservation_ID'] +
              "'>View Order</a></td>" +
              "</tr>";
      } else {
          x.innerHTML += "<tr>" +
              "<td>" + id + "</td>" +
              "<td>" + orders[j]['First_Name'] + " " + orders[j]['Last_Name'] + "</td>" +
              "<td>" + orders[j]['Vehicle_ID'] + "</td>" +
              "<td>" + orders[j]['Date'] + "</td>" +
              "<td>" + orders[j]['Time'] + "</td>" +
              "<td class='team'>Assigned Service Team " + orders[j]['Service_team_leader_ID'] + "</td>" +
              "<td class='viewLink'><a href='/booking/upcomingOrder/" + orders[j]['Reservation_ID'] +
              "'>View Order</a></td>" +
              "</tr>";
      }
  }

}
viewList();

const searchInputupcomingReservations = document.getElementById(
  "managerSearchUpcomingReservations"
);
const tableupcomingReservations = document.getElementById(
  "upcomingReservationsSearch"
);
const trArrayupcomingReservations = Array.prototype.slice.call(
  tableupcomingReservations.querySelectorAll("tbody tr")
);

const upcomingReservationsSearch = (event) => {
  const searchTermupcomingReservations = event.target.value.toLowerCase();
  trArrayupcomingReservations.forEach((rowupcomingReservations) => {
    rowupcomingReservations.classList.add("hidden");
    const tdArrayupcomingReservations = Array.prototype.slice.call(
      rowupcomingReservations.getElementsByTagName("td")
    );
    tdArrayupcomingReservations.forEach((cellupcomingReservations) => {
      if (
        cellupcomingReservations.innerText
          .toLowerCase()
          .indexOf(searchTermupcomingReservations) > -1
      ) {
        rowupcomingReservations.classList.remove("hidden");
      }
    });
  });
};

searchInputupcomingReservations.addEventListener(
  "keyup",
  upcomingReservationsSearch,
  false
);
