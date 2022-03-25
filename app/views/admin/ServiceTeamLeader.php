<?php
include 'views/user/LoggedInHeader.php';
?>
<main>

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

    <div id="adminManageEmployee1">
        <div style="min-height: 110px;"></div>
        <h2 class="manageEmployee-heading">Manage Service Team Leaders | <?php echo date("d-m-Y"); ?></h2>
        <div class="addBtnEmps">
            <input type="button" id="addStlRow" value="Add Service Team Leader" class="addTableEmp" onclick="addStlRow();" />
        </div>

        <div>
            <form action="/employee/add" name="Form" method="post">
                <div id="cont" class="addTb1"></div>


                <button type="submit" id="bts" name="empDatas" onclick="checkLetter();">Insert Data</button>
            </form>

        </div>

        <div>
            <form action="/employee/stlAdd" name="Form1" method="post" enctype="multipart/form-data">
                <div id="cont2" class="addTb2"></div>

                <button type="submit" name="submitStl" id="btStl" value="Insert data" onclick="validate();">Insert Data</button>
            </form>
        </div>

        <div style="height: 50px;"></div>


        <div class="empAddSuccess" id="empAddSuccess" style="color: #193498;">
            <?php echo $_SESSION['insertSuccess'] ?>
        </div>



        <!-- ------------------------------------- STL -------------------------------------------------- -->


        <div class="Table-search">

            <div class="table-wrapper">

                <div id="StlAttendance-nav">
                    <input type="button" id="next-StlAttendance" value="Check Attendance >>" onclick="stlAttendance();" style="float:right;" />
                </div>

                <div id="StlDetails-nav">
                    <input type="button" id="next-StlDetails" value="<< Service Team Leader Details" onclick="stlDetails();" />
                </div>

                <div id="stlDetailsTable">

                    <div style="display:inline-block; width: 100%;">
                        <div class="Admin-EmpSearch adEmpSearch1">
                            <input type="search" class="ad-Emp-Search" id="adminSearchStl" onkeyup="myFunction2()" placeholder="Search for Stl..." title="Type in a name">
                        </div>

                    </div>
                    <table id="filterTable2">
                        <thead>
                            <tr>
                                <th data-type="text">First Name</th>
                                <th data-type="text">Last Name</th>
                                <th data-type="text">Contact No</th>
                                <th data-type="text">Email</th>
                                <th data-type="text">Date Enrolled</th>
                                <th data-type="text">Salary</th>
                                <th data-type="number">NIC No</th>
                                <th data-type="text">Username</th>
                                <th data-type="text">Photo</th>
                                <th colspan="2" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="max-width:100%;">

                            <?php
                            $count2 = 0;
                            $result2 = $_SESSION['stlData'];
                            while ($count2 < sizeof($result2)) { ?>

                                <tr id="row<?php $count2 ?>">
                                    <td id="<?php echo "stlFirstName_row" . $count2 ?>" style="text-align:left" class="td-t1"><?php echo $result2[$count2]['First_Name'] ?></td>
                                    <td id="<?php echo "stlLastName_row" . $count2 ?>" style="text-align:left" class="td-t1"><?php echo $result2[$count2]['Last_Name'] ?></td>
                                    <td id="<?php echo "stlContactNumber_row" . $count2 ?>" class="td-t1"><?php echo $result2[$count2]['Contact_Number'] ?></td>
                                    <td id="<?php echo "stlEmail_row" . $count2 ?>" style="text-align:left" class="td-t1" style="max-width:200px;"><?php echo $result2[$count2]['Email'] ?></td>
                                    <td id="<?php echo "stlDateEnrolled_row" . $count2 ?>" class="td-t1"><?php echo $result2[$count2]['Date_Enrolled'] ?></td>
                                    <td id="<?php echo "stlSalary_row" . $count2 ?>" style="text-align:right" class="td-t1"><?php echo $result2[$count2]['Salary'] ?>.00</td>
                                    <td id="<?php echo "stlNicNo_row" . $count2 ?>" style="text-align:right" class="td-t1"><?php echo $result2[$count2]['NIC_No'] ?></td>
                                    <td id="<?php echo "stlUsername_row" . $count2 ?>" style="text-align:right" class="td-t1"><?php echo $result2[$count2]['Username'] ?></td>
                                    <td id="<?php echo "stlPhoto" . $count2 ?>" style="text-align:right" class="td-t1"><button onclick="viewPhoto('<?php echo $result2[$count2]['First_Name']; ?>' , '<?php echo $result2[$count2]['Last_Name']; ?>', <?php echo $result2[$count2]['STL_ID']; ?>)"><a><?php echo "View"; ?></a></button></td>
                                    <td>
                                        <input type="button" id="<?php echo "edit_stl_btn" . $count2 ?>" class="edit_btn td-t1" value="Edit" onclick="stlEditForm('<?php echo $count2 ?>')">
                                        <a href="" id="<?php echo "editStlHREF" . $count2 ?>"><input type="submit" id="<?php echo "save_stl_btn" . $count2 ?>" class="save_btn" value="Save" onclick="stlSaveForm('<?php echo $result2[$count2]['Employee_ID'] ?>', '<?php echo $count2 ?>')"></a>

                                    </td>
                                    <td><a href="/employee/deleteStl/<?php echo $result2[$count2]['STL_ID'] ?>"><input type="button" class="del_btn td-t1" value="Delete"></a></td>

                                </tr>

                            <?php $count2 = $count2 + 1;
                            } ?>

                        </tbody>
                    </table>
                </div>

                <div id="stlAttendanceTable">

                    <span id="stlAttendanceSearch">
                        <div class="Admin-EmpSearch adEmpSearch1">
                            <input type="search" class="ad-Emp-Search" id="stlonWorkSearch" onkeyup="myFunction1()" placeholder="Search for STL..." title="Type in a name">
                        </div>
                    </span>

                    <span id="todayDate1" style="float: right; background-color:blue; color:white;">
                        <?php echo date("d-m-Y"); ?>
                    </span>

                    <table id="filterTable3">
                        <thead>
                            <tr>
                                <th data-type="text">First Name</th>
                                <th data-type="text">Last Name</th>
                                <th data-type="text">Team</th>
                                <th data-type="text">On Work (0/1)</th>
                                <th colspan="1" style="text-align: center;">
                                    <input type="button" id="editStlAttButton" class="edit_btn td-t1" value="Edit" onclick="stlEditAttendanceForm('<?php echo sizeof($_SESSION['stlAttendanceDetails']) ?>')">
                                </th>
                            </tr>
                        </thead>
                        <tbody style="max-width:100%;" id="onWorkSelectTable">

                            <?php
                            $count3 = 0;
                            $result3 = $_SESSION['stlAttendanceDetails'];
                            while ($count3 < sizeof($result3)) { ?>

                                <tr id="row<?php $count3 ?>">
                                    <td id="<?php echo "AttStl_FirstName_row" . $count3 ?>" style="text-align:left" class="td-t1"><?php echo $result3[$count3]['First_Name'] ?></td>
                                    <td id="<?php echo "AttStl_LastName_row" . $count3 ?>" style="text-align:left" class="td-t1"><?php echo $result3[$count3]['Last_Name'] ?></td>
                                    <td id="<?php echo "AttStl_Team_row" . $count3 ?>" class="td-t1"><?php echo $result3[$count3]['STL_ID'] ?></td>
                                    <td id="<?php echo "AttStl_onWork_row" . $count3 ?>" style="text-align:left" class="td-t1" style="max-width:200px;"><?php echo $result3[$count3]['onWork'] ?></td>


                                </tr>

                            <?php $count3 = $count3 + 1;
                            } ?>

                        </tbody>
                    </table>

                    <div id="emp-attendance-submit">
                        <input type="submit" id="stlAttendance-submit-1" value="Submit">

                    </div>
                </div>


            </div>
        </div>

        <div style="min-height: 200px;"></div>

        <script>
            var stlTable = <?php echo json_encode($_SESSION['stlTableData']); ?>;
        </script>
        <script src="/public/js/AdminEmployeeTable.js"></script>
        <script src="/public/js/AdminManageEmployee.js"></script>

        <script src="/public/js/AdminManageSTL.js"></script>
</main>