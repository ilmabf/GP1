<?php

include 'views/user/LoggedInHeader.php';
$items = $_SESSION['itemDetails'];
$details = $_SESSION['equipmentDetails'];
$teams = $_SESSION['teamDetails'];

?>

<main>

  <div style="min-height: 110px;"></div>
  <h2 class="manageEmployee-heading">Manage Equipment</h2>

  <div style="display:block;text-align:center;">
    <input type="button" id="addNewRow" value="Add Equipment" style="display:inline-block;text-align:center;" onclick="addNewRow();" />
  </div>

  <body onload="createEquipTable()">
    <div>
      <form action="/service/addNewEquipment" name="Form" method="post">
        <div id="container1">

        </div>
        <input type="submit" id="submitButton" value="Insert Data" />
      </form>
    </div>

    <!-- stock-->
 
    <div style="height: 50px;"></div>
    <div class="Table-search" id="viewAllitems">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
            <input type="search" class="ad-Equip-Search" id="adminSearchItem" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
          </div>
          <div style="float: right;">
            <form action="" method="post">
              <select id="Admin-equipment-teamvise1" name="serviceTeam" class="ad-Equip-Search" onchange="getTeamvise1()" >
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
        <table id="ItemTable">
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
    <div id="viewAllequip" class="Table-search-selected-equip" style = "display:none;">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
          <input type="button" class="edit_btn td-t1" value="<< Items" onclick="backToItems()">
          </div>

          <div style="float: right;">
            <form action="" method="post">
              <select id="Admin-equipment-teamvise2" name="serviceTeam2" class="ad-Equip-Search" onchange="getTeamvise1()" >
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
        <table id="viewAsTable">
          <thead>
            <tr>
              <th data-type="text">Equipment ID</th>
              <th data-type="text">Name</th>
              <th data-type="text">Price</th>
              <th data-type="text">Date Acquired</th>
              <th data-type="text">Team</th>
              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody id="Equipment">
          </tbody>
        </table>
      </div>
    </div>
       

    <!--View free equipment table-->
    <div id="viewFreeEquip" class="Table-search-selected-equip" style = "display:none;">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
            <input type="button" class="edit_btn td-t1" value="<< Items" onclick="backToItems()">
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
              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody id="freeEquipment">
          </tbody>
        </table>
      </div>
    </div>
    <!--View assigned equipment for selected team(click from item table)-->
    <div id="viewAssignedEquip" class="Table-search-selected-equip" style = "display:none;">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
            <input type="button" class="edit_btn td-t1" value="<< Items" onclick="backToItems()">
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
              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody id="teamAssignedEquipment">
          </tbody>
        </table>
      </div>
    </div>

    <div style="min-height: 110px;"></div>


    <script src="/public/js/AdminManageEquipment.js"></script>
    <script src="/public/js/AdminEquipmentTable.js"></script>

</main>
<script>
  var items = <?php echo json_encode($_SESSION['itemDetails']); ?>;
  var equipment = <?php echo json_encode($_SESSION['equipmentDetails']); ?>;
  console.log(items);
  console.log(equipment);

  function viewAllEquipment(n) {
    var k = 0;
    var i = 0;
    var EquipmentToDisplay = [];
    var TempEq = [];
    for (i = 0; i < equipment.length; i++) {
      console.log(equipment[i]);
      if (equipment[i]['Item_Id'] == n) {
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['Name'] = equipment[i]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        EquipmentToDisplay[k] = TempEq;
        k++;
      }
    }

    console.log(EquipmentToDisplay);
    var x = document.getElementById("Equipment");
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.outerHTML += "<tr id='rowNo" + j + "'>" +

        "<td>" + EquipmentToDisplay[j]['Equipment_ID'] + "</td>" +
        "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Name'] +" </td>"+
      "<td class='td-t1' style='text-align:right'>"+ EquipmentToDisplay[j]['Price'] +".00</td>" +
      "<td class='td-t1'>"+EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
      "<td id='assignedTeam_row" + j + "' class='td-t1' style='text-align:right'>"+ EquipmentToDisplay[j]['Team'] + "</td>" +
      "<td> <input type='button' id='edit_equip_btn" + j + "' class='edit_btn td-t1' value='Assign a Team' onclick='editEquipment('" + j + "')'>" +
      "<a href='' id='editLink" + j + "'><input style='margin: auto;' type='submit' id='save_equip_btn" + j +  "' class='save_btn' value='Save' onclick='saveEquipment('" + EquipmentToDisplay[j]['Equipment_ID'] + "','"+ j + "')'></a>" +
      "</td> <td><a href='/service/deleteEquipment/" + EquipmentToDisplay[j]['Equipment_ID'] + "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment('" + j + "')'></a></td>" +
      "</tr>" +
      "</tbody>";
    }
    var x = document.getElementById("viewAllitems");
    x.style.display = "none";viewAllequip
    document.getElementById("viewAllequip").style = "display:flex;";
  }
  //View free equipment function
   function viewFreeEquipment(n) {
    var k = 0;
    var i = 0;
    var EquipmentToDisplay = [];
    var TempEq = [];
    for (i = 0; i < equipment.length; i++) {
      console.log(equipment[i]);
      if (equipment[i]['Item_Id'] == n && equipment[i]['Team'] == null) {
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['Name'] = equipment[i]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        EquipmentToDisplay[k] = TempEq;
        k++;
      }
    }

    console.log(EquipmentToDisplay);
    var x = document.getElementById("freeEquipment");
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.outerHTML += "<tr id='rowNo" + j + "'>" +

        "<td>" + EquipmentToDisplay[j]['Equipment_ID'] + "</td>" +
        "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Name'] +" </td>"+
      "<td class='td-t1' style='text-align:right'>"+ EquipmentToDisplay[j]['Price'] +".00</td>" +
      "<td class='td-t1'>"+EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
      "<td id='assignedTeam_row" + j + "' class='td-t1' style='text-align:right'>"+ EquipmentToDisplay[j]['Team'] + "</td>" +
      "<td> <input type='button' id='edit_equip_btn" + j + "' class='edit_btn td-t1' value='Assign a Team' onclick='editEquipment('" + j + "')'>" +
      "<a href='' id='editLink" + j + "'><input style='margin: auto;' type='submit' id='save_equip_btn" + j +  "' class='save_btn' value='Save' onclick='saveEquipment('" + EquipmentToDisplay[j]['Equipment_ID'] + "','"+ j + "')'></a>" +
      "</td> <td><a href='/service/deleteEquipment/" + EquipmentToDisplay[j]['Equipment_ID'] + "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment('" + j + "')'></a></td>" +
      "</tr>" +
      "</tbody>";
    }
    var x = document.getElementById("viewAllitems");
    x.style.display = "none";viewFreeEquip
    document.getElementById("viewFreeEquip").style = "display:flex;";
  }

//back to item table
function backToItems(){
    var x = document.getElementById("viewAllitems");
    x.style.display="flex";
    var y = document.getElementById("viewAllequip");
    var z = document.getElementById("viewFreeEquip"); 
    var q = document.getElementById("viewAssignedEquip"); 
    y.style.display ="none";
    z.style.display ="none";
    q.style.display ="none";

}
//filter team vise (from item table)
  function getTeamvise1(){
    var x =  document.getElementById("Admin-equipment-teamvise1").value;
    var k = 0;
    var i = 0;
    var EquipmentToDisplay = [];
    var TempEq = [];
    for (i = 0; i < equipment.length; i++) {
      console.log(equipment[i]);
      if (equipment[i]['Team'] == x) {
        TempEq['Equipment_ID'] = equipment[i]['Equipment_ID'];
        TempEq['Name'] = equipment[i]['Name'];
        TempEq['Price'] = equipment[i]['Price'];
        TempEq['Date_Acquired'] = equipment[i]['Date_Acquired'];
        TempEq['Team'] = equipment[i]['Team'];
        EquipmentToDisplay[k] = TempEq;
        k++;
      }
    }

    console.log(EquipmentToDisplay);
    var x = document.getElementById("teamAssignedEquipment");
    for (j = 0; j < EquipmentToDisplay.length; j++) {
      x.outerHTML += "<tr id='rowNo" + j + "'>" +

      "<td>" + EquipmentToDisplay[j]['Equipment_ID'] + "</td>" +
      "<td style='text-align:left' class='td-t1'> " + EquipmentToDisplay[j]['Name'] +" </td>"+
      "<td class='td-t1' style='text-align:right'>"+ EquipmentToDisplay[j]['Price'] +".00</td>" +
      "<td class='td-t1'>"+EquipmentToDisplay[j]['Date_Acquired'] + "</td>" +
      "<td id='assignedTeam_row" + j + "' class='td-t1' style='text-align:right'>"+ EquipmentToDisplay[j]['Team'] + "</td>" +
      "<td> <input type='button' id='edit_equip_btn" + j + "' class='edit_btn td-t1' value='Assign a Team' onclick='editEquipment('" + j + "')'>" +
      "<a href='' id='editLink" + j + "'><input style='margin: auto;' type='submit' id='save_equip_btn" + j +  "' class='save_btn' value='Save' onclick='saveEquipment('" + EquipmentToDisplay[j]['Equipment_ID'] + "','"+ j + "')'></a>" +
      "</td> <td><a href='/service/deleteEquipment/" + EquipmentToDisplay[j]['Equipment_ID'] + "'> <input type='button' class='del_btn td-t1' value='Delete' onclick='deleteEquipment('" + j + "')'></a></td>" +
      "</tr>" +
      "</tbody>";
    }
    var x = document.getElementById("viewAllitems");
    x.style.display = "none";viewAssignedEquip
    document.getElementById("viewAssignedEquip").style = "display:flex;";
    
}
 
</script>