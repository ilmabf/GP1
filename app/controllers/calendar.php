<?php

class Calendar extends Controller{

    function __construct(){
        parent::__construct();
    }
    function reservations(){
        $this->view->render('stlAssignedOrders');
    } 
    function orderDetails(){
        $this->view->render('stlOrderDetails');
    } 
}