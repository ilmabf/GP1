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
