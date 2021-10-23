const searchInput = document.getElementById('adminSearchEmployee')
const table = document.getElementById('filterTable')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const filterTable = event => {
  const searchTerm = event.target.value.toLowerCase()
  trArray.forEach(row => {
    row.classList.add('hidden')
    const tdArray = Array.prototype.slice.call(row.getElementsByTagName('td'))
    tdArray.forEach(cell => {
      if (cell.innerText.toLowerCase().indexOf(searchTerm) > -1) {
        row.classList.remove('hidden')
      } 
    })
  })
}

searchInput.addEventListener('keyup', filterTable, false)


function empEditForm(no) {
    //console.log(no);
    //console.log("firstName_row"+no);
    document.getElementById("edit_emp_btn"+no).style.display="none";
    document.getElementById("save_emp_btn"+no).style.display="block";
    //console.log("firstName_row"+no);

    var firstName = document.getElementById("firstName_row"+no);
    var lastName = document.getElementById("lastName_row"+no);
    var contactNumber = document.getElementById("contactNumber_row"+no);
    var email = document.getElementById("email_row"+no);
    var dateEnrolled = document.getElementById("dateEnrolled_row"+no);
    var salary = document.getElementById("salary_row"+no);
    var nicNo = document.getElementById("nicNo_row"+no);
    var team = document.getElementById("team_row"+no);
    var stlId = document.getElementById("stlId_row"+no);
    var stlPhoto = document.getElementById("stlPhoto_row"+no);


    var firstNameData = firstName.innerHTML;
    var lastNameData = lastName.innerHTML;
    var contactNumberData = contactNumber.innerHTML;
    var emailData = email.innerHTML;
    var dateEnrolledData = dateEnrolled.innerHTML;
    var salaryData = salary.innerHTML;
    var nicNoData = nicNo.innerHTML;
    var teamData = team.innerHTML;
    var stlIdData = stlId.innerHTML;
    var stlPhotoData = stlPhoto.innerHTML;


    firstName.innerHTML = "<input type='text' id='firstName_text"+no+"' class='td-t2' value='"+firstNameData+"'>";
    lastName.innerHTML = "<input type='text' id='lastName_text"+no+"' class='td-t2' value='"+lastNameData+"'>";
    contactNumber.innerHTML = "<input type='number' id='contactNumber_text"+no+"' class='td-t7' value='"+contactNumberData+"'>";
    email.innerHTML = "<input type='email' id='email_text"+no+"' class='td-t3' value='"+emailData+"'>";
    dateEnrolled.innerHTML = "<input type='date' id='dateEnrolled_text"+no+"' class='td-t4' value='"+dateEnrolledData+"'>";
    salary.innerHTML = "<input type='number' id='salary_text"+no+"' class='td-t2' value='"+salaryData+"'>";
    nicNo.innerHTML = "<input type='text' id='nicNo_text"+no+"' class='td-t6' value='"+nicNoData+"'>";
    team.innerHTML = "<input type='number' id='team_text"+no+"' class='td-t5' value='"+teamData+"'>";
    stlId.innerHTML = "<input type='number' id='stlId_text"+no+"' class='td-t5' value='"+stlIdData+"'>";
    stlPhoto.innerHTML = "<input type='text' id='stlPhoto_text"+no+"' class='td-t5' value='"+stlPhotoData+"'>";

}


function empSaveForm(no) {
    var firstNameVal = document.getElementById("firstName_text"+no).value;
    var lastNameVal = document.getElementById("lastName_text"+no).value;
    var contactNumberVal = document.getElementById("contactNumber_text"+no).value;
    var emailVal = document.getElementById("email_text"+no).value;
    var dateEnrolledVal = document.getElementById("dateEnrolled_text"+no).value;
    var salaryVal = document.getElementById("salary_text"+no).value;
    var nicNoVal = document.getElementById("nicNo_text"+no).value;
    var teamVal = document.getElementById("team_text"+no).value;
    var stlIdVal = document.getElementById("stlId_text"+no).value;
    var stlPhotoVal = document.getElementById("stlPhoto_text"+no).value;

    document.getElementById("firstName_row"+no).innerHTML = firstNameVal;
    document.getElementById("lastName_row"+no).innerHTML = lastNameVal;
    document.getElementById("contactNumber_row"+no).innerHTML = contactNumberVal;
    document.getElementById("email_row"+no).innerHTML = emailVal;
    document.getElementById("dateEnrolled_row"+no).innerHTML = dateEnrolledVal;
    document.getElementById("salary_row"+no).innerHTML = salaryVal;
    document.getElementById("nicNo_row"+no).innerHTML = nicNoVal;
    document.getElementById("team_row"+no).innerHTML = teamVal;
    document.getElementById("stlId_row"+no).innerHTML = stlIdVal;
    document.getElementById("stlPhoto_row"+no).innerHTML = stlPhotoVal;

    document.getElementById("edit_emp_btn"+no).style.display="block";
    document.getElementById("save_emp_btn"+no).style.display="none";

}

function empDeleteForm(no) {
    document.getElementById("row"+no+"").outerHTML="";
}