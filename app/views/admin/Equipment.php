<?php

include 'views/user/LoggedInHeader.php';
$details = $_SESSION['equipmentDetails'];
?>

<main>

  <div style="min-height: 110px;"></div>
  <h2 class="manageEmployee-heading">Manage Equipment</h2>

  <div style="display:block;text-align:center;">
    <input type="button" id="addNewRow" value="Add Equipment" style="display:inline-block;text-align:center;" onclick="addNewRow();" />
    <input type="button" id="assignEquipment" value="Assign To a Team" style="display:inline-block;text-align:center;" onclick="assignEquipment(); " />
  </div>

  <body onload="createEquipTable()">
    <div>
      <form action="/service/addNewEquipment" name="Form" method="post">
        <div id="container1">

        </div>
        <input type="submit" id="submitButton" value="Insert Data" />
      </form>
    </div>


    <div>
      <form action="/service/assignEquipment" method="post">
        <div id="container2">
        </div>
        <input type="submit" id="saveButton" value="Assign Equipment" />
      </form>
    </div>



    <div style="height: 50px;"></div>


    <div style="display:block;">
      <div class="Admin-EquipSearch adEquipSearch1">
        <input type="search" class="ad-Equip-Search" id="adminSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
      </div>

      <div class="Admin-EquipSearch adEquipSearch2" style="margin-top: 10px;">
        <form action="" method="post">
          <select name="serviceTeam" class="ad-Equip-Search" id="AdminserviceTeamTypes">
            <option value="select service team">Select Service Team</option>
            <option value="Team A">Team A</option>
            <option value="Team B">Team B</option>
          </select>
        </form>
      </div>
    </div>
    </div>

    <div class="Table-search">
      <div class="table-wrapper">
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
            while ($count < $_SESSION['rowCount']) { ?>
              <tr id="rowNo<?php $count ?>">
                <td><?php echo $details[$count]['Equipment_ID'] ?></td>
                <td id="<?php echo "name_row".$count ?>" class="td-t1"><?php echo $details[$count]['Name'] ?></td>
                <td id="<?php echo "price_row".$count ?>" class="td-t1" style="text-align:right"><?php echo $details[$count]['Price'] ?>.00</td>
                <td id="<?php echo "dateAcquired_row".$count ?>" class="td-t1"><?php echo $details[$count]['Date_Acquired'] ?></td>
                <td id="<?php echo "assignedTeam_row".$count ?>" class="td-t1" style="text-align:right"><?php echo $details[$count]['Team'] ?></td>
                <td>
                  <input type="button" id= "<?php echo "edit_quip_btn".$count ?>" class="edit_btn td-t1" value="Edit" onclick="editEquipment('<?php echo $count ?>')">
                  <input type="button" id="<?php echo "save_equip_btn".$count ?>" class="save_btn" value="Save" onclick="saveEquipment('<?php echo $count ?>')">
                </td>
                <td><input type="button" class="del_btn td-t1" value="Delete" onclick="deleteEquipment('<?php echo $count ?>')"></td>
              </tr>
            <?php $count = $count + 1;
            } ?>


          </tbody>
        </table>
      </div>
    </div>

    <div style="min-height: 110px;"></div>


    <script src="/public/js/adminManageEquipment.js"></script>
    <script src="/public/js/adminEquipmentTable.js"></script>

</main>