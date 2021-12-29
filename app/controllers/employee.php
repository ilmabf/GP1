<?php

session_start();
$_SESSION['insertSuccess'] = '';

class Employee extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // stl
        $empDetails = $this->model->getEmployeeDetails();
        $_SESSION['employeeDetails'] = $empDetails;

        $empAttendance = $this->model->getEmployeeAttendanceDetails();
        $_SESSION['employeeAttendanceDetails'] = $empAttendance;

        $stlData = $this->model->getStlData();
        $_SESSION['stlData'] = $stlData;

        $stlAttendance = $this->model->getStlAttendanceDetails();
        $_SESSION['stlAttendanceDetails'] = $stlAttendance;

        // manager
        $empData = $this->model->getEmpData();
        $_SESSION['EmpAttendanceData'] = $empData;

        $stlData = $this->model->getStlAttendanceData();
        $_SESSION['StlAttendanceData'] = $stlData;

        $stlonWorkData = $this->model->getStlOnWorkData();
        $_SESSION['StlOnWorkData'] = $stlonWorkData;

        $stlNotWorkData = $this->model->getStlNotWorkData();
        $_SESSION['StlNotWorkData'] = $stlNotWorkData;

        $emponWorkData = $this->model->getEmpOnWorkData();
        $_SESSION['EmponWorkData'] = $emponWorkData;

        $empNotWorkData = $this->model->getEmpNotWorkData();
        $_SESSION['EmpNotWorkData'] = $empNotWorkData;

        $noOfTeams = $this->model->getTeamCount();
        $_SESSION['teamCount'] = $noOfTeams;

        $userData = $this->model->getUserData();
        $_SESSION['userData'] = $userData;

        // foreach ($_SESSION['userData'] as $stl) {
        //     echo $stl['Email'];
        // }

        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Employee');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Employee');
        }
    }

    function add()
    {
        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {

            //get POST data
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $contactNumber = $_POST['contactNumber'];
            $email = $_POST['email'];
            $dateEnrolled = $_POST['dateEnrolled'];
            $salary = $_POST['salary'];
            $nic = $_POST['nicNo'];

            if (isset($firstName) && isset($lastName) && isset($contactNumber) && isset($email) && isset($dateEnrolled) && isset($salary) && isset($nic)) {

                //insert employee
                $flag = 1;
                if ($this->model->makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $flag)) {
                    $_SESSION['insertSuccess'] = 'Employee added successfully';
                    header("Location: /employee/");
                }
            } else {
                echo "Errrorr";
            }
        } else {
            "Auth Error";
        }
    }

    function stlAdd()
    {
        // add uname, pwd, email , stlid to users tb
        // add stlid, photo to stl table

        if ($_SESSION['role'] == "systemadmin") {
            $nic = $_POST['NIC'];
            $stlUserName = $_POST['stlUserName'];
            $stlEmail = $_POST['stlEmail'];
            $stlPassword = $_POST['stlPassword'];
            // $stlPhoto = $_POST['stlPhoto'];


            if (isset($_POST["submitStl"])) {
                // echo "Submitted";
                // for loop for check if nic not exist in $_SESSION['stlData']
                $flag1 = 1;
                // print_r($_SESSION['stlData']);
                foreach ($_SESSION['employeeDetails'] as $stl) {
                    if ($stl['NIC_No'] == $nic) {
                        $flag1 = 0;
                    }
                }

                if ($flag1 == 0) {

                    // check if stlUserName not exist in users tb
                    $flag2 = 1;
                    foreach ($_SESSION['userData'] as $stl) {
                        // echo $stl['Username'];
                        if ($stl['Username'] == $stlUserName) {
                            $flag2 = 0;
                        }
                    }

                    // echo $flag2;

                    if ($flag2 == 0) {
                        $_SESSION['insertSuccess'] = 'STL UserName already exist';
                        header("Location: /employee/");
                    } else {

                        // check if stlEmail not exist in users tb
                        $flag3 = 1;
                        foreach ($_SESSION['employeeDetails'] as $stl) {
                            if ($stl['Email'] == $stlEmail) {
                                $flag3 = 0;
                            }
                        }

                        // echo $flag3;

                        if ($flag3 == 1) {
                            $_SESSION['insertSuccess'] = 'STL Email not exist in the Employee Pool';
                            header("Location: /employee/");
                        } else {

                            $options = ['cost' => 12];
                            $hashedpwd = password_hash($stlPassword, PASSWORD_BCRYPT, $options);

                            // insert stl
                            $flag = 1;

                            $check = getimagesize($_FILES["stlPhoto"]["tmp_name"]);
                            if ($check !== false) {
                                $image = $_FILES['stlPhoto']['tmp_name'];
                                $imgContent = addslashes(file_get_contents($image));

                                if ($this->model->makeSTLPhoto($imgContent, $nic)) {

                                    // select last row of the stl table
                                    $stlId = $this->model->getLastSTLId();
                                    $newStlID =  $stlId[0]['STL_ID'];
                                    echo $newStlID;
                                    if ($this->model->stlUserAdd($newStlID, $stlUserName, $hashedpwd, $stlEmail, $flag)) {
                                        if ($this->model->empStlIDAdd($newStlID, $nic)) {
                                            $_SESSION['insertSuccess'] = 'STL added successfully';
                                            header("Location: /employee/");
                                        } else {
                                            echo "emp stl add error";
                                        }
                                    } else {
                                        echo "Error";
                                    }
                                } else {
                                    echo "Error in stl photo";
                                }
                            } else {
                                echo "File is not an image.";
                            }
                        }
                    }
                } else {
                    $_SESSION['insertSuccess'] = 'STL Not exist in the Employee Pool';
                    header("Location: /employee/");
                }
            } else {
                echo "Error";
            }
        }
    }

    function saveEditEmployee($empId, $contactNumberVal, $emailData, $salaryData)
    {
        echo $empId;
        echo $contactNumberVal;
        echo $emailData;
        if ($_SESSION['role'] == "systemadmin") {

            $values = array($contactNumberVal, $emailData, $salaryData);
            // print_r($values);

            if ($this->model->employeeSaveEdit($empId, $values)) {
                header("Location: /employee/");
            }
        }
    }

    function deleteEmployee($empId)
    {
        if ($_SESSION['role'] == "systemadmin") {

            $values = array(0, 0);
            if ($this->model->employeeUpdate($empId, $values)) {
                header("Location: /employee/");
            }
        }
    }

    function deleteStl($stlId)
    {
        if ($_SESSION['role'] == "systemadmin") {

            if ($this->model->stlDelete($stlId)) {
                header("Location: /employee/");
            }
        }
    }

    function insertEmpAttendance()
    {
        // print_r($_POST['EmpAttTeamData']);
        // print_r($_POST['EmpAttonWorkData']);
        if ($_SESSION['role'] == "systemadmin") {

            for ($k = 0; $k < sizeof($_SESSION['employeeAttendanceDetails']); $k++) {
                $this->model->insertAttendance_emp($_SESSION['employeeAttendanceDetails'][$k]['Employee_ID'], $_POST['EmpAttTeamData'][$k], $_POST['EmpAttonWorkData'][$k]);
            }
            header("Location: /employee/");
        }
    }

    function insertStlAttendance()
    {
        // print_r($_POST['EmpAttTeamData']);
        // print_r($_POST['EmpAttonWorkData']);

        if ($_SESSION['role'] == "systemadmin") {

            for ($l = 0; $l < sizeof($_SESSION['stlAttendanceDetails']); $l++) {
                // echo $_SESSION['stlAttendanceDetails'][$l]['STL_ID'];
                // echo $_SESSION['stlAttendanceDetails'][$l]['Employee_ID'];
                $this->model->insertAttendance_stl($_SESSION['stlAttendanceDetails'][$l]['Employee_ID'], $_SESSION['stlAttendanceDetails'][$l]['STL_ID'], $_POST['StlAttonWorkData'][$l]);
            }
            header("Location: /employee/");
        }
    }

    function noofTeams()
    {
        if ($_SESSION['role'] == "systemadmin") {
            $noOfTeams = $_POST['teamCount'];
            $this->model->updateNoOfTeams($noOfTeams);
            header("Location: /employee/");
        }
    }
}


// <?php
//       if(isset($_POST["submit"])){
//           $check = getimagesize($_FILES["image"]["tmp_name"]);
//           if($check !== false){
//               $image = $_FILES['image']['tmp_name'];
//               $imgContent = addslashes(file_get_contents($image));

//             /*
//              * Insert image data into database
//              */

//             //DB details
//             $dbHost     = 'localhost';
//             $dbUsername = 'root';
//             $dbPassword = '*****';
//             $dbName     = 'codexworld';

//             //Create connection and select DB
//             $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//             // Check connection
//             if($db->connect_error){
//                 die("Connection failed: " . $db->connect_error);
//             }

//             $dataTime = date("Y-m-d H:i:s");

//             //Insert image content into database
//             $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
//             if($insert){
//                 echo "File uploaded successfully.";
//             }else{
//                 echo "File upload failed, please try again.";
//             } 
//         }else{
//             echo "Please select an image file to upload.";
//         }
//     }
//     
