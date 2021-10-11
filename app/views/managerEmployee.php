<?php

include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
  <h2>Employee Details</h2>
</div>


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
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Sahan</td>
          <td>Dias</td>
          <td>0769023432</td>
          <td>sahandias@gmail.com</td>
          <td>2021-03-20</td>
          <td>35000.00</td>
          <td>12324532V</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <tr>
          <td>Nirosh</td>
          <td>Perera</td>
          <td>0776787643</td>
          <td>niroshperera@gmail.com</td>
          <td>2021-04-10</td>
          <td>25000.00</td>
          <td>897645322V</td>
          <td>2</td>
          <td></td>
        </tr>
        <tr>
          <td>Janith</td>
          <td>Ryan</td>
          <td>0776745654</td>
          <td>janithryan@gmail.com</td>
          <td>2020-12-10</td>
          <td>30000.00</td>
          <td>89787654V</td>
          <td>2</td>
          <td></td>
        </tr>
        <tr>
          <td>Nimal</td>
          <td>Lansa</td>
          <td>0756765789</td>
          <td>nimallansa@gmail.com</td>
          <td>2021-01-10</td>
          <td>28000.00</td>
          <td>23456721V</td>
          <td>2</td>
          <td>2</td>
        </tr>
        <tr>
          <td>Karun</td>
          <td>Nair</td>
          <td>0768987789</td>
          <td>karunnair@gmail.com</td>
          <td>2020-10-18</td>
          <td>32000.00</td>
          <td>123245634V</td>
          <td>1</td>
          <td></td>
        </tr>
        <tr>
          <td>Heshan</td>
          <td>Silva</td>
          <td>0778987657</td>
          <td>heshansilva@gmail.com</td>
          <td>2020-09-12</td>
          <td>26000.00</td>
          <td>23243323V</td>
          <td>1</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>

<script src="/public/js/managerEmployeeTable.js"></script>