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
        $_SESSION['vehicles'] = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
        $_SESSION['address'] = $this->model->getAddress($_SESSION['userDetails'][0]['User_ID']);
        $_SESSION['washpackages'] = $this->model->getWashPackage();
        $_SESSION['servicePrice'] = $this->model->getServicePrice();
        $_SESSION['booked'] = $this->model->getBookedDates();
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
        $_SESSION['completedReservations'] = $this->model->getCompletedReservationList();
        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/CompletedReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/CompletedReservations');
        }
    }

    //completed reservation - x
    function completedOrder($order_id)
    {

        $_SESSION['completedOrder'] = $this->model->getCompletedReservationDetails($order_id);
        
        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/CompletedOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/CompletedOrder');
        }
    }

    function makeReservation($details){
        $details = explode(';', $details);

        for($i = 0; $i<sizeof($details); $i++){
            if(strncmp($details[$i], "day", 3) == 0){
                $day = substr($details[$i], 4);
            }
            else if(strncmp($details[$i], "month", 5) == 0){
                $month = substr($details[$i], 6);
            }
            else if(strncmp($details[$i], "year", 4) == 0){
                $year = substr($details[$i], 5);
            }
            else if(strncmp($details[$i], "time", 4) == 0){
                $time = substr($details[$i],5);
            }
            else if(strncmp($details[$i], "vehicle", 7) == 0){
                $vehicle = substr($details[$i], 8);
            }
            else if(strncmp($details[$i], "washPackageName", 15) == 0){
                $washPackageName = substr($details[$i], 16);
            }
            else if(strncmp($details[$i], "washPackage", 11) == 0){
                $washPackage = substr($details[$i], 12);
            }
            else if(strncmp($details[$i], "price", 5) == 0){
                $price = substr($details[$i], 6);
            }
            else if(strncmp($details[$i], "total", 5) == 0){
                $total = substr($details[$i], 6);
            }
            else if(strncmp($details[$i], "address", 7) == 0){
                $address = substr($details[$i], 8);
            }
            else if(strncmp($details[$i], "latitude", 8) == 0){
                $latitude = substr($details[$i], 9);
            }
            else if(strncmp($details[$i], "longitude", 9) == 0){
                $longitude = substr($details[$i],10);
            }
        }

        $date = $year . "-" . $month . "-" . $day;

        $reservationDetails = array($vehicle, $address, $latitude, $longitude, $price, $total, $washPackage, $date, $time, $_SESSION['userDetails'][0]['User_ID']);
        if ($this->model->AddReserevation($reservationDetails)) {
            header("Location: /user/home");
        }
    }
}

// what is json_encode?
// https://www.php.net/manual/en/function.json-encode.php
