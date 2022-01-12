var arrHead = new Array(); // array for header.
arrHead = ["Category", "Model", "Item Code", "Price", "Date Acquired", ""];

var submitBtn = document.getElementById("submitButton");
var div1 = document.getElementById("container1");

//var arrHeader = new Array();	// array for header.
//    arrHeader = ['Equipment ID', 'Team',''];
//var saveBtn = document.getElementById('saveButton');
//var div2 = document.getElementById('container2');

// first create TABLE structure with the headers.
function createEquipTable() {
  var equipTable = document.createElement("table");
  equipTable.setAttribute("id", "equipTable"); // table id.

  var tr = equipTable.insertRow(-1);
  for (var h = 0; h < arrHead.length; h++) {
    var th = document.createElement("th"); // create table headers
    th.innerHTML = arrHead[h];
    tr.appendChild(th);
  }

  div1.appendChild(equipTable); // add the TABLE to the container.
}

// now, add a new to the TABLE.
function addNewRow() {
  div1.style.display = "block";
  submitBtn.style.display = "block";

  //saveBtn.style.display = "none";
  //div2.style.display = "none";

  var equipTab = document.getElementById("equipTable");

  var rowCnt = equipTab.rows.length; // table row count.
  if (rowCnt > 1) {
    return;
  }
  var tr = equipTab.insertRow(rowCnt); // the table row.
  tr = equipTab.insertRow(rowCnt);

  for (var c = 0; c < arrHead.length; c++) {
    var td = document.createElement("td"); // table definition.
    td = tr.insertCell(c);

    if (c == 5) {
      // the last column.
      // add a button in every new row in the first column.
      var button = document.createElement("input");

      document.getElementsByTagName("input").required = true;

      // set input attributes.
      button.setAttribute("type", "button");
      button.setAttribute("value", "Close");
      button.setAttribute("id", "removeButton1");

      // add button's 'onclick' event.
      button.setAttribute("onclick", "removeRow1(this)");

      td.appendChild(button);
    } else {
      // 2nd, 3rd and 4th column, will have textbox.
      var ele = document.createElement("input");
      if (c == 0) {
        var ele2 = document.createElement("select");
        ele2.setAttribute("name", "item_id");
        ele2.setAttribute("type", "text");
        ele2.setAttribute("required", "");
        //ele.setAttribute('maxlength', '50');items

        for(i = 0;i<items.length;i++){
            var op = document.createElement("option");
            op.setAttribute("value", i+1);
            op.innerHTML = items[i]['Name'];
            ele2.appendChild(op);
        }
        ele2.setAttribute("value", "");
        ele2.setAttribute("id", "tb-input");
        td.appendChild(ele2);
        
      } else if (c == 1) {
        var ele = document.createElement("input");
        ele.setAttribute("name", "name");
        ele.setAttribute("type", "text");
        ele.setAttribute("required", "");
        ele.setAttribute("maxlength", "50");
        ele.setAttribute("value", "");
        ele.setAttribute("id", "tb-input");

        td.appendChild(ele);
      } else if (c == 2) {
        var ele = document.createElement("input");
        ele.setAttribute("name", "itemCode");
        ele.setAttribute("type", "text");
        ele.setAttribute("required", "");
        ele.setAttribute("value", "");
        ele.setAttribute("id", "tb-input");

        td.appendChild(ele);
      } else if (c == 3) {
        var ele = document.createElement("input");
        ele.setAttribute("name", "price");
        ele.setAttribute("type", "number");
        ele.setAttribute("required", "");
        ele.setAttribute("value", "");
        ele.setAttribute("id", "tb-input");

        td.appendChild(ele);
      } else if (c == 4) {
        var ele = document.createElement("input");
        ele.setAttribute("name", "dateAcquired");
        ele.setAttribute("type", "date");
        ele.setAttribute("required", "");
        ele.setAttribute("value", "");
        ele.setAttribute("id", "tb-input");

        td.appendChild(ele);
      }

      // ele.setAttribute('value', '');
      // ele.setAttribute('id', 'tb-input');

      // td.appendChild(ele);
    }
  }
}

// delete TABLE row function.
function removeRow1(removeButton1) {
  var equipTab = document.getElementById("equipTable");
  // equipTab.deleteRow(removeButton1.parentNode.parentNode.rowIndex); // button -> td -> tr.
  if (equipTab.rows.length > 2) {
    equipTab.deleteRow(2);
  }

  if (equipTab.rows.length > 1) {
    equipTab.deleteRow(1);
  }
  submitBtn.style.display = "none";
}

function markAsReturned(id) {
  window.location = "/service/markReturn/" + id;
}
