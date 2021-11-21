const searchInput = document.getElementById('adminSearchEquipment')
const table = document.getElementById('viewAsTable')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const viewAsTable = event => {

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

searchInput.addEventListener('keyup', viewAsTable, false)

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
 //--------------------------------------------------------
 function viewAllEquipment(){
   var x = document.getElementById("viewAllequip");
   var y = document.getElementById("viewAllitems");
    if (x.style.display == "none") {
    x.style.display = "flex";
    y.style.visibility = "hidden";
    } else {
    x.style.display = "none";
    y.style.display = "flex";
    }

 }