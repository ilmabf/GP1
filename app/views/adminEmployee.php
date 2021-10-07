<?php 
    
    include 'userLoggedInHeader.php';
?>
<main>
<body onload="createTable()">

    <div style="min-height: 110px;"></div>
    <h2 class="manageEmployee-heading">Manage Employee</h2> 
    <p>
    <input type="button" id="addRow" value="Add Employee" onclick="addRow(); this.onclick=null;" />
    </p>
    <form action="/employee/add" name="Form" method="post">
      <div id="cont"></div>  <!-- the container to add the TABLE -->

     
      <input type="submit" id="bt" value="Submit Data"/> 
    </form>

</body>

<div class="empAddSuccess" id="empAddSuccess">
  <?php echo($_SESSION['insertSuccess']);?>
</div>

<div style="height: 50px;"></div> 

<!-- <div class="admin-EmpSearch-box">
    <input type="text" id="adminSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employees." title="Type in a name">
</div>

<p>
    <input type="button" id="adminViewEmp" value="View Employee" onclick="viewEmp()" />
</p> -->

<div class="main-Mg-EmpSearch">

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

    <div class="Admin-EmpSearch adEmpSearch2 aaa">
        <form action="" method="post">
            <select name="serviceTeamLeader" class="ad-Emp-Search" id="AdminserviceTeamLeaders-types">
                <option value="select service team leader">Select Service Team Leader</option>
                <option value="Team 1">Team 1 Leader</option>
                <option value="Team 2">Team 2 Leader</option>
            </select>
        </form>
    </div>

</div>


<div class="Table-search">
  <!-- <label>
    <span>Search:</span>
    <input placeholder="Enter search term" type="search" id="searchInput">
  </label> -->
  
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
          <th colspan="2" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $count = 0; $result = $_SESSION['employeeDetails'];
          while ($count < $_SESSION['rowCount']){?>
             <tr>
               <td><?php echo $result[$count]['First_Name']?></td>
               <td><?php echo $result[$count]['Last_Name']?></td>
               <td><?php echo $result[$count]['Contact_Number']?></td>
               <td><?php echo $result[$count]['Email']?></td>
               <td><?php echo $result[$count]['Date_Enrolled']?></td>
               <td><?php echo $result[$count]['Salary']?>.00</td>
               <td><?php echo $result[$count]['NIC_No']?></td>
               <td><?php echo $result[$count]['Team']?></td>
               <td><a href="#" class="edit_btn">Edit</a></td>
               <td><a href="#" class="del_btn">Delete</a></td>
             </tr>
          <?php $count = $count + 1;
          }?>
        
        </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>





<script src="/public/js/adminManageEmployee.js"></script>  
<script src="/public/js/adminEmployeeTable.js"></script>  

</main>

