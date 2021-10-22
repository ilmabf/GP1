<?php

include 'views/user/LoggedInHeader.php';
$details = $_SESSION['equipmentDetails'];

?>

<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Equipment Details</h2>
</div>
<div style="height: 50px;"></div>

<div style="display:block;">
  <div class="Admin-EquipSearch adEquipSearch1"  style = "margin-left: 158px;">
    <input type="search" class="ad-Equip-Search" id="managerSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name"    >
  </div>

  <div class="Admin-EquipSearch adEquipSearch2" style="margin-top: 10px;     margin-right: 400px;">
    <form action="" method="post">
      <select name="serviceTeam" class="ad-Equip-Search" id="Manager-AssignedEquip-TeamTypes">
        <option value="select service team">Select Service Team</option>
        <option value="Team A">Team A</option>
        <option value="Team B">Team B</option>
      </select>
    </form>
  </div>
</div>

<div class="Table-search">
  <div class="table-wrapper">
    <table id="managerEquipTab">
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
          </tr>
        <?php $count = $count + 1;
        } ?>
      </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>
<script src="/public/js/ManagerEquipmentTable.js"></script>