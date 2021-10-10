var arrHead = new Array();	// array for header.
    arrHead = ['Name', 'Price', 'Date Acquired', ''];

var submitBtn = document.getElementById('submitButton');
var equipInsertSuccess = document.getElementById('equipAddSuccess');
    // first create TABLE structure with the headers. 
function createEquipTable() {
    var equipTable = document.createElement('table');
    equipTable.setAttribute('id', 'equipTable'); // table id.

    var tr = equipTable.insertRow(-1);
    for (var h = 0; h < arrHead.length; h++) {
        var th = document.createElement('th'); // create table headers
        th.innerHTML = arrHead[h];
        tr.appendChild(th);
    }

    var div = document.getElementById('container');
    div.appendChild(equipTable);  // add the TABLE to the container.
}

// now, add a new to the TABLE.
function addNewRow() {

    submitBtn.style.display = "block";

    var equipTab = document.getElementById('equipTable');

    var rowCnt = equipTab.rows.length;   // table row count.
    var tr = equipTab.insertRow(rowCnt); // the table row.
    tr = equipTab.insertRow(rowCnt);

    for (var c = 0; c < arrHead.length; c++) {
        var td = document.createElement('td'); // table definition.
        td = tr.insertCell(c);

        if (c == 3) {      // the first column.
            // add a button in every new row in the first column.
            var button = document.createElement('input');

            document.getElementsByTagName("input").required = true;


            // set input attributes.
            button.setAttribute('type', 'button');
            button.setAttribute('value', 'Close');
            button.setAttribute('id', 'removeButton1');

            // add button's 'onclick' event.
            button.setAttribute('onclick', 'removeRow1(this)');

            td.appendChild(button);
        }
        else {
            // 2nd, 3rd and 4th column, will have textbox.
            var ele = document.createElement('input');
         
            if(c==0){
                ele.setAttribute('name', 'name');
                ele.setAttribute('type', 'text');
                ele.setAttribute('required', '');
            }

            else if(c==1){
                ele.setAttribute('name', 'price');
                ele.setAttribute('type', 'number');
                ele.setAttribute('required', '');
            }

            else if(c==2){
                ele.setAttribute('name','dateAcquired');
                ele.setAttribute('type', 'date');
                ele.setAttribute('required', '');
            }
            
            ele.setAttribute('value', '');
            ele.setAttribute('id', 'tb-input');

            td.appendChild(ele);
        }
    }
}

// delete TABLE row function.
function removeRow1(oButton) {
    var equipTab = document.getElementById('equipTable');
    equipTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.

    submitBtn.style.display = "none";
}


