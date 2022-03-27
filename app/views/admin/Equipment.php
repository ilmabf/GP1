<?php

include 'views/user/LoggedInHeader.php';
$items = $_SESSION['itemDetails'];
$details = $_SESSION['equipmentDetails'];
$teams = $_SESSION['teamDetails'];

?>

<main>

  <div style="min-height: 110px;"></div>
  <h2 class="manageEmployee-heading">Manage Equipment</h2>

  <div id="equipmentNewBtns">
    <input type="button" id="addNewRow" value="Add Equipment" style="display:inline-block;text-align:center;" onclick="addNewRow();" />
  </div>

  <div id="addAnewCategory">

    <form action="/service/addNewCategory" method="post">
      <table>
        <thead>
          <tr style="padding: 10px 10px;">
            <th data-type="text" style="padding: -10px -10px;">Category</th>
            <th colspan="2" style="text-align: center;"> </th>
          </tr>
        </thead>
        <tbody id="newEquipmentCategory">
          <tr>
            <td class='td-t1'><input type="text" name="category" id="category" required /></td>
            <td class='td-t1'><input type="submit" name="addCategory" id="submitCategory" value="Add" class="addCategory-button"></td>
          </tr>
        </tbody>
      </table>

    </form>

  </div>


  <body onload="createEquipTable()">
    <div id="newEquipTable">
      <form action="/service/addNewEquipment" name="Form" method="post">
        <div id="container1">

        </div>
        <input type="submit" id="submitButton" value="Insert Data" />
      </form>
    </div>

    <!-- stock-->

    <div style="height: 100px;"></div>
    <div class="Table-search" id="viewAllitems">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
            <input type="search" class="ad-Equip-Search" id="adminSearchItem" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
          </div>
          <div style="float: right;">
            <form action="" method="post">
              <select id="Admin-equipment-teamvise1" name="serviceTeam" class="ad-Equip-Search" onchange="getTeamvise1()">
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
              <!-- <th data-type="text">ID</th> -->
              <th data-type="text">Category</th>
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
                <!-- <td><?php echo $items[$count]['Item_Id'] ?></td> -->
                <td><?php echo $items[$count]['Name'] ?></td>
                <td class="td-t1" style="text-align:right"><?php echo $items[$count]['Total'] ?></td>
                <td class="td-t1"><?php echo $items[$count]['Free'] ?></td>
                <td>
                  <input type="button" class="edit_btn td-t1" value="View All Items" onclick="viewAllEquipment(<?php echo $items[$count]['Item_Id'] ?> , <?php echo $count ?>)">
                  <input type="button" class="edit_btn td-t1" value="View Free Items" onclick="viewFreeEquipment(<?php echo $items[$count]['Item_Id'] ?> , <?php echo $count ?>)">
                </td>
              </tr>
            <?php $count = $count + 1;
            } ?>
          </tbody>
        </table>
      </div>
    </div>



    <!--View All table-->
    <div id="viewAllequip" class="Table-search-selected-equip" style="display:none;">
      <div class="table-wrapper">
        <div style="display:inline-block; width: 100%;">
          <div style="float: left;">
            <input type="button" class="backToItem-button" value="<< Items" onclick="backToItem()">
          </div>

          <div style="float: right;">
            <form action="" method="post">
              <select id="Admin-equipment-teamvise2" name="serviceTeam2" class="ad-Equip-Search" onchange="getTeamvise2()">
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
          <h id="CategoryNameAll" style="text-align: center;display: block;color: #085394;font-weight: bold;margin-bottom: 5px;font-size: x-large;"></h>
          <thead>
            <tr>
              <th data-type="text">Item Code</th>
              <th data-type="text">Model</th>
              <th data-type="text">Price</th>
              <th data-type="text">Date Acquired</th>
              <th data-type="text">Allocated Team</th>
              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody id="Equipment">
          </tbody>
        </table>
      </div>
    </div>


    <!--View free equipment table-->
    <div id="viewFreeEquip" class="Table-search-selected-equip" style="display:none;">
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
              <th data-type="text">Allocated Team</th>
              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody id="FreeEquipment">
          </tbody>
        </table>
      </div>
    </div>


    <!--View assigned equipment for selected team(click from item table)-->
    <div id="viewAssignedEquip" class="Table-search-selected-equip" style="display:none;">
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
              <th data-type="text">Item Code</th>
              <th data-type="text">Category</th>
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

    <!--View assigned equipment for selected team(click from equipment table)-->
    <div id="viewAssignedItems" class="Table-search-selected-equip" style="display:none;">
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
              <th data-type="text">Category</th>
              <th data-type="text">Price</th>
              <th data-type="text">Date Acquired</th>
              <th data-type="text">Team</th>
              <th colspan="2" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody id="teamAssignedItem">
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
</script>