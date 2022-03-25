var itemID; //for filter team vise from equipment table
function viewAllEquipment(n, count) {
  var i = 0;
  var EquipmentToDisplay = [];
  itemID = n; //for filter team vise from equipment table(team vise 2)
  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Item_Id"] == n) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["ItemCode"] = equipment[i]["ItemCode"];
      TempEq["Model"] = equipment[i]["Model"];
      document.getElementById("CategoryNameAll").innerHTML = items[count]["Name"];
      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
      console.log(EquipmentToDisplay);
    }
  }

  var x = document.getElementById("Equipment");
  console.log(EquipmentToDisplay);
  for (j = 0; j < EquipmentToDisplay.length; j++) {
    if (EquipmentToDisplay[j]["Team"] == null) {
      x.innerHTML +=
        "<tr id='rowNo" +
        j +
        "'>" +
        "<td>" +
        EquipmentToDisplay[j]["ItemCode"] +
        "</td>" +
        "<td class='td-t1' style='text-align:right'>" +
        EquipmentToDisplay[j]["Model"] +
        "</td>" +
        "<td class='td-t1' style='text-align:right'>" +
        EquipmentToDisplay[j]["Price"] +
        ".00</td>" +
        "<td class='td-t1'>" +
        EquipmentToDisplay[j]["Date_Acquired"] +
        "</td>" +
        "<td id='assignedTeam_row" +
        j +
        "' class='td-t1' style='text-align:right'>" +
        EquipmentToDisplay[j]["Team"] +
        "</td><td>" +
        "<input type='button' id='edit_equip_btn" +
        j +
        "' class='edit_btn td-t1' value='Assign a Team' onclick='editEquipment(" +
        j +
        ")'>" +
        "<a href='' id='editLink" +
        j +
        "'><input style='margin: auto;' type='submit' id='save_equip_btn" +
        j +
        "' class='save_btn' value='Save' onclick='saveEquipment(" +
        EquipmentToDisplay[j]["Equipment_ID"] +
        "," +
        j +
        ")'></a>" +
        "<a href='/service/deleteEquipment/" +
        EquipmentToDisplay[j]["Equipment_ID"] +
        "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment(" +
        j +
        ")'></a></td>" +
        "</tr>";
    } else {
      x.innerHTML +=
        "<tr id='rowNo" +
        j +
        "'>" +
        "<td>" +
        EquipmentToDisplay[j]["ItemCode"] +
        "</td>" +
        "<td class='td-t1' style='text-align:right'>" +
        EquipmentToDisplay[j]["Model"] +
        "</td>" +
        "<td class='td-t1' style='text-align:right'>" +
        EquipmentToDisplay[j]["Price"] +
        ".00</td>" +
        "<td class='td-t1'>" +
        EquipmentToDisplay[j]["Date_Acquired"] +
        "</td>" +
        "<td id='assignedTeam_row" +
        j +
        "' class='td-t1' style='text-align:right'>" +
        EquipmentToDisplay[j]["Team"] +
        "</td><td>" +
        "<input type='button' id='edit_equip_btn" +
        j +
        "' class='edit_btn td-t1' value='Mark as returned' onclick='markAsReturned(" +
        EquipmentToDisplay[j]["Equipment_ID"] +
        ")'>" +
        "<a href='/service/deleteEquipment/" +
        EquipmentToDisplay[j]["Equipment_ID"] +
        "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment(" +
        j +
        ")'></a></td>" +
        "</tr>";
    }
  }
  x.innerHTML += "</tbody>";
  console.log(x.innerHTML);
  var y = document.getElementById("viewAllitems");
  y.style.display = "none";
  document.getElementById("viewAllequip").style = "display:flex;";
}

function viewFreeEquipment(n, count) {
  var i = 0;
  var EquipmentToDisplay = [];

  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Item_Id"] == n && equipment[i]["Team"] == null) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["ItemCode"] = equipment[i]["ItemCode"];
      TempEq["Model"] = equipment[i]["Model"];
      document.getElementById("CategoryNameFree").innerHTML =
        items[count]["Name"];
      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
    }
  }

  var x = document.getElementById("FreeEquipment");
  for (j = 0; j < EquipmentToDisplay.length; j++) {
    x.innerHTML +=
      "<tr id='rowNo" +
      j +
      "'>" +
      "<td>" +
      EquipmentToDisplay[j]["ItemCode"] +
      "</td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Model"] +
      "</td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Price"] +
      ".00</td>" +
      "<td class='td-t1'>" +
      EquipmentToDisplay[j]["Date_Acquired"] +
      "</td>" +
      "<td id='assignedTeam_row" +
      j +
      "' class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Team"] +
      "</td>" +
      "<td> <input type='button' id='edit_equip_btn" +
      j +
      "' class='edit_btn td-t1' value='Assign a Team' onclick='editEquipment(" +
      j +
      ")'>" +
      "<a href='' id='editLink" +
      j +
      "'><input style='margin: auto;' type='submit' id='save_equip_btn" +
      j +
      "' class='save_btn' value='Save' onclick='saveEquipment(" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      "," +
      j +
      ")'></a>" +
      "</td> <td><a href='/service/deleteEquipment/" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment(" +
      j +
      ")'></a></td>" +
      "</tr>" +
      "</tbody>";
  }
  var x = document.getElementById("viewAllitems");
  x.style.display = "none";

  document.getElementById("viewFreeEquip").style = "display:flex;";
}

//back to item table
function backToItem() {
  document.getElementById("viewAllitems").style = "display:flex;";
  document.getElementById("viewAllequip").style = "display:none;";
  document.getElementById("viewFreeEquip").style = "display:none;";
  document.getElementById("viewAssignedEquip").style = "display:none;";
  document.getElementById("Equipment").innerHTML = "";
  document.getElementById("FreeEquipment").innerHTML = "";
  document.getElementById("teamAssignedEquipment").innerHTML = "";
}
//filter team vise (from item table)
function getTeamvise1() {
  var x = document.getElementById("Admin-equipment-teamvise1").value;
  var i = 0;
  var EquipmentToDisplay = [];

  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Team"] == x) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["ItemCode"] = equipment[i]["ItemCode"];

      for (j = 0; j < items.length; j++) {
        if (equipment[i]["Item_Id"] == items[j]["Item_Id"]) {
          TempEq["Model"] = items[j]["Name"];
        }
      }

      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      // TempEq['Team'] = equipment[i]['Team'];
      document.getElementById("TeamName").innerHTML =
        "Equipment assigned to Team " + equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
    }
  }

  var x = document.getElementById("teamAssignedEquipment");
  for (j = 0; j < EquipmentToDisplay.length; j++) {
    x.innerHTML +=
      "<tr id='rowNo" +
      j +
      "'>" +
      "<td>" +
      EquipmentToDisplay[j]["ItemCode"] +
      "</td>" +
      "<td style='text-align:left' class='td-t1'> " +
      EquipmentToDisplay[j]["Model"] +
      " </td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Price"] +
      ".00</td>" +
      "<td class='td-t1'>" +
      EquipmentToDisplay[j]["Date_Acquired"] +
      "</td>" + "<td><input type='button' id='edit_equip_btn" +
      j +
      "' class='edit_btn td-t1' value='Mark as returned' onclick='markAsReturned(" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      ")'>" +
      "</td> <td><a href='/service/deleteEquipment/" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment(" +
      j +
      ")'></a></td>" +
      "</tr>" +
      "</tbody>";
  }
  var x = document.getElementById("viewAllitems");
  x.style.display = "none";
  document.getElementById("viewAssignedEquip").style = "display:flex;";
}
//filter team vise (from all equipment table)
function getTeamvise2() {
  var x = document.getElementById("Admin-equipment-teamvise2").value;
  var i = 0;
  var EquipmentToDisplay = [];

  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Team"] == x && equipment[i]["Item_Id"] == itemID) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["ItemCode"] = equipment[i]["ItemCode"];
      for (j = 0; j < items.length; j++) {
        if (equipment[i]["Item_Id"] == items[j]["Item_Id"]) {
          TempEq["Model"] = items[j]["Name"];
        }
      }

      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
    }
  }

  var x = document.getElementById("teamAssignedItem");
  for (j = 0; j < EquipmentToDisplay.length; j++) {
    x.innerHTML +=
      "<tr id='rowNo" +
      j +
      "'>" +
      "<td>" +
      EquipmentToDisplay[j]["ItemCode"] +
      "</td>" +
      "<td style='text-align:left' class='td-t1'> " +
      EquipmentToDisplay[j]["Model"] +
      " </td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Price"] +
      ".00</td>" +
      "<td class='td-t1'>" +
      EquipmentToDisplay[j]["Date_Acquired"] +
      "</td>" +
      "<td id='assignedTeam_row" +
      j +
      "' class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Team"] +
      "</td>" +
      "<td><input type='button' id='edit_equip_btn" +
      j +
      "' class='edit_btn td-t1' value='Mark as returned' onclick='markAsReturned(" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      ")'>" +
      "</td> <td><a href='/service/deleteEquipment/" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment(" +
      j +
      ")'></a></td>" +
      "</tr>" +
      "</tbody>";
  }
  var y = document.getElementById("viewAllequip");
  y.style.display = "none";
  document.getElementById("viewAssignedItems").style = "display:flex;";
}
//back to equipment table
function backToEquipment() {
  document.getElementById("viewAllequip").style = "display:flex;";
  document.getElementById("viewAssignedItems").style = "display:none;";
  document.getElementById("teamAssignedItem").innerHTML = "";
}

var arrHead = new Array(); // array for header.
arrHead = ["Category", "Model", "Item Code", "Price", "Date Acquired", ""];

var submitBtn = document.getElementById("submitButton");
var div1 = document.getElementById("container1");

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
  document.getElementById("addNewRow").style = "opacity:1.0;";
  div1.style.display = "block";
  submitBtn.style.display = "block";
  document.getElementById("addAnewCategory").style = "display:none;";
  document.getElementById("newEquipTable").style = "display:block;";
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
        var ele3 = document.createElement("button");
        ele2.setAttribute("name", "item_id");
        ele2.setAttribute("type", "text");
        ele2.setAttribute("required", "");

        ele3.setAttribute("type", "button");
        ele3.setAttribute("value", "Add");
        ele3.setAttribute("onclick", "addItem()");
        ele3.setAttribute("id", "addNewCategoryItem");
        ele3.style.width = "30px";
        ele3.style.height = "20px";
        ele3.style.marginLeft = "5px";
        ele3.style.marginTop = "5px";
        ele3.style.backgroundColor = "white";
        ele3.style.border = "1px solid black";
        ele3.style.borderRadius = "5px";
        ele3.style.color = "black";
        ele3.style.fontSize = "10px";
        ele3.style.fontWeight = "bold";
        ele3.style.textAlign = "center";
        ele3.style.padding = "0px";
        ele3.style.cursor = "pointer";
        ele3.innerHTML = "Add";

        for (i = 0; i < items.length; i++) {
          var op = document.createElement("option");
          op.setAttribute("value", items[i]['Item_Id']);
          op.innerHTML = items[i]["Name"];
          ele2.appendChild(op);
        }
        ele2.setAttribute("value", "");
        ele2.setAttribute("id", "tb-input");
        td.appendChild(ele2);
        td.appendChild(ele3);
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
    }
  }
}

// delete TABLE row function.
function removeRow1(removeButton1) {
  var equipTab = document.getElementById("equipTable");
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

function addItem() {
  document.getElementById("addAnewCategory").style = "display : block;";
  document.getElementById("newEquipTable").style = "display : none;";
  document.getElementById("addNewRow").style = "opacity:0.4;";
}
