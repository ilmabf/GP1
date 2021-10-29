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

    
    var name = document.getElementById("name_row"+no);
    var price = document.getElementById("price_row"+no);
    var dateAcquired = document.getElementById("dateAcquired_row"+no);
    var team = document.getElementById("assignedTeam_row"+no);

    var nameData = name.innerHTML;
    var priceData = price.innerHTML;
    var dateAcquiredData = dateAcquired.innerHTML;
    var teamData = team.innerHTML;

    name.innerHTML = "<input type='text' id='name_text"+no+"' class='td-t222' value='"+nameData+"'>";
    price.innerHTML = "<input type='number' id='price_text"+no+"' class='td-t22' value='"+priceData+"'>";
    dateAcquired.innerHTML = "<input type='date' id='dateAcquired_text"+no+"' class='td-t4' value='"+dateAcquiredData+"'>";
    team.innerHTML = "<input type='number' id='assignedTeam_text"+no+"' class='td-t5' value='"+teamData+"'>";

}
function saveEquipment(no){
    var nameVal = document.getElementById("name_text"+no).value;
    var priceVal = document.getElementById("price_text"+no).value;
    var dateAcquiredVal=document.getElementById("dateAcquired_text"+no).value;
    var teamVal=document.getElementById("assignedTeam_text"+no).value;

    document.getElementById("name_row"+no).innerHTML=nameVal;
    document.getElementById("price_row"+no).innerHTML=priceVal;
    document.getElementById("dateAcquired_row"+no).innerHTML=dateAcquiredVal;
    document.getElementById("assignedTeam_row"+no).innerHTML=teamVal;

    document.getElementById("edit_equip_btn"+no).style.display="block";
    document.getElementById("save_equip_btn"+no).style.display="none";


}
 //function deleteEquipment(no){
  //   document.getElementById("rowNo"+no+"").innerHTML="";
 //}