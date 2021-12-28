<?php
session_start();
class Calendar extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //Get reservations for today

    function calendarDetails($date, $time, $month, $year)
    {
        $_SESSION['bookingDate'] = $date;
        $_SESSION['bookingTime'] = $time;
        $_SESSION['bookingMonth'] = $month;
        $_SESSION['bookingYear'] = $year;
        echo $date . " " . $time . " " . $month . " " . $year;
        header("Location: /booking/details");
    }

    function stlTodayReservations(){
        $_SESSION['todayReservations'] = $this->model->getSTLtodayReservationList();
        if ($_SESSION['role'] == "stl") {
            $this->view->render('stl/AssignedOrders');
            exit;
        }
    }
    //view order details for stl
    function todayOrder($order_id)
    {

        $_SESSION['todayOrder'] = $this->model->getReservationDetails($order_id);//order details
        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['todayOrder'][0]['Customer_ID']);//customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['completedOrder'][0]['Vehicle_ID']);//vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['completedOrder'][0]['Wash_Package_ID']);//wash package selected

        if ($_SESSION['role'] == "stl") {
            $this->view->render('stl/OrderDetails');
            exit;
        }
    }
    /*    //To get assigned reservation list to stl
    function getSTLtodayReservationList(){
        $today = date('Y-m-d');
       
        $result = $this->db->select('*', "reservation", "WHERE Date = :today ; ",":today",$today);
        return $result;
    }*/
}
