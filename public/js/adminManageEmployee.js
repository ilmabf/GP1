var arrHead = new Array();	// array for header.
    arrHead = ['First Name', 'Last Name', 'Contact Number', 'Email', 'Date Enrolled', 'Salary', 'NIC No', 'Team',''];

var arrStlHead = new Array();    
    arrStlHead = ['Team', 'NIC', 'Photo', ''];

var submitBtn = document.getElementById('bt');

var submitBtnStl = document.getElementById('btStl');

var empInsertSuccess = document.getElementById('empAddSuccess');

var div1 = document.getElementById('cont');
var div2 = document.getElementById('cont2');
    // first create TABLE structure with the headers. 
function createTable() {
    var empTable = document.createElement('table');
    empTable.setAttribute('id', 'empTable'); // table id.

    var tr1 = empTable.insertRow(-1);
    for (var h1 = 0; h1 < arrHead.length; h1++) {
        var th1 = document.createElement('th'); // create table headers
        th1.innerHTML = arrHead[h1];
        tr1.appendChild(th1);
    }

    div1.appendChild(empTable);  // add the TABLE to the container.
}

function createStlAddTable() {
    var stlTable = document.createElement('table');
    stlTable.setAttribute('id', 'stlTable'); // table id.

    var tr2 = stlTable.insertRow(-1);
    for (var h2 = 0; h2 < arrStlHead.length; h2++) {
        var th2 = document.createElement('th'); // create table headers
        th2.innerHTML = arrStlHead[h2];
        tr2.appendChild(th2);
    }

    div2.appendChild(stlTable);  // add the TABLE to the container.
}

// now, add a new to the TABLE.
function addRow() {

    div1.style.display = "block";
    submitBtn.style.display = "block";
    submitBtnStl.style.display = "none";
    div2.style.display = "none";

    var empTab = document.getElementById('empTable');

    var rowCnt1 = empTab.rows.length;   // table row count.
    if(rowCnt1>1){
        return;
    }
    var tr11 = empTab.insertRow(rowCnt1); // the table row.
    tr11 = empTab.insertRow(rowCnt1);

    for (var c1 = 0; c1 < arrHead.length; c1++) {
        var td1 = document.createElement('td'); // table definition.
        td1 = tr11.insertCell(c1);

        if (c1 == 8) {      // the first column.
            // add a button in every new row in the first column.
            var button = document.createElement('input');

            document.getElementsByTagName("input").required = true;


            // set input attributes.
            button.setAttribute('type', 'button');
            button.setAttribute('value', 'Close');
            button.setAttribute('id', 'removeBtn');

            // add button's 'onclick' event.
            button.setAttribute('onclick', 'removeRow(this)');

            td1.appendChild(button);
        }
        else {
            // 2nd, 3rd and 4th column, will have textbox.
            var ele1 = document.createElement('input');

            if(c1==0){
                ele1.setAttribute('name', 'firstName');
                ele1.setAttribute('type', 'text');
                ele1.setAttribute('required', '');
                ele1.setAttribute('maxlength', '50');
            }

            else if(c1==1){
                ele1.setAttribute('name', 'lastName');
                ele1.setAttribute('type', 'text');
                ele1.setAttribute('required', '');
                ele1.setAttribute('maxlength', '50');
            }

            else if(c1==2){
                ele1.setAttribute('name', 'contactNumber');
                ele1.setAttribute('type', 'text');
                ele1.setAttribute('required', '');
                ele1.setAttribute('maxlength', '10');
            }

            else if(c1==3){
                ele1.setAttribute('name', 'email');
                ele1.setAttribute('type', 'email');
                ele1.setAttribute('required', '');
            }

            else if(c1==4){
                ele1.setAttribute('name','dateEnrolled');
                ele1.setAttribute('type', 'date');
                ele1.setAttribute('required', '');
            }

            else if(c1==5){
                ele1.setAttribute('name','salary');
                ele1.setAttribute('type', 'number');
                ele1.setAttribute('required', '');
            }

            else if(c1==6){
                ele1.setAttribute('name','nicNo');
                ele1.setAttribute('type', 'text');
                ele1.setAttribute('required', '');
                ele1.setAttribute('maxlength', '12');
            }

            else if(c1==7){
                ele1.setAttribute('name','team');
                ele1.setAttribute('type', 'number');
                ele1.setAttribute('placeholder','1 or 2 etc');
                ele1.setAttribute('required', '');
            }

            ele1.setAttribute('value', '');
            ele1.setAttribute('id', 'tb-input');

            td1.appendChild(ele1);
        }
    }
}

// delete TABLE row function.
function removeRow(oButton) {
    var empTab = document.getElementById('empTable');
    empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.

    submitBtn.style.display = "none";
    
}

function addStlRow() {


    div2.style.display = "block";
    div1.style.display = "none";

    submitBtnStl.style.display = "block";
    submitBtn.style.display = "none";

    var stlTab = document.getElementById('stlTable');

    var rowCnt2 = stlTab.rows.length;   // table row count.
    if(rowCnt2>1){
        return;
    }
    var tr22 = stlTab.insertRow(rowCnt2); // the table row.
    tr22 = stlTab.insertRow(rowCnt2);

    for (var c2 = 0; c2 < arrStlHead.length; c2++) {
        var td2 = document.createElement('td'); // table definition.
        td2 = tr22.insertCell(c2);

        if (c2 == 3) {      // the first column.
            // add a button in every new row in the first column.
            var button1 = document.createElement('input');

            document.getElementsByTagName("input").required = true;


            // set input attributes.
            button1.setAttribute('type', 'button');
            button1.setAttribute('value', 'Close');
            button1.setAttribute('id', 'removeStlBtn');

            // add button's 'onclick' event.
            button1.setAttribute('onclick', 'removeStlRow(this)');

            td2.appendChild(button1);

        }else{
            var ele2 = document.createElement('input');

            if(c2==0){
                ele2.setAttribute('name', 'stlTeam');
                ele2.setAttribute('type', 'text');
                ele2.setAttribute('required', '');
                ele2.setAttribute('placeholder','1 or 2 etc');
            }

            else if(c2==1){
                ele2.setAttribute('name', 'NIC');
                ele2.setAttribute('type', 'text');
                ele2.setAttribute('required', '');
                ele2.setAttribute('maxlength', '12');
            }

            else if(c2==2){
                ele2.setAttribute('name', 'stlPhoto');
                ele2.setAttribute('type', 'file');
                ele2.setAttribute('required', '');
            }

            ele2.setAttribute('value', '');
            ele2.setAttribute('id', 'tb-Stlinput');

            td2.appendChild(ele2);

        }
        
    }
}

function removeStlRow(oButton) {
    var stlTab = document.getElementById('stlTable');
    stlTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.

    submitBtnStl.style.display = "none";
    
}


createTable();
createStlAddTable();

