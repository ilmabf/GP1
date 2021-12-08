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

    function reservations()
    {
        $this->view->render('stl/AssignedOrders');
    }
    function orderDetails()
    {
        $this->view->render('stl/OrderDetails');
    }
}
