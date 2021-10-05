var arrHead = new Array();	// array for header.
    arrHead = ['First Name', 'Last Name', 'Contact Number', 'Email', 'Date Enrolled', 'Salary', 'NIC No', 'Team',''];

var submitBtn = document.getElementById('bt');

var empInsertSuccess = document.getElementById('empAddSuccess');
    // first create TABLE structure with the headers. 
function createTable() {
    var empTable = document.createElement('table');
    empTable.setAttribute('id', 'empTable'); // table id.

    var tr = empTable.insertRow(-1);
    for (var h = 0; h < arrHead.length; h++) {
        var th = document.createElement('th'); // create table headers
        th.innerHTML = arrHead[h];
        tr.appendChild(th);
    }

    var div = document.getElementById('cont');
    div.appendChild(empTable);  // add the TABLE to the container.
}

// now, add a new to the TABLE.
function addRow() {

    submitBtn.style.display = "block";

    var empTab = document.getElementById('empTable');

    var rowCnt = empTab.rows.length;   // table row count.
    var tr = empTab.insertRow(rowCnt); // the table row.
    tr = empTab.insertRow(rowCnt);

    for (var c = 0; c < arrHead.length; c++) {
        var td = document.createElement('td'); // table definition.
        td = tr.insertCell(c);

        if (c == 8) {      // the first column.
            // add a button in every new row in the first column.
            var button = document.createElement('input');

            document.getElementsByTagName("input").required = true;


            // set input attributes.
            button.setAttribute('type', 'button');
            button.setAttribute('value', 'Remove');
            button.setAttribute('id', 'removeBtn');

            // add button's 'onclick' event.
            button.setAttribute('onclick', 'removeRow(this)');

            td.appendChild(button);
        }
        else {
            // 2nd, 3rd and 4th column, will have textbox.
            var ele = document.createElement('input');

            if(c==0){
                ele.setAttribute('name', 'firstName');
                ele.setAttribute('type', 'text');
                ele.setAttribute('required', '');
            }

            else if(c==1){
                ele.setAttribute('name', 'lastName');
                ele.setAttribute('type', 'text');
                ele.setAttribute('required', '');
            }

            else if(c==2){
                ele.setAttribute('name', 'contactNumber');
                ele.setAttribute('type', 'text');
                ele.setAttribute('required', '');
            }

            else if(c==3){
                ele.setAttribute('name', 'email');
                ele.setAttribute('type', 'text');
                ele.setAttribute('required', '');
            }

            else if(c==4){
                ele.setAttribute('name','dateEnrolled');
                ele.setAttribute('type', 'date');
                ele.setAttribute('required', '');
            }

            else if(c==5){
                ele.setAttribute('name','salary');
                ele.setAttribute('type', 'number');
                ele.setAttribute('required', '');
            }

            else if(c==6){
                ele.setAttribute('name','nicNo');
                ele.setAttribute('type', 'text');
                ele.setAttribute('required', '');
            }

            else if(c==7){
                ele.setAttribute('name','team');
                ele.setAttribute('type', 'text');
                ele.setAttribute('placeholder','1 or 2 etc');
                ele.setAttribute('required', '');
            }

            ele.setAttribute('value', '');
            ele.setAttribute('id', 'tb-input');

            td.appendChild(ele);
        }
    }
}

// delete TABLE row function.
function removeRow(oButton) {
    var empTab = document.getElementById('empTable');
    empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.

    submitBtn.style.display = "none";
}

    // function to extract and submit table data.
    // function submit() {
    //     var myTab = document.getElementById('empTable');
    //     var arrValues = new Array();

        
    //     for (row = 1; row < myTab.rows.length - 1; row++) {
        	
    //         for (c = 0; c < myTab.rows[row].cells.length; c++) {  
    //             var element = myTab.rows.item(row).cells[c];
    //             if (element.childNodes[0].getAttribute('type') == 'text') {
    //                 arrValues.push("'" + element.childNodes[0].value + "'");
    //             }
    //         }
    //    }
        
        // The final output.
        //document.getElementById('output').innerHTML = arrValues;
        //console.log (arrValues);   // you can see the array values in your browsers console window. Thanks :-) 
    //}

// setTimeout(function(){
//     empInsertSuccess.show();
//     }, 5000);

