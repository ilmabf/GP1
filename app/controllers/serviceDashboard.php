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
        $result = $this->model->getNoOfBookings($stlID);
        $_SESSION['bookings'] = $result;
        $this->view->render('stl/Dashboard');
    }
}
