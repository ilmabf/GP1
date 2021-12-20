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

        $stlData = $this->model->getStlData();
        $_SESSION['stlData'] = $stlData;

        $stlAttendance = $this->model->getStlAttendanceDetails();
        $_SESSION['stlAttendanceDetails'] = $stlAttendance;

        // $result = $this->model->getTeamCount();
        // $_SESSION['teamCount'] = $result;

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

            if (isset($nic) && isset($stlUserName) && isset($stlEmail) && isset($stlPassword)) {

                // $options = ['cost' => 12];
                // $hashedpwd = password_hash($stlPassword, PASSWORD_BCRYPT, $options);

                // $filename = $_FILES["stlPhoto"]["name"];
                $tempname = $_FILES["stlPhoto"]["tmp_name"];

                if ($this->model->stlPhotoAdd($tempname)) {
                    $options = ['cost' => 12];
                    $hashedpwd = password_hash($stlPassword, PASSWORD_BCRYPT, $options);

                    $stlDetails = $this->model->getStlDetails();
                    $_SESSION['stlDetails'] = $stlDetails;

                    $stlCount = $_SESSION['rowCount'];
                    $stlId = $_SESSION['stlDetails'][$stlCount - 1]['STL_ID'];
                    echo $stlCount;
                    echo $stlId;

                    if ($this->model->stlUserAdd($stlId, $stlUserName, $hashedpwd, $stlEmail)) {
                        header("Location: /employee/");
                    }
                }
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
    
    function insertAttendance(){
        print_r($_POST['EmpAttTeamData']);
        print_r($_POST['EmpAttonWorkData']);
    }
}
