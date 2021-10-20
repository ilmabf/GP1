<?php

include 'UserLoggedInHeader.php';
   $result = $_SESSION['employeeDetails'];
?>

<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Employee Details</h2>
</div>

<div style="height: 50px;"></div>
<div class="main-Mg-EmpSearch">

  <div class="Mg-EmpSearch mgEmpSearch1 marginFix" style="margin-left: 214px;">
    <input type="text" class="Mg-Emp-Search" id="managerSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employee..." title="Type in a name">
  </div>

  <div class="Mg-EmpSearch mgEmpSearch2" style="margin-right: 212px;">
    <form action="" method="post">
      <select name="serviceTeam" class="Mg-Emp-Search" id="serviceTeams-types">
        <option value="select service team">Select Service Team</option>
        <option value="Team A">Team 1</option>
        <option value="Team B">Team 2</option>
      </select>
    </form>

  </div>

  <div class="Mg-EmpSearch mgEmpSearch2">
    <form action="" method="post">
      <select name="serviceTeamLeader" class="Mg-Emp-Search" id="serviceTeamLeaders-types">
        <option value="select service team leader">Select Service Team Leader</option>
        <option value="Team A">Team 1 Leader</option>
        <option value="Team B">Team 2 Leader</option>
      </select>
    </form>
  </div>

</div>


<div class="Table-search">

  <div class="table-wrapper">
    <table id="filterTable">
      <thead>
        <tr>
          <th data-type="text">First Name</th>
          <th data-type="text">Last Name</th>
          <th data-type="text">Contact No</th>
          <th data-type="text">Email</th>
          <th data-type="text">Date Enrolled</th>
          <th data-type="text">Salary</th>
          <th data-type="number">NIC No</th>
          <th data-type="text">Team</th>
          <th data-type="text">Leader</th>
          <th data-type="text">Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php
          
          $count = 0;
            while ($count < $_SESSION['rowCount']) { ?>
            <tr>
              <td><?php echo $result[$count]['First_Name'] ?></td>
              <td><?php echo $result[$count]['Last_Name'] ?></td>
              <td><?php echo $result[$count]['Contact_Number'] ?></td>
              <td><?php echo $result[$count]['Email'] ?></td>
              <td><?php echo $result[$count]['Date_Enrolled'] ?></td>
              <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
              <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
              <td style="text-align:right"><?php echo $result[$count]['Team'] ?></td>
              <td><?php echo $result[$count]['STL_ID'] ?></td>
              <td><?php echo $result[$count]['Photo'] ?></td>
            </tr>
          <?php $count = $count + 1;
          } ?>
      </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>

<script src="/public/js/ManagerEmployeeTable.js"></script>