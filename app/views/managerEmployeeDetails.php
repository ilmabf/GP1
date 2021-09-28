<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Employee Details</h2>
</div>


<div class="main-Mg-EmpSearch">

    <div class="Mg-EmpSearch mgEmpSearch1">
        <input type="text" class="Mg-Emp-Search" id="managerSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employee..." title="Type in a name">
    </div>

    <div class="Mg-EmpSearch mgEmpSearch2">
        <form action="" method="post">
            <select name="serviceTeam" class="Mg-Emp-Search" id="serviceTeams-types">
                <option value="select service team">Select Service Team</option>
                <option value="Team A">Team A</option>
                <option value="Team B">Team B</option>
            </select>
        </form>

    </div>

    <div class="Mg-EmpSearch mgEmpSearch2">
        <form action="" method="post">
            <select name="serviceTeamLeader" class="Mg-Emp-Search" id="serviceTeamLeaders-types">
                <option value="select service team leader">Select Service Team Leader</option>
                <option value="Team A">Team A Leader</option>
                <option value="Team B">Team B Leader</option>
            </select>
        </form>
    </div>

</div>
