<?php
session_start();
class Service extends Controller{

    function __construct(){
        parent::__construct();
    }

    function equipment(){
        if($_SESSION['role'] == "systemadmin"){
            $this->view->render('adminEquipment');
            exit;
        }
        else if($_SESSION['role'] == "manager"){
            $this->view->render('managerEquipment');
        }
    }

    // function employeeDetails(){
    //     $this->view->render('managerEmployeeDetails');
    // }

    function washPackage(){
        if($_SESSION['role'] == "systemadmin"){
            $this->view->render('adminService');
            exit;
        }
        else if($_SESSION['role'] == "manager"){
            $this->view->render('managerService');
        }
    }

}