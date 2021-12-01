const searchInput = document.getElementById('adminSearchItem')
const table = document.getElementById('ItemTable')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const ItemTable = event => {

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

searchInput.addEventListener('keyup', ItemTable, false)

function editEquipment(no){
    document.getElementById("edit_equip_btn"+no).style.display="none";
    document.getElementById("save_equip_btn"+no).style.display="block";

    var team = document.getElementById("assignedTeam_row"+no);
    var teamData = team.innerHTML;
    team.innerHTML = "<input type='number' id='assignedTeam_text"+no+"' class='td-t5' name='teamData' value='"+teamData+"'>";
  
}
 
function saveEquipment(id,no){
  
    var teamVal = document.getElementById("assignedTeam_text"+no).value;
   
    var edit = document.getElementById("editLink"+no);
    edit.href = "/service/editEquipment/"+ id + "/" + teamVal;

    document.getElementById("edit_equip_btn"+no).style.display="block";
    document.getElementById("save_equip_btn"+no).style.display="none";

}

 function deleteEquipment(no){
     document.getElementById("rowNo"+no+"").innerHTML="";
 }
<<<<<<< HEAD
 
=======
 //--------------------------------------------------------

  
>>>>>>> 97b6d742b3adabebf310921d262bb02fbd4f9a3e
 