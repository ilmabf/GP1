var arrHead = new Array();	// array for header.
    arrHead = ['Name', 'Price', 'Date Acquired', ''];

var arrHead2 = new Array();	// array for header.
    arrHead2 = ['Equipment_ID', 'Team',''];

var submitBtn = document.getElementById('submitButton');
var saveBtn = document.getElementById('saveButton');

var div1 = document.getElementById('container1');
var div2 = document.getElementById('container2');

//var equipInsertSuccess = document.getElementById('equipAddSuccess');
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

    
    div1.appendChild(equipTable);  // add the TABLE to the container.
}

function createEquipAssignTable() {
    var equipAssignTable = document.createElement('table');
    equipAssignTable.setAttribute('id', 'equipAssignTable'); // table id.

    var tr1 = equipAssignTable.insertRow(-1);
    for (var h1 = 0; h1 < arrHead2.length; h1++) {
        var th1 = document.createElement('th'); // create table headers
        th1.innerHTML = arrHead2[h1];
        tr1.appendChild(th1);
    }

    div2.appendChild(equipAssignTable);  // add the TABLE to the container.
}
// now, add a new to the TABLE.
function addNewRow() {

    submitBtn.style.display = "block";
    saveBtn.style.display = "none";
    div2.style.display = "none";

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

function removeRow1(removeButton1) {
    var equipTab = document.getElementById('equipTable');
    equipTab.deleteRow(removeButton1.parentNode.parentNode.rowIndex); // button -> td -> tr.

    submitBtn.style.display = "none";
}

function assignEquipment() {
    div2.style.display="block";
    saveBtn.style.display = "block";
    
    submitBtn.style.display = "none";
    div1.style.display = "none";

    var equipAssignTab = document.getElementById('equipAssignTable');

    var rowCnt1 = equipAssignTab.rows.length;   // table row count.
    var tr1 = equipAssignTab.insertRow(rowCnt1); // the table row.
    tr1 = equipAssignTab.insertRow(rowCnt1);

    for (var c1 = 0; c1 < arrHead2.length; c1++) {
        var td1 = document.createElement('td'); // table definition.
        td1 = tr1.insertCell(c1);

        if (c1 == 2) {      // the first column.
            // add a button in every new row in the first column.
            var button1 = document.createElement('input');

            document.getElementsByTagName("input").required = true;


            // set input attributes.
            button1.setAttribute('type', 'button');
            button1.setAttribute('value', 'Close');
            button1.setAttribute('id', 'closeButton');

            // add button's 'onclick' event.
            button1.setAttribute('onclick', 'closeARow(this)');

            td1.appendChild(button1);
        }
        else {
            // 2nd, 3rd and 4th column, will have textbox.
            var ele1 = document.createElement('input');
         
            if(c1==0){
                ele1.setAttribute('name', 'equipment_id');
                ele1.setAttribute('type', 'text');
                ele1.setAttribute('required', '');
            }

            else if(c1==1){
                ele1.setAttribute('name', 'Team');
                ele1.setAttribute('type', 'number');
                ele1.setAttribute('required', '');
            }

            
            ele1.setAttribute('value', '');
            ele1.setAttribute('id', 'tb1-input');

            td1.appendChild(ele1);
        }
    }
}
function closeARow(closeButton) {
    var equipAssignTab = document.getElementById('equipAssignTable');
    equipAssignTab.deleteRow(closeButton.parentNode.parentNode.rowIndex); // button -> td -> tr.

    saveBtn.style.display = "none";
}
