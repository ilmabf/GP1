const searchInput = document.getElementById('managerSearchEmployee')
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