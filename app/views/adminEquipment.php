<?php

include 'userLoggedInHeader.php';
$details = $_SESSION['equipmentDetails'];
?>

<main>

  <body onload="createEquipTable()">

    <div style="min-height: 110px;"></div>
    <h2 class="manageEquipment-heading">Manage Equipment</h2>
    <p>
      <input type="button" id="addNewRow" value="Add Equipment" onclick="addNewRow(); this.onclick=null;" />
    </p>
    <form action="/service/addNewEquipment" name="Form" method="post">
      <div id="container">

      </div> <!-- the container to add the TABLE -->


      <input type="submit" id="submitButton" value="Submit Data" />
    </form>
  </body>


  <div style="height: 50px;"></div>


  <div style="display:block;">
    <div class="Admin-EquipSearch adEquipSearch1">
      <input type="search" class="ad-Equip-Search" id="adminSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
    </div>

    <div class="Admin-EquipSearch adEquipSearch2">
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
    <!-- <label>
    <span>Search:</span>
    <input placeholder="Enter search term" type="search" id="searchInput">
  </label> -->

    <div class="table-wrap">
      <table id="ViewAsTable">
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
              <td><?php echo $details[$count]['Price'] ?>.00</td>
              <td><?php echo $details[$count]['Date_Acquired'] ?></td>
              <td><?php echo $details[$count]['Team'] ?></td>
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


  <script src="/public/js/adminManageEquipment.js"></script>
  <script src="/public/js/adminEquipmentTable.js"></script>

</main>