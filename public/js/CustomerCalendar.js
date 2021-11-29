const date = new Date();
var h, i, j, z;

const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;

  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];

  document.querySelector(".date p").innerHTML = new Date().toDateString();

  var days = "";

  for (var x = firstDayIndex; x > 0; x--) {
    h = prevLastDay - x + 1;
    days += `<div class="prev-date">
                
              </div>`;
    // days += timeSlotsHTML;
  }

  for (i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">
                <span class="today-1">${i}</span>
                <br>
                <span class="time" onclick="getTimeAndDate(i)">8-10</span>
                <span class="time" onclick="getTimeAndDate(i)">10-12</span>
                <span class="time" onclick="getTimeAndDate(i)">12-2</span>
                <span class="time" onclick="getTimeAndDate(i)">2-4</span>
                <span class="time" onclick="getTimeAndDate(i)">4-6</span>
              </div>`;
    } else {
      days += `<div class="today-t">
                  <span class="today-t1">${i}</span>
                  <br>
                  <span class="time" onclick="getTimeAndDate(i)">8-10</span>
                  <span class="time" onclick="getTimeAndDate(i)">10-12</span>
                  <span class="time" onclick="getTimeAndDate(i)">12-2</span>
                  <span class="time" onclick="getTimeAndDate(i)">2-4</span>
                  <span class="time" onclick="getTimeAndDate(i)">4-6</span>  
              </div>`;
    }
  }

  for (j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">
                
            </div>`;
    // days += timeSlotsHTML;
    monthDays.innerHTML = days;
  }
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

// get time and date
function getTimeAndDate(z) {
  var time1;
  var time = document.getElementsByClassName("time");
  for (var k = 0; k < time.length; k++) {
    time[k].addEventListener("click", function () {
      time1 = this.innerHTML;
    });
  }
  alert("Time: " + time1 + "\nDate: " + z);
}

renderCalendar();
