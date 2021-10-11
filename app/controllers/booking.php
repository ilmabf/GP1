<?php
session_start();
class Booking extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function bookAwash()
    {
        $this->view->render('customerBookAWash');
    }

    //get location for booking
    function bookAWash2()
    {
        $this->view->render('customerBookAWash2');
    }

    function orderSummary()
    {
        $this->view->render('customerOrderSummary');
    }

    function customerHome()
    {
        $this->view->render('customerHome');
    }

    function reschedule()
    {
        $this->view->render('customerReschedule');
    }

    // upcoming reservations
    function upcoming()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerUpcomingReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerUpcomingReservations');
        }
    }

    //upcoming reservation - x
    function upcomingOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerViewUpcomingOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerViewUpcomingOrder');
        }
    }

    //completed reservations
    function completed()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerCompletedReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerCompletedReservations');
        }
    }

    //completed reservation - x
    function completedOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerViewCompletedOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerViewCompletedOrder');
        }
    }
}
