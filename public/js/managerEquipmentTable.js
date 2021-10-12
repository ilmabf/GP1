const searchInput = document.getElementById('managerSearchEquipment')
const table = document.getElementById('managerEquipTab')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const managerEquipTab = event => {
  const searchTerm = event.target.value.toLowerCase()
  trArray.forEach(row => {
    row.classList.add('hiddenEquipRecord')
    const tdArray = Array.prototype.slice.call(row.getElementsByTagName('td'))
    tdArray.forEach(cell => {
      if (cell.innerText.toLowerCase().indexOf(searchTerm) > -1) {
        row.classList.remove('hiddenEquipRecord')
      } 
    })
  })
}

searchInput.addEventListener('keyup', managerEquipTab, false)