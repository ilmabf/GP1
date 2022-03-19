<?php
require 'libs/Mailer.php';
date_default_timezone_set("Asia/Colombo");
session_start();
$_SESSION['cancelReservation'] = "";
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
        if ($_SESSION['role'] == "customer") {
            $_SESSION['vehicles'] = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
            $_SESSION['address'] = $this->model->getAddress($_SESSION['userDetails'][0]['User_ID']);
            $_SESSION['washpackages'] = $this->model->getWashPackage();
            $_SESSION['servicePrice'] = $this->model->getServicePrice();
            $_SESSION['booked'] = $this->model->getBookedDates();
            $this->view->render('customer/BookAWash');
        }
    }

    function rescheduleDetails($orderID)
    {
        if ($_SESSION['role'] == "customer") {
            // today
            $today = date("Y-m-d");

            // get date and time of reservation
            $reservation = $this->model->getReservationDetails($orderID);
            $_SESSION['reservationDetails'] = $reservation;
            $date = $reservation[0]['Date'];


            // if different of reservation time is more than 24 hours from today date time then delete reservation
            if (strtotime($date) - strtotime($today) > 86400) {
                $_SESSION['vehicles'] = $this->model->getVehicles($_SESSION['userDetails'][0]['User_ID']);
                $_SESSION['address'] = $this->model->getAddress($_SESSION['userDetails'][0]['User_ID']);
                $_SESSION['washpackages'] = $this->model->getWashPackage();
                $_SESSION['servicePrice'] = $this->model->getServicePrice();
                $_SESSION['booked'] = $this->model->getBookedDates();
                $_SESSION['rescheduleID'] = $orderID;
                $this->view->render('customer/Reschedule');
            } else {
                // session to display cannot cancel reservation
                $_SESSION['cancelReservation'] = "cannot";
                header("Location: /booking/upcomingOrder/" . $orderID);
            }
        }
    }

    //get location for booking
    function location()
    {
        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/BookAWash2');
        }
    }

    function rescheduleLocation($orderID)
    {
        if ($_SESSION['role'] == "customer") {
            $_SESSION['rescheduleID'] = $orderID;
            $this->view->render('customer/Reschedule2');
        }
    }

    function orderSummary()
    {
        if ($_SESSION['role'] == "customer") {
            $this->view->render('customer/OrderSummary');
        }
    }

    function orderRescheduleSummary($orderID)
    {
        if ($_SESSION['role'] == "customer") {
            $_SESSION['rescheduleID'] = $orderID;
            $this->view->render('customer/RescheduleSummary');
        }
    }

    // function reschedule()
    // {
    //     if ($_SESSION['role'] == "customer") {
    //         $this->view->render('customer/Reschedule');
    //     }
    // }

    // upcoming reservations
    function upcoming()
    {
        $_SESSION['upcomingReservations'] = $this->model->getUpcomingReservationList1();

        if ($_SESSION['role'] == "customer") {
            $myUpcomingReservations = array();
            for ($i = 0; $i < count($_SESSION['upcomingReservations']); $i += 1) {
                if ($_SESSION['upcomingReservations'][$i]['Customer_ID'] == $_SESSION['userDetails'][0]['User_ID']) {
                    $myUpcomingReservations[$i] = $_SESSION['upcomingReservations'][$i];
                }
            }
            // print_r($myUpcomingReservations);
            $_SESSION['myUpcomingReservations'] = $myUpcomingReservations;
            $this->view->render('customer/UpcomingReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $this->view->render('manager/UpcomingReservations');
        }
    }

    //upcoming reservation - x
    function upcomingOrder($orderID)
    {


        $_SESSION['upcomingOrder'] = $this->model->getReservationDetails($orderID); //order details

        // prevent customers from seeing reservations of other customers by typing in url
        if($_SESSION['userDetails'][0]['User_ID'] != $_SESSION['upcomingOrder'][0]['Customer_ID']){
            header("Location: /booking/upcoming");
        }

        $_SESSION['teams'] = $this->model->getTeams($_SESSION['upcomingOrder'][0]['Time']);
        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['upcomingOrder'][0]['Customer_ID']); //customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['upcomingOrder'][0]['Vehicle_ID']); //vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['upcomingOrder'][0]['Wash_Package_ID']); //wash package selected
        $_SESSION['stlDetails'] = $this->model->getSTLDetails($_SESSION['upcomingOrder'][0]['Service_team_leader_ID']); //get details of assigned stl
        if ($_SESSION['role'] == "customer") {
            $today = date("Y-m-d");

            $reservation = $this->model->getReservationDetails($orderID);
            $date = $reservation[0]['Date'];
            // echo strtotime($today);
            if (strtotime($date) - strtotime($today) > 86400) {
                $_SESSION['displayReservationBtn'] = "true";
                $this->view->render('customer/UpcomingOrder');
            } else {
                // session to display cannot cancel reservation
                $_SESSION['displayReservationBtn'] = "false";
                $this->view->render('customer/UpcomingOrder');
            }
        } else if ($_SESSION['role'] == "manager") {

            $today = date("Y-m-d");

            $reservation = $this->model->getReservationDetails($orderID);
            $date = $reservation[0]['Date'];

            if (strtotime($date) - strtotime($today) > 86400) {
                $_SESSION['displayReservationBtn'] = "true";
                $this->view->render('manager/UpcomingOrder');
            } else {
                $_SESSION['displayReservationBtn'] = "false";
                $this->view->render('manager/UpcomingOrder');
            }
        }
    }

    //completed reservations
    function completed()
    {
        if ($_SESSION['role'] == "customer") {

            $custoID = $_SESSION['userDetails'][0]['User_ID'];
            $_SESSION['customerCompletedReservations'] = $this->model->getCustomerCompletedReservationList($custoID);

            $this->view->render('customer/CompletedReservations');
            exit;
        } else if ($_SESSION['role'] == "manager") {

            $_SESSION['completedReservations'] = $this->model->getCompletedReservationList1();

            $this->view->render('manager/CompletedReservations');
        }
    }

    //completed reservation - x
    function completedOrder($orderID)
    {

        $_SESSION['completedOrder'] = $this->model->getReservationDetails($orderID); //order details

        // prevent customers from seeing reservations of other customers by typing in url
        if($_SESSION['userDetails'][0]['User_ID'] != $_SESSION['completedOrder'][0]['Customer_ID']){
            header("Location: /booking/completed");
        }

        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['completedOrder'][0]['Customer_ID']); //customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['completedOrder'][0]['Vehicle_ID']); //vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['completedOrder'][0]['Wash_Package_ID']); //wash package selected
        $_SESSION['images'] = $this->model->getSelectedImages($_SESSION['completedOrder'][0]['Reservation_ID']); //Before after images

        if ($_SESSION['role'] == "customer") {
            $_SESSION['completedSTL'] =  $this->model->getSTLDetails($_SESSION['completedOrder'][0]['Service_team_leader_ID']);

            $orderID = str_replace('_', ' ', $orderID);
            $this->view->render('customer/CompletedOrder');
            exit;
        } else if ($_SESSION['role'] == "manager") {
            $orderID = str_replace('_', ' ', $orderID);
            $this->view->render('manager/CompletedOrder');
        }
    }

    function makeReservation($details)
    {
        // echo $details;
        if ($_SESSION['role'] == "customer") {

            $details = str_replace('_', ' ', $details);
            $details = str_replace('|', '/', $details);
            echo $details;
            $details = explode(';', $details);

            for ($i = 0; $i < sizeof($details); $i++) {
                if (strncmp($details[$i], " day", 4) == 0) {
                    $day = substr($details[$i], 5);
                } else if (strncmp($details[$i], " month", 6) == 0) {
                    $month = substr($details[$i], 7);
                } else if (strncmp($details[$i], " year", 5) == 0) {
                    $year = substr($details[$i], 6);
                } else if (strncmp($details[$i], " time", 5) == 0) {
                    $time = substr($details[$i], 6);
                } else if (strncmp($details[$i], " vehicle", 8) == 0) {
                    $vehicle = substr($details[$i], 9);
                } else if (strncmp($details[$i], " washPackageName", 16) == 0) {
                    $washPackageName = substr($details[$i], 17);
                } else if (strncmp($details[$i], " washPackage", 12) == 0) {
                    $washPackage = substr($details[$i], 13);
                } else if (strncmp($details[$i], " price", 6) == 0) {
                    $price = substr($details[$i], 7);
                } else if (strncmp($details[$i], " total", 6) == 0) {
                    $total = substr($details[$i], 7);
                } else if (strncmp($details[$i], " address", 8) == 0) {
                    $address = substr($details[$i], 9);
                } else if (strncmp($details[$i], " latitude", 9) == 0) {
                    $latitude = substr($details[$i], 10);
                } else if (strncmp($details[$i], " longitude", 10) == 0) {
                    $longitude = substr($details[$i], 11);
                }
            }

            $date = $year . "-" . $month . "-" . $day;

            $result = $this->model->checkValidity($vehicle, $date, $time);
            if ($result == "success") {
                $reservationDetails = array($vehicle, $address, $latitude, $longitude, $price, $total, $washPackage, $date, $time, $_SESSION['userDetails'][0]['User_ID']);
                if ($this->model->AddReserevation($reservationDetails)) {

                    $mail = new Mailer();

                    $output = '<p>Dear customer,</p>';
                    $output .= '<p>Thank you for using WandiWash!</p>';
                    $output .= '<p>You have made a reservation on ' . $date . ' with the following details.</p>';
                    $output .= '<p>Vehicle - ' . $vehicle . '</p>';
                    $output .= '<p>Wash Package - ' . $washPackageName . '</p>';
                    $output .= '<p>Location - ' . $address . '</p>';
                    $output .= '<p></p>';
                    $output .= '<p>Service Price - Rs.' . $price . '.00</p>';
                    $output .= '<p>Total Price - Rs.' . $total . '.00</p>';
                    $output .= '<p>We will let you know once a service team is assigned for you. Make sure to check your email or your upcoming reservations.</p>';
                    $output .= '<p>Thanks,</p>';
                    $output .= '<p>WandiWash.</p>';
                    $body = $output;
                    $subject = "We received your reservation - wandiwash.com";

                    if ($mail->mailto($subject, $_SESSION['userDetails'][0]['Email'], $body)) {
                        $_SESSION['BookingSuccess'] = "true";
                        header("Location: /booking/orderSummary");
                    }
                }
            } else {
                $_SESSION['Error'] = "Looks like we already have a reservation for that vehicle at the same time. Please check if you have entered the correct details.";
                // header("Location: /booking/error");
                header("Location: /booking/details");
            }
        }
    }
    
    function updateReservation($details, $orderID)
    {
        if ($_SESSION['role'] == "customer") {
            // echo $details;
            $details = str_replace('_', ' ', $details);
            $details = str_replace('|', '/', $details);
            // echo $details;
            $details = explode(';', $details);

            for ($i = 0; $i < sizeof($details); $i++) {
                if (strncmp($details[$i], " day", 4) == 0) {
                    $day = substr($details[$i], 5);
                } else if (strncmp($details[$i], " month", 6) == 0) {
                    $month = substr($details[$i], 7);
                } else if (strncmp($details[$i], " year", 5) == 0) {
                    $year = substr($details[$i], 6);
                } else if (strncmp($details[$i], " time", 5) == 0) {
                    $time = substr($details[$i], 6);
                } else if (strncmp($details[$i], " vehicle", 8) == 0) {
                    $vehicle = substr($details[$i], 9);
                } else if (strncmp($details[$i], " washPackageName", 16) == 0) {
                    $washPackageName = substr($details[$i], 17);
                } else if (strncmp($details[$i], " washPackage", 12) == 0) {
                    $washPackage = substr($details[$i], 13);
                } else if (strncmp($details[$i], " price", 6) == 0) {
                    $price = substr($details[$i], 7);
                } else if (strncmp($details[$i], " total", 6) == 0) {
                    $total = substr($details[$i], 7);
                } else if (strncmp($details[$i], " address", 8) == 0) {
                    $address = substr($details[$i], 9);
                } else if (strncmp($details[$i], " latitude", 9) == 0) {
                    $latitude = substr($details[$i], 10);
                } else if (strncmp($details[$i], " longitude", 10) == 0) {
                    $longitude = substr($details[$i], 11);
                }
            }

            $date = $year . "-" . $month . "-" . $day;

            $reservationDetails = array($vehicle, $address, $latitude, $longitude, $price, $total, $washPackage, $date, $time, $_SESSION['userDetails'][0]['User_ID']);
            if ($this->model->UpdateReservation($orderID, $reservationDetails)) {

                $mail = new Mailer();

                $output = '<p>Dear customer,</p>';
                $output .= '<p>Thank you for using WandiWash!</p>';
                $output .= '<p>You have rescheduled a reservation on ' . $date . ' with the following details.</p>';
                $output .= '<p>Vehicle - ' . $vehicle . '</p>';
                $output .= '<p>Wash Package - ' . $washPackageName . '</p>';
                $output .= '<p>Location - ' . $address . '</p>';
                $output .= '<p></p>';
                $output .= '<p>Service Price - Rs.' . $price . '.00</p>';
                $output .= '<p>Total Price - Rs.' . $total . '.00</p>';
                $output .= '<p>We will let you know once a service team is assigned for you. Make sure to check your email or your upcoming reservations.</p>';
                $output .= '<p>Thanks,</p>';
                $output .= '<p>WandiWash.</p>';
                $body = $output;
                $subject = "Your reservation has been rescheduled - wandiwash.com";

                if ($mail->mailto($subject, $_SESSION['userDetails'][0]['Email'], $body)) {
                    header("Location: /booking/upcoming");
                }
            }
        }
    }

    function assignTeam($id, $resId)
    {
        if ($_SESSION['role'] == "manager") {
            $members = $this->model->getMembers($id);
            if ($this->model->assignServiceTeam($id, $members, $resId)) {

                //get customer
                $custDetails = $this->model->getCustomerDetails($resId);

                //send email to customer
                $mail = new Mailer();

                $output = '<p>Dear ' . $custDetails[0]['First_Name'] . ' ' . $custDetails[0]['Last_Name'] . ',</p>';
                $output .= '<p>A service team has been assigned for your reservation.</p>';
                $output .= '<p>Please log on to your account and check the relevant details on your upcoming reservations.</p>';
                $output .= '<p>Thanks,</p>';
                $output .= '<p>WandiWash.</p>';
                $body = $output;
                $subject = "We have assigned you a service team - wandiwash.com";

                if ($mail->mailto($subject, $custDetails[0]['Email'], $body)) {
                    header("Location: /booking/upcomingOrder/" . $resId);
                }
            }
        }
    }

    function deleteReservation($id)
    {

        // today
        $today = date("Y-m-d");

        // get date and time of reservation
        $reservation = $this->model->getReservationDetails($id);
        $date = $reservation[0]['Date'];

        if ($_SESSION['role'] == "manager" || $_SESSION['role'] == "customer") {
            // if different of reservation time is more than 24 hours from today date time then delete reservation
            if (strtotime($date) - strtotime($today) > 86400) {
                if ($this->model->deleteReservation($id)) {
                    header("Location: /booking/upcoming");
                }
            } else {
                // session to display cannot cancel reservation
                $_SESSION['cancelReservation'] = "cannot";
                header("Location: /booking/upcomingOrder/" . $id);
            }
        }
    }

    // function deleteReschedule($id)
    // {
    //     // today
    //     $today = date("Y-m-d");

    //     // get date and time of reservation
    //     $reservation = $this->model->getReservationDetails($id);
    //     $date = $reservation[0]['Date'];

    //     if ($_SESSION['role'] == "customer") {
    //         // if different of reservation time is more than 24 hours from today date time then delete reservation
    //         if (strtotime($date) - strtotime($today) > 86400) {
    //             if ($this->model->deleteReservation($id)) {
    //                 header("Location: /booking/details");
    //             }
    //         } else {
    //             // session to display cannot cancel reservation
    //             $_SESSION['cancelReservation'] = "cannot";
    //             header("Location: /booking/upcomingOrder/" . $id);
    //         }
    //     }
    // }
    
    function rateService($orderID)
    {

        $i = $_POST["rateStars"];
        var_dump($i);
        if ($_SESSION['role'] == "customer") {
            if ($this->model->rateService($orderID, $i)) {
                header("Location: /booking/completedOrder/" . $orderID);
            }
        }
    }
}

// what is json_encode?
// https://www.php.net/manual/en/function.json-encode.php