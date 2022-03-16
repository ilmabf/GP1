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

<script>
  var items = <?php echo json_encode($_SESSION['itemDetails']); ?>;
  var equipment = <?php echo json_encode($_SESSION['equipmentDetails']); ?>;
</script>
<script src="/public/js/managerEquipmentTable.js"></script>
</main>
<script src="/public/js/ManagerEquipment.js"></script>