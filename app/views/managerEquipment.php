<?php

include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Equipment Details</h2>
</div>
<div style="height: 50px;"></div>
<div style="display:block;">
  <div class="Manager-EquipSearch managerEquipSearch1">
    <input type="search" class="manager-Equip-Search" id="managerSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
  </div>

  <div class="manager-EquipSearch managerEquipSearch2" style = "margin-top: 7px;">
    <form action="" method="post">
      <select name="serviceTeam" class="manager-Equip-Search" id="Manager-AssignedEquip-TeamTypes">
        <option value="select service team">Select Service Team</option>
        <option value="Team 1">Team 1</option>
        <option value="Team 2">Team 2</option>
      </select>
    </form>
  </div>
</div>

<div class="Manager-equip-Table">
  <div class="manager-equip-table-wrap">
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
        <tr>
          <td>1</td>
          <td>Compressor</td>
          <td style="text-align:right">18500.00</td>
          <td>2021-06-05</td>
          <td style="text-align:right">1</td>
        </tr>
        <tr>
          <td>2</td>
          <td>High pressure water gun</td>
          <td style="text-align:right">8500.00</td>
          <td>2021-06-05</td>
          <td style="text-align:right">2</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Vacuum cleaner</td>
          <td style="text-align:right">6000.00</td>
          <td>2021-06-18</td>
          <td style="text-align:right">1</td>
        </tr>
        <tr>
          <td>4</td>
          <td>High pressure water gun</td>
          <td style="text-align:right">9900.00</td>
          <td>2021-07-10</td>
          <td></td>
        </tr>
        <tr>
          <td>5</td>
          <td>Microfiber cloth</td>
          <td style="text-align:right">500.00</td>
          <td>2021-07-25</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>
  <script src="/public/js/managerEquipmentTable.js"></script>