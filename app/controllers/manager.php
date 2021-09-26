<?php

class Manager extends Controller{

    function __construct(){
        parent::__construct();
    }

    function managerDashboard(){
        $this->view->render('managerDashboard');
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

    function completedReservations(){
        $this->view->render('managerReservationCompleted');
    }

    function viewOrder(){
        $this->view->render('managerViewCompletedOrder');
    }

    function upcomingReservation(){
        $this->view->render('managerReservationUpcoming');
    }

    function viewUpcomingOrder(){
        $this->view->render('managerViewUpcomingOrder');
    }
}