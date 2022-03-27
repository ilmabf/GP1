
const searchInput5 = document.getElementById("managerMgSearchSTL");
const table5 = document.getElementById("stlMgDefaultTable");
const trArray5 = Array.prototype.slice.call(
  table5.querySelectorAll("tbody tr")
);

const stlMgDefaultTable = (event) => {
  const searchTerm5 = event.target.value.toLowerCase();
  trArray5.forEach((row5) => {
    row5.classList.add("hidden");
    const tdArray5 = Array.prototype.slice.call(
      row5.getElementsByTagName("td")
    );
    tdArray5.forEach((cell5) => {
      if (cell5.innerText.toLowerCase().indexOf(searchTerm5) > -1) {
        row5.classList.remove("hidden");
      }
    });
  });
};

searchInput5.addEventListener("keyup", stlMgDefaultTable, false);
