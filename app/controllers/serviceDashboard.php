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
        $stlID = $_SESSION['stlDetails'][0]['STL_ID'];
        $_SESSION['bookings'] = $this->model->getNoOfBookings($stlID);
        $_SESSION['typeOfBookings'] = $this->model->getTypeOfBookings($stlID);
        $this->view->render('stl/Dashboard');
    }
}
