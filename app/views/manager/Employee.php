<?php

include 'views/user/LoggedInHeader.php';
$result = $_SESSION['employeeDetails'];
?>

<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Employee Details</h2>
</div>

<div style="height: 50px;"></div>
<div class="main-Mg-EmpSearch">




  <div class="Table-search">

    <div class="table-wrapper">
      <div style="display:inline-block; width: 100%;">
        <div class="Admin-EmpSearch adEmpSearch1">
          <input type="search" class="ad-Emp-Search" id="adminSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employee..." title="Type in a name">
        </div>

        <div class="Admin-EmpSearch adEmpSearch2">
          <form action="" method="post">
            <select name="serviceTeam" class="ad-Emp-Search" id="AdminserviceTeams-types">
              <option value="select service team">Select Service Team</option>
              <option value="Team 1">Team 1</option>
              <option value="Team 2">Team 2</option>
            </select>
          </form>

        </div>

        <div class="Mg-EmpSearch mgEmpSearch2" style="    margin-right: 5px;">
          <form action="" method="post">
            <select name="serviceTeamLeader" class="Mg-Emp-Search" id="serviceTeamLeaders-types">
              <option value="select service team leader">Select Service Team Leader</option>
              <option value="Team A">Team 1 Leader</option>
              <option value="Team B">Team 2 Leader</option>
            </select>
          </form>
        </div>
      </div>

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
          </tr>
        </thead>
        <tbody>
          <?php

          $count = 0;
          while ($count < $_SESSION['rowCount']) { ?>
            <tr>
              <td style="text-align:left"><?php echo $result[$count]['First_Name'] ?></td>
              <td style="text-align:left"><?php echo $result[$count]['Last_Name'] ?></td>
              <td><?php echo $result[$count]['Contact_Number'] ?></td>
              <td style="text-align:left"><?php echo $result[$count]['Email'] ?></td>
              <td ><?php echo $result[$count]['Date_Enrolled'] ?></td>
              <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
              <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
            </tr>
          <?php $count = $count + 1;
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div style="min-height: 110px;"></div>

<!-- <script src="/public/js/ManagerEmployeeTable.js"></script> -->
<script src="/public/js/AdminManageEmployee.js"></script>
<script src="/public/js/AdminEmployeeTable.js"></script>