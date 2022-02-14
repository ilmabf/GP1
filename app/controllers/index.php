<?php
session_start();

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $_SESSION['Vehicles'] = $this->model->getVehicle();
        $_SESSION['WashPackages'] = $this->model->getWashPackage();
        $this->view->render('user/Home');
    }
}
