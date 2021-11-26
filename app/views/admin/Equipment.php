<?php

include 'views/user/LoggedInHeader.php';
$items = $_SESSION['itemDetails'];
$details = $_SESSION['equipmentDetails'];
// $freeDetails = $_SESSION['freeEquipmentDetails'];

?>

<main>

  <div style="min-height: 110px;"></div>
  <h2 class="manageEmployee-heading">Manage Equipment</h2>

  <div style="display:block;text-align:center;">
    <input type="button" id="addNewRow" value="Add Equipment" style="display:inline-block;text-align:center;" onclick="addNewRow();" />
    <!--<input type="button" id="assignEquipment" value="Assign To a Team" style="display:inline-block;text-align:center;" onclick="assignEquipment(); " />-->
  </div>

  <body onload="createEquipTable()">
    <div>
      <form action="/service/addNewEquipment" name="Form" method="post">
        <div id="container1">

        </div>
        <input type="submit" id="submitButton" value="Insert Data" />
      </form>
    </div>

    <!--<div>
      <form action="/service/assignEquipment" method="post">
        <div id="container2">
        </div>
        <input type="submit" id="saveButton" value="Assign Equipment" />
      </form>
    </div>-->

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
              <select name="serviceTeam" class="ad-Equip-Search">
                <option value="select service team">Select Service Team</option>
                <option value="Team 1">Team 1</option>
                <option value="Team 2">Team 2</option>
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
                <td>Default</td>
                <td class="td-t1" style="text-align:right"><?php echo $items[$count]['Total'] ?></td>
                <td class="td-t1"><?php echo $items[$count]['Free'] ?></td>
                <td>
                  <input type="button" class="edit_btn td-t1" value="View All Items" onclick="viewAllEquipment(<?php echo $items[$count]['Item_Id'] ?>)">
                  <a href="/service/viewFreeEquipment/<?php echo $items[$count]['Item_Id'] ?>"> <input type="button" class="edit_btn td-t1" value="View Free Items" onclick="viewFreeEquipment()"></a>
                </td>
              </tr>
            <?php $count = $count + 1;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /service/viewAllEquipment/<?php echo $items[$count]['Item_Id'] ?> -->
    <div style="height: 50px;"></div>

    <!--View All table-->
    <div id="viewAllequip" class="Table-search-selected-equip" style = "display:none;">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
            <input type="search" class="ad-Equip-Search" id="adminSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
          </div>

          <div style="float: right;">
            <form action="" method="post">
              <select name="serviceTeam" class="ad-Equip-Search" id="AdminserviceTeamLeaders-types">
                <option value="select service team">Select Service Team</option>
                <option value="Team 1">Team 1</option>
                <option value="Team 2">Team 2</option>
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
            <input type="search" class="ad-Equip-Search" id="adminSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
          </div>

          <div style="float: right;">
            <form action="" method="post">
              <select name="serviceTeam" class="ad-Equip-Search" id="AdminserviceTeamLeaders-types">
                <option value="select service team">Select Service Team</option>
                <option value="Team 1">Team 1</option>
                <option value="Team 2">Team 2</option>
              </select>
            </form>
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
          <tbody>

            <?php
            $count = 0;

            while ($count < sizeof($_SESSION['freeEquipmentDetails'])) { ?>
              <tr id="rowNo<?php $count ?>">

                <td><?php echo $freeDetails[$count]['Equipment_ID'] ?></td>
                <td style="text-align:left" class="td-t1"><?php echo $freeDetails[$count]['Name'] ?></td>
                <td class="td-t1" style="text-align:right"><?php echo $freeDetails[$count]['Price'] ?>.00</td>
                <td class="td-t1"><?php echo $freeDetails[$count]['Date_Acquired'] ?></td>
                <td id="<?php echo "assignedTeam_row" . $count ?>" class="td-t1" style="text-align:right"><?php echo $freeDetails[$count]['Team'] ?></td>
                <td>
                  <input type="button" id="<?php echo "assign_equip_btn" . $count ?>" class="edit_btn td-t1" value="Assign a Team" onclick="editEquipment('<?php echo $count ?>')">
                  <a href="" id="<?php echo "editAssignLink" . $count ?>"><input style="margin: auto;" type="submit" id="<?php echo "save_equip_btn" . $count ?>" class="save_btn" value="Save" onclick="saveEquipment('<?php echo $freeDetails[$count]['Equipment_ID'] ?>','<?php echo $count ?>')"></a>
                </td>
                <td><a href="/service/deleteEquipment/<?php echo $freeDetails[$count]['Equipment_ID'] ?>"> <input type="button" class="del_btn td-t1" value="Delete" onclick="deleteEquipment('<?php echo $count ?>')"></a></td>
              </tr>
            <?php $count = $count + 1;
            } ?>

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
</script>