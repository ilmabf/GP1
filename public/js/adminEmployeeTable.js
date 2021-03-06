// emp search

const searchInput = document.getElementById("adminSearchEmployee");
const table = document.getElementById("filterTable");
const trArray = Array.prototype.slice.call(table.querySelectorAll("tbody tr"));

const filterTable = (event) => {
  const searchTerm = event.target.value.toLowerCase();
  trArray.forEach((row) => {
    row.classList.add("hidden");
    const tdArray = Array.prototype.slice.call(row.getElementsByTagName("td"));
    tdArray.forEach((cell) => {
      if (cell.innerText.toLowerCase().indexOf(searchTerm) > -1) {
        row.classList.remove("hidden");
      }
    });
  });
};

searchInput.addEventListener("keyup", filterTable, false);



function empEditForm(no) {
  // Get the ids of edit and save buttons.
  // Hide edit btn and display the save btn.
  // Get the ids of all the table data.
  // Change the inner html to inputs.
  // Assign values of the inputs to current table data value.
  document.getElementById("edit_emp_btn" + no).style.display = "none";
  document.getElementById("save_emp_btn" + no).style.display = "block";

  var contactNumber = document.getElementById("contactNumber_row" + no);
  var email = document.getElementById("email_row" + no);
  var salary = document.getElementById("salary_row" + no);

  var contactNumberData = contactNumber.innerHTML;
  var emailData = email.innerHTML;
  var salaryData = salary.innerHTML;

  contactNumber.innerHTML =
    "<input type='number' id='contactNumber_text" +
    no +
    "' class='td-t7' name='contactNumberData' value='" +
    contactNumberData +
    "'/>";
  email.innerHTML =
    "<input type='email' id='email_text" +
    no +
    "' class='td-t3' name='emailData' value='" +
    emailData +
    "' />";
  salary.innerHTML =
    "<input type='number' id='salary_text" +
    no +
    "' class='td-t8' name='salaryData' value='" +
    salaryData +
    "'/>";
}

function empSaveForm(id, no) {
  document.getElementById("email_text" + no).type = "email";
  document.getElementById("email_text" + no).required = "true";

  var contactNumberVal = document.getElementById(
    "contactNumber_text" + no
  ).value;
  var emailVal = document.getElementById("email_text" + no).value;
  var salaryVal = document.getElementById("salary_text" + no).value;

  var edit = document.getElementById("editHREF" + no);
  edit.href =
    "/employee/saveEditEmployee/" +
    id +
    "/" +
    contactNumberVal +
    "/" +
    emailVal +
    "/" +
    salaryVal;
}

function empEditAttendanceForm(size) {
  document.getElementById("editButton").style.display = "none";
  var i = 0;
  for (i = 0; i < size; i++) {
    var EmpAttTeam = document.getElementById("Att_Team_row" + i);
    var EmpAttonWork = document.getElementById("Att_OnWork_row" + i);

    var EmpAttTeamData = EmpAttTeam.innerHTML;
    var EmpAttonWorkData = EmpAttonWork.innerHTML;

    EmpAttTeam.innerHTML =
      "<input type='number' id='EmpAttTeam_text" +
      i +
      "' class='td-t7' name='EmpAttTeamData[]' value='" +
      EmpAttTeamData +
      "'/>";
    EmpAttonWork.innerHTML =
      "<input type='checkbox' id='EmpAttonWork_text" +
      i +
      "' class='td-t3' name='EmpAttonWorkData[]' value='" +
      EmpAttonWorkData +
      "' />";
  }
}

function stlEditAttendanceForm(size) {
  document.getElementById("editStlAttButton").style.display = "none";
  var j = 0;
  for (j = 0; j < size; j++) {
    var StlAttonWork = document.getElementById("AttStl_onWork_row" + j);
    var StlAttonWorkData = StlAttonWork.innerHTML;

    StlAttonWork.innerHTML =
      "<input type='checkbox' id='StlAttonWork_text" +
      j +
      "' class='td-t3' name='StlAttonWorkData[]' value='" +
      StlAttonWorkData +
      "' />";
  }
}

function stlEditForm(no) {
  document.getElementById("edit_stl_btn" + no).style.display = "none";
  document.getElementById("save_stl_btn" + no).style.display = "block";

  var contactNumberStl = document.getElementById("stlContactNumber_row" + no);
  var emailStl = document.getElementById("stlEmail_row" + no);
  var salaryStl = document.getElementById("stlSalary_row" + no);

  var contactNumberStlData = contactNumberStl.innerHTML;
  var emailStlData = emailStl.innerHTML;
  var salaryStlData = salaryStl.innerHTML;

  contactNumberStl.innerHTML =
    "<input type='number' id='stlContactNumber_text" +
    no +
    "' class='td-t7' name='contactNumberStlData' value='" +
    contactNumberStlData +
    "'/>";
  emailStl.innerHTML =
    "<input type='email' id='stlEmail_text" +
    no +
    "' class='td-t3' name='emailStlData' value='" +
    emailStlData +
    "' />";
  salaryStl.innerHTML =
    "<input type='number' id='stlSalary_text" +
    no +
    "' class='td-t8' name='salaryStlData' value='" +
    salaryStlData +
    "'/>";
}

function stlSaveForm(id, no) {
  document.getElementById("stlEmail_text" + no).type = "email";
  document.getElementById("stlEmail_text" + no).required = "true";

  var stlcontactNumberVal = document.getElementById(
    "stlContactNumber_text" + no
  ).value;
  var stlemailVal = document.getElementById("stlEmail_text" + no).value;
  var stlsalaryVal = document.getElementById("stlSalary_text" + no).value;

  var editStl = document.getElementById("editStlHREF" + no);
  editStl.href =
    "/employee/saveEditSTL/" +
    id +
    "/" +
    stlcontactNumberVal +
    "/" +
    stlemailVal +
    "/" +
    stlsalaryVal;
}

function stlOnWork() {
  document.getElementById("search-btn-stl").style.display = "none";
  document.getElementById("stlGoBackBtn").style.display = "block";
  document.getElementById("stlMgDefaultTable").style.display = "none";
  document.getElementById("stlonWorkTable").style.display = "block";
  document.getElementById("stlNotWorkTable").style.display = "none";
}

function stlNotWork() {
  document.getElementById("search-btn-stl").style.display = "none";
  document.getElementById("stlGoBackBtn").style.display = "block";
  document.getElementById("stlonWorkTable").style.display = "none";
  document.getElementById("stlMgDefaultTable").style.display = "none";
  document.getElementById("stlNotWorkTable").style.display = "block";
}

function empOnWork() {
  document.getElementById("search-btn-emps").style.display = "none";
  document.getElementById("goBackBtn").style.display = "block";
  document.getElementById("empDefaultTable").style.display = "none";
  document.getElementById("emponWorkTable").style.display = "block";
  document.getElementById("empNotWorkTable").style.display = "none";
}

function empNotWork() {
  document.getElementById("search-btn-emps").style.display = "none";
  document.getElementById("goBackBtn").style.display = "block";
  document.getElementById("emponWorkTable").style.display = "none";
  document.getElementById("empDefaultTable").style.display = "none";
  document.getElementById("empNotWorkTable").style.display = "block";
}

function empWorkGoBack() {
  document.getElementById("search-btn-emps").style.display = "block";
  document.getElementById("goBackBtn").style.display = "none";
  document.getElementById("empDefaultTable").style.display = "block";
  document.getElementById("emponWorkTable").style.display = "none";
  document.getElementById("empNotWorkTable").style.display = "none";
}

function stlWorkGoBack() {
  document.getElementById("search-btn-stl").style.display = "block";
  document.getElementById("stlGoBackBtn").style.display = "none";
  document.getElementById("stlMgDefaultTable").style.display = "block";
  document.getElementById("stlonWorkTable").style.display = "none";
  document.getElementById("stlNotWorkTable").style.display = "none";
}

function empAttendance() {
  document.getElementById("EmpAttendance-nav").style.display = "none";
  document.getElementById("EmpDetails-nav").style.display = "inline-flex";

  document.getElementById("empDetailsTable").style.display = "none";
  document.getElementById("empAttendanceTable").style.display = "block";
}

function empDetails() {
  document.getElementById("EmpDetails-nav").style.display = "none";
  document.getElementById("EmpAttendance-nav").style.display = "block";

  document.getElementById("empDetailsTable").style.display = "block";
  document.getElementById("empAttendanceTable").style.display = "none";
}

function stlAttendance() {
  document.getElementById("StlAttendance-nav").style.display = "none";
  document.getElementById("StlDetails-nav").style.display = "inline-flex";

  document.getElementById("stlDetailsTable").style.display = "none";
  document.getElementById("stlAttendanceTable").style.display = "block";
}

function stlDetails() {
  document.getElementById("StlDetails-nav").style.display = "none";
  document.getElementById("StlAttendance-nav").style.display = "block";

  document.getElementById("stlDetailsTable").style.display = "block";
  document.getElementById("stlAttendanceTable").style.display = "none";
}

function TeamCount() {
  document.getElementById("teamCountInput").style.display = "none";
}
