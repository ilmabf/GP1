const searchInput = document.getElementById('managerSearchEquipment')
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