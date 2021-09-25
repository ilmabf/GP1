<?php 
    
    include 'userLoggedInHeader.php';
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Equipment Details</h2>
</div>

<div class="Equipment-search-box">
    <input type="text" id="managerSearchEquipments" onkeyup="myFunction()" placeholder="Search for Equipments..." title="Type in a name">
</div>

<div class="Equipment-search-box">
    <input type="button" id="managerViewEquip" value="View Equipments" onclick="viewEmp()" />
</div>
