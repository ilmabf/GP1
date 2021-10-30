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

        $result = $this->model->getEmployeeDetails();
        $_SESSION['employeeDetails'] = $result;

        $result = $this->model->getTeamCount();
        $_SESSION['teamCount'] = $result;

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
            $team = $_POST['team'];

            if (isset($firstName) && isset($lastName) && isset($contactNumber) && isset($email) && isset($dateEnrolled) && isset($salary) && isset($nic) && isset($team)) {

                //insert employee
                if ($this->model->makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team)) {
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

    function saveEditEmployee($empId, $contactNumberVal, $emailData, $salaryData)
    {

        // echo $empId;
        // echo $contactNumberVal;
        // echo $emailData;
        // echo $salaryData;

        if ($_SESSION['role'] == "systemadmin") {

            $values = array($contactNumberVal, $emailData, $salaryData);

            if ($this->model->employeeSaveEdit($empId, $values)) {
                header("Location: /employee/");
            }
        }
    }

    function deleteEmployee($empId)
    {
        if ($_SESSION['role'] == "systemadmin") {
            if ($_POST['stlIdData'] == NULL) {
                if ($this->model->employeeDelete($empId)) {
                    header("Location: /employee/");
                }
            }
        }
    }
}
