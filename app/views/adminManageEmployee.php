<?php
    include 'userHeader.php';
?>
<main>
<body onload="createTable()">

    <div style="min-height: 110px;"></div>
    <h2 class="manageEmployee-heading">Manage Employee</h2> 
    <hr>
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

<hr>

<br><br>

<hr>

<div class="admin-EmpSearch-box">
    <input type="text" id="adminSearchEmployee" onkeyup="myFunction()" placeholder="Search for Employees." title="Type in a name">
</div>

<p>
    <input type="button" id="adminViewEmp" value="View Employee" onclick="viewEmp()" />
</p>

<hr>


<script src="/public/js/adminManageEmployee.js"></script>   

</main>

