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

    function saveEditEmployee($empId)
    {
        if ($_SESSION['role'] == "systemadmin") {
            if ($_POST['stlIdData'] == NULL) {
                $firtNameData = $_POST['firstNameData'];
                $lastNameData = $_POST['lastNameData'];
                $contactNumberData = $_POST['contactNumberData'];
                $emailData = $_POST['emailData'];
                $dateEnrolledData = $_POST['dateEnrolledData'];
                $salaryData = $_POST['salaryData'];
                $nicNoData = $_POST['nicNoData'];
                $teamData = $_POST['teamData'];

                $values = array($firtNameData, $lastNameData, $contactNumberData, $emailData, $dateEnrolledData, $salaryData, $nicNoData, $teamData);

                if ($this->model->employeeSaveEdit($empId, $values)) {
                    header("Location: /employee/");
                }
            }
        }
    }

    function deleteEmployee($empId)
    {
        if ($_SESSION['role'] == "systemadmin") {
            if ($_POST['stlIdData'] == NULL) {
                if ($this->model->employeeDelete($empId)) {
                    header("Location: /account/");
                }
            }
        }
    }
}
