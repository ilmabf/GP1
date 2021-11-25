<?php

include 'views/user/LoggedInHeader.php';
 $items = $_SESSION['itemDetails'];
           
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
            <input type="search" class="ad-Equip-Search"onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
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
           
            while ($count < $_SESSION['rowCount']) { ?>
              <tr>            
                <td><?php echo $items [$count]['Item_Id'] ?></td>    
                <td>Default</td>
                <td class="td-t1" style="text-align:right"><?php echo $items [$count]['Total'] ?></td>
                <td class="td-t1"><?php echo $items [$count]['Free'] ?></td>
                 <td>     
                  <a href="/service/viewAllEquipment/<?php echo $items [$count]['Item_Id'] ?>"><input type="button" class="edit_btn td-t1" value="View All Items" onclick="viewAllEquipment()"></a>
                  <a href="/service/viewFreeEquipment/<?php echo $items [$count]['Item_Id'] ?>"> <input type="button" class="edit_btn td-t1" value="View Free Items" onclick="viewFreeEquipment()"></a>
                  </td> 
              </tr>
            <?php $count = $count + 1;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
    
     <div style="height: 50px;"></div>

     <!--View table-
    <div id="viewAllequip" class="Table-search-selected-equip" >
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
          <tbody>

            <?php
            $count = 0;
             $details = $_SESSION['equipmentDetails'];
            while ($count < $_SESSION['rowCount']) { ?>
              <tr id="rowNo<?php $count ?>">
            
                <td><?php echo $details[$count]['Equipment_ID'] ?></td>    
                <td style="text-align:left" class="td-t1"><?php echo $details[$count]['Name'] ?></td>
                <td class="td-t1" style="text-align:right"><?php echo $details[$count]['Price'] ?>.00</td>
                <td class="td-t1"><?php echo $details[$count]['Date_Acquired'] ?></td>
                <td id="<?php echo "assignedTeam_row" . $count ?>" class="td-t1" style="text-align:right"><?php echo $details[$count]['Team'] ?></td>
                <td>     
                  <input type="button" id="<?php echo "edit_equip_btn" . $count ?>" class="edit_btn td-t1" value="Assign a Team" onclick="editEquipment('<?php echo $count ?>')">
                  <a href="" id = "<?php echo "editLink" . $count ?>"><input style = "margin: auto;" type="submit" id="<?php echo "save_equip_btn" . $count ?>" class="save_btn" value="Save" onclick="saveEquipment('<?php echo $details[$count]['Equipment_ID'] ?>','<?php echo $count ?>')" ></a>
                 </td>
                 <td><a href="/service/deleteEquipment/<?php echo $details[$count]['Equipment_ID'] ?>"> <input type="button" class="del_btn td-t1" value="Delete" onclick="deleteEquipment('<?php echo $count ?>')"></a></td> 
              </tr>
            <?php $count = $count + 1;
            } ?>

          </tbody>
        </table>
      </div>
    </div>-->

    
    <div style="min-height: 110px;"></div>


    <script src="/public/js/AdminManageEquipment.js"></script>
    <script src="/public/js/AdminEquipmentTable.js"></script>

</main>