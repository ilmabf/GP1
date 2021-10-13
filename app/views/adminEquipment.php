<?php

include 'UserLoggedInHeader.php';
$details = $_SESSION['equipmentDetails'];
?>

<main>

        <div style="min-height: 110px;"></div>
        <h2 class="manageEquipment-heading">Manage Equipment</h2> 

        <div style="display:block;text-align:center;">
            <input type="button" id="addNewRow" value="Add Equipment" style="display:inline-block;text-align:center;" onclick="addNewRow();"/>
            <input type="button" id="assignEquipment" value="Assign Equipment" style="display:inline-block;text-align:center;" onclick="assignEquipment(); " />
        </div>
        <body onload="createEquipTable()">
        <div>
            <form action="/service/addNewEquipment" name="Form" method="post">
                <div id="container1">
                  
                </div> 
                <input type="submit" id="submitButton" value="Submit Data"/> 
            </form>
        </div>
      
     
        <div>
            <form action="/service/assignEquipment" method="post">
                <div id="container2">
                </div>  
                <input type="submit" id="saveButton" value="Save Data"/> 
            </form>
        </div>
 


  <div style="height: 50px;"></div>


  <div style="display:block;">
    <div class="Admin-EquipSearch adEquipSearch1">
      <input type="search" class="ad-Equip-Search" id="adminSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
    </div>

    <div class="Admin-EquipSearch adEquipSearch2" style = "margin-top: 10px;">
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
  <div class="Search-Table">

    <div class="table-wrap">
      <table id="viewAsTable">
        <thead>
          <tr>
            <th data-type="text">Equipment ID</th>
            <th data-type="text">Name</th>
            <th data-type="text">Price</th>
            <th data-type="text">Date Acquired</th>
            <th data-type="text">Team</th>

          </tr>
        </thead>
        <tbody>

          <?php
          $count = 0;
          while ($count < $_SESSION['rowCount']) { ?>
            <tr>
              <td><?php echo $details[$count]['Equipment_ID'] ?></td>
              <td><?php echo $details[$count]['Name'] ?></td>
              <td style="text-align:right"><?php echo $details[$count]['Price'] ?>.00</td>
              <td><?php echo $details[$count]['Date_Acquired'] ?></td>
              <td style="text-align:right"><?php echo $details[$count]['Team'] ?></td>
              <td><a href="#" class="edit_btn">Edit</a></td>
              <td><a href="#" class="del_btn">Delete</a></td>
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