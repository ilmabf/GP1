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
