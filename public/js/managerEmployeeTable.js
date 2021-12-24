const searchInput4 = document.getElementById("managerSearchEmployee");
const table4 = document.getElementById("empDefaultTable");
const trArray4 = Array.prototype.slice.call(
  table4.querySelectorAll("tbody tr")
);

const empDefaultTable = (event) => {
  const searchTerm4 = event.target.value.toLowerCase();
  trArray4.forEach((row4) => {
    row4.classList.add("hidden");
    const tdArray4 = Array.prototype.slice.call(
      row4.getElementsByTagName("td")
    );
    tdArray4.forEach((cell4) => {
      if (cell4.innerText.toLowerCase().indexOf(searchTerm4) > -1) {
        row4.classList.remove("hidden");
      }
    });
  });
};

searchInput4.addEventListener("keyup", empDefaultTable, false);

const searchInput5 = document.getElementById("managerSearchSTL");
const table5 = document.getElementById("stlDefaultTable");
const trArray5 = Array.prototype.slice.call(
  table5.querySelectorAll("tbody tr")
);

const stlDefaultTable = (event) => {
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

searchInput5.addEventListener("keyup", stlDefaultTable, false);
