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

    function upcoming()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerUpcomingReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerUpcomingReservations');
        }
    }

    function upcomingOrder()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerViewUpcomingOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerViewUpcomingOrder');
        }
    }

    function completed()
    {

        if ($_SESSION['role'] == "customer") {
            $this->view->render('customerCompletedReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('managerCompletedReservations');
        }
    }

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
