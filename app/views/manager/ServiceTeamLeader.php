<?php

include 'views/user/LoggedInHeader.php';
$result = $_SESSION['employeeDetails'];
?>

<div style="min-height: 110px;"></div>

<div class="heading">
    <h2>Service Team Leader Details | <?php echo date("d-m-Y"); ?></h2>
</div>

<div style="height: 50px;"></div>


<!-- <div style="color: blue; margin-left: 50px; margin-bottom:20px; text-align:center;">
  <h3 style="color:#193498;"><?php echo date('Y-m-d') ?></h3>
  <p style="margin-bottom: 10px; color:#193498;">No of Teams : <?php echo $_SESSION['teamCount'][0]['team'] ?></p>
</div> -->
<div class="main-Mg-EmpSearch">


    <div class="addVehicleform" id="stldetails">
        <div class="forma">
            <h2 id='stlName' class="login-signupheader"></h2>
            <form action="" method="post" id="customer-signup">
                <ul>
                    <li><img id='stlPhotoID' src="" style="width: 250px;"></img></li><br>

            </form>

            <form action="/employee/updateStlImage/" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" class="upload_image" id="file" style="    width: 64%;">
                <input type="submit" id="upload" class="edit_btn" value="Update" style="padding: 8px 5px;">
                <input id='inputID' type="hidden" name="stl_id" value="">
            </form>
            <button id="VehicleFormCloseButton" class="formCancelButton" type="submit" name="signup" onclick="closestlForm()" style="float:none">Close</button>
        </div>
    </div>

    <div class="Table-search" style="margin-bottom: 60px;">




        <div class="Table-search">

            <div class="table-wrapper">
                <!-- <h3 style="margin-bottom: 20px; color:#193498;">Service Team Leader</h3> -->
                <div style="display:inline-block; width: 100%;">
                    <div class="Admin-EmpSearch adEmpSearch1">
                        <input type="search" class="ad-Emp-Search" id="managerSearchSTL" onkeyup="myFunction()" placeholder="Search for STL..." title="Type in a name">
                    </div>

                    <div style="margin-bottom: 30px;">
                        <input type="button" value="Employees On Work" class="edit_btn" onclick="stlOnWork()">
                        <input type="button" value="Employees Not Work" class="edit_btn" onclick="stlNotWork()">
                    </div>

                    <table id="stlDefaultTable">
                        <thead>
                            <tr>
                                <th data-type="text">First Name</th>
                                <th data-type="text">Last Name</th>
                                <th data-type="text">Contact No</th>
                                <th data-type="text">Email</th>
                                <th data-type="text">Date Enrolled</th>
                                <th data-type="text">Salary</th>
                                <th data-type="number">NIC No</th>
                                <th data-type="text">Photo</th>
                                <th data-type="text">Team</th>
                                <th data-type="text">On Work</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $result = $_SESSION['StlAttendanceData'];
                            $count = 0;
                            while ($count < sizeof($result)) { ?>
                                <tr>
                                    <td style="text-align:left"><?php echo $result[$count]['First_Name'] ?></td>
                                    <td style="text-align:left"><?php echo $result[$count]['Last_Name'] ?></td>
                                    <td><?php echo $result[$count]['Contact_Number'] ?></td>
                                    <td style="text-align:left"><?php echo $result[$count]['Email'] ?></td>
                                    <td><?php echo $result[$count]['Date_Enrolled'] ?></td>
                                    <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
                                    <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
                                    <td id="<?php echo "stlPhoto" . $count ?>" style="text-align:right" class="td-t1"><button onclick="viewPhoto('<?php echo $result[$count]['First_Name']; ?>' , '<?php echo $result[$count]['Last_Name']; ?>', <?php echo $_SESSION['stlTableData'][$count]['STL_ID']; ?>)"><a><?php echo "View"; ?></a></button></td>
                                    <td style="text-align:right"><?php echo $result[$count]['team'] ?></td>
                                    <td style="text-align:right"><?php echo $result[$count]['onWork'] ?></td>
                                </tr>
                            <?php $count = $count + 1;
                            } ?>
                        </tbody>

                    </table>

                    <table id="stlonWorkTable" style="display: none;">
                        <thead>
                            <tr>
                                <th data-type="text">First Name</th>
                                <th data-type="text">Last Name</th>
                                <th data-type="text">Contact No</th>
                                <th data-type="text">Email</th>
                                <th data-type="text">Date Enrolled</th>
                                <th data-type="text">Salary</th>
                                <th data-type="number">NIC No</th>
                                <th data-type="text">Photo</th>
                                <th data-type="text">Team</th>
                                <th data-type="text">On Work</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $result = $_SESSION['StlOnWorkData'];
                            $count = 0;
                            while ($count < sizeof($result)) { ?>
                                <tr>
                                    <td style="text-align:left"><?php echo $result[$count]['First_Name'] ?></td>
                                    <td style="text-align:left"><?php echo $result[$count]['Last_Name'] ?></td>
                                    <td><?php echo $result[$count]['Contact_Number'] ?></td>
                                    <td style="text-align:left"><?php echo $result[$count]['Email'] ?></td>
                                    <td><?php echo $result[$count]['Date_Enrolled'] ?></td>
                                    <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
                                    <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
                                    <td id="<?php echo "stlPhoto" . $count ?>" style="text-align:right" class="td-t1"><button onclick="viewPhoto('<?php echo $result[$count]['First_Name']; ?>' , '<?php echo $result[$count]['Last_Name']; ?>', <?php echo $_SESSION['stlTableData'][$count]['STL_ID']; ?>)"><a><?php echo "View"; ?></a></button></td>
                                    <td style="text-align:right"><?php echo $result[$count]['team'] ?></td>
                                    <td style="text-align:right"><?php echo $result[$count]['onWork'] ?></td>
                                </tr>
                            <?php $count = $count + 1;
                            } ?>
                        </tbody>

                    </table>

                    <table id="stlNotWorkTable" style="display: none;">
                        <thead>
                            <tr>
                                <th data-type="text">First Name</th>
                                <th data-type="text">Last Name</th>
                                <th data-type="text">Contact No</th>
                                <th data-type="text">Email</th>
                                <th data-type="text">Date Enrolled</th>
                                <th data-type="text">Salary</th>
                                <th data-type="number">NIC No</th>
                                <th data-type="text">Photo</th>
                                <th data-type="text">Team</th>
                                <th data-type="text">On Work</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $result = $_SESSION['StlNotWorkData'];
                            $count = 0;
                            while ($count < sizeof($result)) { ?>
                                <tr>
                                    <td style="text-align:left"><?php echo $result[$count]['First_Name'] ?></td>
                                    <td style="text-align:left"><?php echo $result[$count]['Last_Name'] ?></td>
                                    <td><?php echo $result[$count]['Contact_Number'] ?></td>
                                    <td style="text-align:left"><?php echo $result[$count]['Email'] ?></td>
                                    <td><?php echo $result[$count]['Date_Enrolled'] ?></td>
                                    <td style="text-align:right"><?php echo $result[$count]['Salary'] ?>.00</td>
                                    <td style="text-align:right"><?php echo $result[$count]['NIC_No'] ?></td>
                                    <td id="<?php echo "stlPhoto" . $count ?>" style="text-align:right" class="td-t1"><button onclick="viewPhoto('<?php echo $result[$count]['First_Name']; ?>' , '<?php echo $result[$count]['Last_Name']; ?>', <?php echo $_SESSION['stlTableData'][$count]['STL_ID']; ?>)"><a><?php echo "View"; ?></a></button></td>
                                    <td style="text-align:right"><?php echo $result[$count]['team'] ?></td>
                                    <td style="text-align:right"><?php echo $result[$count]['onWork'] ?></td>
                                </tr>
                            <?php $count = $count + 1;
                            } ?>
                        </tbody>

                    </table>


                </div>

                <!-- <div>
                    <h3 style="margin-bottom: 5px; margin-top: 30px; color:#193498;">Photos</h3>

                    <?php
                    $result = $_SESSION['stlTableData'];
                    $result1 = $_SESSION['StlAttendanceData'];
                    $count = 0;
                    while ($count < sizeof($result)) { ?>
                        <?php $imgUrl = '/public/images/' . $result[$count]['file_name']; ?>
                        <span class="row" style="text-align: center;">
                            <span class="col-md-4 viewPhotos vp2">
                                <img src="<?php echo $imgUrl ?>" alt="<?php echo $result[$count]['file_name'] ?>" class="img-thumbnail" style="height:300px; width:300px; object-fit:contain;">
                                <div style="margin-top: -60px;"><b><?php echo $result1[$count]['First_Name'] ?> <?php echo $result1[$count]['Last_Name'] ?></b></div>
                            </span>
                        </span>
                    <?php $count = $count + 1;
                    } ?>

                </div> -->
            </div>
        </div>

        <div style="min-height: 110px;"></div>

        <script>
            var stlTable = <?php echo json_encode($_SESSION['stlTableData']); ?>;
        </script>

        <!-- <script src="/public/js/ManagerEmployeeTable.js"></script> -->
        <script src="/public/js/AdminManageEmployee.js"></script>
        <script src="/public/js/AdminEmployeeTable.js"></script>
        <script src="/public/js/ManagerEmployeeTable.js"></script>