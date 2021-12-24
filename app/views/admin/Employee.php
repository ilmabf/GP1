<?php
include 'views/user/LoggedInHeader.php';
?>
<main>

  <div id="adminManageEmployee1">
    <div style="min-height: 110px;"></div>
    <h2 class="manageEmployee-heading">Manage Employees | <?php echo date("d-m-Y"); ?></h2>
    <div class="addBtnEmps">
      <input type="button" id="addRow" value="Add Employee" class="addTableEmp" onclick="addRow();" />
      <input type="button" id="addStlRow" value="Add Service Team Leader" class="addTableEmp" onclick="addStlRow();" />
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

        <button type="submit" id="btStl" value="Insert data" onclick="validate();">Insert Data</button>
      </form>
    </div>

    <div class="empAddSuccess" id="empAddSuccess">
      <?php echo ($_SESSION['insertSuccess']); ?>
    </div>

    <div style="height: 50px;"></div>

    <!-- ------------------------------------Emp View------------------------------------------------------- -->

    <div style="margin-bottom: 40px; margin-left:130px;">
      <span>
        <p style="margin-bottom: 10px; color:#193498;"><b>No of Teams : <?php echo $_SESSION['teamCount'][0]['team'] ?></b></p>
      </span>
      <span id="teamCountInput">
        <form action="/employee/noofTeams" method="post">
          <input type="text" name="teamCount" placeholder="Enter Today's team count" style="padding: 7px 10px; border-radius:8px;">

          <button type="submit" value="Submit" onclick="TeamCount();" class="del_btn" style="padding: 6px 10px;">Change</button>
        </form>
      </span>
    </div>

    <div class="Table-search">

      <div class="table-wrapper">

        <div id="EmpAttendance-nav">
          <input type="button" id="next-EmpAttendance" value="Employee Attendance >>" onclick="empAttendance();" />
        </div>

        <div id="EmpDetails-nav">
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
    <!-- ------------------------------------- STL -------------------------------------------------- -->


    <div class="Table-search">

      <div class="table-wrapper">

        <div id="StlAttendance-nav">
          <input type="button" id="next-StlAttendance" value="STL Attendance >>" onclick="stlAttendance();" />
        </div>

        <div id="StlDetails-nav">
          <input type="button" id="next-StlDetails" value="<< STL Details" onclick="stlDetails();" />
        </div>

        <div id="stlDetailsTable">

          <div style="display:inline-block; width: 100%;">
            <div class="Admin-EmpSearch adEmpSearch1">
              <input type="search" class="ad-Emp-Search" id="adminSearchStl" onkeyup="myFunction2()" placeholder="Search for Stl..." title="Type in a name">
            </div>

          </div>
          <table id="filterTable2">
            <thead>
              <tr>
                <th data-type="text">First Name</th>
                <th data-type="text">Last Name</th>
                <th data-type="text">Contact No</th>
                <th data-type="text">Email</th>
                <th data-type="text">Date Enrolled</th>
                <th data-type="text">Salary</th>
                <th data-type="number">NIC No</th>
                <th data-type="text">Username</th>
                <!-- <th data-type="text">Photo</th> -->
                <!-- <th data-type="number">Team</th> -->
                <!-- <th data-type="text">Team</th>
              <th data-type="text">Leader</th>
              <th data-type="text">Photo Link</th> -->
                <th colspan="2" style="text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody style="max-width:100%;">

              <?php
              $count2 = 0;
              $result2 = $_SESSION['stlData'];
              while ($count2 < sizeof($result2)) { ?>

                <tr id="row<?php $count2 ?>">
                  <td id="<?php echo "stlFirstName_row" . $count2 ?>" style="text-align:left" class="td-t1"><?php echo $result2[$count2]['First_Name'] ?></td>
                  <td id="<?php echo "stlLastName_row" . $count2 ?>" style="text-align:left" class="td-t1"><?php echo $result2[$count2]['Last_Name'] ?></td>
                  <td id="<?php echo "stlContactNumber_row" . $count2 ?>" class="td-t1"><?php echo $result2[$count2]['Contact_Number'] ?></td>
                  <td id="<?php echo "stlEmail_row" . $count2 ?>" style="text-align:left" class="td-t1" style="max-width:200px;"><?php echo $result2[$count2]['Email'] ?></td>
                  <td id="<?php echo "stlDateEnrolled_row" . $count2 ?>" class="td-t1"><?php echo $result2[$count2]['Date_Enrolled'] ?></td>
                  <td id="<?php echo "stlSalary_row" . $count2 ?>" style="text-align:right" class="td-t1"><?php echo $result2[$count2]['Salary'] ?>.00</td>
                  <td id="<?php echo "stlNicNo_row" . $count2 ?>" style="text-align:right" class="td-t1"><?php echo $result2[$count2]['NIC_No'] ?></td>
                  <td id="<?php echo "stlUsername_row" . $count2 ?>" style="text-align:right" class="td-t1"><?php echo $result2[$count2]['Username'] ?></td>

                  <td>
                    <input type="button" id="<?php echo "edit_stl_btn" . $count2 ?>" class="edit_btn td-t1" value="Edit" onclick="stlEditForm('<?php echo $count2 ?>')">
                    <a href="" id="<?php echo "editStlHREF" . $count2 ?>"><input type="submit" id="<?php echo "save_stl_btn" . $count2 ?>" class="save_btn" value="Save" onclick="stlSaveForm('<?php echo $result2[$count2]['Employee_ID'] ?>', '<?php echo $count2 ?>')"></a>

                  </td>
                  <td><a href="/employee/deleteEmployee/<?php echo $result2[$count2]['Employee_ID'] ?>"><input type="button" class="del_btn td-t1" value="Delete"></a></td>

                </tr>

              <?php $count2 = $count2 + 1;
              } ?>

            </tbody>
          </table>
        </div>

        <div id="stlAttendanceTable">

          <span id="stlAttendanceSearch">
            <div class="Admin-EmpSearch adEmpSearch1">
              <input type="search" class="ad-Emp-Search" id="stlonWorkSearch" onkeyup="myFunction1()" placeholder="Search for STL..." title="Type in a name">
            </div>
          </span>

          <span id="todayDate1" style="float: right; background-color:blue; color:white;">
            <?php echo date("d-m-Y"); ?>
          </span>

          <form action="/employee/insertStlAttendance/" id="stlAttendanceForm" method="POST">
            <table id="filterTable3">
              <thead>
                <tr>
                  <th data-type="text">First Name</th>
                  <th data-type="text">Last Name</th>
                  <th data-type="text">Team</th>
                  <th data-type="text">On Work</th>
                  <th colspan="1" style="text-align: center;">
                    <input type="button" id="editStlAttButton" class="edit_btn td-t1" value="Edit" onclick="stlEditAttendanceForm('<?php echo sizeof($_SESSION['stlAttendanceDetails']) ?>')">
                  </th>
                </tr>
              </thead>
              <tbody style="max-width:100%;" id="onWorkSelectTable">

                <?php
                $count3 = 0;
                $result3 = $_SESSION['stlAttendanceDetails'];


                // echo $_SESSION['rowCount'];
                while ($count3 < sizeof($result3)) { ?>

                  <tr id="row<?php $count3 ?>">
                    <td id="<?php echo "AttStl_FirstName_row" . $count3 ?>" style="text-align:left" class="td-t1"><?php echo $result3[$count3]['First_Name'] ?></td>
                    <td id="<?php echo "AttStl_LastName_row" . $count3 ?>" style="text-align:left" class="td-t1"><?php echo $result3[$count3]['Last_Name'] ?></td>
                    <td id="<?php echo "AttStl_Team_row" . $count3 ?>" class="td-t1"><?php echo $result3[$count3]['team'] ?></td>
                    <td id="<?php echo "AttStl_onWork_row" . $count3 ?>" style="text-align:left" class="td-t1" style="max-width:200px;"><?php echo $result3[$count3]['onWork'] ?></td>


                  </tr>

                <?php $count3 = $count3 + 1;
                } ?>

              </tbody>
            </table>

            <div id="emp-attendance-submit">
              <input type="submit" id="empAttendance-submit-1" value="Submit">

            </div>
          </form>
        </div>

      </div>
    </div>

    <div style="min-height: 200px;"></div>


    <script src="/public/js/AdminEmployeeTable.js"></script>
    <script src="/public/js/AdminManageEmployee.js"></script>

</main>

<!-- <script>
  

  document.getElementById("bts").onclick = function() {
    var team = document.getElementById("validteam");
    var i = 0;
    while (i < pausecontent.length && team.value != pausecontent[i]['Team']) {
      i = i + 1;
    }
    if (i < pausecontent.length) {
      var x = parseInt(pausecontent[i]['count(Team)'])
      if ((x + 1) > 3) {

        team.setCustomValidity("Team cannot have more than 3 members");
      } else {
        team.setCustomValidity('');
      }
    } else {
      team.setCustomValidity('');
    }
  }
</script> -->


<!-- <div class="Admin-EmpSearch adEmpSearch2">
            <form action="" method="post">
              <select name="serviceTeam" class="ad-Emp-Search" id="AdminserviceTeams-types">
                <option value="select service team">Select Service Team</option>
                <option value="Team 1">Team 1</option>
                <option value="Team 2">Team 2</option>
              </select>
            </form>

          </div> -->

<!-- <div class="Mg-EmpSearch mgEmpSearch2" style="    margin-right: 5px;">
            <form action="" method="post">
              <select name="serviceTeamLeader" class="Mg-Emp-Search" id="serviceTeamLeaders-types">
                <option value="select service team leader">Select Service Team Leader</option>
                <option value="Team A">Team 1 Leader</option>
                <option value="Team B">Team 2 Leader</option>
              </select>
            </form>
          </div> -->