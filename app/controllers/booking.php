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
        $this->view->render('customer/BookAWash');
    }

    //get location for booking
    function location()
    {
        $this->view->render('customer/BookAWash2');
    }

    function orderSummary()
    {
        $this->view->render('customer/OrderSummary');
    }

    function reschedule()
    {
        $this->view->render('customer/Reschedule');
    }

    // upcoming reservations
    function upcoming()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/UpcomingReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/UpcomingReservations');
        }
    }

    //upcoming reservation - x
    function upcomingOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/UpcomingOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/UpcomingOrder');
        }
    }

    //completed reservations
    function completed()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/CompletedReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/CompletedReservations');
        }
    }

    //completed reservation - x
    function completedOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/CompletedOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/CompletedOrder');
        }
        
    }

}
