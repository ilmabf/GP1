var itemID; //for filter team vise from equipment table
function viewAllEquipment(n) {
  var i = 0;
  var EquipmentToDisplay = [];
  itemID = n; //for filter team vise from equipment table(team vise 2)
  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Item_Id"] == n) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["ItemCode"] = equipment[i]["ItemCode"];
      TempEq["Model"] = equipment[i]["Model"];
      document.getElementById("CategoryNameAll").innerHTML =
        items[n - 1]["Name"];
      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
      console.log(EquipmentToDisplay);
    }
  }

  var x = document.getElementById("Equipment-manager");
  console.log(EquipmentToDisplay);
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
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Team"] +
      "</td>" +
      "</tr>" +
      "</tbody>";
  }
  var y = document.getElementById("viewAllitems-manager");
  y.style.display = "none";
  document.getElementById("viewAllequip-manager").style = "display:flex;";
}

function viewFreeEquipment(n) {
  var i = 0;
  var EquipmentToDisplay = [];

  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Item_Id"] == n && equipment[i]["Team"] == null) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["ItemCode"] = equipment[i]["ItemCode"];
      TempEq["Model"] = equipment[i]["Model"];
      document.getElementById("CategoryNameFree").innerHTML =
        items[n - 1]["Name"];
      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
    }
  }

  var x = document.getElementById("FreeEquipment-manager");
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
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Team"] +
      "</td>" +
      "</tr>" +
      "</tbody>";
  }
  var x = document.getElementById("viewAllitems-manager");
  x.style.display = "none";

  document.getElementById("viewFreeEquip-manager").style = "display:flex;";
}

//back to item table
function backToItem() {
  document.getElementById("viewAllitems-manager").style = "display:flex;";
  document.getElementById("viewAllequip-manager").style = "display:none;";
  document.getElementById("viewFreeEquip-manager").style = "display:none;";
  document.getElementById("viewAssignedEquip-manager").style = "display:none;";
  document.getElementById("Equipment-manager").innerHTML = "";
  document.getElementById("FreeEquipment-manager").innerHTML = "";
  document.getElementById("teamAssignedEquipment-manager").innerHTML = "";
}
//filter team vise (from item table)
function getTeamvise1() {
  var x = document.getElementById("Admin-equipment-teamvise1-manager").value;
  var i = 0;
  var EquipmentToDisplay = [];

  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Team"] == x) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["Name"] = equipment[i]["Name"];
      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      document.getElementById("TeamName").innerHTML =
        "Equipment assigned to Team " + equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
    }
  }

  var x = document.getElementById("teamAssignedEquipment-manager");
  for (j = 0; j < EquipmentToDisplay.length; j++) {
    x.innerHTML +=
      "<tr id='rowNo" +
      j +
      "'>" +
      "<td>" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      "</td>" +
      "<td style='text-align:left' class='td-t1'> " +
      EquipmentToDisplay[j]["Name"] +
      " </td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Price"] +
      ".00</td>" +
      "<td class='td-t1'>" +
      EquipmentToDisplay[j]["Date_Acquired"] +
      "</td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Team"] +
      "</td>" +
      "</tr>" +
      "</tbody>";
  }
  var x = document.getElementById("viewAllitems-manager");
  x.style.display = "none";
  document.getElementById("viewAssignedEquip-manager").style = "display:flex;";
}
//filter team vise (from all equipment table)
function getTeamvise2() {
  var x = document.getElementById("Admin-equipment-teamvise2-manager").value;
  var i = 0;
  var EquipmentToDisplay = [];

  for (i = 0; i < equipment.length; i++) {
    if (equipment[i]["Team"] == x && equipment[i]["Item_Id"] == itemID) {
      var TempEq = [];
      TempEq["Equipment_ID"] = equipment[i]["Equipment_ID"];
      TempEq["Name"] = equipment[i]["Name"];
      TempEq["Price"] = equipment[i]["Price"];
      TempEq["Date_Acquired"] = equipment[i]["Date_Acquired"];
      TempEq["Team"] = equipment[i]["Team"];
      EquipmentToDisplay.push(TempEq);
    }
  }

  var x = document.getElementById("teamAssignedItem-manager");
  for (j = 0; j < EquipmentToDisplay.length; j++) {
    x.innerHTML +=
      "<tr id='rowNo" +
      j +
      "'>" +
      "<td>" +
      EquipmentToDisplay[j]["Equipment_ID"] +
      "</td>" +
      "<td style='text-align:left' class='td-t1'> " +
      EquipmentToDisplay[j]["Name"] +
      " </td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Price"] +
      ".00</td>" +
      "<td class='td-t1'>" +
      EquipmentToDisplay[j]["Date_Acquired"] +
      "</td>" +
      "<td class='td-t1' style='text-align:right'>" +
      EquipmentToDisplay[j]["Team"] +
      "</td>" +
      "</tr>" +
      "</tbody>";
  }
  var y = document.getElementById("viewAllequip-manager");
  y.style.display = "none";
  document.getElementById("viewAssignedItems-manager").style = "display:flex;";
}
//back to equipment table
function backToEquipment() {
  document.getElementById("viewAllequip-manager").style = "display:flex;";
  document.getElementById("viewAssignedItems-manager").style = "display:none;";
  document.getElementById("teamAssignedItem-manager").innerHTML = "";
}
