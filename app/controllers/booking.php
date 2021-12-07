<?php
session_start();
class Booking extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //get details for booking
    function calendar()
    {
        $this->view->render('customer/BookAWashCalendar');
    }

    function details()
    {
        $_SESSION['booked'] = $this->model->getBookedDates();
        // print_r($_SESSION['booked']);
        // loop through booked array and print each key value pair
        // foreach ($_SESSION['booked'] as $key => $value) {
        //     echo $key . ": " . $value . "<br>";
        // }

        // foreach ($_SESSION['booked'] as $key => $value) {
        //     echo $key . ": " . $value . "<br>";
        // }




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

// what is json_encode?
// https://www.php.net/manual/en/function.json-encode.php
