<?php

class Dashboard extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($_SESSION['role'] == "manager") {
            $_SESSION['bookings'] = $this->model->getNoOfBookings();
            $_SESSION['typeOfBookings'] = $this->model->getTypeOfBookings();
            $_SESSION['revenue'] = $this->model->getRevenue();
            $_SESSION['teamBookings'] = $this->model->getTeamBookings();
            $this->view->render('manager/Dashboard');
        }
    }
}
