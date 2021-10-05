<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
    }

    // function manageEmployee(){
    //     $this->view->render('adminManageEmployee');
    // }

    // function addNewEmployee(){

    //     $firstName = $_POST['firstName'];
    //     $lastName = $_POST['lastName'];
    //     $contactNumber = $_POST['contactNumber'];
    //     $email = $_POST['email'];
    //     $dateEnrolled = $_POST['dateEnrolled'];
    //     $salary = $_POST['salary'];
    //     $nic = $_POST['nicNo'];
    //     $team = $_POST['team'];
    //     $leader = $_POST['leader'];

    //     if(isset($firstName) && isset($lastName) && isset($contactNumber) && isset($email) && isset($dateEnrolled) && isset($salary) && isset($nic) && isset($team)) {
    //         $employeeInsertResult = $this->model->makeEmployee($firstName, $lastName, $contactNumber, $email, $dateEnrolled, $salary, $nic, $team);
    //     }else{
    //         echo "Errorrrr";
    //     }


    // }

    function manageService(){
        $this->view->render('adminManageService');
    }

}