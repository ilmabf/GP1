<?php
session_start();
class ServiceDashboard extends controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // echo $lastDay = date('Y-m-t');
        // print_r($_SESSION['stlDetails']);
        $stlID = $_SESSION['stlDetails'][0]['STL_ID'];
        $result = $this->model->getNoOfBookings($stlID);
        $_SESSION['bookings'] = $result;
        // print_r($result);
        $this->view->render('stl/Dashboard');
    }
}