<?php

include 'views/user/LoggedInHeader.php';
$items = $_SESSION['itemDetails'];
$details = $_SESSION['equipmentDetails'];
$teams = $_SESSION['teamDetails'];

?>
<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Equipment Details</h2>
</div>
<div style="height: 50px;"></div>


<!-- stock-->

<div class="Table-search" id="viewAllitems-manager">
  <div class="table-wrapper">
    <div style="display:inline-block; width: 100%;">
      <div style="float: left;">
        <input type="search" class="ad-Equip-Search" id="adminSearchItem-manager" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
      </div>
      <div style="float: right;">
        <form action="" method="post">
          <select id="Admin-equipment-teamvise1-manager" name="serviceTeam" class="ad-Equip-Search" onchange="getTeamvise1()">
            <option value="select service team">Select Service Team</option>
            <?php
            $count  = 0;
            while ($count < sizeof($_SESSION['teamDetails'])) {
              echo "<option value='";
              echo $count + 1;
              echo "'>";
              echo $teams[$count]['STL_ID'];
              echo "</option>";
              $count = $count + 1;
            }
            ?>
          </select>
        </form>
      </div>
    </div>
    <table id="ItemTable-manager">
      <thead>
        <tr>
          <th data-type="text">Item ID</th>
          <th data-type="text">Name</th>
          <th data-type="text">Total</th>
          <th data-type="text">Free</th>
          <th colspan="2" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $count = 0;

        while ($count < sizeof($_SESSION['itemDetails'])) { ?>
          <tr>
            <td><?php echo $items[$count]['Item_Id'] ?></td>
            <td><?php echo $items[$count]['Name'] ?></td>
            <td class="td-t1" style="text-align:right"><?php echo $items[$count]['Total'] ?></td>
            <td class="td-t1"><?php echo $items[$count]['Free'] ?></td>
            <td>
              <input type="button" class="edit_btn td-t1" value="View All Items" onclick="viewAllEquipment(<?php echo $items[$count]['Item_Id'] ?>)">
              <input type="button" class="edit_btn td-t1" value="View Free Items" onclick="viewFreeEquipment(<?php echo $items[$count]['Item_Id'] ?>)">
            </td>
          </tr>
        <?php $count = $count + 1;
        } ?>
      </tbody>
    </table>
  </div>
</div>



<!--View All table-->
<div id="viewAllequip-manager" class="Table-search-selected-equip" style="display:none;">
  <div class="table-wrapper">
    <div style="display:inline-block; width: 100%;">
      <div style="float: left;">
        <input type="button" class="backToItem-button" value="<< Items" onclick="backToItem()">
      </div>

      <div style="float: right;">
        <form action="" method="post">
          <select id="Admin-equipment-teamvise2-manager" name="serviceTeam2" class="ad-Equip-Search" onchange="getTeamvise2()">
            <option value="select service team">Select Service Team</option>
            <?php
            $count  = 0;
            while ($count < sizeof($_SESSION['teamDetails'])) {
              echo "<option value='";
              echo $count + 1;
              echo "'>";
              echo $teams[$count]['STL_ID'];
              echo "</option>";
              $count = $count + 1;
            }
            ?>
          </select>
        </form>
      </div>
    </div>
    <table id="viewAsTable-manager">
    <h id="CategoryNameAll" style="text-align: center;display: block;color: #085394;font-weight: bold;margin-bottom: 5px;font-size: x-large;"></h>
      <thead>
        <tr>
          <th data-type="text">Item Code</th>
          <th data-type="text">Model</th>
          <th data-type="text">Price</th>
          <th data-type="text">Date Acquired</th>
          <th data-type="text">Allocated to Team</th>

        </tr>
      </thead>
      <tbody id="Equipment-manager">
      </tbody>
    </table>
  </div>
</div>


<!--View free equipment table-->
<div id="viewFreeEquip-manager" class="Table-search-selected-equip" style="display:none;">
  <div class="table-wrapper">
    <div style="display:inline-block; width: 100%;">
      <div style="float: left;">
        <input type="button" class="backToItem-button" value="<< Items" onclick="backToItem()">
      </div>

      <div style="float: right;">
      </div>
    </div>
    <table>
    <h id="CategoryNameFree" style="text-align: center;display: block;color: #085394;font-weight: bold;margin-bottom: 5px;font-size: x-large;"></h>
      <thead>
        <tr>
          <th data-type="text">Item Code</th>
          <th data-type="text">Model</th>
          <th data-type="text">Price</th>
          <th data-type="text">Date Acquired</th>
          <th data-type="text">Allocated to Team</th>

        </tr>
      </thead>
      <tbody id="FreeEquipment-manager">
      </tbody>
    </table>
  </div>
</div>


<!--View assigned equipment for selected team(click from item table)-->
<div id="viewAssignedEquip-manager" class="Table-search-selected-equip" style="display:none;">
  <div class="table-wrapper">
    <div style="display:inline-block; width: 100%;">
      <div style="float: left;">
        <input type="button" class="backToItem-button" value="<< Items" onclick="backToItem()">
      </div>

      <div style="float: right;">
      </div>
    </div>
    <table>
    <h id="TeamName" style="text-align: center;display: block;color: #085394;font-weight: bold;margin-bottom: 5px;font-size: x-large;"></h>
      <thead>
        <tr>
          <th data-type="text">Equipment ID</th>
          <th data-type="text">Name</th>
          <th data-type="text">Price</th>
          <th data-type="text">Date Acquired</th>
          <th data-type="text">Team</th>

        </tr>
      </thead>
      <tbody id="teamAssignedEquipment-manager">
      </tbody>
    </table>
  </div>
</div>

<!--View assigned equipment for selected team(click from equipment table)-->
<div id="viewAssignedItems-manager" class="Table-search-selected-equip" style="display:none;">
  <div class="table-wrapper">
    <div style="display:inline-block; width: 100%;">
      <div style="float: left;">
        <input type="button" class="backToItem-button" value="<< Equipment" onclick="backToEquipment()">
      </div>

      <div style="float: right;">
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th data-type="text">Equipment ID</th>
          <th data-type="text">Name</th>
          <th data-type="text">Price</th>
          <th data-type="text">Date Acquired</th>
          <th data-type="text">Team</th>

        </tr>
      </thead>
      <tbody id="teamAssignedItem-manager">
      </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>

<div style="min-height: 110px;"></div>
<script src="/public/js/managerEquipmentTable.js"></script>

</main>
<script>
  var items = <?php echo json_encode($_SESSION['itemDetails']); ?>;
  var equipment = <?php echo json_encode($_SESSION['equipmentDetails']); ?>;
  var itemID; //for filter team vise from equipment table
  function viewAllEquipment(n) {
    var i = 0;
    var EquipmentToDisplay = [];
    itemID = n; //for filter team vise from equipment table(team vise 2)
    for (i = 0; i < equipment.length; i++) {
      // console.log(equipment[i]);
      if (equipment[i]['Item_Id'] == n) {
        var TempEq = [];
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['ItemCode'] = equipment[i]['ItemCode'];
        TempEq['Model'] = equipment[i]['Model'];
        document.getElementById("CategoryNameAll").innerHTML = items[n-1]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        EquipmentToDisplay.push(TempEq);
        console.log(EquipmentToDisplay);
      }
    }

    var x = document.getElementById("Equipment-manager");
    console.log(EquipmentToDisplay);
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.innerHTML += "<tr id='rowNo" + j + "'>" +

        "<td>" + EquipmentToDisplay[j]['ItemCode'] + "</td>" +
        "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Model'] + " </td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Price'] + ".00</td>" +
        "<td class='td-t1'>" + EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Team'] + "</td>" +
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
      if (equipment[i]['Item_Id'] == n && equipment[i]['Team'] == null) {
        var TempEq = [];
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['ItemCode'] = equipment[i]['ItemCode'];
        TempEq['Model'] = equipment[i]['Model'];
        document.getElementById("CategoryNameFree").innerHTML = items[n-1]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        EquipmentToDisplay.push(TempEq);
      }
    }

    var x = document.getElementById("FreeEquipment-manager");
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.innerHTML += "<tr id='rowNo" + j + "'>" +

        "<td>" + EquipmentToDisplay[j]['ItemCode'] + "</td>" +
        "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Model'] + " </td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Price'] + ".00</td>" +
        "<td class='td-t1'>" + EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Team'] + "</td>" +
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
    document.getElementById("Equipment-manager").innerHTML = '';
    document.getElementById("FreeEquipment-manager").innerHTML = '';
    document.getElementById("teamAssignedEquipment-manager").innerHTML = '';

  }
  //filter team vise (from item table)
  function getTeamvise1() {
    var x = document.getElementById("Admin-equipment-teamvise1-manager").value;
    var i = 0;
    var EquipmentToDisplay = [];

    for (i = 0; i < equipment.length; i++) {
      if (equipment[i]['Team'] == x) {
        var TempEq = [];
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['Name'] = equipment[i]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        document.getElementById("TeamName").innerHTML = "Equipment assigned to Team " + equipment[i]['Team'];
        EquipmentToDisplay.push(TempEq);
      }
    }

    var x = document.getElementById("teamAssignedEquipment-manager");
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.innerHTML += "<tr id='rowNo" + j + "'>" +

        "<td>" + EquipmentToDisplay[j]['Equipment_ID'] + "</td>" +
        "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Name'] + " </td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Price'] + ".00</td>" +
        "<td class='td-t1'>" + EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Team'] + "</td>" +
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
      if (equipment[i]['Team'] == x && equipment[i]['Item_Id'] == itemID) {
        var TempEq = [];
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['Name'] = equipment[i]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        EquipmentToDisplay.push(TempEq);
      }
    }

    var x = document.getElementById("teamAssignedItem-manager");
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.innerHTML += "<tr id='rowNo" + j + "'>" +

        "<td>" + EquipmentToDisplay[j]['Equipment_ID'] + "</td>" +
        "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Name'] + " </td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Price'] + ".00</td>" +
        "<td class='td-t1'>" + EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
        "<td class='td-t1' style='text-align:right'>" + EquipmentToDisplay[j]['Team'] + "</td>" +
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
    document.getElementById("teamAssignedItem-manager").innerHTML = '';
  }
</script>