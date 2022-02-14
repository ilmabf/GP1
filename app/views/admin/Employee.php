<?php
include 'views/user/LoggedInHeader.php';
?>
<main>

  <div id="adminManageEmployee1">
    <div style="min-height: 110px;"></div>
    <h2 class="manageEmployee-heading">Manage Employees | <?php echo date("d-m-Y"); ?></h2>
    <div class="addBtnEmps">
      <input type="button" id="addRow" value="Add Employee" class="addTableEmp" onclick="addRow();" />
    </div>

    <div>
      <form action="/employee/add" name="Form" method="post">
        <div id="cont" class="addTb1"></div>


        <button type="submit" id="bts" name="empDatas" onclick="checkLetter();">Insert Data</button>
      </form>

    </div>

    <div>
      <form action="/employee/stlAdd" name="Form1" method="post" enctype="multipart/form-data">
        <div id="cont2" class="addTb2"></div>

        <button type="submit" name="submitStl" id="btStl" value="Insert data" onclick="validate();">Insert Data</button>
      </form>
    </div>

    <div style="height: 50px;"></div>


    <div class="empAddSuccess" id="empAddSuccess" style="color: #193498;">
      <?php echo $_SESSION['insertSuccess'] ?>
    </div>


    <!-- ------------------------------------Emp View------------------------------------------------------- -->

    <!-- <div style="margin-bottom: 40px; margin-left:130px;">
      <span>
        <p style="margin-bottom: 10px; color:#193498;"><b>No of Teams : <?php echo $_SESSION['teamCount'][0]['team'] ?></b></p>
      </span>
      <span id="teamCountInput">
        <form action="/employee/noofTeams" method="post">
          <input type="text" name="teamCount" placeholder="Enter Today's team count" style="padding: 7px 10px; border-radius:8px;">

          <button type="submit" value="Submit" onclick="TeamCount();" class="del_btn" style="padding: 6px 10px;">Change</button>
        </form>
      </span>
    </div> -->

    <div class="Table-search">

      <div class="table-wrapper">

        <div id="EmpAttendance-nav">
          <input type="button" id="next-EmpAttendance" value="Check Attendance >>" onclick="empAttendance();" style="float:right;" />
        </div>

        <div id="EmpDetails-nav" >
          <input type="button" id="next-EmpDetails" value="<< Employee Details" onclick="empDetails();" />
        </div>

        <div id="empDetailsTable">

          <div style="display:inline-block; width: 100%;">
            <div class="Admin-EmpSearch adEmpSearch1">
              <input type="search" class="ad-Emp-Search" id="adminSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employee..." title="Type in a name">
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
                <!-- <th data-type="number">Team</th> -->
                <!-- <th data-type="text">Team</th>
              <th data-type="text">Leader</th>
              <th data-type="text">Photo Link</th> -->
                <th colspan="2" style="text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody style="max-width:100%;">

              <?php
              $count = 0;
              $result = $_SESSION['employeeDetails'];
              while ($count < sizeof($result)) { ?>

                <tr id="row<?php $count ?>">
                  <td id="<?php echo "firstName_row" . $count ?>" style="text-align:left" class="td-t1"><?php echo $result[$count]['First_Name'] ?></td>
                  <td id="<?php echo "lastName_row" . $count ?>" style="text-align:left" class="td-t1"><?php echo $result[$count]['Last_Name'] ?></td>
                  <td id="<?php echo "contactNumber_row" . $count ?>" class="td-t1"><?php echo $result[$count]['Contact_Number'] ?></td>
                  <td id="<?php echo "email_row" . $count ?>" style="text-align:left" class="td-t1" style="max-width:200px;"><?php echo $result[$count]['Email'] ?></td>
                  <td id="<?php echo "dateEnrolled_row" . $count ?>" class="td-t1"><?php echo $result[$count]['Date_Enrolled'] ?></td>
                  <td id="<?php echo "salary_row" . $count ?>" style="text-align:right" class="td-t1"><?php echo $result[$count]['Salary'] ?>.00</td>
                  <td id="<?php echo "nicNo_row" . $count ?>" style="text-align:right" class="td-t1"><?php echo $result[$count]['NIC_No'] ?></td>
                  <td>
                    <input type="button" id="<?php echo "edit_emp_btn" . $count ?>" class="edit_btn td-t1" value="Edit" onclick="empEditForm('<?php echo $count ?>')">
                    <a href="" id="<?php echo "editHREF" . $count ?>"><input type="submit" id="<?php echo "save_emp_btn" . $count ?>" class="save_btn" value="Save" onclick="empSaveForm('<?php echo $result[$count]['Employee_ID'] ?>', '<?php echo $count ?>')"></a>
                  </td>
                  <td><a href="/employee/deleteEmployee/<?php echo $result[$count]['Employee_ID'] ?>"><input type="button" class="del_btn td-t1" value="Delete"></a></td>
                </tr>

              <?php $count = $count + 1;
              } ?>

            </tbody>
          </table>
        </div>
        <!-- -------------------------------------------------------------------------- -->

        <div id="empAttendanceTable">

          <span id="empAttendanceSearch">
            <div class="Admin-EmpSearch adEmpSearch1">
              <input type="search" class="ad-Emp-Search" id="adminSearchonWorkEmployee" placeholder="Search for Employee..." title="Type in a name">
            </div>
          </span>

          <span id="todayDate" style="float: right; background-color:blue; color:white;">
            <?php echo date("d-m-Y"); ?>
          </span>
          <form action="/employee/insertEmpAttendance/" id="empAttendanceForm" method="POST">
            <table id="filterTable1">
              <thead>
                <tr>
                  <th data-type="text">First Name</th>
                  <th data-type="text">Last Name</th>
                  <th data-type="text">Team</th>
                  <th data-type="text">On Work</th>
                  <th colspan="1" style="text-align: center;">
                    <input type="button" id="editButton" class="edit_btn td-t1" value="Edit" onclick="empEditAttendanceForm('<?php echo sizeof($_SESSION['employeeAttendanceDetails']) ?>')">
                  </th>
                </tr>
              </thead>
              <tbody style="max-width:100%;">

                <?php
                $count1 = 0;
                $result1 = $_SESSION['employeeAttendanceDetails'];

                //echo $yesterday = date('Y-m-d', time() - 60 * 60 * 24);
                //print_r($_SESSION['employeeAttendanceDetails']);
                while ($count1 < sizeof($result1)) { ?>

                  <tr id="row<?php $count1 ?>">
                    <td id="<?php echo "Att_FirstName_row" . $count1 ?>" style="text-align:left" class="td-t1"><?php echo $result1[$count1]['First_Name'] ?></td>
                    <td id="<?php echo "Att_LastName_row" . $count1 ?>" style="text-align:left" class="td-t1"><?php echo $result1[$count1]['Last_Name'] ?></td>
                    <td id="<?php echo "Att_Team_row" . $count1 ?>" class="td-t1"><?php echo $result1[$count1]['team'] ?></td>
                    <td id="<?php echo "Att_OnWork_row" . $count1 ?>" style="text-align:left" class="td-t1" style="max-width:200px;"><?php echo $result1[$count1]['onWork'] ?></td>
                    <!-- <td>
                    <input type="button" id="<?php echo "edit_att_emp_btn" . $count1 ?>" class="edit_btn td-t1" value="Edit" onclick="empEditAttendanceForm('<?php echo $count1 ?>')">
                  </td> -->

                  </tr>

                <?php $count1 = $count1 + 1;
                } ?>

              </tbody>
            </table>

            <div id="emp-attendance-submit">
              <input type="submit" id="empAttendance-submit-1" value="Submit">

            </div>
          </form>
        </div>
      </div>

      <div style="min-height: 110px;"></div>
    </div>
   

    <div style="min-height: 200px;"></div>

    <script>
            var eDetails = <?php echo json_encode($_SESSION['employeeAttendanceDetails']); ?>;
        </script>
    <script src="/public/js/AdminEmployeeTable.js"></script>
    <script src="/public/js/AdminManageEmployee.js"></script>

</main>