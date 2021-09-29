<?php 
    
    include 'userLoggedInHeader.php';
?>
<main>
<body onload="createTable()">

    <div style="min-height: 110px;"></div>
    <h2 class="manageEmployee-heading">Manage Employee</h2> 
    <p>
    <input type="button" id="addRow" value="Add Employee" onclick="addRow()" />
    </p>
    <!-- <form action=""> -->
    <div id="cont"></div>  <!-- the container to add the TABLE -->

    <p>
    <input type="button" id="bt" value="Submit Data" onclick="submit()" />
    <!-- </form> -->
    </p>
        
    <p id='output'></p>
    
</body>

<br><br>

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
                <option value="Team A">Team A</option>
                <option value="Team B">Team B</option>
            </select>
        </form>

    </div>

    <div class="Admin-EmpSearch adEmpSearch2 aaa">
        <form action="" method="post">
            <select name="serviceTeamLeader" class="ad-Emp-Search" id="AdminserviceTeamLeaders-types">
                <option value="select service team leader">Select Service Team Leader</option>
                <option value="Team A">Team A Leader</option>
                <option value="Team B">Team B Leader</option>
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
          <th data-type="text">Leader</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Sahan</td>
          <td>Dias</td>
          <td>0769023432</td>
          <td>sahandias@gmail.com</td>
          <td>2021 03 20</td>
          <td>35000</td>
          <td>12324532V</td>
          <td>A</td>
          <td></td>
        </tr>
        <tr>
          <td>Nirosh</td>
          <td>Perera</td>
          <td>0776787643</td>
          <td>niroshperera@gmail.com</td>
          <td>2021 04 10</td>
          <td>25000</td>
          <td>897645322V</td>
          <td>B</td>
          <td>B</td>
        </tr>
        <tr>
          <td>Janith</td>
          <td>Ryan</td>
          <td>0776745654</td>
          <td>janithryan@gmail.com</td>
          <td>2020 12 10</td>
          <td>30000</td>
          <td>89787654V</td>
          <td>B</td>
          <td></td>
        </tr>
        <tr>
          <td>Nimal</td>
          <td>Lansa</td>
          <td>0756765789</td>
          <td>nimallansa@gmail.com</td>
          <td>2021 01 10</td>
          <td>28000</td>
          <td>23456721V</td>
          <td>A</td>
          <td>A</td>
        </tr>
        <tr>
          <td>Karun</td>
          <td>Nair</td>
          <td>0768987789</td>
          <td>karunnair@gmail.com</td>
          <td>2020 10 18</td>
          <td>32000</td>
          <td>123245634V</td>
          <td>B</td>
          <td></td>
        </tr>
        <tr>
          <td>Heshan</td>
          <td>Silva</td>
          <td>0778987657</td>
          <td>heshansilva@gmail.com</td>
          <td>2020 09 12</td>
          <td>26000</td>
          <td>23243323V</td>
          <td>A</td>
          <td></td>
        </tr>
        </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>





<script src="/public/js/adminManageEmployee.js"></script>  
<script src="/public/js/adminEmployeeTable.js"></script>  

</main>

