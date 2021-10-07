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
    <form action="/equipment/addNewEquipment" name="Form" method="post">
      <div id="cont">
        
      </div>  <!-- the container to add the TABLE -->

     
      <input type="submit" id="bt" value="Submit Data"/> 
    </form>
    </body>
    <div class="equipAddSuccess" id="equipAddSuccess">
        <?php echo($_SESSION['insertSuccess']);?>
    </div>

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
          <th data-type="text" >Price</th>
          <th data-type="text">Date Acquired</th>
          <th data-type="text">Team</th>
          <th></th>
        </tr>
      </thead>
       <tbody>
   <!--     <tr>
          <td>0001</td>
          <td>Compressor</td>
          <td>20,000</td>
          <td>2021 05 08</td>
          <td>A</td>
        </tr>
        <tr>
          <td>0002</td>
          <td>High pressure water gun</td>
          <td>2,000</td>
          <td>2021 05 12</td>
          <td>A</td>
        </tr>
        <tr>
          <td>0003</td>
          <td>Vacuum cleaner</td>
          <td>2,000</td>
          <td>2021 05 12</td>
          <td> </td>
        </tr>
        <tr>
          <td>0004</td>
          <td>Vacuum cleaner</td>
          <td>15,000</td>
          <td>2021 06 20</td>
          <td> </td>
        </tr>
        <tr>
          <td>0005</td>
          <td>High pressure water gun</td>
          <td>2,500</td>
          <td>2021 06 20</td>
          <td> </td>
        </tr>
        <tr>
          <td>0006</td>
          <td>Compressor</td>
          <td>18,000</td>
          <td>2021 06 25</td>
          <td>B</td>
        </tr>
        <tr> -->
        <?php 
          $count = 0; $result = $_SESSION['equipmentDetails'];
          while ($count < $_SESSION['rowCount']){?>
             <tr>
                <td><?php echo $result[$count]['Equipment_ID']?></td>
               <td><?php echo $result[$count]['Name']?></td>
               <td><?php echo $result[$count]['Price']?>.00</td>
               <td><?php echo $result[$count]['Date_Acquired']?></td>     
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


<script src="/public/js/adminManageEquipment.js"></script>  
<script src="/public/js/adminEquipmentTable.js"></script>  

</main>