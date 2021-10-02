<?php

class Manager extends Controller{

    function __construct(){
        parent::__construct();
    }

    function viewEquipments(){
        $this->view->render('managerEquipmentDetails');
    }

    function employeeDetails(){
        $this->view->render('managerEmployeeDetails');
    }

    function serviceDetails(){
        $this->view->render('managerServiceDetails');
    }

}