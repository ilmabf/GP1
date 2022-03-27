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

        $empDetails = $this->model->getEmployeeDetails();
        $_SESSION['employeeDetails'] = $empDetails;

        $empAttendance = $this->model->getEmployeeAttendanceDetails();
        $_SESSION['employeeAttendanceDetails'] = $empAttendance;

        $empData = $this->model->getEmpData();
        $_SESSION['EmpAttendanceData'] = $empData;

        $emponWorkData = $this->model->getEmpOnWorkData();
        $_SESSION['EmponWorkData'] = $emponWorkData;

        $empNotWorkData = $this->model->getEmpNotWorkData();
        $_SESSION['EmpNotWorkData'] = $empNotWorkData;

        $userData = $this->model->getUserData();
        $_SESSION['userData'] = $userData;

        $stlData = $this->model->getStlData();
        $_SESSION['stlData'] = $stlData;

        $stlAttendance = $this->model->getStlAttendanceDetails();
        $_SESSION['stlAttendanceDetails'] = $stlAttendance;

        $stlData = $this->model->getStlAttendanceData();
        $_SESSION['StlAttendanceData'] = $stlData;

        $stlonWorkData = $this->model->getStlOnWorkData();
        $_SESSION['StlOnWorkData'] = $stlonWorkData;

        $stlNotWorkData = $this->model->getStlNotWorkData();
        $_SESSION['StlNotWorkData'] = $stlNotWorkData;

        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/Employee');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/Employee');
        }
    }

    function serviceTeamLeaders()
    {
        $empDetails = $this->model->getEmployeeDetails();
        $_SESSION['employeeDetails'] = $empDetails;

        $empAttendance = $this->model->getEmployeeAttendanceDetails();
        $_SESSION['employeeAttendanceDetails'] = $empAttendance;

        $empData = $this->model->getEmpData();
        $_SESSION['EmpAttendanceData'] = $empData;

        $emponWorkData = $this->model->getEmpOnWorkData();
        $_SESSION['EmponWorkData'] = $emponWorkData;

        $empNotWorkData = $this->model->getEmpNotWorkData();
        $_SESSION['EmpNotWorkData'] = $empNotWorkData;

        $stlData = $this->model->getStlData();
        $_SESSION['stlData'] = $stlData;

        $stlAttendance = $this->model->getStlAttendanceDetails();
        $_SESSION['stlAttendanceDetails'] = $stlAttendance;

        $stlData = $this->model->getStlAttendanceData();
        $_SESSION['StlAttendanceData'] = $stlData;

        $stlonWorkData = $this->model->getStlOnWorkData();
        $_SESSION['StlOnWorkData'] = $stlonWorkData;

        $stlNotWorkData = $this->model->getStlNotWorkData();
        $_SESSION['StlNotWorkData'] = $stlNotWorkData;

        $userData = $this->model->getUserData();
        $_SESSION['userData'] = $userData;

        $stlTableData = $this->model->getStlDetails();
        $_SESSION['stlTableData'] = $stlTableData;

        //User Autherization
        if ($_SESSION['role'] == "systemadmin") {
            $this->view->render('admin/ServiceTeamLeader');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/ServiceTeamLeader');
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


            if (isset($_POST["submitStl"])) {
                echo "Submitted";
                // for loop for check if nic not exist in $_SESSION['stlData']
                $flag1 = 1;
                foreach ($_SESSION['employeeDetails'] as $stl) {
                    if ($stl['NIC_No'] == $nic) {
                        $flag1 = 0;
                    }
                }

                if ($flag1 == 0) {

                    // check if stlUserName not exist in users tb
                    $flag2 = 1;
                    foreach ($_SESSION['userData'] as $stl) {
                        if ($stl['Username'] == $stlUserName) {
                            $flag2 = 0;
                        }
                    }

                    if ($flag2 == 0) {
                        $_SESSION['insertSuccess'] = 'UserName already exists';
                        header("Location: /employee/serviceTeamLeaders");
                    } else {

                        // check if stlEmail not exist in users tb
                        $flag3 = 1;
                        foreach ($_SESSION['employeeDetails'] as $stl) {
                            if ($stl['Email'] == $stlEmail) {           //Check ALL USER's Email
                                $flag3 = 0;
                            }
                        }

                        if ($flag3 == 1) {
                            $_SESSION['insertSuccess'] = 'Email does not belong to an employee';
                            header("Location: /employee/serviceTeamLeaders");
                        } else {

                            $options = ['cost' => 12];
                            $hashedpwd = password_hash($stlPassword, PASSWORD_BCRYPT, $options);

                            // insert stl
                            $flag = 1;
                            $targetDir = "/public/images/";
                            $fileName = basename($_FILES["stlPhoto"]["name"]);
                            $targetFilePath = $targetDir . $fileName;
                            echo $targetFilePath;
                            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');

                            if (in_array($fileType, $allowTypes)) {
                                echo "heretop";
                                if (move_uploaded_file($_FILES["stlPhoto"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $targetFilePath)) {
                                    // insert to stl table
                                    if ($this->model->makeSTLPhoto($fileName, $nic)) {

                                        // select last row of the stl table
                                        $stlId = $this->model->getLastSTLId();
                                        $newStlID =  $stlId[0]['STL_ID'];
                                        if ($this->model->stlUserAdd($newStlID, $stlUserName, $hashedpwd, $stlEmail, $flag)) {
                                            if ($this->model->empStlIDAdd($newStlID, $nic)) {
                                                $empID = $this->model->getSTLEmpID($nic);
                                                $result = $this->model->changeSTLAttendance($empID[0]['Employee_ID'],$newStlID);
                                                $_SESSION['insertSuccess'] = 'Service Team Leader added successfully';
                                                header("Location: /employee/serviceTeamLeaders");
                                            } else {
                                                echo "emp stl add error";
                                            }
                                        } else {
                                            echo "Error";
                                        }
                                    } else {
                                        echo "Error in stl photo";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function updateStlImage()
    {
        if ($_SESSION['role'] == "systemadmin") {
            $stlId = $_POST['stl_id'];
            $targetDir = "/public/images/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            echo $targetFilePath;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');
            // // max file size 5MB
            // $maxFileSize = 5 * 1024 * 1024;

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $targetFilePath)) {
                    // insert to stl table
                    if ($this->model->updateSTLPhoto($fileName, $stlId)) {
                        $_SESSION['insertSuccess'] = 'STL Photo updated successfully';
                        header("Location: /employee/serviceTeamLeaders");
                    } else {
                        echo "Error in stl photo";
                    }
                }
            }
        }
    }

    function saveEditEmployee($empId, $contactNumberVal, $emailData, $salaryData)
    {
        if ($_SESSION['role'] == "systemadmin") {

            $values = array($contactNumberVal, $emailData, $salaryData);

            if ($this->model->employeeSaveEdit($empId, $values)) {
                header("Location: /employee/");
            }
        }
    }

    function saveEditSTL($empId, $contactNumberVal, $emailData, $salaryData)
    {
        if ($_SESSION['role'] == "systemadmin") {

            $values = array($contactNumberVal, $emailData, $salaryData);

            if ($this->model->employeeSaveEdit($empId, $values)) {
                header("Location: /employee/serviceTeamLeaders");
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
            $result = $this->model->stlDelete($stlId);
            if ($result == "Success") {
                header("Location: /employee/serviceTeamLeaders");
            }
        }
    }

    function insertEmpAttendance($teams)
    {
        $AttendanceArray =  json_decode($teams, true);
        if ($_SESSION['role'] == "systemadmin") {
            $flag1 = 0;
            for ($k = 0; $k < sizeof($_SESSION['employeeAttendanceDetails']); $k++) {
                if ($AttendanceArray[$k]['onwork'] == "0" || $AttendanceArray[$k]['onwork'] == "1") {
                    $this->model->insertAttendance_emp($_SESSION['employeeAttendanceDetails'][$k]['Employee_ID'], $AttendanceArray[$k]['team'], $AttendanceArray[$k]['onwork']);
                } else {
                    $flag1 = 1;
                }
            }

            if ($flag1 == 1) {
                $_SESSION['insertSuccess'] = "On work error";
            }
            header("Location: /employee/");
        }
    }

    function insertStlAttendance($teams)
    {
        $AttendanceArray =  json_decode($teams, true);
        if ($_SESSION['role'] == "systemadmin") {

            for ($l = 0; $l < sizeof($_SESSION['stlAttendanceDetails']); $l++) {
                $this->model->insertAttendance_stl($_SESSION['stlAttendanceDetails'][$l]['Employee_ID'], $_SESSION['stlAttendanceDetails'][$l]['STL_ID'], $AttendanceArray[$l]['onwork']);
            }
            header("Location: /employee/serviceTeamLeaders");
        }
    }
}
