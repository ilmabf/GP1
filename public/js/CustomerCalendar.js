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
                <span class="time" id = "slot1" onclick="getTimeAndDate(`+ i +`, 1)">8-10</span>
                <span class="time" id = "slot2" onclick="getTimeAndDate(`+ i +`, 2)">10-12</span>
                <span class="time" id = "slot3" onclick="getTimeAndDate(`+ i +`, 3)">12-2</span>
                <span class="time" id = "slot4" onclick="getTimeAndDate(`+ i +`, 4)">2-4</span>
                <span class="time" id = "slot5" onclick="getTimeAndDate(`+ i +`, 5)">4-6</span>
              </div>`;
    } else {
      days += `<div class="today-t">
                  <span class="today-t1">${i}</span>
                  <br>
                  <span class="time" id = "slot1" onclick="getTimeAndDate(`+ i +`,1)">8-10</span>
                  <span class="time" id = "slot2" onclick="getTimeAndDate(`+ i +`,2)">10-12</span>
                  <span class="time" id = "slot3" onclick="getTimeAndDate(`+ i +`,3)">12-2</span>
                  <span class="time" id = "slot4" onclick="getTimeAndDate(`+ i +`,4)">2-4</span>
                  <span class="time" id = "slot5" onclick="getTimeAndDate(`+ i +`,5)">4-6</span>  
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
function getTimeAndDate(date, t) {
  var time;
  // // var time = document.getElementsByClassName("time");
  // for (i = 1; i <= lastDay; i++) {
    
  //   time.addEventListener("click", function () {
  //     time1 = this.innerHTML;
  //   });
  // }
  if(t==1 ){time = "8-10";}
  else if(t==2){ time = "10-12";}
  else if(t==3){ time = "12-2";}
  else if(t==4){ time = "2-4";}
  else if(t==5){ time = "4-6";}
  alert("Time: " + time + "\nDate: " + date);
  // window.location("")
}

renderCalendar();