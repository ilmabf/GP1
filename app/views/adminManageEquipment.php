<?php 
    
    include 'userLoggedInHeader.php';
?>

<main>
<body onload="createTable()">

    <div style="min-height: 110px;"></div>
    <h2 class="manageEquipment-heading">Manage Equipment</h2> 
    <p>
    <input type="button" id="addRow" value="Add Equipment" onclick="addRow(); this.onclick=null;" />
    </p>
    <form action="/admin/addNewEquipment" name="Form" method="post">
      <div id="cont">
        
      </div>  <!-- the container to add the TABLE -->

     
      <input type="submit" id="bt" value="Submit Data"/> 
    </form>
    </body>

    <div style="height: 50px;"></div> 

    <div style="display:block;">

        <div class="Admin-EquipSearch adEquipSearch1">
            <input type="search" class="ad-Equip-Search" id="adminSearchEquipment" onkeyup="myFunction()" placeholder="Search for Equipment..." title="Type in a name">
        </div>

        <div class="Admin-EquipSearch adEquipSearch2">
            <form action="" method="post">
                <select name="serviceTeam" class="ad-Equip-Search" id="AdminserviceTeams-types">
                    <option value="select service team">Select Service Team</option>
                    <option value="Team A">Team A</option>
                    <option value="Team B">Team B</option>
                </select>
            </form>
         </div>
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
          <th data-type="text">Equipment ID</th>
          <th data-type="text">Name</th>
          <th data-type="text">Price</th>
          <th data-type="text">Date Acquired</th>
          <th data-type="text">Team</th>
        </tr>
      </thead>
       <tbody>
        <tr>
          <td>0001</td>
          <td>Compressor</td>
          <td>20,000</td>
          <td>2021 05 08</td>
          <td>B</td>
        </tr>
        <tr>
          <td>0002</td>
          <td>High pressure water gun</td>
          <td>2,000</td>
          <td>2021 05 12</td>
          <td>B</td>
        </tr>
        <tr>
          <td>0003</td>
          <td>Vaccum cleaner</td>
          <td>2,000</td>
          <td>2021 05 12</td>
          <td> </td>
        </tr>
        <tr>
          <td>0004</td>
          <td>Vaccum cleaner</td>
          <td>2,000</td>
          <td>2021 05 12</td>
          <td> </td>
        </tr>
        <tr>
          <td>0005</td>
          <td>High pressure water gun</td>
          <td>2,000</td>
          <td>2021 05 12</td>
          <td> </td>
        </tr>
        <tr>
          <td>0006</td>
          <td>Compressor</td>
          <td>20,000</td>
          <td>2021 05 08</td>
          <td>B</td>
        </tr>
        <tr>

    
    </tbody>
    </table>
  </div>
</div>

<div style="min-height: 110px;"></div>


<script src="/public/js/adminManageEquipment.js"></script>  
<script src="/public/js/adminEquipmentTable.js"></script>  

</main>