<?php
include 'views/user/LoggedInHeader.php';
?>
<main>

  <div id="adminManageEmployee1">
    <div style="min-height: 110px;"></div>
    <h2 class="manageEmployee-heading">Manage Employees</h2>
    <div class="addBtnEmps">
      <input type="button" id="addRow" value="Add Employee" class="addTableEmp" onclick="addRow(); " />
      <input type="button" id="addStlRow" value="Add Service Team Leader" class="addTableEmp" onclick="addStlRow();" />
    </div>

    <div>
      <form action="/employee/add" name="Form" method="post">
        <div id="cont" class="addTb1"></div>


        <button type="submit" id="bts" name="empDatas" onclick="checkLetter();">Insert Data</button>
      </form>

    </div>

    <div>
      <form action="/stl/add" method="post">
        <div id="cont2" class="addTb2"></div>

        <button type="submit" id="btStl" value="Insert data" onclick="validate();">Insert Data</button>
      </form>
    </div>

    <div class="empAddSuccess" id="empAddSuccess">
      <?php echo ($_SESSION['insertSuccess']); ?>
    </div>

    <div style="height: 50px;"></div>

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
            while ($count < $_SESSION['rowCount']) { ?>

              <tr id="row<?php $count ?>">
                <form action="/employee/saveEditEmployee/ <?php echo $result[$count]['Employee_ID'] ?>" method="post">
                  <td id="<?php echo "firstName_row" . $count ?>" class="td-t1"><?php echo $result[$count]['First_Name'] ?></td>
                  <td id="<?php echo "lastName_row" . $count ?>" class="td-t1"><?php echo $result[$count]['Last_Name'] ?></td>
                  <td id="<?php echo "contactNumber_row" . $count ?>" class="td-t1"><?php echo $result[$count]['Contact_Number'] ?></td>
                  <td id="<?php echo "email_row" . $count ?>" class="td-t1" style="max-width:200px;"><?php echo $result[$count]['Email'] ?></td>
                  <td id="<?php echo "dateEnrolled_row" . $count ?>" class="td-t1"><?php echo $result[$count]['Date_Enrolled'] ?></td>
                  <td id="<?php echo "salary_row" . $count ?>" style="text-align:right" class="td-t1"><?php echo $result[$count]['Salary'] ?>.00</td>
                  <td id="<?php echo "nicNo_row" . $count ?>" style="text-align:right" class="td-t1"><?php echo $result[$count]['NIC_No'] ?></td>

                  <td>
                    <input type="button" id="<?php echo "edit_emp_btn" . $count ?>" class="edit_btn td-t1" value="Edit" onclick="empEditForm('<?php echo $count ?>')">
                    <input type="submit" id="<?php echo "save_emp_btn" . $count ?>" class="save_btn" value="Save" onclick="empSaveForm('<?php echo $count ?>')"></a>
                  </td>
                </form>
                <td><a href="/employee/deleteEmployee/<?php echo $result[$count]['Employee_ID'] ?>"><input type="button" class="del_btn td-t1" value="Delete"></a></td>
              </tr>
            <?php $count = $count + 1;
            } ?>

          </tbody>
        </table>
      </div>
    </div>

    <div style="min-height: 110px;"></div>
  </div>
  <script src="/public/js/AdminEmployeeTable.js"></script>
  <script src="/public/js/AdminManageEmployee.js"></script>

</main>

<script>
  var pausecontent = <?php echo json_encode($_SESSION['teamCount']); ?>;

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
</script>