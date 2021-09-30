<?php

class STL extends Controller{

    function __construct(){
        parent::__construct();
    }
    function  stlHome(){
        $this->view->render('stlHome');
    }
    function viewSTLdashboard(){
        $this->view->render('stlDashboard');
    }
    function viewAssignedOrders(){
        $this->view->render('stlAssignedOrders');
    } 
    function viewReservationDetails(){
        $this->view->render('stlOrderDetails');
    } 
}