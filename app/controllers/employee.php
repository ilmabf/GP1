<?php

session_start();
$_SESSION['insertSuccess'] = '';

class Employee extends Controller{

    function __construct(){
        parent::__construct();
    }

    function adminManageEmployee(){
        $result = $this->model->getEmployeeDetails();
        $_SESSION['employeeDetails'] = $result;

        $this->view->render('adminManageEmployee');
    }

    function addNewEmployee(){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $contactNumber = $_POST['contactNumber'];
        $email = $_POST['email'];
        $dateEnrolled = $_POST['dateEnrolled'];
        $salary = $_POST['salary'];
        $nic = $_POST['nicNo'];
        $team = $_POST['team'];

        if(isset($firstName) && isset($lastName) && isset($contactNumber) && isset($email) && isset($dateEnrolled) && isset($salary) && isset($nic) && isset($team)) {
            
            
            if($this->model->makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team)){
                $_SESSION['insertSuccess'] = 'Employee added successfully';
                header("Location: /employee/adminManageEmployee");
            }
        }else{
            Echo "Errrorr";
        }
    }
}