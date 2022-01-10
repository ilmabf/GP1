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
  <h3 style="color:#193498;"><?php echo date('Y-m-d') ?></h3>
  <p style="margin-bottom: 10px; color:#193498;">No of Teams : <?php echo $_SESSION['teamCount'][0]['team'] ?></p>
</div>
<div class="main-Mg-EmpSearch">




  <div class="Table-search" style="margin-bottom: 60px;">

    <div class="table-wrapper">
      <h3 style="margin-bottom: 20px; color:#193498;">Employee</h3>
      <div style="display:inline-block; width: 100%;">
        <div class="Admin-EmpSearch adEmpSearch1">
          <input type="search" class="ad-Emp-Search" id="managerSearchEmployee" placeholder="Search for Employee..." title="Type in a name">
        </div>

        <div style="margin-bottom: 30px;">
          <input type="button" value="Work" class="edit_btn" onclick="empOnWork()">
          <input type="button" value="Not Work" class="edit_btn" onclick="empNotWork()">
        </div>

        <table id="empDefaultTable">
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

        <table id="emponWorkTable" style="display: none;">
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

            $result = $_SESSION['EmponWorkData'];
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

        <table id="empNotWorkTable" style="display: none;">
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

            $result = $_SESSION['EmpNotWorkData'];
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
      <h3 style="margin-bottom: 20px; color:#193498;">Service Team Leader</h3>
      <div style="display:inline-block; width: 100%;">
        <div class="Admin-EmpSearch adEmpSearch1">
          <input type="search" class="ad-Emp-Search" id="managerSearchSTL" onkeyup="myFunction()" placeholder="Search for STL..." title="Type in a name">
        </div>

        <div style="margin-bottom: 30px;">
          <input type="button" value="Work" class="edit_btn" onclick="stlOnWork()">
          <input type="button" value="Not Work" class="edit_btn" onclick="stlNotWork()">
        </div>

        <table id="stlDefaultTable">
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

        <table id="stlonWorkTable" style="display: none;">
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

            $result = $_SESSION['StlOnWorkData'];
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

        <table id="stlNotWorkTable" style="display: none;">
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

            $result = $_SESSION['StlNotWorkData'];
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

      <div>
        <h4>Photos</h4>
        
        <?php
        $result = $_SESSION['stlTableData'];
        $count = 0;
        while ($count < sizeof($result)) { ?>
          <div class="row">
            <div class="col-md-4 viewPhotos vp2">
              <img src="data:image/ . $type . ;base64, <?php echo base64_encode($result[$count]['Photo']); ?>" alt="<?php echo $result[$count]['STL_ID'] ?>" class="img-thumbnail" style="width:30%; border-radius: 8px;">
            </div>
          </div>
        <?php $count = $count + 1;
        } ?>

      </div>
    </div>
  </div>

  <div style="min-height: 110px;"></div>

  <!-- <script src="/public/js/ManagerEmployeeTable.js"></script> -->
  <script src="/public/js/AdminManageEmployee.js"></script>
  <script src="/public/js/AdminEmployeeTable.js"></script>
  <script src="/public/js/ManagerEmployeeTable.js"></script>