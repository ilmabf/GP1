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
        $id = $_SESSION['stlDetails'][0]['STL_ID'];
        $_SESSION['todayReservations'] = $this->model->getSTLtodayReservationList($id);
        if ($_SESSION['role'] == "stl") {
            $this->view->render('stl/AssignedOrders');
            exit;
        }
    }
    //view order details for stl
    function todayOrder($orderID)
    {

        $_SESSION['todayOrder'] = $this->model->getReservationDetails($orderID);//order details
        $_SESSION['customer'] = $this->model->getCustomer($_SESSION['todayOrder'][0]['Customer_ID']);//customer details who booked order
        $_SESSION['vehicle'] = $this->model->getSelectedVehicle($_SESSION['todayOrder'][0]['Vehicle_ID']);//vehicle details service done
        $_SESSION['washpackage'] = $this->model->getSelectedWashPackage($_SESSION['todayOrder'][0]['Wash_Package_ID']);//wash package selected

        if ($_SESSION['role'] == "stl") {
            $this->view->render('stl/OrderDetails');
            exit;
        }
    }
    function uploadImages(){
    //User Autherization
        if ($_SESSION['role'] == "stl") {

        $order_id = $_POST["order_id"];
        $beforePhoto =$_POST["beforePhoto"];
        $afterPhoto =$_POST["afterPhoto"];
        
            if (isset($order_id) && isset($beforePhoto) && isset($afterPhoto) ) {

                if ($this->model->uploadImages($order_id, $beforePhoto, $afterPhoto)) {
                    header("Location: /calendar/stlTodayReservations");
                }
            } else {
                echo "Error";
            }
        }

    }
 
}
