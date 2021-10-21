<?php

class Calendar extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //Get reservations for today
    function reservations()
    {
        $this->view->render('stl/AssignedOrders');
    }
    function orderDetails()
    {
        $this->view->render('stl/OrderDetails');
    }
}
