<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Employee Details</h2>
</div>

<div class="manager-EmpSearch-box">
    <input type="text" id="managerSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employees..." title="Type in a name">
</div>

<div class="manager-EmpSearch-box">
    <select name="serviceTeam" id="serviceTeam-types">
        <option value="select service team">Select Service Team</option>
        <option value="Team A">Team A</option>
        <option value="Team B">Team B</option>
    </select>
</div>