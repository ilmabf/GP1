<?php
session_start();
class Booking extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //get details for booking
    function details()
    {
        $this->view->render('CustomerBookAWash');
    }

    //get location for booking
    function location()
    {
        $this->view->render('CustomerBookAWash2');
    }

    function orderSummary()
    {
        $this->view->render('CustomerOrderSummary');
    }

    function customerHome()
    {
        $this->view->render('CustomerHome');
    }

    function reschedule()
    {
        $this->view->render('CustomerReschedule');
    }

    // upcoming reservations
    function upcoming()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('CustomerUpcomingReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('ManagerUpcomingReservations');
        }
    }

    //upcoming reservation - x
    function upcomingOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('CustomerViewUpcomingOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('ManagerViewUpcomingOrder');
        }
    }

    //completed reservations
    function completed()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('CustomerCompletedReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('ManagerCompletedReservations');
        }
    }

    //completed reservation - x
    function completedOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('CustomerViewCompletedOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('ManagerViewCompletedOrder');
        } else if ($_SESSION['role'] == "stl") {
            $this->view->render('StlAssignedOrders');
        }
    }

}
