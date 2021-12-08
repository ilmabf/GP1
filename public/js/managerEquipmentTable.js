const searchInput = document.getElementById('adminSearchItem-manager')
const table = document.getElementById('ItemTable-manager')
const trArray = Array.prototype.slice.call(table.querySelectorAll('tbody tr'))

const ItemTable-manager = event => {

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
searchInput.addEventListener('keyup', ItemTable-manager, false)
