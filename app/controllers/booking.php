<?php
require 'libs/Mailer.php';
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
        $_SESSION['upcomingReservations'] = $this->model->getUpcomingReservationList();
        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/UpcomingReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/UpcomingReservations');
        }
    }

    //upcoming reservation - x
    function upcomingOrder($order_id)
    {

        $_SESSION['teams'] = $this->model->getTeams();
        $_SESSION['upcomingOrder'] = $this->model->getReservationDetails($order_id);//order details
        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['upcomingOrder'][0]['Customer_ID']);//customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['upcomingOrder'][0]['Vehicle_ID']);//vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['upcomingOrder'][0]['Wash_Package_ID']);//wash package selected
        
        
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

        $_SESSION['completedOrder'] = $this->model->getReservationDetails($order_id);//order details
        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['completedOrder'][0]['Customer_ID']);//customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['completedOrder'][0]['Vehicle_ID']);//vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['completedOrder'][0]['Wash_Package_ID']);//wash package selected
        $_SESSION['images'] = $this->model->getSelectedImages($_SESSION['completedOrder'][0]['Reservation_ID']);//Before after images

        if ($_SESSION['role'] == "customer") {
            $order_id = str_replace('_', ' ', $order_id);
            $this->view->render('customer/CompletedOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $order_id = str_replace('_', ' ', $order_id);
            $this->view->render('manager/CompletedOrder');
        }
    }

    function makeReservation($details)
    {
        $details = explode(';', $details);

        for ($i = 0; $i < sizeof($details); $i++) {
            if (strncmp($details[$i], "day", 3) == 0) {
                $day = substr($details[$i], 4);
            } else if (strncmp($details[$i], "month", 5) == 0) {
                $month = substr($details[$i], 6);
            } else if (strncmp($details[$i], "year", 4) == 0) {
                $year = substr($details[$i], 5);
            } else if (strncmp($details[$i], "time", 4) == 0) {
                $time = substr($details[$i], 5);
            } else if (strncmp($details[$i], "vehicle", 7) == 0) {
                $vehicle = substr($details[$i], 8);
            } else if (strncmp($details[$i], "washPackageName", 15) == 0) {
                $washPackageName = substr($details[$i], 16);
            } else if (strncmp($details[$i], "washPackage", 11) == 0) {
                $washPackage = substr($details[$i], 12);
            } else if (strncmp($details[$i], "price", 5) == 0) {
                $price = substr($details[$i], 6);
            } else if (strncmp($details[$i], "total", 5) == 0) {
                $total = substr($details[$i], 6);
            } else if (strncmp($details[$i], "address", 7) == 0) {
                $address = substr($details[$i], 8);
            } else if (strncmp($details[$i], "latitude", 8) == 0) {
                $latitude = substr($details[$i], 9);
            } else if (strncmp($details[$i], "longitude", 9) == 0) {
                $longitude = substr($details[$i], 10);
            }
        }

        $date = $year . "-" . $month . "-" . $day;

        $reservationDetails = array($vehicle, $address, $latitude, $longitude, $price, $total, $washPackage, $date, $time, $_SESSION['userDetails'][0]['User_ID']);
        if ($this->model->AddReserevation($reservationDetails)) {

            $mail = new Mailer();

            $output = '<p>Dear customer,</p>';
            $output .= '<p>Thank you for using WandiWash!</p>';
            $output .= '<p>You have made a reservation on ' . $date . ' with the following details.</p>';
            $output .= '<p>Vehicle - ' .$vehicle . '</p>';
            $output .= '<p>Wash Package - ' .$washPackageName . '</p>';
            $output .= '<p>Location - ' .$address . '</p>';
            $output .= '<p></p>';
            $output .= '<p>Service Price - Rs.' .$price . '.00</p>';
            $output .= '<p>Total Price - Rs.' .$total . '.00</p>';
            $output .= '<p>We will let you know once a service team is assigned for you. Make sure to check your email or your upcoming reservations.</p>';
            $output .= '<p>Thanks,</p>';
            $output .= '<p>WandiWash.</p>';
            $body = $output;
            $subject = "We received your reservation - wandiwash.com";

            if ($mail->mailto($subject, $_SESSION['userDetails'][0]['Email'], $body)) {
                header("Location: /user/home");
            }
        }
    }
}

// what is json_encode?
// https://www.php.net/manual/en/function.json-encode.php
