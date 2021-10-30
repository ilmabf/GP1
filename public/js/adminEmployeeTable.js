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
  // Get the ids of edit and save buttons.
  // Hide edit btn and display the save btn. 
  // Get the ids of all the table data. 
  // Change the inner html to inputs. 
  // Assign values of the inputs to current table data value. 
    document.getElementById("edit_emp_btn"+no).style.display="none";
    document.getElementById("save_emp_btn"+no).style.display="block";

    var contactNumber = document.getElementById("contactNumber_row"+no);
    var email = document.getElementById("email_row"+no);
    var salary = document.getElementById("salary_row"+no);

    var contactNumberData = contactNumber.innerHTML;
    var emailData = email.innerHTML;
    var salaryData = salary.innerHTML;

    contactNumber.innerHTML = "<input type='number' id='contactNumber_text"+no+"' class='td-t7' name='contactNumberData' value='"+contactNumberData+"'>";
    email.innerHTML = "<input type='email' id='email_text"+no+"' class='td-t3' name='emailData' value='"+emailData+"' />";
    salary.innerHTML = "<input type='number' id='salary_text"+no+"' class='td-t8' name='salaryData' value='"+salaryData+"'>";

}


function empSaveForm(id, no) {

  var contactNumberVal = document.getElementById("contactNumber_text"+no).value;
  document.getElementById("email_text"+no).setAttribute('type', 'email');
  var emailVal = document.getElementById("email_text"+no).value;
  var salaryVal = document.getElementById("salary_text"+no).value;

  var edit = document.getElementById("editHREF"+no);
  edit.href = "/employee/saveEditEmployee/"+ id + "/" + contactNumberVal + "/"+ emailVal + "/"+salaryVal;


}
