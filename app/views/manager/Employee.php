<?php

include 'views/user/LoggedInHeader.php';
$result = $_SESSION['employeeDetails'];
?>

<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Employee Details</h2>
</div>

<div style="height: 50px;"></div>

<div style="color: blue; margin-left: 50px; margin-bottom:20px; text-align:center;">
  <?php echo date('Y-m-d') ?>
</div>
<div class="main-Mg-EmpSearch">




  <div class="Table-search" style="margin-bottom: 60px;">

    <div class="table-wrapper">
      <div style="display:inline-block; width: 100%;">
        <div class="Admin-EmpSearch adEmpSearch1">
          <input type="search" class="ad-Emp-Search" id="adminSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employee..." title="Type in a name">
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
              <th data-type="text">Team</th>
              <th data-type="text">On Work</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $result = $_SESSION['EmpAttendanceData'];
            $count = 0;
            while ($count < sizeof($result)) { ?>
              <tr>
                <td style="text-align:left"><?php echo $result[$count]['First_Name'] ?></td>
                <td style="text-align:left"><?php echo $result[$count]['Last_Name'] ?></td>
                <td><?php echo $result[$count]['Contact_Number'] ?></td>
                <td style="text-align:left"><?php echo $result[$count]['Email'] ?></td>
                <td><?php echo $result[$count]['Date_Enrolled'] ?></td>
                <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
                <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
                <td style="text-align:right"><?php echo $result[$count]['team'] ?></td>
                <td style="text-align:right"><?php echo $result[$count]['onWork'] ?></td>
              </tr>
            <?php $count = $count + 1;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="Table-search">

    <div class="table-wrapper">
      <div style="display:inline-block; width: 100%;">
        <div class="Admin-EmpSearch adEmpSearch1">
          <input type="search" class="ad-Emp-Search" id="managerSearchEmployee" onkeyup="myFunction()" placeholder="Search for STL..." title="Type in a name">
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
              <th data-type="text">Team</th>
              <th data-type="text">On Work</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $result = $_SESSION['StlAttendanceData'];
            $count = 0;
            while ($count < sizeof($result)) { ?>
              <tr>
                <td style="text-align:left"><?php echo $result[$count]['First_Name'] ?></td>
                <td style="text-align:left"><?php echo $result[$count]['Last_Name'] ?></td>
                <td><?php echo $result[$count]['Contact_Number'] ?></td>
                <td style="text-align:left"><?php echo $result[$count]['Email'] ?></td>
                <td><?php echo $result[$count]['Date_Enrolled'] ?></td>
                <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
                <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
                <td style="text-align:right"><?php echo $result[$count]['team'] ?></td>
                <td style="text-align:right"><?php echo $result[$count]['onWork'] ?></td>
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